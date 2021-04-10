<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php 
$wrong_pwd_msg = "";
if(isset($_GET['updatepwd'])){
	$wrong_pwd_msg="Your password has been changed successfully and newly generated password is send on your registered email address.";
}




if(isset($_POST['login'])){
	$email		= trim($_POST['email']);
	$password 	= trim($_POST['password']);
	$query = "SELECT * FROM users WHERE Email = '{$email}' ";
	$login_user_query = mysqli_query($connection, $query);
	confirmq($login_user_query);
	
	$row = mysqli_fetch_assoc($login_user_query);
	if(!empty($row)){
		
			$db_password 		= $row['Password'];
			$db_roleid			= $row['RoleID'];
			$db_id				= $row['ID'];
			$db_firstname		= $row['FirstName'];
			$db_lastname		= $row['LastName'];
			$isemailverified	= $row['IsEmailVerified'];
			
	if(IsActive('users',$db_id)){	
					if($password === $db_password){
						
			$SystemEmail =  systemSendEmail();
			$S_PWD 		= 	SendEmailPwd();					
						
			if($isemailverified == 0){
			require 'PHPMailerAutoload.php';
			$email_hash = password_hash($email,PASSWORD_DEFAULT,array('cost' => 10));
			$mail = new PHPMailer;                             
			$mail->isSMTP();                                      
			$mail->Host = 'smtp.gmail.com';  
			$mail->SMTPAuth = true;                               
			$mail->Username = "$SystemEmail";                 
			$mail->Password = "$S_PWD";                           
			$mail->SMTPSecure = 'tls';                           
			$mail->Port = 587;                                    

			$mail->setFrom("$SystemEmail", 'Mailer');
			$mail->addAddress($email, $db_firstname);                    
			$mail->addReplyTo("$SystemEmail", 'Information');



			$mail->isHTML(true);                                  

			$mail->Subject = "Note Marketplace-Email Verification";
			$mail->Body    = "<html>
					<head>
					</head>

					<body>
						<table style='padding: 30px; background-color: #fff;'>
							<tr>
								<td><img src='https://i.ibb.co/HVyPwqM/top-logo1.png' class='img-responsive'></td>
							</tr>
							<tr>
								<td><p style='margin-top: 35px; margin-bottom: 15px;
						font-size: 28px;
						font-weight: 600;
						line-height: 30px;
						color: #6255a5;'>Email Verification</p></td>
							</tr>
							<tr>
								<td><p style='margin-bottom: 15px;font-size: 20px;
						font-weight: 600;
						line-height: 22px;
						color: #333333;'>Dear $db_firstname ,</p></td> 
							</tr> 
							<tr>
								<td><p style='margin-bottom: 35px;font-size: 18px;
						font-weight: 400;
						line-height: 20px;
						color: #333333;'>
									Thanks for signing,<br>
								Simply click below for email verfiction. 
								</p></td>
							</tr>
							<tr>
						<td><a href='http://localhost/assignment/front/email-verification-page.php?email=$email_hash'><button type='submit'  style='background-color: #6255a5;
						width: 540px;
						height: 50px;
						border-radius: 3px;
						color: #fff;
						font-size: 20px;
						line-height: 22px;
						font-weight: 600;
						'>VERIFY EMAIL ADDRESS</button></a></td>
							</tr>
						</table>
					</body></html>";


			if(!$mail->send()) {


			} else {
			echo "<script>alert('Please verify eamil address via clicking on the link we send you via email');window.location.href='search-page.php';
			</script>";
			}
				} else {
				
				$_SESSION['Email'] 			=  $email;
				$_SESSION['ID'] 			=  $db_id;
				$_SESSION['RoleID'] 		=  $db_roleid;
				$_SESSION['firstname'] 		=  $db_firstname;
				$_SESSION['isemailverified']=$isemailverified;
				$_SESSION['lastname']		=$db_lastname;
				 //check user is admin or member
					if($db_roleid != 3){
						header("Location: ../admin/dashboard.php");
					} else {
						if(checkForUserProfile($db_id)){
						header("Location: Dashboard%20Page.php");
						} else {
						 header("Location: user-profile.php");
						}
					}
				}
						
			} else {
				$wrong_pwd_msg = "The Password that you have entered is incorrect";
			}
		} else {
			echo "<script>alert('You account remove by system.')</script>";
		}
	} else {
		$wrong_pwd_msg = "Email Not Register";
	}
}
?>

	<title>Login</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/login-style.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-login-page.css">
</head>

<body>

	<section id="forgot-pwd">

		<div class="content-box-md">

			<div class="container">

				<div class="row" >
					<div class="col-md-12 col-sm-12">
						<div id="forgot-pwd-top-logo" class="text-center">
							<img src="images/pre-login/top-logo.png" alt="top-logo" class="img-responsive">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
					<div  id="white-box" >
				<form action="" method="post">
					<div class="row">
						<div class="col-md-12 col-sm-12 text-center">
							<p>Login</p>
						</div>
						
						
						<div class="col-md-12 col-sm-12 text-center">
						<p><span>Enter your email address and password to login</span></p>
						</div>
						
						
						<div class="col-md-12 col-sm-12">
								<label  id="email-1">Email</label>
								<input type="email" name="email" id="email" class="form-control"  aria-describedby="emailHelp" placeholder="notesmarketplace@gmail.com" required>
								</div>
								
								
						<div class="col-md-12 col-sm-12">
						<div class="form-group remove-margin">
											<div class="row">
											<div class="col-md-6 col-sm-6 col-6">
                                                <label class="login-password">Password</label>
                                            </div>
                                             <div class="col-md-6 col-sm-6 col-6 text-right">
                                                <a href="forget-pwd%20.php" id="forget">Forgot Password?</a>
                                            </div>
                                            
                                            
											</div>
											<input type="password" name="password" class="form-control toggle-pwd" 
                                            placeholder="Password" required>
                                        <span toggle="#password-field1" class="eye field-icon toggle-password"><img id="toggle-eye"
                                                src="images/pre-login/eye.png" alt="eye"></span>
                                        <h6 id="incorrect-pwd"><?php echo $wrong_pwd_msg; ?></h6>
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							 <div class="form-group form-check" id="add-margin">
                                        <input type="checkbox" class="form-check-input" id="chk">
                                        <label class="form-check-label" for="chk" id="chk-label">Remeber Me</label>
                                    </div>
						</div>
						
						
						<div class="col-md-12 col-sm-12">
							 <button type="submit" name="login" class="btn btn-block btn-general">Login</button>
						</div>
						
						
						<div class="col-md-12 col-sm-12">
						  <div class="bottom-text">
							  <p class="text-center">Don't Have Account? <a href="sign-up.php">Sign up</a></p>
							  </div>
						</div>
						<div class="col-md-12 col-sm-12"></div>
						<div class="col-md-12 col-sm-12"></div>
					</div>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- link jquery file-->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!-- link js file-->

	<script src="js/script.js"></script>
</body>
</html>