<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php $page='addnote'; ?>
<?php 

if(isset($_SESSION['ID'])){
	$sellerid=$_SESSION['ID'];


if(isset($_POST['save'])){
	 
	
	$query = "SELECT max(ID) AS ID FROM sellernotes";
	$last_note_id_query = mysqli_query($connection,$query);
	confirmq($last_note_id_query);
	
	 $row = mysqli_fetch_assoc($last_note_id_query);
	 $lastnoteid = $row['ID']+1;
	
	if (!file_exists("member/$sellerid/$lastnoteid/attachment")) {
    	mkdir("member/$sellerid/$lastnoteid/attachment", 0777, true);
	}
	
	
	$title					= $_POST['title'];
	$category				= $_POST['category'];
	$notetype				= $_POST['notetype'];
	$description   			= $_POST['description'];
	$country				= $_POST['country'];
	$institution			= $_POST['institution'];
	$courcename				= $_POST['courcename'];
	$courcecode				= $_POST['courcecode'];
	$professor				= $_POST['professor'];
	$sellfor				= $_POST['inlineRadioOptions'];
	$sellprice				= $_POST['booksellprice'];
	$numofpage				= $_POST['numofpage'];
	$sellprice				= $_POST['booksellprice'];
	$numofpage				= $_POST['numofpage'];
	
 	$displaypicture 		= $_FILES['displaypicture']['name'];
    $displaypicture_temp   	= $_FILES['displaypicture']['tmp_name'];
	
	$preview_cv 			= $_FILES['noteprevie']['name'];
    $preview_cv_tmp 		= $_FILES['noteprevie']['tmp_name'];

	if($sellfor == 0){$sellprice = 0;}
	if(empty($numofpage)){$numofpage = 0;}
	
//displaypicture	
if(!empty($_FILES['displaypicture']['name'])){
   $profile_picture_ext = strtolower(pathinfo( $_FILES['displaypicture']['name'], PATHINFO_EXTENSION ));     $profile_picture = "DP_". date("dmYhis") . "." . $profile_picture_ext;
} else{
   $profile_picture = "";
   $profile_picture_ext = "jpg";
}
	move_uploaded_file($displaypicture_temp, "member/$sellerid/$lastnoteid/$profile_picture");
	
//notepreview	
if(!empty($_FILES['noteprevie']['name'])){
   $preview_cv_ext = strtolower(pathinfo( $_FILES['noteprevie']['name'], PATHINFO_EXTENSION )); 
   $preview_cv = "Preview_". date("dmYhis") ."." . $preview_cv_ext;
} else{
   $preview_cv = "";
   $preview_cv_ext = "jpg";
}
	move_uploaded_file($preview_cv_tmp, "member/$sellerid/$lastnoteid/$preview_cv");


	
$query =	"INSERT INTO `sellernotes` (ID, `SellerID`, `Status`, `PublishedDate`, `Title`,`Category`,`DisplayPicture`, `NoteType`, `NumberofPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`, `CreatedBy`) VALUES
($lastnoteid,$sellerid, 8, now(), '$title',$category,'$profile_picture', $notetype, {$numofpage}, '$description', '$institution',$country, '$courcename', '$courcecode', '$professor',$sellfor, $sellprice, '$preview_cv', now(), $sellerid)";
	
	
	$insert_data_for_addbook_query = mysqli_query($connection,$query);
	confirmq($insert_data_for_addbook_query);
	
	
		
//notes
$total = count($_FILES['upload']['name']);
for( $i=0 ; $i < $total ; $i++ ) {
		$query = "SELECT max(ID) AS ID FROM sellernotesattachements";
		$select_notes_attachment = mysqli_query($connection,$query);
		confirmq($select_notes_attachment);
		$row = mysqli_fetch_assoc($select_notes_attachment);
		$attachment_id 	= $row['ID'] + 1;
		$notes		 	= $_FILES['upload']['name'][$i];
	  	$notes_tmp 		= $_FILES['upload']['tmp_name'][$i];
     	$notes_ext 		= pathinfo( $_FILES['upload']['name'][$i], PATHINFO_EXTENSION ); 
		$notes_name 	= $attachment_id ."_". date("dmYhis") .$i. "." . $notes_ext;
		$notes_path		= "member/$sellerid/$lastnoteid/attachment/$notes_name";
	move_uploaded_file($notes_tmp,"member/$sellerid/$lastnoteid/attachment/$notes_name");
	
	$query  = "INSERT INTO `sellernotesattachements` ";
	$query .= "(`ID`, `NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`) ";
	$query .= "VALUES ($attachment_id,$lastnoteid,'$notes_name','$notes_path',now(),$sellerid)";
	$inset_attachment_query = mysqli_query($connection,$query);
	confirmq($inset_attachment_query);
}
	

		header("Location: Dashboard%20Page.php");
}
} else {
	redirect();
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
						<input type="text" name="title" class="form-control" placeholder="Enter Your Notes Title" required>
					</div>
					
					
					
					<div class="col-md-6 col-sm-6">
						<label id="category">Category*</label>
						<select class="custom-select" name="category" required>
							<option value="">Select Category</option>
								<?php 
								//for category 
								$query = "SELECT * FROM notecategories WHERE IsActive = 1";
								$category_dropdown_query = mysqli_query($connection ,$query);
								confirmq($category_dropdown_query);
								while($row =mysqli_fetch_assoc($category_dropdown_query)){
								$category = $row['Name'];	
								$categoryid = $row['ID'];	
								echo "<option value=$categoryid>$category</option>";
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
											<p id="textdisplaypic" style="color: lightgray;">Upload a Picture</p></label>
										<input type="file" name="displaypicture" id="displaypicture"  accept="image/*" style="display:none;" >
										
								
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
										<input type="file" name="upload[]" id="upnotes"  class="upload" accept="application/pdf, application/vnd.ms-excel" style="display:none;" multiple="multiple" required/>
										 
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<label for="inlineFormCustomSelectPref2" id="type">Type</label>
						<select class="custom-select my-1 mr-sm-2" name="notetype" id="inlineFormCustomSelectPref2">
							<option value="1" selected>Select Type</option>
								<?php 
								//for notetype 
								$query = "SELECT * FROM notetypes WHERE IsActive = 1";
								$notetype_dropdown_query = mysqli_query($connection ,$query);
								confirmq($notetype_dropdown_query);
								while($row =mysqli_fetch_assoc($notetype_dropdown_query)){
								$typename = $row['Name'];	
								$typeid = $row['ID'];	
								echo "<option value=$typeid>$typename</option>";
								}
								?>
								
					
						</select>
					</div>
					<div class="col-md-6 col-sm-6">
						<label for="validationDefault03" >Number of pages</label>
						<input type="number" class="form-control" value="" id="validationDefault03"  name="numofpage" placeholder="Enter number of notes pages">
					</div>
					<div class="col-md-12 col-sm-12">
						<label for="validationDefault04" id="description">Description*</label>
						<input type="text" class="form-control" id="validationDefault04" name="description" placeholder="Enter your description " required>
					</div>
				</div>
				<div id="institution-info">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<h4 class="add-notes-heading">Institution Information</h4>
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="inlineFormCustomSelectPref37" >Country*</label>
							<select class="custom-select" name="country" id="inlineFormCustomSelectPref37" placeholder="select your note type" required>
								<option value="">Select your Country</option>
							<?php 
								//for country 
								$query = "SELECT * FROM countries WHERE IsActive = 1";
								$country_dropdown_query = mysqli_query($connection ,$query);
								confirmq($country_dropdown_query);
								while($row =mysqli_fetch_assoc($country_dropdown_query)){
								$countryname = $row['Name'];	
								$countryID = $row['ID'];	
								echo "<option value='$countryID'>$countryname</option>";
								}
								?>
								
							</select>
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="validationDefault041" id="institution">Institution</label>
							<input type="text" class="form-control" id="validationDefault041" name="institution" placeholder="Enter Your institution name">
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
							<input type="text" class="form-control" id="validationDefault05" name="courcename" placeholder="Enter Your cource name">
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="validationDefault06" id="cource-code">Cource Code</label>
							<input type="number" class="form-control" id="validationDefault06" name="courcecode" placeholder="Enter Your cource code">
						</div>

						<div class="col-md-6 col-sm-6">

							<label for="validationDefault07" id="professor">Professor/Lecturer</label>
							<input type="text" class="form-control" id="validationDefault07" name="professor" placeholder="Enter Your professor name">

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
												<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0" required>
												<label class="form-check-label" for="inlineRadio1">Free</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
												<label class="form-check-label" for="inlineRadio2">Paid</label>
											</div>
										</div>
									</div>
								</div>
									<div class="col-md-12 col-sm-12 ">
									<div class="sell-price-remove-margin forpaidviewthis">
										<label for="validationDefault08" >Sell Price*</label>
										<input type="number" class="form-control"  name="booksellprice" id="validationDefault08" placeholder="Enter your price" required>
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
												<p id="previewtext" style="color: lightgray;">Upload a file</p>
												<input type="file" accept="application/pdf, application/vnd.ms-excel"  class="upload" name="noteprevie" id="notepreview1" style="display:none;" required>
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
