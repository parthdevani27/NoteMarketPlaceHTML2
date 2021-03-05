<!doctype html>
<html lang="en">

<head>
	<link href=" https://fonts.googleapis.com/css2?family=Open+Sans
:wght@300;400;600;700& display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,
maximum-scale=1.0 ,user-scalable=no">
	<title>Manage Administrator</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!--link bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- link css -->
	<link rel="stylesheet" href="css/Manage-administrator.css">
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


	<section id="dashboard-admin-2">
		<div class="content-box-lg">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-12">
					<h4>Manage Administrator</h4>
				</div>
			</div>
				<div class="row">
					<div class="col-md-7 col-sm-12 col-12">

						<div class="progress-heading" class="text-left">
							<button type="button" class="btn btn-block btn-general">ADD ADMINISTRATOR</button>
						</div>
					</div>
					<div class="col-md-3 col-sm-5 col-5">

						<div class="search-bar manage-respo-bar" class="text-right">
							<input type="text" class="form-control" id="validationDefault01" placeholder="     Search">

						</div>
					</div>
					<div class="col-md-2 col-sm-7 col-7">
						<div class="search-btn manage-respo-btn">
							<button type="submit" class="btn btn-block btn-general">SEARCH</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<div class="progress-table">
							<table class="table  table-hover-1 table-responsive">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">FIRST NAME</th>
										<th scope="col">LAST NAME</th>
										<th scope="col">EMAIL</th>
										<th scope="col">PHONE NO.</th>
										<th scope="col">DATE ADDED</th>
										<th scope="col">ACTIVE</th>
										<th scope="col">ACTION</th>

									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Rahul</td>
										<td>Patel</td>
										<td>rahul123@gmail.com</td>
										<td>926253633</td>				
										<td>27 nov 2020,11:22:34</td>
										<td>Yes</td>
										<td>
											<img src="img/assets/edit.png" alt="img" class="img-responsive">&nbsp;&nbsp;
											<img src="img/assets/delete.png" alt="img" class="img-responsive">
										</td>
									</tr>
									<tr>
											<td>2</td>
										<td>Rahul</td>
										<td>Patel</td>
										<td>rahul123@gmail.com</td>
										<td>926253633</td>				
										<td>27 nov 2020,11:22:34</td>
										<td>Yes</td>
										<td>
											<img src="img/assets/edit.png" alt="img" class="img-responsive">&nbsp;&nbsp;
											<img src="img/assets/delete.png" alt="img" class="img-responsive">
										</td>
									</tr>
									<tr>
											<td>3</td>
										<td>Rahul</td>
										<td>Patel</td>
										<td>rahul123@gmail.com</td>
										<td>926253633</td>				
										<td>27 nov 2020,11:22:34</td>
										<td>no</td>
										<td>
											<img src="img/assets/edit.png" alt="img" class="img-responsive">&nbsp;&nbsp;
											<img src="img/assets/delete.png" alt="img" class="img-responsive">
										</td>
									</tr>
									<tr>
											<td>4</td>
										<td>Rahul</td>
										<td>Patel</td>
										<td>rahul123@gmail.com</td>
										<td>926253633</td>				
										<td>27 nov 2020,11:22:34</td>
										<td>Yes</td>
										<td>
											<img src="img/assets/edit.png" alt="img" class="img-responsive">&nbsp;&nbsp;
											<img src="img/assets/delete.png" alt="img" class="img-responsive">
										</td>
									</tr>
									<tr>
											<td>5</td>
										<td>Rahul</td>
										<td>Patel</td>
										<td>rahul123@gmail.com</td>
										<td>926253633</td>				
										<td>27 nov 2020,11:22:34</td>
										<td>no</td>
										<td>
											<img src="img/assets/edit.png" alt="img" class="img-responsive">&nbsp;&nbsp;
											<img src="img/assets/delete.png" alt="img" class="img-responsive">
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