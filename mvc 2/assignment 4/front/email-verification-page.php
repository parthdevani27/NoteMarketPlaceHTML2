<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>

<?php 
if(isset($_GET['email'])){
 $email_hash=$_GET['email'];
	$query = "SELECT * FROM users";
	$email_verify_query = mysqli_query($connection,$query);
	confirmq($email_verify_query);
		while($row= mysqli_fetch_assoc($email_verify_query)){
			$email = $row['Email']; 
			if(password_verify($email,$email_hash)){
				$email_user = $email;
			 $IsEmailVerified = $row['IsEmailVerified']; 
			} 
		}
	
	if($IsEmailVerified == 0){
			$query = "UPDATE users SET IsEmailVerified=1 WHERE Email = '{$email_user}' ";
			$email_verify_update_query = mysqli_query($connection,$query);
			confirmq($email_verify_update_query);
		
				header("Location: login-page.php");
			
			
	
	
	} else {
		echo "already verified";
	}
}
?>

<?php 


//	
//	if(isset($_POST['verifyemailbutton'])){
//	if(isset($_SESSION['Email'])){
//	  $email=$_SESSION['Email'];
//	$email_hash = password_hash($email,PASSWORD_DEFAULT,array('cost' => 10));
//  $firstname=$_SESSION['firstname'] ;
//		$isemailverified=$_SESSION['isemailverified'];
//				if($isemailverified == 0){
//					require 'PHPMailerAutoload.php';
//
//			$mail = new PHPMailer;
//
//			//$mail->SMTPDebug = 3;                              
//
//			$mail->isSMTP();                                      
//			$mail->Host = 'smtp.gmail.com';  
//			$mail->SMTPAuth = true;                               
//			$mail->Username = 'parthdevani3817@gmail.com';                 
//			$mail->Password = 'PDg@#123s';                           
//			$mail->SMTPSecure = 'tls';                           
//			$mail->Port = 587;                                    
//
//			$mail->setFrom('parthdevani3817@gmail.com', 'Mailer');
//			$mail->addAddress($email, $firstname);     
//			//$mail->addAddress('ellen@example.com');               
//			$mail->addReplyTo('parthdevani3817@gmail.com', 'Information');
//
//
//
//			$mail->isHTML(true);                                  
//
//			$mail->Subject = "Note Marketplace-Email Verification";
//			$mail->Body    = "Hello $firstname,<br><br>
//							Thank you for siging up with us. Please click on below link to verify your email address and to do login.<br><br>
//							<a href='http://localhost/assignment/front/email-verification-page.php?email=$email_hash'>Verify Email</a><br><br>Regrds,<br>Notes Marketplace";
//
//
//			if(!$mail->send()) {
//
//
//			} else {
//					echo "<script>alert('Please verify eamil address via clicking on the link we send you via email')</script>";
//				
//			}
//
//				} else {
//					echo "<script>alert('already verified')</script>";
//				}
//
//
//
//
//		} 
//	}

?>


<!doctype html>
<html lang="en">

<head>
	<link href=" https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700& display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1,
maximum-scale=1.0 ,user-scalable=no">
	<title>Email Verification</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">

<?php 
if(isset($_SESSION['Email'])){
 $firstname=$_SESSION['firstname'] ;
} else {
	$firstname='user';
}
?>






</head>

<body>
	<table style="padding: 30px; background-color: #fff;">
		<tr>
			<td><img src="images/Dashboard/logo.png" class="img-responsive"></td>
		</tr>
		<tr>
			<td><p style="margin-top: 35px; margin-bottom: 15px;
    font-size: 28px;
    font-weight: 600;
    line-height: 30px;
    color: #6255a5;">Email Verification</p></td>
		</tr>
		<tr>
			<td><p style="margin-bottom: 15px;font-size: 20px;
    font-weight: 600;
    line-height: 22px;
    color: #333333;">Dear <?php echo $firstname; ?>,</p></td>
		</tr> 
		<tr>
			<td><p style="margin-bottom: 35px;font-size: 18px;
    font-weight: 400;
    line-height: 20px;
    color: #333333;">
				Thanks for signing,<br>
			Simply click below for email verfiction. 
			</p></td>
		</tr>
		<tr>
			<td><form action="" method="post"><a href="login-page.php?"><button type="submit"  name="verifyemailbutton" style="background-color: #6255a5;
	width: 540px;
	height: 50px;
	border-radius: 3px;
	color: #fff;
	font-size: 20px;
	line-height: 22px;
	font-weight: 600;
	">VERIFY EMAIL ADDRESS</button></a></form></td>
		</tr>
	</table>











</body></html>