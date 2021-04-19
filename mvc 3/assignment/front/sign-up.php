<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>

<?php 
$firstname 		= '';
$lastname 		= '';
$email 			= '';
$createaccountmsg= '';
if(isset($_POST['sign_up'])){
		//takedata from form
		$firstname 		= trim($_POST['firstname']);
		$lastname 		= trim($_POST['lastname']);
		$email 			= trim($_POST['email']);
		$password 		= trim($_POST['password']);
		$confirmpwd 	= trim($_POST['confirmpwd']);
		$roleid 		= 3;

	//check email exists
	$query = "SELECT Email FROM users";
	$check_email_exist_query = mysqli_query($connection, $query);
	confirmq($check_email_exist_query);

	$emailexist = 0;
	while($row = mysqli_fetch_assoc($check_email_exist_query)){
	  $db_all_email = $row['Email']; 
		if($db_all_email == $email){
			$emailexist = 1;
		}
	}
	
	
if($emailexist == 0){
if($password === $confirmpwd){
if(strlen($firstname) >= 2 && strlen($lastname) >= 2){
if(!is_numeric($firstname) && !is_numeric($lastname)){
		//insert data if pwd same and email not exist
		   $query = "INSERT INTO users(RoleID,FirstName,LastName,Email,Password,CreatedDate) ";
	   		$query .= "VALUES('{$roleid}','{$firstname}','{$lastname}','{$email}', '{$confirmpwd}',now()) "; 
			
		
				$insert_create_user_query = mysqli_query($connection, $query);
				if(!$insert_create_user_query){
					die(mysqli_error($connection));
					
				} else {
					$createaccountmsg = "&#9989; Your account has been successfully created.<br>";
					$createaccountmsg .=  "<P style='color: #6255a5; font-size: 16px;'>Thank you for sign up<br> Please verify eamil address via clicking on the link we send you via email</P>";
					$email_hash = password_hash($email,PASSWORD_DEFAULT,array('cost' => 10));
				
		
					
			$SystemEmail =  systemSendEmail();
			$S_PWD 		= 	SendEmailPwd();		
			require 'PHPMailerAutoload.php';

			$mail = new PHPMailer;                           
			$mail->isSMTP();                                      
			$mail->Host = 'smtp.gmail.com';  
			$mail->SMTPAuth = true;                               
			$mail->Username = "$SystemEmail";                 
			$mail->Password = "$S_PWD";                           
			$mail->SMTPSecure = 'tls';                           
			$mail->Port = 587;                                    

			$mail->setFrom("$SystemEmail", 'Mailer');
			$mail->addAddress($email, $firstname);                   
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
						color: #333333;'>Dear $firstname $lastname,</p></td> 
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
			} 
		}	
	} else {
		$createaccountmsg = "<P style='	color: red;font-size: 14px;'>Name Must contain 2 or more characters not only number</P>";
	}
	} else {
		$createaccountmsg = "<P style='	color: red;font-size: 14px;'>Name Must contain 2 or more characters</P>";
	}
	} else {
		$createaccountmsg = "<P style='	color: red;font-size: 14px;'>Password Not Match</P>";
	}
	} else {
		$createaccountmsg = "<P style='	color: red;font-size: 14px;'>Email Already Register</P>";
	}
}	

?>
	<title>Sign Up</title>

	<!-- link css -->
	<link rel="stylesheet" href="css/style1.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
	<section id="sign-up">

		<div class="content-box-md">

			<div class="container">
<form action="" method="post">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div id="sign-up-top-logo">
							<img src="images/pre-login/top-logo.png" alt="top-logo" class="img-responsive">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div id="sign-up-white-box">
							<div id="sign-up-heading" class="text-center">
								<h2>Create an Account</h2>
								<p>Enter your details to signup</p>
								<h3><?php echo $createaccountmsg; ?></h3>
							</div>
							<div class="row">
							
							
								<div class="col-md-12 col-sm-12 col-12">
									<label  id="first-name">First name</label>
									<input id="first-name2" type="text" value="<?php echo $firstname; ?>" name="firstname" pattern=".*[^0-9].*.{1,}" title="Must contain 2 or more characters  and not only number" class="form-control"  placeholder="Enter your first name"  required>
								</div>
								
								
								<div class="col-md-12 col-sm-12 col-12">
									<label id="last-name">Last name</label>
									<input id="last-name2" type="text" value="<?php echo $lastname; ?>" name="lastname" pattern=".*[^0-9].*.{1,}" title="Must contain 2 or more characters and not only number" class="form-control  validate"  placeholder="Enter your last name"  required>
								</div>

								<div class="col-md-12 col-sm-12 col-12">
								<label id="email">Email</label>
									<input id="email2" type="email" value="<?php echo $email; ?>" name="email" class="form-control"  aria-describedby="emailHelp"  pattern="[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,}$" placeholder="Enter your email address" required>
								</div>
								
								
								<div class="col-md-12 col-sm-12 col-12">
								
										<label  class="pwd-lable">Password</label>
										<input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,24}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" class="form-control toggle-pwd" placeholder="Enter Your  Password" required>
										<span toggle="#password-field-3" class="eye field-icon toggle-password"><img src="images/pre-login/eye.png" alt="eye" class="eye-icon" ></span>
										
									
								</div>
	
								<div class="col-md-12 col-sm-12 col-12">
									
										<label  class="pwd-lable-confirm">Confirm Password</label>
										<input type="password" name="confirmpwd" class="form-control toggle-pwd" id="" placeholder="Re-enter Your  Password" required>
										<span toggle="#password-field-4" class="eye field-icon toggle-password"><img src="images/pre-login/eye.png" alt="eye" class="eye-icon"></span>
										
										
									
								</div>
						
						
								<div class="col-md-12 col-sm-12 col-12">
									<button name="sign_up" type="submit" class="btn btn-block btn-general">SIGN UP</button>
								</div>
							     
							     
							     
							     
								     <div class="col-md-12 col-sm-12">
                                <div id="signup-link">
                                    <p class="text-center">Already have an account Have Account? <a href="login-page.php" class="login-link1">Login</a></p>
                                </div>
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
		<script>
	function validation(){
	var a = $("#email2").val();
	var b = $("#first-name2").val();
	var c = $("#last-name2").val();
	var d = $(".toggle-pwd").val();
		
	  var flag = true;			
if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(a) && /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(d))
  {
 
  } else {
	  alert("Please enter valid email or password format");
	  var flag = false;
  }
		if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(a)){	
		} else {
			alert("Please enter valid email format");
		  var flag = false;
		}
		if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(d)){	
		} else {
			alert("Please enter valid  password format");
		  var flag = false;
		}
		
if(b.length < 2){
	alert("name Must contain 2 or more characters  and not only number ");
	var flag = false;
} 
if(c.length < 2){
	alert("name Must contain 2 or more characters  and not only number ");
	var flag = false;
} 
		return (flag);
		



}

</script>
	
	<script src="js/script.js"></script>


</body>
</html>