<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='profile'; ?>
<?php
if (!file_exists("../front/member/$adminid")) {
		mkdir("../front/member/$adminid", 0777, true);
}

	$db_FirstName 	= '';						
 	$db_LastName 	= '';						
 	$db_Email 		= '';
	$db_SecondaryEmail	= '';
	$db_Phonenumber 	= '';
	$db_Phonencode 	= '';
	$db_AddressLine1 	= '';
	$db_AddressLine2 	= '';
	$db_ProfilePicture = '';





$query = "SELECT * FROM `users` WHERE ID = $adminid ";
	$user_query = mysqli_query($connection,$query);
	confirmq($user_query);
	$row = mysqli_fetch_assoc($user_query);
	$db_FirstName 	= $row['FirstName'];						
 	$db_LastName 	= $row['LastName'];						
 	$db_Email 		= $row['Email'];

$query = "SELECT * FROM `userprofile` WHERE UserID=$adminid ";
 	$userpfofile_member_detail_query = mysqli_query($connection,$query);
 	confirmq($userpfofile_member_detail_query);
	$row = mysqli_fetch_assoc($userpfofile_member_detail_query);
		if(!empty($row)){
		$db_SecondaryEmail	= $row['SecondaryEmailAddress'];
		$db_Phonenumber 	= $row['Phonenumber'];
		$db_Phonencode 		= $row['Phonenumber–CountryCode'];
		$db_AddressLine1 	= $row['AddressLine1'];
		$db_AddressLine2 	= $row['AddressLine2'];
		$db_ProfilePicture 	= $row['ProfilePicture'];
			
			
if(isset($_POST['submit'])){
	$firstname 	= $_POST['firstname'];
	$lastname 	= $_POST['lastname'];
	$email2 	= $_POST['email2'];
	$phonecode 	= $_POST['phonecode'];
	$phoneno 	= $_POST['phoneno'];
		$profilepic        	=  $_FILES['profilepic']['name'];
    	$profilepic_temp   	=  $_FILES['profilepic']['tmp_name'];
		$accepted_image 	=  array('png','jpg','jpeg');
		
		$query = "UPDATE `userprofile` SET `SecondaryEmailAddress`='$email2',`Phonenumber–CountryCode`='$phonecode',`Phonenumber`='$phoneno',`ModifiedDate`=now(),`ModifiedBy`=$adminid WHERE UserID=$adminid  ";
		$update_user_profile_query = mysqli_query($connection,$query);
		confirmq($update_user_profile_query);
	
		$query = "UPDATE `users` SET `FirstName`='$firstname',`LastName`='$lastname',`ModifiedDate`=now(),`ModifiedBy`=$adminid WHERE  ID=$adminid ";
		$update_user_query = mysqli_query($connection,$query);
		confirmq($update_user_query);
		
		if(!empty($_FILES['profilepic']['tmp_name'])){
                $profilepic_ext = strtolower(pathinfo( $_FILES["profilepic"]["name"], PATHINFO_EXTENSION )); 
                $profilepic = "DP_". date("dmYhis") . "." .  $profilepic_ext;
		if(!in_array($profilepic_ext,$accepted_image) ){
				echo "<script>alert('please enter valid image file extension like .jpg ,.jpeg or .png ');</script>";
        } else {
				unlink("../front/member/$adminid/$db_ProfilePicture");
				move_uploaded_file($profilepic_temp, "../front/member/$adminid/$profilepic" );
				$query    		=  "UPDATE `userprofile` SET ";
				$query		   .=  "`ProfilePicture`='$profilepic' ";
				$query		   .=  "WHERE UserID=$adminid ";
				$update_progilepic_query = mysqli_query($connection,$query);
				confirmq($update_progilepic_query);
			}
		}
	redirect('my-profile.php');
	
}
			
		
			
		} else {
			if(isset($_POST['submit'])){
			$firstname 	= $_POST['firstname'];
			$lastname 	= $_POST['lastname'];
			$email2 	= $_POST['email2'];
			$phonecode 	= $_POST['phonecode'];
			$phoneno 	= $_POST['phoneno'];
			$profilepic        	=  $_FILES['profilepic']['name'];
			$profilepic_temp   	=  $_FILES['profilepic']['tmp_name'];
				
				$accepted_image 	=  array('png','jpg','jpeg');
				if(!empty($_FILES['profilepic']['tmp_name'])){ 
                $profilepic_ext = strtolower(pathinfo( $_FILES["profilepic"]["name"], PATHINFO_EXTENSION )); 
                $profilepic = "DP_". date("dmYhis") . "." .  $profilepic_ext;
         
				if(!in_array($profilepic_ext,$accepted_image) ){
				echo "<script>alert('please enter valid image file extension like .jpg ,.jpeg or .png ');</script>";
        		} else {
				move_uploaded_file($profilepic_temp, "../front/member/$adminid/$profilepic" );
				redirect('my-profile.php');
				}
			}
				
				
				
				
			$query = "INSERT INTO `userprofile`(UserID,`SecondaryEmailAddress`, `Phonenumber–CountryCode`, `Phonenumber`,ProfilePicture,`CreatedDate`, `CreatedBy`) VALUES ($adminid,'$email2',$phonecode,$phoneno,'$profilepic',now(),$adminid)";
				$insert_user_query = mysqli_query($connection,$query);
				confirmq($insert_user_query);
				
				
			
	
			}

		}


?>
	<title>My Profile</title>
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- link css -->
	<link rel="stylesheet" href="css/my-profile-style.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <?php include "includes/navigation.php"; ?>
	<section id="my-profile">
		<div class="content-box-sm">
			<div class="container">
<form action="" method="post" name="myForm" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<h4>My Profile</h4>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault01" id="first-name">First name*</label>
						<input type="text" name="firstname" value="<?php echo $db_FirstName; ?>" class="form-control" id="validationDefault01" placeholder="Enter your first name" required>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault02" id="last-name">Last name*</label>
						<input type="text" name="lastname" value="<?php echo $db_LastName; ?>" class="form-control" id="validationDefault02" placeholder="Enter your last name" required>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="exampleInputEmail1" id="email">Email*</label>
						<input type="email" name="email1" value="<?php echo $db_Email; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address" readonly>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="exampleInputEmail1" id="email2">Secondary Email</label>
						<input type="email" name="email2" value="<?php echo $db_SecondaryEmail ; ?>" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter your email address">
					</div>
					<div class="col-md-12 col-sm-12 col-12">
					<label>Phone number</label>
						<div class="row">
							<div class="col-md-1 col-sm-1 col-1">
								
								<select class="custom-select" name="phonecode" required>
								<option value=''>Select code</option>
<?php

	$query = "SELECT * FROM `countries`  ";
	$country_code_query = mysqli_query($connection,$query);
	confirmq($country_code_query);
	while($row = mysqli_fetch_assoc($country_code_query)){
		$phonecode = $row['phonecode'];
		$ID = $row['ID'];
		$Name = $row['Name'];
		if($db_Phonencode == $phonecode){
			
				echo "<option value='$phonecode' selected>$phonecode</option>";
		} else {	
		echo "<option value='$phonecode'>$phonecode </option>";
		}

	}
?>
		
								</select>
							</div>
							<div class="col-md-9 col-sm-9 col-9">
								
						<input type="number" name="phoneno" value="<?php echo $db_Phonenumber; ?>" class="form-control" id="validationDefault13" placeholder="Enter your phone number" >
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
								<label>Profile Picture</label>
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<div class="add-border text-center">
									<label for="upload">
										<img src="img/assets/upload.png">
										<p id="textdisplaypic" style="color: lightgray;">Upload a Picture</p>
										<input type="file" id="upload" name="profilepic" class="upload" style="display:none;">
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<button type="submit" name="submit" class="btn btn-block btn-general btn-submit">SUBMIT</button>
					</div>
				</div>
	</form>
			</div>
		</div>
	</section>
	 <?php include "includes/footer.php"; ?>