<?php  include "db.php"; ?>
<?php  include "functions.php"; ?>
	
						
			<?php	
				$type     = $_POST['type'];
				$category = $_POST['category'];
				$collage  = $_POST['collage'];
				$course   = $_POST['course'];
				$country  = $_POST['country'];
				$search   = $_POST['search'];
				$rating   = $_POST['rating'];
if(isset($_POST['pageno'])){
				$pageno   = $_POST['pageno'];
} else {
				$pageno   = 1;
	
}
				$pageno_1 = ($pageno-1)*9;


				$query = "SELECT sellernotes.ID AS ID,sellernotes.Status,sellernotes.Title,sellernotes.Category,sellernotes.NoteType,sellernotes.UniversityName,sellernotes.Course,sellernotes.Country,sellernotes.ID,sellernotes.NumberofPages,sellernotes.DisplayPicture,sellernotes.PublishedDate,sellernotes.SellerID
				FROM sellernotes LEFT JOIN sellernotesreviews ON  sellernotes.ID=sellernotesreviews.NoteID GROUP BY ID ";

				$query .= "HAVING sellernotes.Status=11 ";
			
				if($search != ''){		
				$query .= "AND sellernotes.Title LIKE '%$search%' ";
				}

				if($category != ''){
				$query .= "AND sellernotes.Category = {$category} ";	
				}

				if($type != ''){
				$query .= "AND sellernotes.NoteType = {$type} ";	
				}

				if($collage != ''){
				$query .= "AND sellernotes.UniversityName = '$collage' ";	
				}

				if($course != ''){
				$query .= "AND sellernotes.Course = '$course' ";	
				}

				if($country != ''){
				$query .= "AND sellernotes.Country = {$country} ";	
				}

				if($rating != ''){
				$query .= "AND CEILING(avg(sellernotesreviews.Ratings)) = {$rating} ";	
				}
				
				$view_notes_search_page = mysqli_query($connection , $query);
				$totalbooks = mysqli_num_rows($view_notes_search_page);
				$page_count = ceil($totalbooks/9);

				$query .= "ORDER BY ID DESC LIMIT {$pageno_1},9";
					
				$view_notes_search_page = mysqli_query($connection , $query);
				confirmq($view_notes_search_page);				
				

				?>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div id="notes-heading">
					<?php 
						if($totalbooks <= 0){
							echo "<p>No Notes Availiable</p>";
						} else {
							echo "<p>Total  $totalbooks notes</p>";
						}
						?>
						
					</div>
				</div>
				<div id="search-book">
					<div class="row">
					
					<?php 
						
						
					
						while($row = mysqli_fetch_assoc($view_notes_search_page)){
							$title 		 = $row['Title'];
							$id 		 = $row['ID'];
							$sellerid	 = $row['SellerID'];
							$pages 	 	 = $row['NumberofPages'];
							$university  = $row['UniversityName'];
							$noteimage 	 = $row['DisplayPicture'];
							$publishdate = $row['PublishedDate'];
						
						
						
						
						
					
						$img_path ="images/Search/1.jpg";
						if(!empty($noteimage)){
							if(file_exists("../member/$sellerid/$id/$noteimage")){
						$img_path = "member/$sellerid/$id/$noteimage";
							}
						}
							
					
						
						
						
						?>
					
					
						<div class="col-lg-4 col-md-6 col-sm-6 col-6">
							<div id="book-img-1">
								<div class="book-box">
									<div class="book-img">
										<a href="note-details.php?noteid=<?php echo $id;?>"><img src="<?php echo $img_path; ?>" alt="img" class="img-responsive"></a>
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
										<p><span> <?php echo totalcountwithdata1('sellernotesreportedissues','NoteID',$id);
											?>User mared this note as inappopriate</span></p>
									
<?php
$query = "SELECT  avg(`Ratings`) AS `Ratings1`,count(Ratings) AS c_rate FROM `sellernotesreviews` WHERE `NoteID`= $id";
$rating_query = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($rating_query);
$rate = $row['Ratings1'];
$totalreview = $row['c_rate'];
$rate = ceil($rate);
	if($rate == 0){
		$star1 = 'star-white.png'; 
		$star2 = 'star-white.png'; 
		$star3 = 'star-white.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($rate == 1){
		$star1 = 'star.png'; 
		$star2 = 'star-white.png'; 
		$star3 = 'star-white.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($rate == 2){
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star-white.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($rate == 3){
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star.png'; 
		$star4 = 'star-white.png'; 
		$star5 = 'star-white.png'; 
	} else if($rate == 4){
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star.png'; 
		$star4 = 'star.png'; 
		$star5 = 'star-white.png'; 
	} else {
		$star1 = 'star.png'; 
		$star2 = 'star.png'; 
		$star3 = 'star.png'; 
		$star4 = 'star.png'; 
		$star5 = 'star.png'; 
	}
						
?>
					<img width="20px" height="20px" src="images/Search/<?php echo $star1; ?>"  alt="img" class="img-responsive flag-img">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star2; ?>" alt="img" class="img-responsive">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star3; ?>" alt="img" class="img-responsive">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star4; ?>" alt="img" class="img-responsive">
					<img width="20px" height="20px"  src="images/Search/<?php echo $star5; ?>" alt="img" class="img-responsive">
					
						
										<p class="review-count"><?php echo $totalreview; ?> reviews</p>
									</div>
								</div>
							</div>
						</div>
						

					<?php } ?>	
						
						
						
					</div>
				</div>
			</div>
			<section>
		<nav aria-label="Page navigation example " class=" text-center">
			<ul class="pagination">
				<li class="page-item">
					<a class="page-link" href='#'   aria-label="Previous">
						<span aria-hidden="true"> <img src="images/Search/left-arrow.png" alt="img" class="img-responsive "></span>
					</a>
				</li>
				<?php 
					for($i = 1;$i <= $page_count; $i++){
						if($i == $pageno ){
							
						echo "<li class='page-item'><a class='page-link active' href=''>$i</a></li>";
						} else {
							echo "<li class='page-item'><a class='page-link' href=''>$i</a></li>";
						}
					}
				?>
				
				
				<li class="page-item">
					<a class="page-link" href='#' aria-label="Next">
						<span aria-hidden="true"> <img src="images/Search/right-arrow.png" alt="img" class="img-responsive ">
						</span>
					</a>
				</li>
			</ul>
		</nav>
	</section>
