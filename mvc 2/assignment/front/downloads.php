<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['ID'])){
	redirect();
}
if(isset($_GET['report'])){
$s_userid = $_SESSION['ID'];
$reportnoteid = $_GET['report'];
$query = "SELECT `ID` FROM `downloads` WHERE `NoteID`=$reportnoteid AND `Downloader`= $s_userid ";
$download_table_id_query = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($download_table_id_query);
$DownloadsID = $row["ID"];
	
$query = "SELECT * FROM sellernotesreportedissues WHERE NoteID=$reportnoteid AND ReportedBYID=$s_userid";
$check_report_note_query = mysqli_query($connection,$query);
confirmq($check_report_note_query);
$countofreport = mysqli_num_rows($check_report_note_query);
	if($countofreport <= 0){
		$query = "INSERT INTO `sellernotesreportedissues`(`NoteID`, `ReportedBYID`, `AgainstDownloadID`, `CreatedDate`, `CreatedBy`) VALUES ($reportnoteid,$s_userid,$DownloadsID,now(),$s_userid)";
		$report_note_query = mysqli_query($connection,$query);
		confirmq($report_note_query);
	} 
	
	

redirect('downloads.php');

}




if(isset($_GET['download'])){
	$downloadnoteid = $_GET['download'];
	 
	$query = "SELECT * FROM sellernotesattachements WHERE NoteID=$downloadnoteid ";
	$download_path_query = mysqli_query($connection,$query);
	confirmq($download_path_query);
	
	$bookfiles = [];
	while($row = mysqli_fetch_assoc($download_path_query)){
		 $filepth = $row['FilePath'];
		if(!file_exists($filepth)){
			echo "file not found";
		} else {
			array_push($bookfiles,$filepth);
		  }
	}
		$userid = $_SESSION['ID'];
		$query = "SELECT * FROM `downloads` WHERE `NoteID`=$downloadnoteid AND `Downloader`=$userid";
		$run_query= mysqli_query($connection,$query);
		confirmq($run_query);
		$row = mysqli_fetch_assoc($run_query);
		$ispaid = $row['IsPaid'];
		$isdownloaded = $row['IsAttachmentDownloaded'];
		if($isdownloaded == 0 && $ispaid == 1){
		$userid = $_SESSION['ID'];
		$query = "UPDATE `downloads` SET `IsAttachmentDownloaded`=1,`AttachmentDownloadedDate`=now(),`CreatedBy`=now() WHERE `NoteID`=$downloadnoteid AND `Downloader`=$userid";
			$run_query= mysqli_query($connection,$query);
			confirmq($run_query);
		}
	
	

		$zipname = time().".zip";
		$zip = new ZipArchive;
		$zip->open($zipname,ZipArchive::CREATE | ZipArchive::OVERWRITE);
		foreach($bookfiles as $file){
		$zip->addFile($file,basename($file));
			}
	$zip->close();
	header('Content-type: aplication/zip');
	header('Content-Disposition: attachment;filename='.$zipname);
	readfile($zipname);
	unlink($zipname);
	redirect('downloads.php');



}


















?>
<title>My Downloads</title>
<!-- link css -->
<link rel="stylesheet" href="css/my-downloads-style.css">
<!-- link responsive -->
<link rel="stylesheet" href="css/responsive/responsive-my-downloads.css">
</head>

<body>
	<?php include "includes/navigation.php"; ?>
	<section id="my-download-notes">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-sm-5 col-12">
						<div class="progress-heading" class="text-left">
							<p>My Downloads</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-6">
						<div class="search-bar" class="text-right">
							<input type="text" class="form-control searchbox" id="validationDefault01" placeholder="     Search">

						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-6">
						<div class="search-btn">
							<button type="submit" class="btn btn-block btn-general searchbtn">SEARCH</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="progress-table table-responsive">
							<table class="table  table-hover-1">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">NOTE TITLE</th>
										<th scope="col">CATEGORY</th>
										<th scope="col">BUYER</th>
										<th scope="col">SELL TYPE</th>
										<th scope="col">PRICE</th>
										<th scope="col">DOWNLOAD DATE/TIME</th>
										<th scope="col"> </th>
										<th scope="col"> </th>

									</tr>
								</thead>
								<tbody>


									<?php
$userid = $_SESSION['ID'];									
$userEmail = $_SESSION['Email'];									
$query = "SELECT * FROM `downloads` WHERE Downloader = $userid AND IsSellerHasAllowedDownload = 1 ";

$downloadnotes_query = mysqli_query($connection,$query);
confirmq($downloadnotes_query);
$sr_no = 0;								
while($row = mysqli_fetch_assoc($downloadnotes_query)){
	$title 			= $row['NoteTitle'];
	$noteid 		= $row['NoteID'];
	$category 		= $row['NoteCategory'];
	$buyerid 		= $row['Downloader'];
	$ispaid 		= $row['IsPaid'];
	$price 			= $row['PurchasedPrice'];
	$date 			= $row['CreatedDate'];
	$sr_no			= $sr_no+1;
	$buyer 			= tabledata('users','Email','ID',$buyerid);
	if($ispaid == 0){$selltype = 'Free';} else {$selltype = 'Paid';}
									

									
?>


									<tr>
										<td><?php echo $sr_no; ?></td>
										<td class="add-color"><?php echo $title; ?></td>
										<td><?php echo $category; ?></td>
										<td><?php echo $buyerid; ?></td>
										<td><?php echo $selltype; ?></td>
										<td>$<?php echo $price; ?></td>
										<td><?php echo $date; ?></td>
										<td><a href="note-details.php?noteid=<?php echo $noteid; ?>"><img src="images/Dashboard/eye.png" alt="img" class="img-responsive"></a>
										</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="images/dots.png" alt="img" class="img-responsive"></button>

												<div class="dropdown-content">
													<a href="downloads.php?download=<?php echo $noteid; ?>">Download Note</a>
													<a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $noteid; ?>">Add Reviews/Feedback</a>

													<a href="downloads.php?report=<?php echo $noteid; ?>">Report as Inappopriate</a>
												</div>
											</div>
										</td>
									</tr>
									<section id="Review-pop-up">
										<div class="modal fade" id="exampleModal<?php echo $noteid; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">

												<div class="modal-content">
													<button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true"><img src="images/notedetails/close.png" alt="img" class="img-responsive close-btn"></span>
													</button>




													<form action="" method="post">
														<div class="modal-body">
															<h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
															<div class="rate text-left">
																<input type="radio" id="<?php echo $noteid; ?>star5" name="rate" value="5" />
																<label for="<?php echo $noteid; ?>star5" title="text">5 stars</label>
																<input type="radio" id="<?php echo $noteid; ?>star4" name="rate" value="4" />
																<label for="<?php echo $noteid; ?>star4" title="text" class="active">4 stars</label>
																<input type="radio" id="<?php echo $noteid; ?>star3" name="rate" value="3" />
																<label for="<?php echo $noteid; ?>star3" title="text">3 stars</label>
																<input type="radio" id="<?php echo $noteid; ?>star2" name="rate" value="2" />
																<label for="<?php echo $noteid; ?>star2" title="text">2 stars</label>
																<input type="radio" id="<?php echo $noteid; ?>star1" name="rate" value="1" />
																<label for="<?php echo $noteid; ?>star1" title="text">1 star</label>
															</div>
											<div class="comment">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<label class="text-left">Comments*</label>
														<input type="text" name="comment" class="form-control" id="<?php echo $noteid; ?>validationDefault04" placeholder="Comments..." required>
													</div>
													<div class="col-md-12 col-sm-12">
														<input type="hidden" name="noteid" value="<?php echo $noteid; ?>">
														<div class="submit-btn">
															<button type="submit" name="r_submit" class="btn btn-block btn-general">SUBMIT</button>
														</div>
													</div>
												</div>
											</div>

														</div>
													</form>

												</div>
											</div>
										</div>
									</section>

									<?php } ?>
								</tbody>
							</table>

						</div>
					</div>

				</div>

			</div>
		</div>
	</section>
	<?php 
	
	if(isset($_POST['r_submit'])){
		$rate 		= $_POST['rate'];
		$comment 	= $_POST['comment'];
	 	$rate 		= $_POST['rate'];
	 	$noteid 	= $_POST['noteid'];
		
	$query = "SELECT `ID` FROM `downloads` WHERE `NoteID`=$noteid AND `Downloader`= $userid ";
	$download_table_id_query = mysqli_query($connection,$query);
	$row = mysqli_fetch_assoc($download_table_id_query);
	$DownloadsID = $row["ID"];
		
	$query = "SELECT * FROM `sellernotesreviews` WHERE NoteID=$noteid AND ReviewedByID= $userid AND AgainstDownloadsID=$DownloadsID";
	$duplicate_review_query = mysqli_query($connection,$query);
	confirmq($duplicate_review_query);
	 $c = mysqli_num_rows($duplicate_review_query);
		
		if($c <= 0){
	$query  = "INSERT INTO `sellernotesreviews`(`NoteID`, `ReviewedByID`, `AgainstDownloadsID`, `Ratings`, `Comments`, `CreatedDate`, `CreatedBy`) VALUES ($noteid,$userid,$DownloadsID,$rate,'$comment',now(),$userid)";
	$review_query = mysqli_query($connection,$query);
	confirmq($review_query);
									
		} else {
		$query = "UPDATE `sellernotesreviews` SET `Ratings`=$rate,`Comments`='$comment',`ModifiedDate`=now(),`ModifiedBy`=$userid WHERE   NoteID=$noteid AND ReviewedByID= $userid AND AgainstDownloadsID=$DownloadsID";
		$update_review_query = mysqli_query($connection,$query);
		confirmq($update_review_query);
		}
	}		
					

					
					
					


?>
	<?php include "includes/footer.php" ?>
