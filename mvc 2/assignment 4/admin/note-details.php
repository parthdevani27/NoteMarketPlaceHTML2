<!doctype html>
<html lang="en">

<head>
	<link href=" https://fonts.googleapis.com/css2?family=Open+Sans
:wght@300;400;600;700& display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1,
maximum-scale=1.0 ,user-scalable=no">
	<title>Note Details</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!--link bootstrap css -->

	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- link css -->
	<link rel="stylesheet" href="css/note-details.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive-note-details.css">
	<!-- link responsive for mobile menu-->
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
        <header class="site-header fixed-top">
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
                      <a href="#">Dashoard</a>
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
            <section class="second-section"><h2></h2></section>
        </main>
    </div>

	<section id="note-details-page">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-12">
						<div id="note-detail-part-1">
							<div class="row">

								<div class="col-md-5 col-sm-12 col-12">
									<div id="note-detail-img">
										<h4>Notes Details</h4>
										<img src="img/notedetails/first.jpg" alt="img" class="img-responsive page-img">
									</div>
								</div>
								<div class="col-md-1 col-sm-12 col-12"></div>
								<div class="col-md-6 col-sm-12 col-12">
									<div id="notes-name">
										<h3>Computer Science</h3>
										<h5>Science</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam facere architecto deleniti voluptatum nisi repellendus est. Odit, minima, qui.</p>
										<button type="button" class="btn btn-block btn-general btn-download" data-toggle="modal" data-target="#exampleModal">DOWNLOAD/$15</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-sm-12 col-12"></div>
					<div class="col-md-5 col-sm-12 col-12">
						<div id="note-detail-part-2">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-6">
									<p>institution:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style">University of Calofornia</span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Country:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style">United State</span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Cource Name:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style">Computer Engineering</span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Cource Code:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 col-6 text-right">
									<p><span class="details-style">248705</span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Professor:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style">Mr.Richard Brown</span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Number of Pages:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style">277</span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Appoved Date:</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style">November 25 2020</span></p>
								</div>
								<div class="col-md-6 col-sm-6 col-6">
									<p>Rating::</p>
								</div>
								<div class="col-md-6 col-sm-6 col-6 text-right">
									<p><span class="details-style">
											<div class="rate">
												<input type="radio" id="star5" name="rate" value="5" />
												<label for="star5" title="text">5 stars</label>
												<input type="radio" id="star4" name="rate" value="4" />
												<label for="star4" title="text">4 stars</label>
												<input type="radio" id="star3" name="rate" value="3" />
												<label for="star3" title="text">3 stars</label>
												<input type="radio" id="star2" name="rate" value="2" />
												<label for="star2" title="text">2 stars</label>
												<input type="radio" id="star1" name="rate" value="1" />
												<label for="star1" title="text">1 star</label>
											</div>
										</span><span class="details-style">100 Review</span></p>
									<h6 class="marked-users">7 Users Mared this note as inappropriate</h6>
								</div>
							</div>






						</div>
					</div>
				</div>
				<hr>
			</div>
		</div>

	</section>

	<section id="note-details-pdf">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-12 col-12">
						<div id="notes-pdf">
							<p>Notes Preview</p>
							<embed src="img/sample.pdf">

						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-12">
						<div id="custmers-reviews">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div id="custmers-reviews-1">
										<div class="row">
											<div class="col-md-2 col-sm-2">
												<img src="img/notedetails/reviewer-1.png" alt="img" class="img-responsive page-img">
											</div>
											<div class="col-md-10 col-sm-10">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<p>Richard Brown</p>
													</div>
													<div class="col-md-12 col-sm-12">
														<div class="rate">
															<input type="radio" id="star10" name="rate" value="5" checked />
															<label for="star10" title="text">5 stars</label>
															<input type="radio" id="star9" name="rate" value="4" />
															<label for="star9" title="text" class="active">4 stars</label>
															<input type="radio" id="star8" name="rate" value="3" />
															<label for="star8" title="text">3 stars</label>
															<input type="radio" id="star7" name="rate" value="2" />
															<label for="star7" title="text">2 stars</label>
															<input type="radio" id="star6" name="rate" value="1" />
															<label for="star6" title="text">1 star</label>
														</div>
													</div>
													<div class="col-md-12 col-sm-12">
														<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis magni, a. Necessitatibus explicabo repellat fugiat accusantium tenetur.</span></p>
													
													</div>
													
												</div>
											</div>
										</div>
										
									</div>
								</div>

							</div>
											<div class="row">
								<div class="col-md-12 col-sm-12">
									<div id="custmers-reviews-2">
										<div class="row">
											<div class="col-md-2 col-sm-2">
												<img src="img/notedetails/reviewer-2.png" alt="img" class="img-responsive page-img">
											</div>
											<div class="col-md-10 col-sm-10">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<p>Richard Brown</p>
													</div>
													<div class="col-md-12 col-sm-12">
														<div class="rate">
															<input type="radio" id="star10" name="rate" value="5" checked />
															<label for="star10" title="text">5 stars</label>
															<input type="radio" id="star9" name="rate" value="4" />
															<label for="star9" title="text" class="active">4 stars</label>
															<input type="radio" id="star8" name="rate" value="3" />
															<label for="star8" title="text">3 stars</label>
															<input type="radio" id="star7" name="rate" value="2" />
															<label for="star7" title="text">2 stars</label>
															<input type="radio" id="star6" name="rate" value="1" />
															<label for="star6" title="text">1 star</label>
														</div>
													</div>
													<div class="col-md-12 col-sm-12">
														<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis magni, a. Necessitatibus explicabo repellat fugiat accusantium tenetur.</span></p>
													</div>
													
												</div>
											</div>
										</div>
										
									</div>
								</div>

							</div>
											<div class="row">
								<div class="col-md-12 col-sm-12">
									<div id="custmers-reviews-3">
										<div class="row">
											<div class="col-md-2 col-sm-2">
												<img src="img/notedetails/reviewer-3.png" alt="img" class="img-responsive page-img">
											</div>
											<div class="col-md-10 col-sm-10">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<p>Richard Brown</p>
													</div>
													<div class="col-md-12 col-sm-12">
														<div class="rate">
															<input type="radio" id="star10" name="rate" value="5" checked />
															<label for="star10" title="text">5 stars</label>
															<input type="radio" id="star9" name="rate" value="4" />
															<label for="star9" title="text" class="active">4 stars</label>
															<input type="radio" id="star8" name="rate" value="3" />
															<label for="star8" title="text">3 stars</label>
															<input type="radio" id="star7" name="rate" value="2" />
															<label for="star7" title="text">2 stars</label>
															<input type="radio" id="star6" name="rate" value="1" />
															<label for="star6" title="text">1 star</label>
														</div>
													</div>
													<div class="col-md-12 col-sm-12">
														<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis magni, a. Necessitatibus explicabo repellat fugiat accusantium tenetur.</span></p>
													</div>
													
												</div>
											</div>
										</div>
										
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="thans-pop-up">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">

				<div class="modal-content">
					<button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><img src="img/notedetails/close.png" alt="img" class="img-responsive close-btn"></span>
					</button>
					<img src="img/notedetails/SUCCESS.png" alt="img" class="img-responsive success-margin" width="63px" height="63px"><br>
					<h5 class="modal-title text-center" id="exampleModalLabel">Thans you for purchasing!</h5>


					<div class="modal-body">
						<h4>Dear Smith,</h4><br>
						<p>As this paid nates-you need to pay to seller rahil shah<br>
							offline. we will send him an email that you want to download <br>
							this nots.he may contact you futher for payment process<br>
							completion.</p>
						<p><span>in case,you have urgency,<br>
								Please contact us on +919564648548.</span></p>
						<p><span>Once he received the payment and acnowledge us-selected<br>
								notes you can see over my downloads tab for download.
							</span></p>
						<p>Have a good day.</p>
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
