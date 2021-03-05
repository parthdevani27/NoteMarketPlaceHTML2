<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>
	<title>Buyer Requests</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/buyer-request-style.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-buyer-request.css">
</head>

<body>
<?php include "includes/navigation.php"; ?>
	
	<section id="my-download-notes">
		<div class="content-box-lg">
			<div class="container">
					<form action="" method="get">
				<div class="row">
					<div class="col-md-7 col-sm-5 col-12">
						<div class="progress-heading" class="text-left">
							<p>Buyer Requests</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-6">
						<div class="search-bar" class="text-right">
							<input type="text" class="form-control" name="search" id="validationDefault01" placeholder="     Search">

						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-6">
						<div class="search-btn">
							<button type="submit" name="searchbuyerreq" class="btn btn-block btn-general">SEARCH</button>
						</div>
					</div>
				</div>
					</form>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="progress-table">
							<table class="table  table-hover-1 table-responsive">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">NOTE TITLE</th>
										<th scope="col">CATEGORY</th>
										<th scope="col">BUYER</th>
										<th scope="col">PHONE NO.</th>
										<th scope="col">SELL TYPE</th>
										<th scope="col">PRICE</th>
										<th scope="col">DOENLOAD DATE/TIME</th>
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>
									<?php 
									//for pageination
									if(isset($_GET['search'])){
										 $search = $_GET['search'];
										$query = "SELECT * FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID  WHERE Sellernotes.Status=11 AND (Sellernotes.Title LIKE  '%$search%' OR notecategories.Name LIKE '%$search%' OR Sellernotes.SellingPrice LIKE '%$search%')";
									$buyer_request_page_query = mysqli_query($connection,$query);
									confirmq($buyer_request_page_query);
									$totallist = mysqli_num_rows($buyer_request_page_query);
									$pagination = ceil($totallist/10);
									$pageno=1;
									if(isset($_GET['pg_id'])){
										$pageno=$_GET['pg_id'];
										 $pageno_1 = ($pageno-1)*10;
									} else {
										$pageno_1=0;
									}
									}
									else {
									$query = "SELECT * FROM Sellernotes WHERE Status=11";
									$buyer_request_page_query = mysqli_query($connection,$query);
									confirmq($buyer_request_page_query);
									$totallist = mysqli_num_rows($buyer_request_page_query);
									$pagination = ceil($totallist/10);
									$pageno=1;
									if(isset($_GET['pg_id'])){
										$pageno=$_GET['pg_id'];
										 $pageno_1 = ($pageno-1)*10;
									} else {
										$pageno_1=0;
									}
									}

									
									?>
									<?php 
									if(isset($_GET['search'])){
										
									$search = $_GET['search'];
//									
										$query = "SELECT * FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID  WHERE Sellernotes.Status=11 AND (Sellernotes.Title LIKE  '%$search%' OR notecategories.Name LIKE '%$search%' OR Sellernotes.SellingPrice LIKE '%$search%' ) LIMIT  $pageno_1,10";
									}	else {
									$query = "SELECT * FROM Sellernotes WHERE Status=11 LIMIT $pageno_1,10"; }
									$buyer_request_query = mysqli_query($connection,$query);
									$nodata = mysqli_num_rows($buyer_request_query);
									if($nodata == 0){
										echo "<h3>No Record Found</h3>";
									}
									confirmq($buyer_request_query);
									$i=(($pageno-1)*10)+1;
									while($row = mysqli_fetch_assoc($buyer_request_query)){
										$title = $row['Title'];
										$categoryid = $row['Category'];
									$query = "SELECT * FROM notecategories WHERE ID=$categoryid";
									$fetch_catagory_query = mysqli_query($connection,$query);
									confirmq($fetch_catagory_query);
										$row1 = mysqli_fetch_assoc($fetch_catagory_query);
										$category = $row1['Name'];
										$selltype = $row['IsPaid'];
										if($selltype == 0){
											$selltype = "Free";
										} else {
											$selltype = "Paid";
										}
										$sellprice = $row['SellingPrice'];
										
							
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td class="add-color"><?php echo $title; ?></td>
										<td><?php echo $category; ?></td>
										<td>tast123@gmail.com</td>
										<td>+91 9282748367</td>
										<td><?php echo $selltype; ?></td>
										<td><?php echo "$".$sellprice; ?></td>
										<td>27 nov 2020,11:22:34</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="images/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
														<a href="#">Allow Download</a>
												</div>
											</div>
										</td>
									</tr> <?php  $i++; } ?>
<!--
									<tr>
										<td>3</td>
										<td class="add-color">Social Studies</td>
										<td>Social</td>
										<td>tast123@gmail.com</td>
										<td>+91 9282748367</td>
										<td>Paid</td>
										<td>$56</td>
										<td>27 nov 2020,11:22:34</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="images/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
														<a href="#">Allow Download</a>
												</div>
											</div>
										</td>
									</tr>
-->
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-12 text-center">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<a class="page-link" href="buyer-request-page.php?pg_id=<?php if($pageno==1){echo $pageno;} else {echo $pageno-1;} if(isset($_GET['search'])){
							$search = $_GET['search']; echo "&search=$search";}?>" aria-label="Previous">
										<span aria-hidden="true"> <img src="images/Search/left-arrow.png" alt="img" class="img-responsive "></span>
									</a>
								</li>
								<?php 
					for($i = 1;$i <= $pagination; $i++){
						if(isset($_GET['search'])){
							$search = $_GET['search'];
						if($i == $pageno){
							
						echo "<li class='page-item'><a class='page-link active' href='buyer-request-page.php?pg_id={$i}&search=$search'>$i</a></li>";
						} else {
							echo "<li class='page-item'><a  href='buyer-request-page.php?pg_id={$i}&search=$search'>$i</a></li>";
						}
						}
						else{
							if($i == $pageno){
							
						echo "<li class='page-item'><a class='page-link active' href='buyer-request-page.php?pg_id={$i}'>$i</a></li>";
						} else {
							echo "<li class='page-item'><a  href='buyer-request-page.php?pg_id={$i}'>$i</a></li>";
						}
						}
						
					}
				?>
								<li class="page-item">
									<a class="page-link" href="buyer-request-page.php?pg_id=<?php if($pageno==$pagination){echo $pageno;}else{echo $pageno+1;} if(isset($_GET['search'])){
							$search = $_GET['search']; echo "&search=$search";} ?>" aria-label="Next">
										<span aria-hidden="true"> <img src="images/Search/right-arrow.png" alt="img" class="img-responsive ">
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
	<?php include "includes/footer.php"; ?>