<?php  include "../front/includes/db.php"; ?>
<?php  include "../front/includes/functions.php"; ?>
<?php
if(isset($_POST['submit'])){
		 $email		=	$_POST['email'];
	
		$query 	= "SELECT * FROM users WHERE Email = '{$email}' ";
		$reset_pwd_query = mysqli_query($connection, $query);
		confirmq($reset_pwd_query);
	
		$row = mysqli_fetch_assoc($reset_pwd_query);
		if(!empty($row)){
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
			$mail->Subject = "New temporary password has been created for you";
			$mail->Body    = "Hello<br><br>
								We have generated a new password for you<br>
								Password:$password<br><br>Regrds,<br>Notes Marketplace";
			if(!$mail->send()) {
			} else {
				
				$query = "UPDATE users SET Password='$password' WHERE Email='$email' ";
				$update_password_query = mysqli_query($connection,$query);
				confirmq($update_password_query);
					echo "<script>alert('Your password has been changed successfully and newly generated password is send on your registered email address.')</script>";
					header("Location: login-page.php?updatepwd=true");
			}

		} else {
			echo "<script>alert('Email not register')</script>";
		}

}
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
		<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!--link bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<title>Forgot Password</title>
	<!-- link css -->
	<!-- link css -->
	<link rel="stylesheet" href="../front/css/style1.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="../front/css/responsive.css">
</head>

<body>
<section id="forgot-pwd">

		<div class="content-box-md">

			<div class="container">
		<form action="" method="post">
				<div class="row" >
					<div class="col-md-12 col-sm-12">
						<div id="forgot-pwd-top-logo">
							<img src="img/top-logo.png" alt="top-logo" class="img-responsive">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
					<div id="white-box">
						<div id="forgot-pwd-heading" class="text-center">
							<h2>Forgot Password</h2>
							<p>Enter Email Address to reset your password </p>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label for="exampleInputEmail1" id="email">Email</label>
									<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="notesmarketplace@gmail.com">
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<button type="submit" name="submit" class="btn btn-block btn-general margin-add">SUBMIT</button>
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
</body>
</html>