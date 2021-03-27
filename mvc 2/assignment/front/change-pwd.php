<?php include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php 
$massage = '';
if(isset($_SESSION['Email'])){
	$email = $_SESSION['Email'];
if(isset($_POST['submit'])){
	
	 $oldpwd 	 = trim($_POST['oldpwd']);
	 $newpwd 	 = trim($_POST['newpwd']);
	 $confirmpwd = trim($_POST['confirmpwd']);

	$query = "SELECT * FROM users WHERE Email = '$email' ";
	$check_pwd_query = mysqli_query($connection,$query);
	confirmq($check_pwd_query);
	
	$row = mysqli_fetch_assoc($check_pwd_query);
		$db_pwd = $row['Password'];
		$db_id = $row['ID'];
	
		if($db_pwd === $oldpwd){
			if($newpwd === $confirmpwd && !empty($newpwd)){
				$query = "UPDATE users SET Password='$newpwd' WHERE ID = $db_id ";
				$update_pwd_query = mysqli_query($connection,$query);
				confirmq($query);
				$massage = "<P style='	color: green;font-size: 14px;'>Your password change successfully.</P>";

	

			} else {
				$massage = "<P style='	color: red;font-size: 14px;'>Password you entered don't match.<br>try again.</P>";
			}

		} else {
			$massage = "<P style='	color: red;font-size: 14px;'>Password is incorrect.</P>";
		}
  }
} else {
	redirect();
}
?>
	<title>Change Password</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/style1.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
	<section id="change-pwd">

		<div class="content-box-md">

			<div class="container">
		<form action="" method="post">
				<div class="row">
				<div class="col-md-12 col-sm-12">
						<div id="change-pwd-top-logo">
							<img src="images/pre-login/top-logo.png" alt="top-logo" class="img-responsive">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
					<div id="change-pwd-white-box">
						<div id="change-pwd-heading" class="text-center">
							<h2>Change Password</h2>
							<p>Enter your new password to change your password </p>
							<?php echo $massage; ?>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
								<div class="change-pwd-form-group">
								<label for="password-field" class="pwd-lable">Old Password</label>
									<input type="password" name="oldpwd" class="form-control toggle-pwd" id="password-field"
                                            placeholder="Enter Your Old Password">
                                        <span toggle="#password-field" class="eye field-icon toggle-password"><img
                                                src="images/pre-login/eye.png" alt="eye" class="eye-icon"></span>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<div class="change-pwd-form-group">
								<label for="password-field" class="pwd-lable">New Password</label>
									<input type="password" name="newpwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,24}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" class="form-control toggle-pwd" id="password-field-1"
                                            placeholder="Enter Your New Password">
                                        <span toggle="#password-field-1" class="eye field-icon toggle-password"><img
                                                src="images/pre-login/eye.png" alt="eye" class="eye-icon"></span>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<div class="change-pwd-form-group">
								<label for="password-field" class="pwd-lable">Confirm Password</label>
									<input type="password" name="confirmpwd" class="form-control toggle-pwd" id="password-field-2"
                                            placeholder="Enter Your Confirm Password">
                                        <span toggle="#password-field-2" class="eye field-icon toggle-password"><img
                                                src="images/pre-login/eye.png" alt="eye" class="eye-icon"></span>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<button type="submit" name="submit" class="btn btn-block btn-general">SUBMIT</button>
							</div>
						</div>
					</div>
					</div>
				</div>
				</form>
			</div>
		</div>

	</section>


	<!-- link jquery file-->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!-- link js file-->
	<script src="js/script.js"></script>

</body></html>