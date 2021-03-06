<!doctype html>
<html lang="en">

<head>
	<link href=" https://fonts.googleapis.com/css2?family=Open+Sans
:wght@300;400;600;700& display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,
maximum-scale=1.0 ,user-scalable=no">
	<title>Manage System Configuration</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!--link bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- link css -->
	<link rel="stylesheet" href="css/manage-system-configuration.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<nav class="mobile-menu">
<label for="show-menu" class="show-menu"><span>	<img src="img/assets/logo.png" alt="img" class="img-responsive"></span><div id="mobile-menu-btn">&#9776;</div></label>

	<input type="checkbox" id="show-menu">
		<ul id="menu">
		<li><a href="#">Dashboard</a></li>
		<li>			<a href="#">Notes</a>		</li>
		<li>			<a href="#">Members</a>		</li>
		<li><a href="#">Reports</a></li>
		<li><a href="#">Settings</a></li>
		<li><a href="#"><img src="img/assets/reviewer-1.png" alt="img" class="img-responsive"></a></li>
		<li><a href="#"><a href="#"><button type="submit" class="btn btn-block  btn-mobile-logout">Logout</button></a></a></li>
	</ul>
	<div class="mobile-menu-close-btn"></div>
</nav>
<div class="wrapper">
		<header class="site-header navbar-header navbar-fixed-top" role="navigation">
			<div class="header-wrapper">
				<div class="logo-wrapper">
					<a href="#" title="Site Logo">
						<img src="img/assets/logo.png" alt="img" class="img-responsive">
					</a>
				</div>
				<div class="navigation-wrapper">
					<nav class="main-nav">
						<ul class="menu-navigation">
							<li>
								<a href="#">
									<div class="dropdown">
										<button class="dropbtn"><a>Deshboard</a></button>
										<div class="dropdown-content">
											<a href="#">Note under review</a>
											<a href="#">Published note</a>
											<a href="#">Download notes</a>
											<a href="#">Rejected notes</a>

										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">Notes</a>
							</li>
							<li>
								<a href="#">Member</a>
							</li>
							<li>
								<a href="#">Reports</a>
							</li>

							<li>
								<a href="#">Setting</a>
							</li>
							<li>
								<a href="#">
									<div class="dropdown">
										<button class="dropbtn"> <img src="img/assets/reviewer-1.png" alt="img" class="img-responsive"></button>
										<div class="dropdown-content">
											<a href="#">Update Profile</a>
											<a href="#">Change Profile</a>
											<a href="#" class="add-color">Logout</a>

										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="#"><button type="submit" class="btn btn-block btn-general btn-logout">Logout</button></a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		 <main>
            <section class="first-section"><h2></h2></section>
            <section class="second-section"><h2>
            	
            </h2></section>
        </main>
	</div>
	<section id="my-profile">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<h4>Manage System Configuration</h4>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
							<label for="exampleInputEmail1" id="email">Support Email Address*</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="john" required>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<div class="responsive-number">
						<label for="validationDefault02" id="last-name">Support Phone Number*</label>
						<input type="number" class="form-control" id="validationDefault02" placeholder="Enter Phone Number" required>
					</div>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="exampleInputEmail" >Email Address(es)(for various events system will send motyfication to these user)*</label>
						<input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault02">Facebook URL</label>
						<input type="url" class="form-control" id="validationDefault02" placeholder="Enter url" >
					</div>
					<div class="col-md-12 col-sm-12 col-12">
				<label for="validationDefault03" >Twitter URL</label>
						<input type="url" class="form-control" id="validationDefault03" placeholder="Enter url" >
					
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault03" >Linkedin URL</label>
						<input type="url" class="form-control" id="validationDefault03" placeholder="Enter url" >
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
								<label>Default image for notes(if seller do not upload)</label>
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<div class="add-border text-center">
									<label for="upload">
										<img src="img/assets/upload.png">
										<p style="color: lightgray;">Upload a Picture</p>
										<input type="file" class="upload" style="display:none;">
									</label>
								</div>
							</div>
							
						</div>
					</div>
								<div class="col-md-12 col-sm-12 col-12">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
								<label>Default profile picture(if seller do not upload)</label>
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<div class="add-border text-center">
									<label for="upload">
										<img src="img/assets/upload.png">
										<p style="color: lightgray;">Upload a Picture</p>
										<input type="file" class="upload" style="display:none;">
									</label>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<button type="button" class="btn btn-block btn-general">SUBMIT</button>
					</div>
				</div>
			</div>
		</div>
	</section>
		<footer>
			<hr>
			<div class="row">

				<div class="col-md-6 col-sm-6 col-6">
					<div class="footer-text">
						<p><span>Version:1.1.24</span></p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-6">
					
						<div class="footer-text copyright">
						<p>Copyright &copy; Tatvasoft All right reserved.</p>
					</div>	
					
				</div>
			</div>
		
	</footer>

	<!-- link jquery file-->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!-- link js file-->
	<script src="js/script.js"></script>
</body></html>