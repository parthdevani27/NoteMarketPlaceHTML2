<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php $page='notedetail'; ?>
<?php
if(isset($_GET['d'])){
	
	$downloadnoteid = $_GET['noteid'];
	$attachmentdownload = 0;
	$query = "SELECT * FROM sellernotesattachements WHERE NoteID=$downloadnoteid ";
	$download_path_query = mysqli_query($connection,$query);
	confirmq($download_path_query);
	$countattachement = mysqli_num_rows($download_path_query);
	if($countattachement > 1){
	$bookfiles = [];
	while($row = mysqli_fetch_assoc($download_path_query)){
		 $filepth = $row['FilePath'];
		if(!file_exists($filepth)){
			echo '<script>alert("file not found")</script>';
		} else {
			$downloader = $_SESSION['ID'];
		$query = "SELECT * FROM sellernotes WHERE ID = $downloadnoteid";
		$run_query = mysqli_query($connection,$query);
		confirmq($run_query);
		$row = mysqli_fetch_assoc($run_query);
			$title 		 	= $row['Title'];
			$catid	 	 	= $row['Category'];
			$seller 		= $row['SellerID'];
			$category 		= tabledata('notecategories','Name','ID',$catid);
	 
			
		$cquery = "SELECT * FROM downloads WHERE Downloader=$downloader AND NoteID=$downloadnoteid";
		$run_query = mysqli_query($connection,$cquery);
		confirmq($run_query);
		$isdownloaded = mysqli_num_rows($run_query);
			
	
		if($isdownloaded <= 0){		
		$iquery = "INSERT INTO `downloads`(`NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownloaded`, `AttachmentDownloadedDate`, `IsPaid`,PurchasedPrice,`NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`) VALUES ($downloadnoteid,$seller,$downloader,1,'$filepth',1,now(),0,0,'$title','$category',now(),$downloader)";
				
		$run_insert_query = mysqli_query($connection,$iquery);
		confirmq($run_insert_query);
		  }
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
	redirect("note-details.php?noteid=$downloadnoteid");
		
		
		
		
		
	} else if($countattachement == 1){
		$row = mysqli_fetch_assoc($download_path_query);
		  $filepth = $row['FilePath'];
		  $filename = $row['FileName'];
			if(!file_exists($filepth)){
			echo '<script>alert("file not found")</script>';
		} else {
			
			
		$downloader = $_SESSION['ID'];
		$query = "SELECT * FROM sellernotes WHERE ID = $downloadnoteid";
		$run_query = mysqli_query($connection,$query);
		confirmq($run_query);
		$row = mysqli_fetch_assoc($run_query);
			$title 		 	= $row['Title'];
			$catid	 	 	= $row['Category'];
			$seller 		= $row['SellerID'];
			$category 		= tabledata('notecategories','Name','ID',$catid);
				
				
				
	 	$cquery = "SELECT * FROM downloads WHERE Downloader=$downloader AND NoteID=$downloadnoteid";
		$run_query = mysqli_query($connection,$cquery);
		confirmq($run_query);
		$isdownloaded = mysqli_num_rows($run_query);
			
		if($isdownloaded <= 0){	
		$iquery = "INSERT INTO `downloads`(`NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownloaded`, `AttachmentDownloadedDate`, `IsPaid`,PurchasedPrice,`NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`) VALUES ($downloadnoteid,$seller,$downloader,1,'$filepth',1,now(),0,0,'$title','$category',now(),$downloader)";
				
		$run_insert_query = mysqli_query($connection,$iquery);
		confirmq($run_insert_query);
			}
				
				
			$ext = pathinfo($filename, PATHINFO_EXTENSION);	
			echo $filename = time().".$ext";	
			header("Content-Type: application/octet-stream");
			header('Content-Disposition: attachment;filename='.$filename);
			readfile($filepth);	
			redirect("note-details.php?noteid=$downloadnoteid");
		 }
		
	} 
	else {
		echo '<script>alert("file not found")</script>';
		
		
	} 




}
?>
<?php
if(isset($_SESSION['ID'])){
	$userid = $_SESSION['ID'];
} 
if(isset($_GET['noteid'])){
$noteid = $_GET['noteid'];
	$query = "SELECT * FROM sellernotes WHERE ID=$noteid ";
	$note_detail_query = mysqli_query($connection,$query);
	confirmq($note_detail_query);
	$row = mysqli_fetch_assoc($note_detail_query);
	
	$img 			= $row['DisplayPicture'];
	$pubdate 		= $row['PublishedDate'];
	$title 			= $row['Title'];
	$sellerid	 	= $row['SellerID'];
	$description 	= $row['Description'];
	$uni 			= $row['UniversityName'];
	$country 		= $row['Country'];
	$course 		= $row['Course'];
	$coursecode 	= $row['CourseCode'];
	$prof 			= $row['Professor'];
	$ispaid 		= $row['IsPaid'];
	$price 			= $row['SellingPrice'];
	$preview 		= $row['NotesPreview'];
	$page 			= $row['NumberofPages'];
	$type 			= $row['NoteType'];
	$catid 			= $row['Category'];
	$cat			= tabledata('notecategories','Name',"ID",$catid);
	$countryname	= tabledata('countries','Name',"ID",$catid);

	$d_img = defaultnote();
	$img_path ="member/$d_img";
	if(!empty($img)){
		if(file_exists("member/$sellerid/$noteid/$img")){
	$img_path = "member/$sellerid/$noteid/$img";
		} 
	}
		
	
							

	
	
		if(empty($preview)){
	$preview_path ="images/Search/6.jpg";
	} else {
		
	$query = "SELECT `FilePath` FROM `sellernotesattachements` WHERE `FileName`='$preview' ";
	$get_table_data_by_id_query = mysqli_query($connection,$query);
	$row = mysqli_fetch_assoc($get_table_data_by_id_query);
		if(!empty($row)){
	$preview_path = $row["FilePath"];
		}
		
	}



} else {
	redirect('search-page.php');
}
?>
	<title>Note Details</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/note-details.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-note-details.css">
</head>

<body>
<?php include "includes/navigation.php"; ?>
	
	
	<section id="note-details-page">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-12">
						<div id="note-detail-part-1">
							<div class="row">

								<div class="col-md-5 col-sm-12 col-12">
									<div id="note-detail-img">
										<h4>Notes Details</h4>
										<img src="<?php echo $img_path; ?>" alt="img" class="img-responsive page-img">
									</div>
								</div>
								<div class="col-md-1 col-sm-12 col-12"></div>
								<div class="col-md-6 col-sm-12 col-12">
									<div id="notes-name">
										<h3><?php echo $title; ?></h3>
										<h5><?php echo $cat; ?></h5>
										<p><?php echo $description; ?></p>
										<?php
										if(isset($_GET['downloadnotes'])){
											header("Location: login-page.php");
										}
										
										
										if(isset($_SESSION['ID'])){  
										if($ispaid){ ?>
											<input type="hidden" id="noteid10" value="<?php echo $noteid; ?>">
											<button type='submit' id="paidnotedownload" name='downloadnotes' class='btn btn-block btn-general btn-download' data-toggle='modal' data-target='#exampleModal'>DOWNLOAD/$<?php echo $price; ?></button>
											
									<?php } else { ?>
									
											<a href="note-details.php?noteid=<?php echo $noteid; ?>&d=1"><button type='submit' name='freedownloadnotes' class='btn btn-block btn-general btn-download'>DOWNLOAD</button></a>
										
									
									<?php }	?>
									<?php	} else {
											echo "<a href='login-page.php'><button type='submit' name='downloadnotes' class='btn btn-block btn-general btn-download'>DOWNLOAD/$price</button></a>";
											
										}
										?>
										
										
								
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-sm-12 col-12"></div>
					<div class="col-md-5 col-sm-12 col-12">
						<div id="note-detail-part-2">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-6">
									<p>institution:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style"><?php echo $uni; ?></span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Country:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style"><?php echo $countryname; ?></span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Cource Name:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style"><?php echo $course; ?></span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Cource Code:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 col-6 text-right">
									<p><span class="details-style"><?php echo $coursecode; ?></span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Professor:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style"><?php echo $prof; ?></span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Number of Pages:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style"><?php echo $page; ?></span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Appoved Date:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style"><?php echo $pubdate; ?></span></p>
								</div>
								<div class="col-md-5 col-sm-5 col-5">
									<p>Rating:</p>
								</div>
								<div class="col-md-7 col-sm-7 col-7 text-right">
									<p><span class="details-style">
<?php
$query = "SELECT  avg(`Ratings`) AS `Ratings1`,count(Ratings) AS c_rate FROM `sellernotesreviews` WHERE `NoteID`= $noteid";
$rating_query = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($rating_query);
$rate = $row['Ratings1'];
$totalreview = $row['c_rate'];
$rate = ceil($rate);
	if($rate == 0){
		$star1 = 'star-white.png'; 
		$star2 = 'star-white.png'; 
		$star3 = 'star-white.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($rate == 1){
		$star1 = 'star.png'; 
		$star2 = 'star-white.png'; 
		$star3 = 'star-white.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($rate == 2){
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star-white.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($rate == 3){
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($rate == 4){
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star.png'; 
		$star4 = 'star.png'; 
		$star5 = 'star-white.png'; 
	} else {
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star.png'; 
		$star4 = 'star.png'; 
		$star5 = 'star.png'; 
	}
						
?>
					<img width="20px" height="20px" src="images/Search/<?php echo $star1; ?>"  alt="img" class="img-responsive flag-img">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star2; ?>" alt="img" class="img-responsive">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star3; ?>" alt="img" class="img-responsive">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star4; ?>" alt="img" class="img-responsive">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star5; ?>" alt="img" class="img-responsive">&nbsp;&nbsp;
										</span><span class="details-style"><?php echo $totalreview; ?> Review</span></p>
									
								</div>
								<div class="col-md-12 col-sm-12 col-12 ">
									<h6 class="marked-users"><?php echo totalcountwithdata1('sellernotesreportedissues','NoteID',$noteid);
											?>&nbsp;&nbsp;Users Mared this note as inappropriate</h6>
								</div>
							</div>






						</div>
					</div>
				</div>
				<hr>
			</div>
		</div>

	</section>

	<section id="note-details-pdf">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-12 col-12">
						<div id="notes-pdf">
							<p>Notes Preview</p>
								<div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
							<?php 
if(!empty($preview)){
if(file_exists("member/$sellerid/$noteid/$preview")){
$preview_path = "member/$sellerid/$noteid/$preview";
?>		

						
  <div class="responsive-wrapper responsive-wrapper-padding-bottom-90pct"
     style="-webkit-overflow-scrolling: touch; overflow: auto;">
     <iframe src="<?php echo $preview_path; ?>">
      <p style="font-size: 110%;"><em><strong>ERROR: </strong>  
An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em> Please update your browser to its most recent version and try again, or access the file <a href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">with this link.</a></p>
    </iframe>
  </div>
<?php } }  ?>
</div>
						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-12">
						<div id="custmers-reviews">
<?php
$query = "SELECT * FROM `sellernotesreviews` WHERE NoteID=$noteid ORDER BY ID DESC";
$review_notedetails_query = mysqli_query($connection,$query);
confirmq($review_notedetails_query);
while($row = mysqli_fetch_assoc($review_notedetails_query)){
	
	$ReviewedByID = $row['ReviewedByID'];
	$Ratings = $row['Ratings'];
	$Comments = $row['Comments'];
	if($Ratings == 0){
		$star1 = 'star-white.png'; 
		$star2 = 'star-white.png'; 
		$star3 = 'star-white.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($Ratings == 1){
		$star1 = 'star.png'; 
		$star2 = 'star-white.png'; 
		$star3 = 'star-white.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($Ratings == 2){
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star-white.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($Ratings == 3){
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($Ratings == 4){
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star.png'; 
		$star4 = 'star.png'; 
		$star5 = 'star-white.png'; 
	} else {
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star.png'; 
		$star4 = 'star.png'; 
		$star5 = 'star.png'; 
	}
	 
	 $firstname = tabledata('users','FirstName','id',$ReviewedByID);
	 $lastname = tabledata('users','LastName','id',$ReviewedByID);	
	 $path = profilePicPath($ReviewedByID);
			
							
?>
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div id="custmers-reviews-1">
										<div class="row">
											<div class="col-md-2 col-sm-2">
												<img style='border-radius: 60px;'  src="<?php echo $path; ?>" alt="img" class="img-responsive page-img custmers-reviews-img">
											</div>
											<div class="col-md-10 col-sm-10">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<p><?php echo  $firstname ." ". $lastname?></p>
													</div>
													<div class="col-md-12 col-sm-12">
					<img width="20px" height="20px" src="images/Search/<?php echo $star1; ?>"  alt="img" class="img-responsive star">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star2; ?>" alt="img" class="img-responsive star">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star3; ?>" alt="img" class="img-responsive star">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star4; ?>" alt="img" class="img-responsive star">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star5; ?>" alt="img" class="img-responsive star">
													</div>
													<div class="col-md-12 col-sm-12">
														<p><span><?php echo $Comments; ?></span></p>
													
													</div>
													
												</div>
											</div>
										</div>
										
									</div>
								</div>

							</div> <?php } ?>
			
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="thans-pop-up">
		<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">

				<div class="modal-content">
					<button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><img src="images/notedetails/close.png" alt="img" class="img-responsive close-btn"></span>
					</button>
					<img src="images/notedetails/SUCCESS.png" alt="img" class="img-responsive success-margin" width="63px" height="63px"><br>
					<h5 class="modal-title text-center" id="exampleModalLabel">Thans you for purchasing!</h5>
	<?php
		$downloadnoteid = $_GET['noteid'];
		$downloaderid = $_SESSION['ID'];
		$downloader = tabledata('users','FirstName','id',$downloaderid);
		$sellerid = tabledata('sellernotes','SellerID','id',$downloadnoteid);
		$sellerfn = tabledata('users','FirstName','id',$sellerid);
		$sellerln = tabledata('users','LastName','id',$sellerid);
		
	?>

					<div class="modal-body">
						<h4>Dear <?php echo $downloader; ?>,</h4><br>
						<p>As this paid nates-you need to pay to seller <?php echo $sellerfn." ".$sellerln;  ?><br>
							offline. we will send him an email that you want to download <br>
							this nots.he may contact you futher for payment process<br>
							completion.</p>
						<p><span>in case,you have urgency,<br>
								Please contact us on +919564648548.</span></p>
						<p><span>Once he received the payment and acnowledge us-selected<br>
								notes you can see over my downloads tab for download.
							</span></p>
						<p>Have a good day.</p>
					</div>


				</div>
			</div>
		</div>
	</section>

		<footer>

			<div class="horizontal-rule">
								
			</div>
			<div class="row">
					<div class="col-md-6 col-sm-6 col-6">
				<div class="footer-text text-left">
					<p>
						Copyright &copy; Tatvasoft All right reserved.
					</p>
				</div>
				</div>
				<div class="col-md-6 col-sm-6 col-6">
				
				<div class="row">
					<div class="col-md-9 col-sm-6 col-3"></div>
				<div class="col-md-1 col-sm-1 col-1">
					<div class="facebook text-center">
						<img src="images/home/home/facebook.png" alt="picture"   >
					</div>
					</div>
					<div class="col-md-1 col-sm-1 col-1">
					<div class="twitter text-center">
						<img src="images/home/home/twitter.png" alt="picture"   >
					</div>
					</div>
					<div class="col-md-1 col-sm-1 col-1">
					<div class="linkedin text-center">
						<img src="images/home/home/linkedin.png" alt="picture"   >
					</div>
					</div>
				</div>
				
				
				</div>
		</div>
		
	</footer>
	

	<!-- link jquery file-->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!-- link js file-->
	<script src="js/script2.js"></script>
</body></html>
