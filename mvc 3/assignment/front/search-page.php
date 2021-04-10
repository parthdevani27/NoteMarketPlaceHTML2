<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php $page='search'; ?>



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
						<div id="search-top-heading" class="text-center ">
							<p>Search Notes</p>
						</div>
	<section id="search-notes">
		<div class="content-box-lg">
			<div class="container">
			<form action="" method="post">
				<div class="row">
					
					<div class="col-md-12 col-sm-12">
						<div class="search-heading">
							<p>Search and Filter notes</p>
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div id="filter-srarch-bar">
							<div id="search-bar">
								<input   type="text" name="searchnotes" class="form-control" id="booksearchbox" placeholder="       Search notes here..." autocomplete="off">
								<span toggle="#validationDefault01" class="search-icon"><img src="images/Search/search-icon.png" alt="search"></span>
							</div>
							<div id="filter-bar">
								<div class="row">
									<div class="col-md-2 col-sm-4 col-6">
										<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref1" placeholder="select type">

											<option value="">select type</option>
								<?php 
								//for notetype 
								$query = "SELECT * FROM notetypes WHERE IsActive = 1";
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
										<option value="">select category</option>
								<?php 
								//for category 
								$query = "SELECT * FROM notecategories WHERE IsActive = 1";
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

											<option value="">select university</option>
									<?php
								$query = "SELECT DISTINCT UniversityName FROM sellernotes WHERE Status=11";
								$collage_dropdown_query = mysqli_query($connection ,$query);
								confirmq($collage_dropdown_query);
								while($row =mysqli_fetch_assoc($collage_dropdown_query)){
								$collagename_db = $row['UniversityName'];	
								if(!empty($collagename_db)){
								
									$collagename = $collagename_db;
									
								echo "<option value='$collagename'>$collagename</option>";
								}	
								}			
								?>
										</select>
									</div>
									<div class="col-md-2 col-sm-4 col-6">
										<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref4" placeholder="select course">

											<option value="">select course</option>
							
								<?php
								$query = "SELECT DISTINCT Course FROM sellernotes WHERE Status=11";
								$Course_dropdown_query = mysqli_query($connection ,$query);
								confirmq($Course_dropdown_query);
								while($row =mysqli_fetch_assoc($Course_dropdown_query)){
								$course_db = $row['Course'];	
								if(!empty($course_db)){
								
									$course = $course_db;
									
								echo "<option value='$course'>$course</option>";
								}	
								}			
								?>
										</select>
									</div>
									<div class="col-md-2 col-sm-4 col-6">
										<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref5" placeholder="select country">

											<option value="">select country</option>
								<?php 
								//for country 
								$query = "SELECT * FROM countries WHERE IsActive = 1";
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

											<option value="">select rating</option>
											<option value="5">5 Star</option>
											<option value="4">4 Star</option>
											<option value="3">3 Star</option>
											<option value="2">2 Star</option>
											<option value="1">1 Star</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
</form>
	<div id="bookshow"></div>
			</div>
		</div>
	</section>
	
<?php include "includes/footer.php" ?>