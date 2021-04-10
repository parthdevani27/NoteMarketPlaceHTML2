<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='dashboard'; ?>
<?php
if(isset($_POST['reject'])){
	$rejectedid  = $_POST['rejectedid'];
	$adminremark = $_POST['adminremark'];
	
	$query = "UPDATE `sellernotes` SET `Status`= 12,`ActionedBy`=$adminid,`AdminRemarks`='$adminremark'  WHERE ID = $rejectedid ";
	$reject_query = mysqli_query($connection,$query);
	confirmq($reject_query);
	unpublishSendMail($rejectedid,$adminremark);
	
}
?>
<?php
if(isset($_GET['download'])){
	$downloadnoteid = $_GET['download'];
	$query = "SELECT * FROM sellernotesattachements WHERE NoteID=$downloadnoteid ";
	$download_path_query = mysqli_query($connection,$query);
	confirmq($download_path_query);
	$countattachement = mysqli_num_rows($download_path_query);
	if($countattachement > 1){
	$bookfiles = [];
	while($row = mysqli_fetch_assoc($download_path_query)){
		 $filepth = $row['FilePath'];
		 $filepth ="../front/$filepth";
		if(!file_exists($filepth)){
			echo '<script>alert("file not found")</script>';
		} else {
			array_push($bookfiles,$filepth);
			}
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
	redirect("dashboard.php");
		
		
		
		
		
	} else if($countattachement == 1){
		$row = mysqli_fetch_assoc($download_path_query);
		  $filepth = $row['FilePath'];
		  $filepth ="../front/$filepth";
		  $filename = $row['FileName'];
			if(!file_exists($filepth)){
			echo '<script>alert("file not found")</script>';
		} else {
	
			$ext = pathinfo($filename, PATHINFO_EXTENSION);	
			 $filename = time().".$ext";	
			header("Content-Type: application/octet-stream");
			header('Content-Disposition: attachment;filename='.$filename);
			readfile($filepth);	
			redirect("dashboard.php");
		 }
		
	} 
	else {
		echo '<script>alert("file not found");
				window.location.href="dashboard.php";
			  </script>';	
	} 
}


?>
	<title>Dashboard</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/dashboard.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<?php include "includes/navigation.php" ?>
	<section id="dashboard-admin-1">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">

						<h4>Dashboard</h4>
					</div>
					<div class="col-md-4 col-sm-4 col-4">
						<div class="box-1">
						
							<h4 class="text-center"><a href="note-under-review.php"><?php echo totalcountwithdata1('sellernotes','Status',9)+totalcountwithdata1('sellernotes','Status',10); ?></a></h4>
							<p class="text-center">Number of notes in review for publish</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-4">
						<div class="box-2">
							<h4 class="text-center">
					<?php
					$query = "SELECT ID FROM `downloads` WHERE AttachmentDownloadedDate > DATE(NOW()) - INTERVAL 7 DAY AND IsSellerHasAllowedDownload=1 "	;
					$last_7day_downlod_query = mysqli_query($connection,$query);
					confirmq($last_7day_downlod_query);
					$num_download= mysqli_num_rows($last_7day_downlod_query);
					?>
						<a href="download-notes.php"><?php echo $num_download; ?></a>
							</h4>
							<p class="text-center">Number of new notes downloaded<br>
								(Last 7 days)</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-4">
						<div class="box-3">
							<h4 class="text-center">
							
						<?php
						$query = "SELECT ID FROM `users` WHERE CreatedDate > DATE(NOW()) - INTERVAL 7 DAY "	;
							$last_7day_Registration_query = mysqli_query($connection,$query);
							confirmq($last_7day_Registration_query);
							$num_user_register = mysqli_num_rows($last_7day_Registration_query);

						?>
						<a href="member.php"><?php echo $num_user_register; ?></a>
							</h4>
							<p class="text-center">Number of new Registration<br>
								(Last 7 days)</p>
						</div>
					</div>



				</div>
			</div>
		</div>
	</section>

	<section id="dashboard-admin-2">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-12 col-12">

						<div class="progress-heading" class="text-left">
							<p>Published Notes</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-9">

						<div class="search-bar" class="text-right">
							<input type="text" class="form-control searchbox" id="validationDefault01" placeholder="     Search">

						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-3">
						<div class="search-btn">
							<button type="submit" class="btn searchbtn btn-block btn-general">SEARCH</button>
						</div>
					</div>
					<div class="col-md-2 col-sm-1 col-1">



			<form id="downloadfilter" action="" method="post">	
						<select name="selectmonth" class="custom-select ">
							

<?php 
	$months  = array(1=>'Jan','Feb','March','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Des');
	$c_month = date('M');
	$key = array_search($c_month,$months);
 	$month_count = 1;

 	while($month_count<=6){
		$month = $months[$key];
			if(isset($_POST['selectmonth'])){
				$selectedMonth = $_POST['selectmonth'];
				$selectedMonth = $selectedMonth/1;
				if($key == $selectedMonth){
				echo "<option value='$key' selected>$month</option>";
				} else {
				echo "<option value='$key'>$month</option>";
				} 
			} else {
			echo "<option value='$key'>$month</option>";
			} 
		$key = $key - 1;
		if($key <= 0){
			$key = 12;
		}
		$month_count = $month_count+1;
	}							


?>
							</select>
				</form>	


					</div>

				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<div class="progress-table table-responsive">
							<table class="table  table-hover-1">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">TITLE</th>
										<th scope="col">CATEGORY</th>
										<th scope="col">ATTACHMENT SIZE</th>
										<th scope="col">SELL TYPE</th>
										<th scope="col">PRICE</th>
										<th scope="col">PUBLISHER</th>
										<th scope="col">PUBLISHED DATE</th>
										<th scope="col">NUMBER OF DOWNLOADS</th>
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>

<?php
								
$query = "SELECT * FROM `sellernotes` ";
$query .= "WHERE Status	= 11 ";

$f_month=date('m');										
if(isset($_POST['selectmonth'])){ 
	 $f_month = $_POST['selectmonth'];
} 
		//$query .= "AND (PublishedDate BETWEEN  DATE(NOW()) - INTERVAL $f_month MONTH AND DATE(NOW()) - INTERVAL $f_month-1 MONTH ) ";
		$query .= "AND MONTH(PublishedDate) = $f_month ";							
									

$query .= "ORDER BY ID DESC";
$rejected_notes_query = mysqli_query($connection,$query);
confirmq($rejected_notes_query);									
$sr_no = 0;
while($row = mysqli_fetch_assoc($rejected_notes_query)){
	$Title			= $row['Title'];
	$Category 		= $row['Category'];
	$ID 			= $row['ID'];
	$IsPaid			= $row['IsPaid'];
	$SellingPrice 	= $row['SellingPrice'];
	$PublishedDate 	= $row['PublishedDate'];
	$SellerID 		= $row['SellerID'];
	$ActionedBy 	= $row['ActionedBy'];
	$CreatedDate 	= $row['CreatedDate'];
	$AdminRemarks 	= $row['AdminRemarks'];
	$firstnameseller 		= tabledata('users','FirstName','id',$SellerID);
	$lastnameseller 		= tabledata('users','LastName','id',$SellerID);
	$actionbyfn 			= tabledata('users','FirstName','id',$ActionedBy);
	$actionbyln 			= tabledata('users','LastName','id',$ActionedBy);
	$Category_name	 		= tabledata('notecategories','Name','ID',$Category);
	$sr_no 			= $sr_no + 1;
	if($IsPaid == 0){
		$selltype = 'Free';
		$SellingPrice = 0;
	} else {
		$selltype = 'Paid';	
	}
	$query = "SELECT COUNT(NoteID) AS count FROM `downloads` WHERE IsAttachmentDownloaded=1 AND NoteID=$ID ";
	$count_num_download = mysqli_query($connection,$query);
	confirmq($count_num_download);
	$row = mysqli_fetch_assoc($count_num_download);
	$numOfDownload = $row['count'];
	
	$file_size = '';
	$query = "SELECT * FROM sellernotesattachements WHERE NoteID=$ID ";
	$download_path_query = mysqli_query($connection,$query);
	confirmq($download_path_query);
	$countattachement = mysqli_num_rows($download_path_query);
	if($countattachement > 1){
	$bookfiles = [];
	while($row = mysqli_fetch_assoc($download_path_query)){
		 $filepth = $row['FilePath'];
		 $filepth ="../front/$filepth";
		if(!file_exists($filepth)){
			
		} else {
			array_push($bookfiles,$filepth);
			}
		}
		$zipname = time().".zip";
		$zip = new ZipArchive;
		$zip->open($zipname,ZipArchive::CREATE | ZipArchive::OVERWRITE);
		foreach($bookfiles as $file){
		$zip->addFile($file,basename($file));
			}
	$zip->close();
	$file_size  =formatSizeUnits(filesize($zipname));
		unlink($zipname);
	} else if($countattachement == 1){
		$row = mysqli_fetch_assoc($download_path_query);
		  $filepth = $row['FilePath'];
		  $filepth ="../front/$filepth";
		  $filename = $row['FileName'];
			if(!file_exists($filepth)){
			
		} else {
	
			$ext = pathinfo($filename, PATHINFO_EXTENSION);	
			 $filename = time().".$ext";	
				$file_size  =formatSizeUnits(filesize($filepth));
		

		 }
		
	} 
 	
	
?>
	<tr>
		<td><?php echo $sr_no; ?></td>
									
		<td><a class="add-color" href="note-details.php?noteid=<?php echo $ID; ?>"><?php echo $Title; ?></a></td>
		<td><?php echo $Category_name; ?></td>
		<td><?php echo $file_size; ?></td>
		<td><?php echo $selltype; ?></td>
		<td><?php echo '$'.$SellingPrice; ?></td>
		<td><?php echo $firstnameseller ." ". $lastnameseller ; ?><a href="member-detail.php?member=<?php echo $SellerID; ?>"><img src="img/assets/eye.png" alt="img" class="img-responsive"></a></td>
		<td><?php echo $PublishedDate; ?></td>
		<td><a class="add-color" href="download-notes.php?viewdownload=<?php echo $ID; ?>"><?php echo $numOfDownload ; ?></a></td>
		<td>
		<div class="dropdown">
				<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
				<div class="dropdown-content setwidth">
				<a href="dashboard.php?download=<?php echo $ID; ?>">Download Noted</a>
				<a href="note-details.php?noteid=<?php echo $ID; ?>">View More Details</a>
				<a data-toggle="modal" data-target="#exampleModal<?php echo $ID; ?>" href="dashboard.php?unpublish=<?php echo $ID; ?>">Unpublish</a>
				</div>
			</div> 
		</td>
									
</tr>	

	
				<div class="modal fade" id="exampleModal<?php echo $ID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $Title; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12 add-margin">
                                       
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" id="comments">Remarks</label>
                                                <input type="hidden" name="rejectedid" value="<?php echo $ID; ?>">
                                                <textarea name="adminremark" class="form-control" id="exampleFormControlTextarea1" rows="5"
                                                 placeholder="Write Remarks" required></textarea>
                                            </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="return confirm('Are you sure you want to Unpublish this note?')" type="submit" name="reject" class="btn btn-reject">Reject</button>
                            <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                        </div>
                          </form>
                    </div>
                </div>
            </div>	
						


<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
			
				</div>

			</div>
		</div>
	</section>
		<script>
		if ( window.history.replaceState ) {
		  window.history.replaceState( null, null, window.location.href );
		}
	</script>
	<?php include "includes/footer.php" ?>