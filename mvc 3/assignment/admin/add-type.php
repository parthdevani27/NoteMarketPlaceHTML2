<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='addtype'; ?>
<?php
$e_type 		= '';
$e_description 	= '';
$addedit 		= 'Add';
if(isset($_GET['edit'])){
	$e_id = $_GET['edit'];
	$addedit = 'Edit';
	$query = "SELECT * FROM `notetypes` WHERE ID=$e_id ";
	$edit_type_query = mysqli_query($connection,$query);
	confirmq($edit_type_query);
	$row = mysqli_fetch_assoc($edit_type_query);
	$e_type 		= $row['Name'];
	$e_description 	= $row['Description'];

	
	
	if(isset($_POST['submit'])){
	 $e_type 			= $_POST['type'];
	 $e_description 	= $_POST['description'];
				
		$query = "UPDATE `notetypes` SET `Name`='$e_type',`Description`='$e_description',`ModifiedDate`= now(),`ModifiedBy`=$adminid WHERE ID = $e_id ";
		$update_type_query = mysqli_query($connection,$query);
		confirmq($update_type_query);
	}



} else {


if(isset($_POST['submit'])){
	$type 			= $_POST['type'];
	$description 	= $_POST['description'];
	
	$query = "SELECT ID FROM `notetypes` WHERE Name='$type' ";
	$check_type_query = mysqli_query($connection,$query);
	confirmq($check_type_query);
	$iftypeavail = mysqli_num_rows($check_type_query);
	if($iftypeavail <= 0){
		
		$query = "INSERT INTO `notetypes`(`Name`, `Description`, `CreatedDate`, `CreatedBy`) VALUES ('$type','$description',now(),$adminid)";
		$insert_type_query = mysqli_query($connection,$query);
		confirmq($insert_type_query);
		
		
	} else {
		
		echo "<script>alert('type already exists')</script>";
		
	}
	 


}
}
?>
	<title>Add Type</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/add-type.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<?php include "includes/navigation.php" ?>
	<section id="my-profile">
		<div class="content-box-lg">
			<div class="container">
			<form action="" method="post">
				<div class="row">
					<div class="col-md-12 col-sm-12  col-12">
						<h4><?php echo $addedit ?> Type</h4>
					</div>
					<div class="col-md-12 col-sm-12">
						<label for="validationDefault01" id="first-name">Type*</label>
						<input type="text" name="type" value="<?php echo $e_type; ?>" class="form-control" id="validationDefault01" placeholder="IT" required>
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
	<?php include "includes/footer.php" ?>