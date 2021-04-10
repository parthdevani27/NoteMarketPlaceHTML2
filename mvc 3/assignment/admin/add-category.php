<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='addcat'; ?>
<?php
$e_cat 			= '';
$e_description 	= '';
$addedit 		= 'Add';
if(isset($_GET['edit'])){
	$e_id = $_GET['edit'];
	$addedit = 'Edit';
	$query = "SELECT * FROM `notecategories` WHERE ID=$e_id ";
	$edit_cat_query = mysqli_query($connection,$query);
	confirmq($edit_cat_query);
	$row = mysqli_fetch_assoc($edit_cat_query);
	$e_cat 			= $row['Name'];
	$e_description 	= $row['Description'];

	
	
	if(isset($_POST['submit'])){
	 $e_cat 			= $_POST['Category'];
	 $e_description 	= $_POST['description'];
				
		$query = "UPDATE `notecategories` SET `Name`='$e_cat',`Description`='$e_description',`ModifiedDate`= now(),`ModifiedBy`=$adminid WHERE ID = $e_id ";
		$update_cat_query = mysqli_query($connection,$query);
		confirmq($update_cat_query);
	}



} else {


if(isset($_POST['submit'])){
	$Category 		= $_POST['Category'];
	$description 	= $_POST['description'];
	
	$query = "SELECT ID FROM `notecategories` WHERE Name='$Category' ";
	$check_cat_query = mysqli_query($connection,$query);
	confirmq($check_cat_query);
	$ifcatavail = mysqli_num_rows($check_cat_query);
	if($ifcatavail <= 0){
		
		$query = "INSERT INTO `notecategories`(`Name`, `Description`, `CreatedDate`, `CreatedBy`) VALUES('$Category','$description',now(),$adminid)";
		$insert_cat_query = mysqli_query($connection,$query);
		confirmq($insert_cat_query);
		
		
	} else {
		
		echo "<script>alert('Category already exists')</script>";
		
	}
	 


}
}
?>
	<title>Add Category</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/addd-category.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<?php include "includes/navigation.php"; ?>
	<section id="my-profile">
		<div class="content-box-lg">
			<div class="container">
		<form action="" method="post">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<h4><?php echo $addedit; ?> Category</h4>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault01" id="first-name">Category Name*</label>
						<input type="text" class="form-control" value="<?php echo $e_cat; ?>" name="Category" id="validationDefault01" placeholder="IT" required>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
					<label for="validationDefault03">Description*</label>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<textarea rows="5" cols="85" name="description" placeholder="Enter Your description"><?php echo $e_description; ?></textarea>
				
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<button type="submit" name="submit" class="btn btn-block btn-general">SUBMIT</button>
					</div>
				</div>
		</form>
			</div>
		</div>
	</section>
	<?php include "includes/footer.php"; ?>