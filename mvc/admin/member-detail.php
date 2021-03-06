<!doctype html>
<html lang="en">

<head>
	<link href=" https://fonts.googleapis.com/css2?family=Open+Sans
:wght@300;400;600;700& display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,
maximum-scale=1.0 ,user-scalable=no">
	<title>Member Details</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!--link bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- link css -->
	<link rel="stylesheet" href="css/member-detail.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive-member-details.css">
	<!-- link responsive for mobile menu-->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<div class="wrapper">
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
	<section id="member-details">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
					<h4>Member Details</h4>
					</div>
					<div class="col-md-6 col-sm-12">
					<div class="row">
						<div class="col-md-4 col-sm-12 col-12">
						<div class="member-img">
						<img src="img/assets/member.png" alt="img" class="img-responsive">
						</div>
						</div>
						
						<div class="col-md-3 col-sm-4 col-4">
							<p>First Name:</p>
							<p>Last Name:</p>
							<p>Email:</p>
							<p>DOB:</p>
							<p>Phone:</p>
							<p>Collage/University:</p>
						</div>
						<div class="col-md-1 col-sm-1 col-1"></div>
						<div class="col-md-4 col-sm-6 col-6">
						<p><span>Richard</span></p>
						<p><span>Brown</span></p>
						<p><span>Richard@gmail.com</span></p>
						<p><span>13-09-1990</span></p>
						<p><span>9272727272</span></p>
						<p><span>University of California</span></p>
						</div>
						
						</div>
					</div>
					<div class="col-md-1 ">
						<div class="vl"></div>
					</div>
					<div class="col-md-5 col-sm-12 ">
						<div class="row">
					
							<div class="col-md-4 col-sm-4 col-4">
								<p>Address 1:</p>
								<p>Address 2:</p>
								<p>City:</p>
								<p>State:</p>
								<p>Country:</p>
								<p>Zip code:</p>
							</div>
							<div class="col-md-1 col-sm-1 col-1"></div>
							<div class="col-md-6 col-sm-6 col-6">
								<p><span>144-Diamond Height</span></p>
								<p><span>Star Colony</span></p>
								<p><span>New York</span></p>
								<p><span>New York State</span></p>
								<p><span>United State</span></p>
								<p><span>11004-05</span></p>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<h6>Notes</h6>
					</div>
				<div class="col-md-12 col-sm-12">
					<div class="progress-table">
							<table class="table  table-hover-1 table-responsive">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">NOTE TITLE</th>
										<th scope="col">CATEGORY</th>
										<th scope="col">STATUS</th>
										<th scope="col">DOWNLOAD NOTES</th>
										<th scope="col">TOTAL EARNING</th>
										<th scope="col">DATE ADDED&nbsp;&nbsp;</th>
										<th scope="col">PUBLISHED DATE</th>
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td class="add-color">Software</td>
										<td>IT</td>
										<td>published</td>				
										<td>27</td>
										<td>$177</td>
										<td>09-10-2020</td>
										<td>09-10-2020</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													
												</div>
											</div>
										</td>
									</tr>
									<tr>
											<td>2</td>
											<td class="add-color">Account</td>
										<td>Account</td>
										<td>published</td>				
										<td>27</td>
										<td>$177</td>
										<td>09-10-2020</td>
										<td>09-10-2020</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													
												</div>
											</div>
										</td>
									</tr>
									<tr>
											<td>3</td>
											<td class="add-color">Computer</td>
										<td>Computer</td>
										<td>published</td>				
										<td>27</td>
										<td>$177</td>
										<td>09-10-2020</td>
										<td>09-10-2020</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													
												</div>
											</div>
										</td>
									</tr>
									<tr>
											<td>4</td>
											<td class="add-color">Human body</td>
										<td>Science</td>
										<td>published</td>				
										<td>27</td>
										<td>$177</td>
										<td>09-10-2020</td>
										<td>09-10-2020</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													
												</div>
											</div>
										</td>
									</tr>
									<tr>
											<td>5</td>
											<td class="add-color">World War 2</td>
										<td>History</td>
										<td>published</td>				
										<td>27</td>
										<td>$177</td>
										<td>09-10-2020</td>
										<td>09-10-2020</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													
												</div>
											</div>
										</td>
									</tr>



								</tbody>
							</table>
					</div>
				</div>
						<div class="col-md-12 col-sm-12 text-center">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true"> <img src="img/assets/left-arrow.png" alt="img" class="img-responsive "></span>
									</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link active" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true"> <img src="img/assets/right-arrow.png" alt="img" class="img-responsive ">
										</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
			<hr>
			<div class="row">

				<div class="col-md-6 col-sm-6">
					<div class="footer-text">
						<p><span>Version:1.1.24</span></p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					
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