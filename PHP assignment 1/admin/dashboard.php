<!doctype html>
<html lang="en">

<head>
	<link href=" https://fonts.googleapis.com/css2?family=Open+Sans
:wght@300;400;600;700& display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,
maximum-scale=1.0 ,user-scalable=no">
	<title>Dashboard</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!--link bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- link css -->
	<link rel="stylesheet" href="css/dashboard.css">
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
		<header class="site-header navbar-header navbar-fixed-top navbar-responsive" role="navigation">
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
										<button class="dropbtn"><a>Dashboard</a></button>
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
								<a href="#">
								<div class="dropdown">
										<button class="dropbtn"> <a>Settings</a></button>
										<div class="dropdown-content">
											<a href="#">Manage system configuration</a>
											<a href="#">Manage administrator</a>
											<a href="#">Manage category</a>
											<a href="#">Manage type</a>
											<a href="#">Manage country</a>
											

										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="dropdown">
										<button class="dropbtn"> <img src="img/assets/reviewer-1.png" alt="img" class="img-responsive"></button>
										<div class="dropdown-content">
											<a href="#">Update Profile </a>
											<a href="#">Change Profile    </a>
											<a href="#">Logout</a>
									

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

	<section id="dashboard-admin-1">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">

						<h4>Dashboard</h4>
					</div>
					<div class="col-md-4 col-sm-4 col-4">
						<div class="box-1">
							<h4 class="text-center">20</h4>
							<p class="text-center">Number of notes in review for publish</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-4">
						<div class="box-2">
							<h4 class="text-center">100</h4>
							<p class="text-center">Number of new notes downloaded<br>
								(Last 7 days)</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-4">
						<div class="box-3">
							<h4 class="text-center">232</h4>
							<p class="text-center">Number of new Registration<br>
								(Last 7 days)</p>
						</div>
					</div>



				</div>
			</div>
		</div>
	</section>

	<section id="dashboard-admin-2">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-12 col-12">

						<div class="progress-heading" class="text-left">
							<p>Published Notes</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-9">

						<div class="search-bar" class="text-right">
							<input type="text" class="form-control" id="validationDefault01" placeholder="     Search">

						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-3">
						<div class="search-btn">
							<button type="submit" class="btn btn-block btn-general">SEARCH</button>
						</div>
					</div>
					<div class="col-md-2 col-sm-1 col-1">




						<select class="custom-select ">
							<option value="1">Select Month</option>
							<option value="2"></option>
							<option value="3"></option>
						</select>


					</div>

				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<div class="progress-table">
							<table class="table  table-hover-1 table-responsive">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">NOTE TITLE</th>
										<th scope="col">CATEGORY</th>
										<th scope="col">ATTACHMENT SIZE</th>
										<th scope="col">SELL TYPE</th>
										<th scope="col">PRICE</th>
										<th scope="col">PUBLISHER</th>
										<th scope="col">PUBLISHED DATE</th>
										<th scope="col">NUMBER OF DOWNLOADS</th>
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td class="add-color">Data Science</td>
										<td>Science</td>
										<td>10KB</td>
										<td>Paid</td>
										<td>$56</td>
										<td>pritesh panchal</td>
										<td>27 nov 2020,11:22:34</td>
										<td class="add-color">10</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="/img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													<a href="#">View more details</a>
													<a href="#">Unpublish</a>

												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td class="add-color">Account</td>
										<td>Commerce</td>
										<td>10KB</td>
										<td>Paid</td>
										<td>$56</td>
										<td>pritesh panchal</td>
										<td>27 nov 2020,11:22:34</td>
										<td class="add-color">23</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="/img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													<a href="#">View more details</a>
													<a href="#">Unpublish</a>

												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td class="add-color">Social Studies</td>
										<td>Social</td>
										<td>10KB</td>
										<td>free</td>
										<td>$0</td>
										<td>pritesh panchal</td>
										<td>27 nov 2020,11:22:34</td>
										<td class="add-color">13</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="/img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													<a href="#">View more details</a>
													<a href="#">Unpublish</a>

												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td class="add-color">AL</td>
										<td>IT</td>
										<td>10KB</td>
										<td>Paid</td>
										<td>$56</td>
										<td>pritesh panchal</td>
										<td>27 nov 2020,11:22:34</td>
										<td class="add-color">09</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="/img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													<a href="#">View more details</a>
													<a href="#">Unpublish</a>

												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>5</td>
										<td class="add-color">Lorem ipsum.</td>
										<td>lorem</td>
										<td>10KB</td>
										<td>free</td>
										<td>$0</td>
										<td>pritesh panchal</td>
										<td>27 nov 2020,11:22:34</td>
										<td class="add-color">10</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="/img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													<a href="#">View more details</a>
													<a href="#">Unpublish</a>

												</div>
											</div>
										</td>
									</tr>



								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-12 text-center">
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

				<div class="col-md-6 col-sm-6 col-6">
					<div class="footer-text text-left">
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