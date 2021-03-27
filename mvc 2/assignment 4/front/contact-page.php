<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php  include "includes/header.php"; ?>
<?php session_start(); ?>

<?php

if(isset($_POST['contectsubmit'])){
	 $fullname =$_POST['fullname'];
	 $emailaddress =$_POST['emailaddress'];
 	 $subjectcontact =$_POST['subjectcontact'];
	 $commentcontent =$_POST['connentcontent'];

	require 'PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                              

	$mail->isSMTP();                                      
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                               
	$mail->Username = 'parthdevani3817@gmail.com';                 
	$mail->Password = 'PDg@#123s';                           
	$mail->SMTPSecure = 'tls';                           
	$mail->Port = 587;                                    

	$mail->setFrom('parthdevani3817@gmail.com', 'Mailer');
	$mail->addAddress('parthdevani3817@gmail.com', 'Joe User');     
	//$mail->addAddress('ellen@example.com');               
	$mail->addReplyTo('parthdevani3817@gmail.com', 'Information');



	$mail->isHTML(true);                                  

	$mail->Subject = "$fullname -query";
	$mail->Body    = "subject:$subjectcontact<br>Hello,<br><br>$commentcontent <br><br>Regrds,<br>$fullname$emailaddress";


	if(!$mail->send()) {


	} else {

	}
	
	



   
} 
?>


	<title>Contact Us</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/contact-page-style.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-contect-us.css">
</head>

<body>
<?php  include "includes/navigation.php"; ?>

	<div class="background-img">
		<img src="images/Search/banner-with-overlay.jpg" alt="img" class="img-responsive">
		<p class="text-center">Contact Us</p>
	</div>
	<section id="contact-us">
		<div class="content-box-md">
			<div class="container">
			<form action="" method="post">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
					<h4 class="contact-heading">Get in Touch</h4>
					<p class="contact-heading-p">Let us konw how to get back to you</p>
					</div>
					
					
					<div class="col-md-6 col-sm-6 col-6">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-12">
							<label for="validationDefault01">Full Name*</label>
							
							
							<?php
							
							
							if(isset($_SESSION['Email'])){
								 $username =$_SESSION['firstname']; 
								 echo $lastname =$_SESSION['lastname']; 
								echo "<input type='text' name='fullname' class='form-control' id='validationDefault01' value='$username  $lastname' placeholder='Enter Your full name' required>";
							} else {
								echo '<input type="text" name="fullname" class="form-control" id="validationDefault01" placeholder="Enter Your full name" required>';
							}
							?>
							
							
							
							
						
						</div>
						<div class="col-md-12 col-sm-12 col-12">
						<label for="exampleInputEmail1">Email Address*</label>
						<?php
							
							
							if(isset($_SESSION['Email'])){
								$email =$_SESSION['Email']; 
								echo "<input type='email' name='emailaddress' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' value='$email' required readonly>	";
							} else {
								echo "<input type='email' name='emailaddress' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Enter your email address' required>";
							}
							?>
											
						</div>
						<div class="col-md-12 col-sm-12 col-12">
							<label for="validationDefault02">Subject*</label>
						<input type="text" name="subjectcontact" class="form-control" id="validationDefault02" placeholder="Enter Your subject" required>
						</div>
						</div>
					</div>
					
					
					<div class="col-md-6 col-sm-6 col-6">
					<label for="validationDefault03">Comment/Questions*</label>
						<textarea rows="9"  cols="60" name="connentcontent" placeholder="Enter Your Comment/Questions"></textarea>
					</div>	
				</div>
				
				
				<div class="row">
				<div class="col-md-12 col-sm-12 col-12">
				<button type="submit" name="contectsubmit" class="btn btn-block btn-general">SUBMIT</button>
					</div>
				</div>
				
				
				</form>
			</div>
		</div>
	</section>
<?php  include "includes/footer.php"; ?>
