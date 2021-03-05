<!doctype html>
<html lang="en">

<head>
	<link href=" https://fonts.googleapis.com/css2?family=Open+Sans
:wght@300;400;600;700& display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1,
maximum-scale=1.0 ,user-scalable=no">
	<title>User Profile</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">






	    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--link bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- link css -->
	<link rel="stylesheet" href="css/user-profile.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-user-profile.css">
</head>

<body>
<?php include "includes/navigation.php"; ?>
	<section id="background-img-user-page">
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div id="user-bacground-img">
					<img src="images/User-Profile/banner-with-overlay.jpg" alt="img" class="img-responsive">
					<div id="user-title">
						<p class="text-center">User Profile</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="user-profile">

		<div class="content-box-lg">

			<div class="container">
				<div id="user-data">
					<div id="basic-profile-details">
						<div class="row">

							<div class="col-md-12 col-sm-12">

								<div class="user-profile-heading">
									<h2>Basic Profile Details</h2>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="validationDefault01" id="first-name">First name*</label>
								<input type="text" class="form-control" id="validationDefault01" placeholder="Enter your first name" required>
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="validationDefault02" id="last-name">Last name*</label>
								<input type="text" class="form-control" id="validationDefault02" placeholder="Enter your last name" required>
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="exampleInputEmail1" id="email">Email*</label>
								<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address" required>
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="validationDefault03" id="date-of-birth">Date Of Birth*</label>
								<input type="date" class="form-control" id="validationDefault03" placeholder="Enter your birth date ">
							</div>
							<div class="col-md-6 col-sm-6">
								<label  for="inlineFormCustomSelectPref">Gender</label>
								<select class="custom-select" id="inlineFormCustomSelectPref" placeholder="select your gender">

									<option value="1">Male</option>
									<option value="2">Female</option>
									<option value="3">Other</option>
								</select>
								
							</div>
							<div class="col-md-6 col-sm-6">
						<label>Phone number</label>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-3">
								<div class="select-code">
								<select class="custom-select" >
									<option value="1">+91</option>
									<option value="2"></option>
									<option value="3"></option>
								</select>
								</div>
							</div>
							<div class="col-md-9 col-sm-9 col-9">
								
						<input type="number" class="form-control" id="validationDefault02" placeholder="Enter your phone number" >
							</div>
						</div>

							</div>

							<div class="col-md-6 col-sm-6">
									<div class="row">
							<div class="col-md-12 col-sm-12">
								<label>Profile Picture</label>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="add-border text-center">
									<label for="upload">
										<img src="images/User-Profile/upload.png">
										<p style="color: lightgray;">Upload a Picture</p>
										<input type="file" class="upload" style="display:none;">
									</label>
								</div>
							</div>
						</div>
							</div>
						</div>
						<div id="address-details">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="user-profile-heading">
										<h2>Address Details</h2>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault04" id="add-line-1">Address Line 1*</label>
									<input type="text" class="form-control" id="validationDefault04" placeholder="Enter your address" required>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault05" id="add-line-2">Address Line 2</label>
									<input type="text" class="form-control" id="validationDefault05" placeholder="Enter your address">
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault06" id="city">City*</label>
									<input type="text" class="form-control" id="validationDefault06" placeholder="Enter your city" required>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault07" id="state">State*</label>
									<input type="text" class="form-control" id="validationDefault07" placeholder="Enter your state" required>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault08" id="zip-code">Zip Code*</label>
									<input type="number" class="form-control" id="validationDefault08" placeholder="Enter your zip code" required>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault09" id="country">Country*</label>
									<input type="text" class="form-control" id="validationDefault09" placeholder="Enter your country" required>
								</div>
							</div>
						</div>
						<div id="univercity-info">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="user-profile-heading">
										<h2>University and collage information</h2>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault10" id="university">University</label>
									<input type="text" class="form-control" id="validationDefault10" placeholder="Enter your university">
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault11" id="collage">collage</label>
									<input type="text" class="form-control" id="validationDefault11" placeholder="Enter your collage">
								</div>
								<div class="col-md-2 col-sm-2">
									<button type="submit" class="btn btn-block btn-general btn-margin">SUBMIT</button>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

			<footer>

			<div class="horizontal-rule">
								
			</div>
			<div class="row">
					<div class="col-md-6 col-sm-6 col-6">
				<div class="footer-text text-left">
					<p>
						Copyright &copy; Tatvasoft All right reserved.
					</p>
				</div>
				</div>
				<div class="col-md-6 col-sm-6 col-6">
				
				<div class="row">
					<div class="col-md-9 col-sm-6 col-3"></div>
				<div class="col-md-1 col-sm-1 col-1">
					<div class="facebook text-center">
						<img src="images/home/home/facebook.png" alt="picture"   >
					</div>
					</div>
					<div class="col-md-1 col-sm-1 col-1">
					<div class="twitter text-center">
						<img src="images/home/home/twitter.png" alt="picture"   >
					</div>
					</div>
					<div class="col-md-1 col-sm-1 col-1">
					<div class="linkedin text-center">
						<img src="images/home/home/linkedin.png" alt="picture"   >
					</div>
					</div>
				</div>
				
				
				</div>
		</div>
		
	</footer>
	






	<!-- link jquery file-->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!-- link js file-->
	<script src="js/script2.js"></script>
</body></html>
