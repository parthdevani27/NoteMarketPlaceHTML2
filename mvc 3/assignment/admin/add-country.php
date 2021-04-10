<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='ddcountry'; ?>
<?php 

$e_country		= '';
$e_code 		= '';
$addedit 		= 'Add';
if(isset($_GET['edit'])){
	$e_id = $_GET['edit'];
	$addedit = 'Edit';
	$query = "SELECT * FROM `countries` WHERE ID=$e_id ";
	$edit_country_query = mysqli_query($connection,$query);
	confirmq($edit_country_query);
	$row = mysqli_fetch_assoc($edit_country_query);
	$e_country 		= $row['Name'];
	$e_code		 	= $row['phonecode'];

	
	
	if(isset($_POST['submit'])){
	 $e_country 	= $_POST['Country'];
	 $e_code 		= $_POST['CountryCode'];
				
		$query = "UPDATE `countries` SET `Name`='$e_country',`phonecode`='$e_code',`ModifiedDate`= now(),`ModifiedBy`=$adminid WHERE ID = $e_id ";
		$update_country_query = mysqli_query($connection,$query);
		confirmq($update_country_query);
	}



} else {



if(isset($_POST['submit'])){
	$Country 		= $_POST['Country'];
	$CountryCode 	= $_POST['CountryCode'];
	
	$query = "SELECT * FROM `countries` WHERE Name='$Country' ";
	$check_country_query = mysqli_query($connection,$query);
	confirmq($check_country_query);

	if(mysqli_num_rows($check_country_query) == 0){
	
	$query = "INSERT INTO `countries`(`Name`, `phonecode`, `CreatedDate`, `CreatedBy`) VALUES ('$Country','$CountryCode',now(),$adminid)";
	
	$insert_contry_query = mysqli_query($connection,$query);
	confirmq($insert_contry_query);

	} else {
		
		echo "<script>alert('country already registered')</script>";
		
	}
	
}
}
?>
	<title>Add Country</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/add-country.css">
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
						<h4><?php echo $addedit; ?> Country</h4>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault01" >Country Name*</label>
						<input type="text" name="Country" value="<?php echo $e_country; ?>" class="form-control" id="validationDefault01" placeholder="INDIA" required>
					</div>
					
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault03" >Country Code*</label>
						<input type="text" name="CountryCode" value="<?php echo $e_code; ?>" class="form-control" id="validationDefault03" placeholder="Enter Your Country Code" required>
				
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