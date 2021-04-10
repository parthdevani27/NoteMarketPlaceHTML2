<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='notedetail'; ?>
<?php 
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
	$country		= tabledata('countries','Name',"ID",$country);

	$d_img = defaultnote();
	$img_path ="../front/member/$d_img";
	if(!empty($img)){
	if(file_exists("../front/member/$sellerid/$noteid/$img")){
	$img_path = "../front/member/$sellerid/$noteid/$img";
		} 
	}


	if(isset($_GET['download'])){
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
	redirect("note-details.php?noteid=$noteid");
		
		
		
		
		
	} else if($countattachement == 1){
		$row = mysqli_fetch_assoc($download_path_query);
		  $filepth = $row['FilePath'];
		  $filepth ="../front/$filepth";
		  $filename = $row['FileName'];
			if(!file_exists($filepth)){
			echo '<script>alert("file not found")</script>';
		} else {
	
			$ext = pathinfo($filename, PATHINFO_EXTENSION);	
			echo $filename = time().".$ext";	
			header("Content-Type: application/octet-stream");
			header('Content-Disposition: attachment;filename='.$filename);
			readfile($filepth);	
			redirect("note-details.php?noteid=$noteid");
		 }
		
	} 
	else {
		echo "<script>alert('file not found');
				window.location.href='note-details.php?noteid=$noteid';
			  </script>";	
	} 
}

	
	if(isset($_GET['dreview'])){
		$delete_review_id = $_GET['dreview'];
		$query = "DELETE FROM `sellernotesreviews` WHERE ID = $delete_review_id ";
		$delete_review_query = mysqli_query($connection,$query);
		confirmq($delete_review_query);
		redirect("note-details.php?noteid=$noteid");
	}
}
?>
	<title>Note Details</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/note-details.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive-note-details.css">
	<!-- link responsive for mobile menu-->
	<link rel="stylesheet" href="css/responsive.css">
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
	
											<a href="note-details.php?noteid=<?php echo $noteid; ?>&download=1"><button type='submit' name='freedownloadnotes' class='btn btn-block btn-general btn-download'>DOWNLOAD/$<?php echo $price; ?></button></a>
	
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
									<p><span class="details-style"><?php echo $country; ?></span></p>
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
					<img width="20px" height="20px" src="../front/images/Search/<?php echo $star1; ?>"  alt="img" class="img-responsive flag-img">
					<img width="20px" height="20px"  src="../front/images/Search/<?php echo $star2; ?>" alt="img" class="img-responsive">
					<img width="20px" height="20px"  src="../front/images/Search/<?php echo $star3; ?>" alt="img" class="img-responsive">
					<img width="20px" height="20px"  src="../front/images/Search/<?php echo $star4; ?>" alt="img" class="img-responsive">
					<img width="20px" height="20px"  src="../front/images/Search/<?php echo $star5; ?>" alt="img" class="img-responsive">&nbsp;&nbsp;
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
if(file_exists("../front/member/$sellerid/$noteid/$preview")){
$preview_path = "../front/member/$sellerid/$noteid/$preview";
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
					
						<p class="heading">Customer Reviews</p>
						<div id="custmers-reviews">
<?php
$query = "SELECT * FROM `sellernotesreviews` WHERE NoteID=$noteid ORDER BY ID DESC LIMIT 3";
$review_notedetails_query = mysqli_query($connection,$query);
confirmq($review_notedetails_query);
while($row = mysqli_fetch_assoc($review_notedetails_query)){
	
	$ReviewedByID = $row['ReviewedByID'];
	$Ratings = $row['Ratings'];
	$ID = $row['ID'];
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
	$d_img = defaultprofilePic();
	$s_path = "../front/member/$img";
	if(!empty($path)){
		if(file_exists("../front/$path")){
			$s_path = "../front/$path";
		}
	}



									
			
							
?>
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div id="custmers-reviews-1">
										<div class="row">
											<div class="col-md-2 col-sm-2">
												<img id="custmers-img" style='border-radius: 60px;'  src="<?php echo $s_path; ?>" alt="img" class="img-responsive page-img custmers-reviews-img">
												
											</div>
											<div class="col-md-10 col-sm-10 setmargin">
											
												<div class="row">
													<div class="col-md-9 col-sm-9">
														<p><?php echo  $firstname ." ". $lastname?></p>
													</div>
													<div class="col-md-3 col-sm-3">
														 <a onclick="return confirm('Are you sure you want delete this review?');" href="note-details.php?noteid=<?php echo $noteid; ?>&dreview=<?php echo $ID; ?>"><img class="delete-review" src="img/assets/delete.png" alt="delete"></a>
													</div>
													<div class="col-md-12 col-sm-12">
					<img width="20px" height="20px" src="../front/images/Search/<?php echo $star1; ?>"  alt="img" class="img-responsive star">
					<img width="20px" height="20px"  src="../front/images/Search/<?php echo $star2; ?>" alt="img" class="img-responsive star">
					<img width="20px" height="20px"  src="../front/images/Search/<?php echo $star3; ?>" alt="img" class="img-responsive star">
					<img width="20px" height="20px"  src="../front/images/Search/<?php echo $star4; ?>" alt="img" class="img-responsive star">
					<img width="20px" height="20px"  src="../front/images/Search/<?php echo $star5; ?>" alt="img" class="img-responsive star">
													</div>
													<div class="col-md-12 col-sm-12">
														<p><span><?php echo $Comments; ?></span></p>
													
													<hr>
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
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">

				<div class="modal-content">
					<button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><img src="img/notedetails/close.png" alt="img" class="img-responsive close-btn"></span>
					</button>
					<img src="img/notedetails/SUCCESS.png" alt="img" class="img-responsive success-margin" width="63px" height="63px"><br>
					<h5 class="modal-title text-center" id="exampleModalLabel">Thans you for purchasing!</h5>


					<div class="modal-body">
						<h4>Dear Smith,</h4><br>
						<p>As this paid nates-you need to pay to seller rahil shah<br>
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

	 <?php include "includes/footer.php"; ?>