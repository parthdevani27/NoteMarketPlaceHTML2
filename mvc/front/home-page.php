<?php  include "includes/db.php"; ?>
<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
	<link href=" https://fonts.googleapis.com/css2?family=Open+Sans
:wght@300;400;600;700& display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1,
maximum-scale=1.0 ,user-scalable=no">
	<title>Home</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<!--link bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- link css -->
	<link rel="stylesheet" href="css/home-page-style.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-home.css">
</head>

<body>
<nav class="mobile-menu">
<label for="show-menu" class="show-menu"><span>	<img src="images/pre-login/logo.png" alt="img" class="img-responsive"></span><div id="mobile-menu-btn">&#9776;</div></label>

	<input type="checkbox" id="show-menu">
		<ul id="menu">
		<li><a href="#">Dashboard</a></li>
		<li>			<a href="#">Notes</a>		</li>
		<li>			<a href="#">Members</a>		</li>
		<li><a href="#">Reports</a></li>
		<li><a href="#">Settings</a></li>
		<li><a href="#"><img src="images/User-Profile/reviewer-1.png" alt="img" class="img-responsive"></a></li>
		<li><a href="#"><a href="#"><button type="submit" class="btn btn-block  btn-mobile-logout">Logout</button></a></a></li>
	</ul>
	<div class="mobile-menu-close-btn"></div>
</nav>
	<div class="wrapper">
		<header class="site-header">
			<div class="header-wrapper">
				<div class="logo-wrapper">
					<a href="#" title="Site Logo">
						<img src="images/pre-login/logo.png" alt="top-logo" class="img-responsive">
					</a>
				</div>
				<div class="navigation-wrapper">
					<nav class="main-nav">
						<ul class="menu-navigation">
							<li>
								<a href="#">search notes</a>
							</li>
							<li>
								<a href="#">sell your notes</a>
							</li>
							<li>
								<a href="#">buyer request</a>
							</li>
							<li>
								<a href="#">FAQ</a>
							</li>

							<li>
								<a href="#">Contact us</a>
							</li>
							<li>
								<a href="#"> <img src="images/User-Profile/reviewer-1.png" alt="img" class="img-responsive"></a>
							</li>
							<li>
								<a href="#"> <button type="submit" class="btn btn-block btn-header">logout</button></a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<main>

		</main>
	</div>

	<section id="home-page">
		<div class="content-box-lg">
			<div id="home-bacground-img">
				<img src="images/home/home/banner-with-overlay.jpg" alt="img" class="img-responsive">
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">

						<div id="home-heading">
							<h3>Download Free/Paid Notes<br> or Sale Your Book</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta laudantium dolore dolorem quas voluptatem expedit.</p>
							<a href="faq-page.php"><button type="submit" class="btn btn-block btn-general">LEARN MORE</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="home-about">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-12 col-12">
						<h3>About <br> NotesMarketPlace</h3>
					</div>
					<div class="col-md-1 "></div>
					<div class="col-md-7 col-sm-12 col-12">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis sunt impedit hic, vitae. Nam nulla beatae doloremque quod totam veniam velit, repellat tenetur aspernatur corporis est fugiat nemo eos eaque.</p><br>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, esse sed, labore, eaque laborum inventore perferendis molestias ad dicta aspernatur deleniti ut rem facilis quam iste ipsa animi veniam, culpa!</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="how-it-works">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div id="how-it-works-heading">
							<p>How it Works</p>
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col-md-6 col-sm-12 col-12">
						<div id="download">
							<div id="how-it-works-img" class="text-center">
								<img src="images/home/home/download.png" alt="img" class="img-responsive"><br>
							</div>
							<h4>Download Free/Paid Notes</h4><br>
							<p>Get Material For Your<br> <span>Cource etc.</span></p><br>
							<a href="search-page.php"><button type="submit" class="btn btn-block btn-general btn-how-it-works-1">download</button></a>
						</div>
					</div>
					<div class="col-md-3 "></div>
					<div class="col-md-3 col-sm-12 col-12">
						<div id="sell-book">
							<div id="how-it-works-img" class="text-center">
								<img src="images/home/home/seller.png" alt="img" class="img-responsive"><br>
							</div>
							<h4>Seller</h4><br>
							<p>Upload and Download Cource<br> <span>and Materials etc.</span></p><br>
							
							<?php 
								//check user is register or not
								if(!empty($_SESSION['Email'])){
																				
									$checkreg = "Dashboard%20Page.php";			
								} else {
									$checkreg ="login-page.php";
								}
								?>
							<a href="<?php echo $checkreg;?>"><button type="submit" class="btn btn-block btn-general btn-how-it-works-2">Sell Book</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="customers">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div id="how-it-works-heading">
							<p>What our Cusromers are saying</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-12">
						<div class="about-white-box-1">

							<div class="row">
								<div class="col-md-3 col-sm-3">
									<div class="customres-img customres-img-1">
										<img src="images/home/home/customer-1.png" alt="customer-1" class="img-responsive">
									</div>
								</div>
								<div class="col-md-9 col-sm-9">

									<div class="customer-name">
										<h3>Walter Meller</h3>
										<h4>Founder & CEO,Matrix Group</h4>
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="customer-name">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est et ipsum perferendis qui iste nihil sint expedita maiores. Velit perspiciatis officiis</p>
									</div>
								</div>
							</div>
						</div>

					</div>
									<div class="col-md-6 col-sm-12 col-12">
						<div class="about-white-box-2">

							<div class="row">
								<div class="col-md-3 col-sm-3">
									<div class="customres-img customres-img-1">
										<img src="images/home/home/customer-2.png" alt="customer-1" class="img-responsive">
									</div>
								</div>
								<div class="col-md-9 col-sm-9">

									<div class="customer-name">
										<h3>JOnnie Riley</h3>
				    	 		<h4>Employee, Curious Snacs</h4>
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="customer-name">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est et ipsum perferendis qui iste nihil sint expedita maiores. Velit perspiciatis officiis</p>
									</div>
								</div>
							</div>
						</div>

					</div>
									<div class="col-md-6 col-sm-12 col-12">
						<div class="about-white-box-3">

							<div class="row">
								<div class="col-md-3 col-sm-3">
									<div class="customres-img customres-img-1">
										<img src="images/home/home/customer-3.png" alt="customer-1" class="img-responsive">
									</div>
								</div>
								<div class="col-md-9 col-sm-9">

									<div class="customer-name">
										<h3>Amilia Luna</h3>
				    	 		<h4>Teacher,Saint Joseph High School</h4>
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="customer-name">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est et ipsum perferendis qui iste nihil sint expedita maiores. Velit perspiciatis officiis</p>
									</div>
								</div>
							</div>
						</div>

					</div>
									<div class="col-md-6 col-sm-12 col-12">
						<div class="about-white-box-4">

							<div class="row">
								<div class="col-md-3 col-sm-3">
									<div class="customres-img customres-img-1">
										<img src="images/home/home/customer-4.png" alt="customer-1" class="img-responsive">
									</div>
								</div>
								<div class="col-md-9 col-sm-9">

									<div class="customer-name">
										<h3>Denial Cardos</h3>
				    	 		<h4>Software Engineer,infinitum company</h4>
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="customer-name">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est et ipsum perferendis qui iste nihil sint expedita maiores. Velit perspiciatis officiis</p>
									</div>
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
	<script src="js/script.js"></script>
</body></html>
