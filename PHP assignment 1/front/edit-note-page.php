<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php 
//$actionby=$_SESSION['ID'];
if(isset($_SESSION['ID'])){
	$sellerid=$_SESSION['ID'];
if(isset($_GET['editnote'])){
	$noteid = $_GET['editnote'];
	
	
	if(isset($_GET['publish'])){
	
	$query = "UPDATE `sellernotes` SET `Status` = 11 WHERE `ID` = $noteid ";
	$publish_notes_query = mysqli_query($connection , $query);
	confirmq($publish_notes_query);
	
	
	}
	
	
	
	
	$query = "SELECT * FROM sellernotes WHERE ID=$noteid" ;
	$edit_notes_query = mysqli_query($connection,$query);
	confirmq($edit_notes_query);
	while($row = mysqli_fetch_assoc($edit_notes_query)){
	
	$e_title = $row['Title'];
			
	$e_category = $row['Category'];
	
	$e_displaypicture = $row['DisplayPicture'];
	
	$e_notetype = $row['NoteType'];
		
	$e_noofpage = $row['NumberofPages'];
	
	$e_description = $row['Description'];
		
	$e_country = $row['Country'];
		
	$e_univercity = $row['UniversityName'];
	
	$e_cource = $row['Course'];
	
	$e_courcecode = $row['CourseCode'];
		
	$e_professor = $row['Professor'];
		
	$e_ispaid = $row['IsPaid'];
		
	$e_sellprice = $row['SellingPrice'];
		
	$e_notepreview = $row['NotesPreview'];
		

	
	
	
	
	
	
	
	}
	
	
	
	
	
	
	

} 
if(isset($_POST['save'])){
	 
	
	
	
	
	$title=$_POST['title'];
	$category=$_POST['category'];
	$notetype=$_POST['notetype'];
	$description=$_POST['description'];
	$country=$_POST['country'];
	$institution=$_POST['institution'];
	$courcename=$_POST['courcename'];
	$courcecode=$_POST['courcecode'];
	$professor=$_POST['professor'];
	$sellfor=$_POST['inlineRadioOptions'];
	
	$sellprice=$_POST['booksellprice'];
		if(!empty($sellprice)){
		$sellprice=$_POST['booksellprice'];
	} else {
		$sellprice=0;
	}
	$numofpage=$_POST['numofpage'];
	if(!empty($numofpage)){
		$numofpage=$_POST['numofpage'];
	} else {
		$numofpage=0;
	}
	
	
//	
//	$displaypicture        = $_FILES['displaypicture']['name'];
//    $displaypicture_temp   = $_FILES['displaypicture']['tmp_name'];
//	move_uploaded_file($displaypicture_temp, "upload/member/$sellerid/$lastnoteid/$displaypicture" );
//	
//	
//	
//		$total = count($_FILES['upload']['name']);
//	if($total==0){
//		
//	} else {
//		for( $i=0 ; $i < $total ; $i++ ) {
//		  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
//		  if ($tmpFilePath != ""){
//			$newFilePath =$_FILES['upload']['name'][$i];
//if(move_uploaded_file($tmpFilePath, 
//					  "upload/member/$sellerid/$lastnoteid/attachment/$newFilePath")) {
//	
//		$filepath = "upload/member/$sellerid/$lastnoteid/attachment/$newFilePath";
//		$query = "UPDATE `sellernotesattachements` SET(`NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES ('$lastnoteid', '$newFilePath', '$filepath', NULL, NULL, NULL, NULL, b'1')";
//	$query = "UPDATE `sellernotesattachements` SET 
//	`FileName` = '$newFilePath', 
//	`Status` = '8', 
//	`Status` = '8', 
//	`Status` = '8', 
//	`Status` = '8', 
//	`Status` = '8', 
//	`Status` = '8', 
//	`Status` = '8' 
//	WHERE `sellernotes`.`ID` = 125";
//	$sellernotesattechment_query = mysqli_query($connection,$query);
//	confirmq($sellernotesattechment_query);
//			}
//		  }
//		}
//	}
//	
//	
//	
//	
//	$noteprevie        = $_FILES['noteprevie']['name'];
//    $noteprevie_temp   = $_FILES['noteprevie']['tmp_name'];
//	move_uploaded_file($noteprevie_temp, "upload/member/$sellerid/$lastnoteid/$noteprevie" );
//	
//	

	$query = "UPDATE `sellernotes` SET 
	`Title` = '$title',
	`Category` = '$category',
	`NoteType` = '$notetype',
	`NumberofPages` = '$numofpage',
	`Description` = '$description',
	`UniversityName` = '$institution',
	`Country` = '$country',
	`Course` = '$courcename',
	`CourseCode` = '$courcecode',
	`Professor` = '$professor',
	`IsPaid` = '$sellfor',
	`SellingPrice` = '$sellprice'
	WHERE `ID` = $noteid";
		$insert_data_for_addbook_query = mysqli_query($connection,$query);
		confirmq($insert_data_for_addbook_query);
		
}
} else {
	echo "<script>alert('login first')</script>";
}
?>
	<title>Add Notes</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/add-note-page.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-add-notes.css">
</head>

<body>
<?php include "includes/navigation.php"; ?>

	
	<div class="background-img">
		<img src="images/Search/banner-with-overlay.jpg" alt="img" class="img-responsive">
		<p class="text-center">Add Notes</p>
	</div>
	<section id="add-notes-page">
		<div class="content-box-md">
			<div class="container">
			<form action="" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="add-notes-details">
									<h4 class="add-notes-heading">Basic Note Details</h4>
								</div>
							</div>
					
					
					<div class="col-md-6 col-sm-6">
						<label id="title">Title*</label>
						<input type="text" value="<?php echo $e_title; ?>" name="title" class="form-control" placeholder="Enter Your Notes Title" required>
					</div>
					
					
					
					<div class="col-md-6 col-sm-6">
						<label id="category">Category*</label>
						<select class="custom-select" name="category" required>
							
								<?php 
								//for category 
								$query = "SELECT * FROM notecategories";
								$category_dropdown_query = mysqli_query($connection ,$query);
								confirmq($category_dropdown_query);
								while($row =mysqli_fetch_assoc($category_dropdown_query)){
								$category = $row['Name'];	
								$categoryid = $row['ID'];
									if($e_category==$categoryid){
										echo "<option value=$categoryid selected>$category</option>";
									} else {
								echo "<option value=$categoryid>$category</option>";
									}
								}
								
								?>
							
						</select>
					</div>
					
					
					
					<div class="col-md-6 col-sm-6">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<label>Display Picture</label>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="add-border text-center">
										<label for="displaypicture">
										<img class="uploadfilepic" src="images/User-Profile/upload.png">
											<p id="textdisplaypic" ><?php echo $e_displaypicture; ?></p></label>
										<input type="file" name="displaypicture" id="displaypicture" style="display:none;" >
										
								
								</div>
							</div>
						</div>
					</div>
					
					
					
					<div class="col-md-6 col-sm-6">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<label>Upload Notes*</label>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="add-border text-center">
									<label for="upnotes">
										<img src="images/Add-notes/upload-note.png">
										<div id="file-upload-filename"></div>
										<p id="remove-text" style="color: lightgray;">Upload your notes</p>
									</label>
										<input type="file" name="upload[]" id="upnotes"  class="upload" style="display:none;" multiple="multiple" />
										 
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<label for="inlineFormCustomSelectPref2" id="type">Type</label>
						<select class="custom-select my-1 mr-sm-2" name="notetype" id="inlineFormCustomSelectPref2">
								<?php 
								//for notetype 
								$query = "SELECT * FROM notetypes";
								$notetype_dropdown_query = mysqli_query($connection ,$query);
								confirmq($notetype_dropdown_query);
								while($row =mysqli_fetch_assoc($notetype_dropdown_query)){
								$typename = $row['Name'];	
								$typeid = $row['ID'];	
									if($e_notetype == $typeid){
										 
								echo "<option value=$typeid selected>$typename</option>";
									} else {
										
								echo "<option value=$typeid>$typename</option>";
									}
								}
								?>
								
					
						</select>
					</div>
					<div class="col-md-6 col-sm-6">
						<label for="validationDefault03" >Number of pages</label>
						<input type="number" value="<?php echo $e_noofpage; ?>" class="form-control" id="validationDefault03"  name="numofpage" placeholder="Enter number of notes pages">
					</div>
					<div class="col-md-12 col-sm-12">
						<label for="validationDefault04" id="description">Description*</label>
						<input type="text" value="<?php echo $e_description; ?>" class="form-control" id="validationDefault04" name="description" placeholder="Enter your description " required>
					</div>
				</div>
				<div id="institution-info">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<h4 class="add-notes-heading">Institution Information</h4>
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="inlineFormCustomSelectPref37" >Country</label>
							<select class="custom-select" name="country" id="inlineFormCustomSelectPref37" placeholder="select your note type">
								
							<?php 
								//for country 
								$query = "SELECT * FROM countries";
								$country_dropdown_query = mysqli_query($connection ,$query);
								confirmq($country_dropdown_query);
								while($row =mysqli_fetch_assoc($country_dropdown_query)){
								$countryname = $row['Name'];	
								$countryID = $row['ID'];	
									if($e_country==$countryID){


										
								echo "<option value='$countryID' selected>$countryname</option>";
									} else {
										
								echo "<option value='$countryID'>$countryname</option>";
									}
								}
								?>
								
							</select>
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="validationDefault041" id="institution">Institution</label>
							<input type="text" value="<?php echo $e_univercity; ?>" class="form-control" id="validationDefault041" name="institution" placeholder="Enter Your institution name">
						</div>

					</div>
				</div>
				<div id="cource-details">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<h4 class="add-notes-heading">Course Details</h4>
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="validationDefault05" id="cource">Cource Name</label>
							<input type="text" value="<?php echo $e_cource; ?>" class="form-control" id="validationDefault05" name="courcename" placeholder="Enter Your cource name">
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="validationDefault06" id="cource-code">Cource Code</label>
							<input type="number" value="<?php echo $e_courcecode; ?>" class="form-control" id="validationDefault06" name="courcecode" placeholder="Enter Your cource code">
						</div>

						<div class="col-md-6 col-sm-6">

							<label for="validationDefault07" id="professor">Professor/Lecturer</label>
							<input type="text" value="<?php echo $e_professor; ?>" class="form-control" id="validationDefault07" name="professor" placeholder="Enter Your professor name">

						</div>
					</div>
				</div>
				<div id="selling-info">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<h4 class="add-notes-heading">Selling Information</h4>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<label>Sell For*</label><br>
									<div class="radio-btn">
										<div class="form-check-inline">
											<div class="form-check form-check-inline">
											<?php 
											if($e_ispaid==0){
												echo "<input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio1' value='0' required checked>";
												
											} else {
												echo "<input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio1' value='0' required>";
											}	
												
											?>
												
												<label class="form-check-label" for="inlineRadio1">Free</label>
											</div>
											<div class="form-check form-check-inline">
											<?php 
												if($e_ispaid==1){
													echo "<input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio2' value='1' checked>";	
												} else {
													echo "<input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio2' value='1'>";
												}
											
											?>
												
												<label class="form-check-label" for="inlineRadio2">Paid</label>
											</div>
										</div>
									</div>
								</div>
									<div class="col-md-12 col-sm-12 ">
									<div class="sell-price-remove-margin forpaidviewthis">
										<label for="validationDefault08" >Sell Price*</label>
										<input type="number" value="<?php echo $e_sellprice;?>" class="form-control"  name="booksellprice" id="validationDefault08" placeholder="Enter your price" required>
										</div>
									</div>
								
							</div>
						</div>
							<div class="col-md-6 col-sm-6">
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<label>Note Preview</label>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="note-preview text-center">
											<label for="notepreview1">
												<img src="images/User-Profile/upload.png">
												<p id="previewtext" ><?php echo $e_notepreview;?></p>
												<input type="file" class="upload" name="noteprevie" id="notepreview1" style="display:none;" >
											</label>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div id="add-notes-btn">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-4">
								<button type="submit" id="savetodraft" name="save" class="btn btn-block btn-general">SAVE</button>
							</div>
							<div class="col-md-1 col-sm-1 col-3">
							</div>
							<div class="col-md-4 col-sm-4 col-4">
								<button type="button" data-toggle="modal" data-target="#myModal" name="publish" class="btn btn-block btn-general btn-publish">PUBLISH</button>
								<div id="myModal" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"></h4>
								  </div>
								  <div class="modal-body">
									<h5 class="text-center">Are you sure you want to publish this notes?</h5>
								  </div>
								  <div class="modal-footer">
									<a href="<?php echo "edit-note-page.php?editnote=$noteid&publish=1";?>" class="btn btn-modal modal_delete_link">Publish</a>
									<button type="button" class="btn btn-danger btn-default" data-dismiss="modal">Cancel</button>
								  </div>
								</div>

							  </div>
							</div>
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
			
		
	</section>
		<?php include "includes/footer.php"; ?>
	
	
	

	<!-- link jquery file-->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!-- link js file-->

	<script src="js/script2.js"></script>
</body>

</html>
