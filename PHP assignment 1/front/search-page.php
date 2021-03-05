<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>


	<title>search</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/search-page-style.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-search.css">
</head>

<body>


<?php  include "includes/navigation.php"; ?>

	<div id="results"></div>
		<div id="search-bacground-img">
							<img src="images/Search/banner-with-overlay.jpg" alt="img" class="img-responsive">
						</div>
						<div id="search-top-heading" class="text-center">
							<p>Search Notes</p>
						</div>
	<section id="search-notes">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					
					<div class="col-md-12 col-sm-12">
						<div class="search-heading">
							<p>Search and Filter notes</p>
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div id="filter-srarch-bar">
							<div id="search-bar">
								<input type="text" name="searchnotes" class="form-control" id="booksearchbox" placeholder="       Search notes here..." autocomplete="off">
								<span toggle="#validationDefault01" class="search-icon"><img src="images/Search/search-icon.png" alt="search"></span>
							</div>
							<div id="filter-bar">
								<div class="row">
									<div class="col-md-2 col-sm-4 col-6">
										<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref1" placeholder="select type">

											<option value="1">select type</option>
								<?php 
								//for notetype 
								$query = "SELECT * FROM notetypes";
								$notetype_dropdown_query = mysqli_query($connection ,$query);
								confirmq($notetype_dropdown_query);
								while($row =mysqli_fetch_assoc($notetype_dropdown_query)){
								$typename = $row['Name'];	
								$typeid = $row['ID'];	
								echo "<option value=$typeid>$typename</option>";
								}
								?>
										</select>
									</div>
									<div class="col-md-2 col-sm-4 col-6">
										<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref2">
										<option value="1">select category</option>
								<?php 
								//for category 
								$query = "SELECT * FROM notecategories";
								$category_dropdown_query = mysqli_query($connection ,$query);
								confirmq($category_dropdown_query);
								while($row =mysqli_fetch_assoc($category_dropdown_query)){
								$category = $row['Name'];	
								$categoryid = $row['ID'];	
								echo "<option value=$categoryid>$category</option>";
								}
								?>
											
										
										</select>
									</div>
									<div class="col-md-2 col-sm-4 col-6">
										<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref3" placeholder="select university">

											<option value="1">select university</option>
											<option value="2"></option>
											<option value="3"></option>
										</select>
									</div>
									<div class="col-md-2 col-sm-4 col-6">
										<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref4" placeholder="select cource">

											<option value="1">select cource</option>
											<option value="2"></option>
											<option value="3"></option>
										</select>
									</div>
									<div class="col-md-2 col-sm-4 col-6">
										<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref5" placeholder="select country">

											<option value="1">select country</option>
								<?php 
								//for country 
								$query = "SELECT * FROM countries";
								$country_dropdown_query = mysqli_query($connection ,$query);
								confirmq($country_dropdown_query);
								while($row =mysqli_fetch_assoc($country_dropdown_query)){
								$countryname = $row['Name'];	
								$countryID = $row['ID'];	
								echo "<option value='$countryID'>$countryname</option>";
								}
								?>
								
										</select>
									</div>
									
									<div class="col-md-2 col-sm-4 col-6">
										<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref6" placeholder="select rating" title="select rating">

											<option value="0">select rating</option>
											<option value="1"></option>
											<option value="2"></option>
											<option value="3"></option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			<?php 
					

	
	
						//count number of notes
					
//						$search = $_POST['searchnotes'];
//						$query = "SELECT * FROM sellernotes  WHERE Title LIKE '%$search%' ";
					
						
						$query = escape("SELECT * FROM sellernotes");
				
						
						$count_notes_search_page = mysqli_query($connection , $query);
					$totalbookcount = mysqli_num_rows($count_notes_search_page);
						confirmq($count_notes_search_page);
						$pagination = ceil($totalbookcount/9);
						//count number of notes
			// make pagination
					$pageno = 1;
				if(isset($_GET['pg_id'])){
					$pageno=$_GET['pg_id'];
					 $pageno_1 = ($pageno-1)*9;
				} else {
					$pageno_1=0;
				}
			// make pagination
				//search box
//
						
				$query = escape("SELECT * FROM sellernotes ORDER BY ID DESC LIMIT {$pageno_1},9");
						
				
				
				
				
						$view_notes_search_page = mysqli_query($connection , $query);
					$totalbooks = mysqli_num_rows($view_notes_search_page);
						confirmq($view_notes_search_page);
				
						
				
				
				?>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div id="notes-heading">
						<p>Total <?php echo $totalbookcount;?> notes</p>
					</div>
				</div>
				<div id="search-book">
					<div class="row">
					
					<?php 
					
						while($row = mysqli_fetch_assoc($view_notes_search_page)){
							$title = $row['Title'];
							$id = $row['ID'];
							$pages = $row['NumberofPages'];
							$university = $row['UniversityName'];
							$noteimage = $row['DisplayPicture'];
							$publishdate = $row['PublishedDate'];
						
						
						
						
						
					
					?>
					
					
						<div class="col-lg-4 col-md-6 col-sm-6 col-6">
							<div id="book-img-1">
								<div class="book-box">
									<div class="book-img">
										<a href="note-details.php?noteid=<?php echo $id;?>"><img src="upload/displaypicture/<?php echo $noteimage; ?>" alt="img" class="img-responsive"></a>
									</div>
									<div class="book-details">
										<h4 class="book-heading-1"><a href="note-details.php?noteid=<?php echo $id;?>"><?php echo $title;
											?></a></h4>
										<div class="icons">
											<img src="images/Search/university.png" alt="img" class="img-responsive univer-img">
										</div>
										<p><?php echo $university; ?></p><br>
										<div class="icons">
											<img src="images/Search/pages.png" alt="img" class="img-responsive page-img">
										</div>
										<p><?php echo $pages; ?> Pages</p><br>
										<div class="icons">
											<img src="images/Search/calendar.png" alt="img" class="img-responsive claender-img">
										</div>
										<p><?php echo $publishdate; ?></p><br>
										<div class="icons">
											<img src="images/Search/flag.png" alt="img" class="img-responsive flag-img">
										</div>
										<p><span> 5 User mared this note as inappopriate</span></p>
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
										<p class="review-count">100 reviews</p>
									</div>
								</div>
							</div>
						</div>
						

					<?php } ?>	
						
						
						
					</div>
				</div>
			</div>
			</div>
		</div>
	</section>
	<section>
		<nav aria-label="Page navigation example " class=" text-center">
			<ul class="pagination">
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true"> <img src="images/Search/left-arrow.png" alt="img" class="img-responsive "></span>
					</a>
				</li>
				<?php 
					for($i = 1;$i <= $pagination; $i++){
						if($i == $pageno ){
							
						echo "<li class='page-item'><a class='page-link active' href='search-page.php?pg_id={$i}'>$i</a></li>";
						} else {
							echo "<li class='page-item'><a  href='search-page.php?pg_id={$i}'>$i</a></li>";
						}
					}
				?>
				
				
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true"> <img src="images/Search/right-arrow.png" alt="img" class="img-responsive ">
						</span>
					</a>
				</li>
			</ul>
		</nav>
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
	<script>
		$("#booksearchbox").keyup(function(){
			$.post("search-page.php",{name:value},function(data){
				
			});
		});
//		function getStates(value){
//			$.post("search-page.php",{name:value},function(data){
//				$("#results").append(data);
//			});
//		}
	</script>
</body></html>
