<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
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
	<title>Note Details</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<!--link bootstrap css -->

	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!-- link css -->
	<link rel="stylesheet" href="css/note-details.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-note-details.css">
</head>

<body>
<?php include "includes/navigation.php"; ?>
	
	
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
										<img src="images/notedetails/first.jpg" alt="img" class="img-responsive page-img">
									</div>
								</div>
								<div class="col-md-1 col-sm-12 col-12"></div>
								<div class="col-md-6 col-sm-12 col-12">
									<div id="notes-name">
										<h3>Computer Science</h3>
										<h5>Science</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam facere architecto deleniti voluptatum nisi repellendus est. Odit, minima, qui.</p>
										<?php
										if(isset($_GET['downloadnotes'])){
											header("Location: login-page.php");
										}
										
										
										if(isset($_SESSION['ID'])){
											echo "<button type='submit' name='downloadnotes' class='btn btn-block btn-general btn-download' data-toggle='modal' data-target='#exampleModal'>DOWNLOAD/$15</button>";
										} else {
											echo "<a href='login-page.php'><button type='submit' name='downloadnotes' class='btn btn-block btn-general btn-download'>DOWNLOAD/$125</button></a>";
											
										}
										?>
										
								
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
							<embed src="images/sample.pdf">

						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-12">
						<div id="custmers-reviews">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div id="custmers-reviews-1">
										<div class="row">
											<div class="col-md-2 col-sm-2">
												<img src="images/notedetails/reviewer-1.png" alt="img" class="img-responsive page-img">
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
												<img src="images/notedetails/reviewer-2.png" alt="img" class="img-responsive page-img">
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
												<img src="images/notedetails/reviewer-3.png" alt="img" class="img-responsive page-img">
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
						<span aria-hidden="true"><img src="images/notedetails/close.png" alt="img" class="img-responsive close-btn"></span>
					</button>
					<img src="images/notedetails/SUCCESS.png" alt="img" class="img-responsive success-margin" width="63px" height="63px"><br>
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
