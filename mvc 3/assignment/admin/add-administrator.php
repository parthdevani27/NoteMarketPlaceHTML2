<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
if(isset($_SESSION['ID'])){
 		$superadmin = $_SESSION['ID'];
		$role = checkrole($superadmin);
		if($role == 1){
			
		} else if($role == 2) {
			if(checkAdminActive($superadmin)){
			redirect("dashboard.php");
			} else {
				header("Location: login-page.php");
			}
		} else {
			redirect("../front/search-page.php");
		}
} else 
{
	header("Location: login-page.php");
}
?>
<?php $page='addadmin'; ?>
<?php
	$db_firstName 	= '';
	$db_lastName 	= '';
	$db_email 		= '';
	$db_phoneno 	= '';
	$db_phonecode 	= '';


$addedit 		= 'Add';
if(isset($_GET['edit'])){
	$e_id = $_GET['edit'];
	$addedit = 'Edit';
	
	$query = "SELECT * FROM `users` WHERE ID=$e_id ";
	$edit_admin_query = mysqli_query($connection,$query);
	confirmq($edit_admin_query);
	$row = mysqli_fetch_assoc($edit_admin_query);
	$db_firstName 	= $row['FirstName'];
	$db_lastName 	= $row['LastName'];
	$db_email 		= $row['Email'];
	
	$query = "SELECT * FROM `userprofile` WHERE UserID=$e_id ";
	$edit_admin_query = mysqli_query($connection,$query);
	confirmq($edit_admin_query);
	$row = mysqli_fetch_assoc($edit_admin_query);
	$db_phonecode 	= $row['Phonenumber–CountryCode'];
	$db_phoneno 	= $row['Phonenumber'];

	
	
	if(isset($_POST['submit'])){
	$firstName 	= $_POST['firstName'];
	$lastName 	= $_POST['lastName'];
	$email 		= $_POST['email'];
	$phoneno 	= $_POST['phoneno'];
	$phonecode 	= $_POST['phonecode'];
				
		$query = "UPDATE `users` SET `FirstName`='$firstName',`LastName`='$lastName',`Email`='$email',`ModifiedDate`=now(),`ModifiedBy`=$superadmin WHERE ID = $e_id";
		$update_user_query = mysqli_query($connection,$query);
		confirmq($update_user_query);
		
		$query = "UPDATE `userprofile` SET `Phonenumber–CountryCode`='$phonecode',`Phonenumber`='$phoneno',`ModifiedBy`=$superadmin WHERE UserID = $e_id";
		$update_user_query = mysqli_query($connection,$query);
		confirmq($update_user_query);
		redirect('add-administrator.php');
	}



} else {


if(isset($_POST['submit'])){
	$firstName 	= $_POST['firstName'];
	$lastName 	= $_POST['lastName'];
	$email 		= $_POST['email'];
	$phoneno 	= $_POST['phoneno'];
	$phonecode 	= $_POST['phonecode'];
	
	$query = "SELECT ID FROM `users` WHERE Email='$email' ";
	$check_email_query = mysqli_query($connection,$query);
	confirmq($check_email_query);
	$ifemailavail = mysqli_num_rows($check_email_query);
	if($ifemailavail <= 0){
		
		$query = "SELECT MAX(ID) AS ID FROM users";
		$insert_lastid_query = mysqli_query($connection,$query);
		confirmq($insert_lastid_query);
		$row = mysqli_fetch_assoc($insert_lastid_query);
		$usernewid = $row['ID']+1;
		
		$query = "INSERT INTO `users`(ID,`RoleID`, `FirstName`, `LastName`, `Email`,`CreatedDate`, `CreatedBy`) VALUES ($usernewid,'2','$firstName','$lastName','$email',now(),$superadmin)";
		$insert_type_query = mysqli_query($connection,$query);
		confirmq($insert_type_query);

		$query = "INSERT INTO `userprofile`(`UserID`,`Phonenumber–CountryCode`, `Phonenumber`,`CreatedDate`, `CreatedBy`) VALUES ($usernewid,$phonecode,'$phoneno',now(),$superadmin)";
		$insert_userprofile_query = mysqli_query($connection,$query);
		confirmq($insert_userprofile_query);
		
		
			$chars = "@#$&abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 			$password = substr( str_shuffle( $chars ), 0, 8 );
			$SystemEmail =  systemSendEmail();
			$S_PWD 		= 	SendEmailPwd();						
			require '../front/PHPMailerAutoload.php';
			$mail = new PHPMailer;
			$mail->isSMTP();                                      
			$mail->Host = 'smtp.gmail.com';  
			$mail->SMTPAuth = true;                               
			$mail->Username = "$SystemEmail";                 
			$mail->Password = "$S_PWD";                           
			$mail->SMTPSecure = 'tls';                           
			$mail->Port = 587;                                    

			$mail->setFrom("$SystemEmail", 'Mailer');
			$mail->addAddress($email,'');                  
			$mail->addReplyTo("$SystemEmail", 'Information');

			$mail->isHTML(true);                                  
			$mail->Subject = "New Admin account has been created for you";
			$mail->Body    = "Hello $firstName $lastName<br><br>
								We have created a new account for you<br>
								email:$email<br>
								Password:$password<br><br>Regrds,<br>Notes Marketplace";
			if(!$mail->send()) {
			} else {
				
				$query = "UPDATE users SET Password='$password' WHERE Email='$email' ";
				$update_password_query = mysqli_query($connection,$query);
				confirmq($update_password_query);
			}

		
		
	} else {
		
		echo "<script>alert('email already exists')</script>";
		
	}
	redirect('add-administrator.php');
	 


}
}
?>
	<title>Add Administrator</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/add-administrator.css">
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
					<div class="col-md-12 col-sm-12 col-12">
						<h4><?php echo $addedit; ?> Administrator</h4>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault01" id="first-name">First name*</label>
						<input type="text" value="<?php echo $db_firstName; ?>" name="firstName" class="form-control" id="validationDefault01" placeholder="Enter your first name" required>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault02" id="last-name">Last name*</label>
						<input type="text" value="<?php echo $db_lastName; ?>" name="lastName" class="form-control" id="validationDefault02" placeholder="Enter your last name" required>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="exampleInputEmail1" id="email">Email*</label>
						<input type="email" value="<?php echo $db_email; ?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address" required>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
					<label>Phone number</label>
						<div class="row">
							<div class="col-md-1 col-sm-1 col-1 dropdown">
								
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
		if(isset($_GET['edit'])){
			echo "<option value='$db_phonecode' selected>$db_phonecode </option>";
		}
		echo "<option value='$phonecode'>$phonecode</option>";
	}
?>

								</select>
							</div>
							<div class="col-md-9 col-sm-9 col-9">

						<input type="number" value="<?php echo $db_phoneno; ?>" name="phoneno" class="form-control" id="validationDefault02" placeholder="Enter your phone number" >
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
	<?php include "includes/footer.php" ?>