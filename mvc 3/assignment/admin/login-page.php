
<?php  include "../front/includes/db.php"; ?>
<?php  include "../front/includes/functions.php"; ?>
<?php session_start(); ?>
<?php 


$wrong_pwd_msg = "";
if(isset($_GET['updatepwd'])){
	$wrong_pwd_msg="Your password has been changed successfully and newly generated password is send on your registered email address.";
}



if(isset($_POST['login'])){
		 $email		=	$_POST['email'];
		 $password 	=	$_POST['password'];
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
			if(isset($_POST['rememberMe'])){
				setcookie('emailcookie',$email,time()+86400);
				setcookie('pwdcookie',$password,time()+86400);
			}	
		if($isemailverified == 0){
			
			$SystemEmail =  systemSendEmail();
			$S_PWD 		= 	SendEmailPwd();	
			require '../front/PHPMailerAutoload.php';
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
			echo "<script>alert('Please verify eamil address via clicking on the link we send you via email');window.location.href='../front/search-page.php';
			</script>";
			}

			} else {
				$_SESSION['Email'] 			= $email;
				$_SESSION['ID'] 			= $db_id;
				$_SESSION['RoleID'] 		= $db_roleid;
				$_SESSION['firstname'] 		= $db_firstname;
				$_SESSION['lastname'] 		= $db_lastname ;
				$_SESSION['isemailverified']= $isemailverified;
			 //check user is admin or member

				if($db_roleid != 3){
					redirect('dashboard.php');
				} else {
					if(checkForUserProfile($db_id)){	
					redirect('../front/Dashboard%20Page.php');
					} else {
					redirect('../front/user-profile.php');
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
	$wrong_pwd_msg = "Email Not Register.";
	}

	}//post login

?>
<!doctype html>
<html lang="en">

<head>
	<link href=" https://fonts.googleapis.com/css2?family=Open+Sans
:wght@300;400;600;700& display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1,
maximum-scale=1.0 ,user-scalable=no">
	<title>Login</title>
		<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">








	<!--link bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- link css -->
	<link rel="stylesheet" href="../front/css/login-style.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="../front/css/responsive/responsive-login-page.css">
</head>

<body>
<section id="forgot-pwd">

		<div class="content-box-md">

			<div class="container">

				<div class="row" >
					<div class="col-md-12 col-sm-12">
						<div id="forgot-pwd-top-logo" class="text-center">
							<img src="img/top-logo.png" class="text-center" alt="top-logo" class="img-responsive">
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
								<input id="email" type="text" value="<?php if(isset($_COOKIE['emailcookie'])){echo $_COOKIE['emailcookie'];} ?>" name="email" class="form-control"  aria-describedby="emailHelp" placeholder="notesmarketplace@gmail.com" required>
								</div>
								
								
						<div class="col-md-12 col-sm-12">
						<div class="form-group remove-margin">
											<div class="row">
											<div class="col-md-6 col-sm-6 col-6">
                                                <label class="login-password">Password</label>
                                            </div>
                                             <div class="col-md-6 col-sm-6 col-6 text-right">
                                                <a href="forgot-pwd.php" id="forget">Forgot Password?</a>
                                            </div>
                                            
                                            
											</div>
											<input type="password" value="<?php if(isset($_COOKIE['pwdcookie'])){echo $_COOKIE['pwdcookie'];} ?>" name="password" class="form-control toggle-pwd" 
                                            placeholder="Password" required>
                                        <span toggle="#password-field1" class="eye field-icon toggle-password"><img id="toggle-eye"
                                                src="img/eye.png" alt="eye"></span>
                                        <h6 id="incorrect-pwd"><?php echo $wrong_pwd_msg; ?></h6>
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							 <div class="form-group form-check" id="add-margin">
                                     <input type="checkbox" name="rememberMe" class="form-check-input" id="chk" <?php if(isset($_COOKIE['pwdcookie'])){ echo 'checked';} ?>>
                                        <label class="form-check-label" for="chk" id="chk-label">Remeber Me</label>
                                    </div>
						</div>
						
						
						<div class="col-md-12 col-sm-12">
							 <button onclick="return validation()" type="submit" name="login" class="btn btn-block btn-general">Login</button>
						</div>
						
						
						<div class="col-md-12 col-sm-12">
						  <div class="bottom-text">
							  <p class="text-center">Don't Have Account? <a class="sign-uplink" href="../front/sign-up.php">Sign up</a></p>
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
	
	
<script>
function validation(){
	var a = $("#email").val();
		var b = $(".toggle-pwd").val();

if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(a))
  {
    return (true);
  } else {
	  alert("Please enter valid email");
	  return (false); 
  }
}

</script>
	<script src="js/script.js"></script>
</body>
</html>