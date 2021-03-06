<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_GET['delete'])){
	$d_id=$_GET['delete'];
	$query = "DELETE  FROM Sellernotes WHERE ID=$d_id";
	$delete_draft_query=mysqli_query($connection,$query);
	confirmq($delete_draft_query);
}
?>
	<title>Dashboard</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/Dashboard%20Page-style.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-deshboard.css">
</head>

<body>
<?php include "includes/navigation.php" ?>
	
	<section id="dashboard-page">
		<div class="content-box-md">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<div id="dashboard-heading">
							<h4>Dashboard</h4>
							<button type="button" class="btn btn-block btn-general btn-add-note">ADD NOTE</button>
						</div>
					</div>
					<div class=" col-md-12 col-sm-12 col-12">
						<div id="dashboard-earning-details">
							<div id="earning-box">
							
								<div id="box-1">
									<img src="images/Dashboard/earning-icon.svg" alt="img" class="img-responsive">
									<p>My Earning</p>
								</div>
							
								<div id="box-2">
									<div class="left-side-l text-left">
										<p><span class="data-style">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;100</span></p>
										<p class="data-style-1">Number of Notes Sold</p>
									</div>
									<div class="right-side-r text-right">
										<p><span class="data-style"> $10,00,000</span></p>
										<p class="data-style-1">Money Earned</p>
									</div>
								</div>
								
								<div id="box-3">
									<p><span class="data-style">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;38</span></p>
									<p class="data-style-1">My Downloads</p>
								</div>
							
							
								<div id="box-4">
									<p><span class="data-style">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12</span></p>
									<p class="data-style-1">My Rejected &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notes</p>
								</div>
							
							
								<div id="box-5">
									<p><span class="data-style">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;102</span></p>
									<p class="data-style-1">Buyer Request</p>
								</div>
							
							
							</div>
							</div>
						</div>

					</div>
					<div id="progress-notes">
					<form action="" method="get">
						<div class="row">
							<div class="col-md-7 col-sm-5 col-12">
								<div class="progress-heading" class="text-left">
									<p>In Progress Notes</p>
								</div>
							</div>
					<div class="col-md-3 col-sm-4 col-6">
								<div class="search-bar" class="text-right">
									<input type="text" name="search" class="form-control" id="validationDefault01" placeholder="     Search">

								</div>
							</div>
							<div class="col-md-2 col-sm-3 col-3">
								<div class="search-btn">
									<button type="submit" class="btn btn-block btn-general">SEARCH</button>
								</div>
							</div>
						</div>
						</form>
						<div class="row">
								<div class="col-md-12 col-sm-12 col-12">
						<div class="progress-table">
							<table class="table table-bordered table-hover-1 table-responsive-md">
								<thead>
									<tr>
										<th scope="col">ADDED DATE</th>
										<th scope="col">TITLE</th>
										<th scope="col">CTEGORY</th>
										<th scope="col">STATUS</th>
										<th scope="col">ACTION</th>
									</tr>
								</thead>
								<tbody>
<!--
									<tr>
										<td>09-10-2020</td>
										<td>Data Science</td>
										<td>Science</td>
										<td>Draft</td>
										<td>&nbsp;&nbsp;&nbsp;<img src="images/Dashboard/edit.png" alt="img" class="img-responsive">&nbsp;&nbsp;
											<img src="images/Dashboard/delete.png" alt="img" class="img-responsive">
										</td>

									</tr>
-->
								

		<?php 
//for pageination
	$limit=5;
if(isset($_GET['search'])){
	 $search = $_GET['search'];
	$query = "SELECT * FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON Sellernotes.Status=referencedata.ID WHERE Sellernotes.Status!=11 AND (Sellernotes.Title LIKE  '%$search%' OR notecategories.Name LIKE '%$search%' OR Sellernotes.SellingPrice LIKE '%$search%' OR referencedata.Value LIKE '%$search%') ";
$buyer_request_page_query = mysqli_query($connection,$query);
confirmq($buyer_request_page_query);
$totallist = mysqli_num_rows($buyer_request_page_query);
$pagination = ceil($totallist/$limit);
$pageno=1;
if(isset($_GET['pg_id'])){
	$pageno=$_GET['pg_id'];
	 $pageno_1 = ($pageno-1)*$limit;
} else {
	$pageno_1=0;
}
}
else {
$query = "SELECT * FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID  WHERE Sellernotes.Status!=11 ";
$buyer_request_page_query = mysqli_query($connection,$query);
confirmq($buyer_request_page_query);
$totallist = mysqli_num_rows($buyer_request_page_query);
$pagination = ceil($totallist/$limit);
$pageno=1;
if(isset($_GET['pg_id'])){
	$pageno=$_GET['pg_id'];
	 $pageno_1 = ($pageno-1)*$limit;
} else {
	$pageno_1=0;
}
}
	

?>
<?php 
if(isset($_GET['search'])){

$search = $_GET['search'];
//									
	$query = "SELECT * FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON Sellernotes.Status=referencedata.ID WHERE Sellernotes.Status!=11 AND (Sellernotes.Title LIKE  '%$search%' OR notecategories.Name LIKE '%$search%' OR Sellernotes.SellingPrice LIKE '%$search%' OR referencedata.Value LIKE '%$search%')  LIMIT  $pageno_1,$limit";
}	else {
$query = "SELECT * FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON Sellernotes.Status=referencedata.ID WHERE Sellernotes.Status!=11  LIMIT $pageno_1,$limit"; }
$buyer_request_query = mysqli_query($connection,$query);
$nodata = mysqli_num_rows($buyer_request_query);
if($nodata == 0){
	echo "<h3>No Record Found</h3>";
}
confirmq($buyer_request_query);

while($row = mysqli_fetch_assoc($buyer_request_query)){
	$title = $row['Title'];
	$categoryid = $row['Category'];
	$publisheddate = $row['PublishedDate'];
	$category = $row['Name'];
	$Status = $row['Value'];
	$query = "SELECT ID FROM Sellernotes WHERE Title='$title' AND Category='$categoryid' AND PublishedDate='$publisheddate'";
	$note_id_query = mysqli_query($connection,$query);
	confirmq($note_id_query);
	$row = mysqli_fetch_assoc($note_id_query);
	$n_id = $row['ID'];
	




?>
				
									<tr>
										<td><?php echo $publisheddate ?></td>
										<td><?php echo $title; ?></td>
										<td><?php echo $category; ?></td>
										<td><?php echo $Status ?></td>
										<?php 
										if($Status == 'Draft'){
											echo "<td>&nbsp;&nbsp;&nbsp;<a href='edit-note-page.php?editnote=$n_id'><img src='images/Dashboard/edit.png' alt='img' class='img-responsive editnotes'></a>&nbsp;&nbsp;
											<a href='Dashboard Page.php?delete=$n_id'><img src='images/Dashboard/delete.png' alt='img' class='img-responsive deletenotes'></a>
										</td>";
										} else {
											
										echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='note-details.php?noteid=$n_id'><img src='images/Dashboard/eye.png' alt='img' class='img-responsive viewnotes'></a></td>";
										}
										?>
									</tr> 
									<?php } ?>
								</tbody>
								
							</table>
						</div>
							</div>
						</div>
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<a class="page-link" href="Dashboard page.php?pg_id=<?php if($pageno==1){echo $pageno;} else {echo $pageno-1;} if(isset($_GET['search'])){
							$search = $_GET['search']; echo "&search=$search";}?>" aria-label="Previous">
										<span aria-hidden="true"> <img src="images/Search/left-arrow.png" alt="img" class="img-responsive "></span>
									</a>
								</li>
								<?php 
					for($i = 1;$i <= $pagination; $i++){
						if(isset($_GET['search'])){
							$search = $_GET['search'];
						if($i == $pageno){
							
						echo "<li class='page-item'><a class='page-link active' href='Dashboard page.php?pg_id={$i}&search=$search'>$i</a></li>";
						} else {
							echo "<li class='page-item'><a  href='Dashboard page.php?pg_id={$i}&search=$search'>$i</a></li>";
						}
						}
						else{
							if($i == $pageno){
							
						echo "<li class='page-item'><a class='page-link active' href='Dashboard page.php?pg_id={$i}'>$i</a></li>";
						} else {
							echo "<li class='page-item'><a  href='Dashboard page.php?pg_id={$i}'>$i</a></li>";
						}
						}
						
					}
				?>
								<li class="page-item">
									<a class="page-link" href="Dashboard page.php?pg_id=<?php if($pageno==$pagination){echo $pageno;}else{echo $pageno+1;} if(isset($_GET['search'])){
							$search = $_GET['search']; echo "&search=$search";} ?>" aria-label="Next">
										<span aria-hidden="true"> <img src="images/Search/right-arrow.png" alt="img" class="img-responsive ">
										</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>	
					<div id="published-notes" >
						<form action="" method="get">
							<div class="row">
							<div class="col-md-7 col-sm-5 col-12">
								<div class="progress-heading" class="text-left">
									<p>Published Notes</p>
								</div>
							</div>
							<div class="col-md-3 col-sm-4 col-5">
								<div class="search-bar" class="text-right">
									<input type="text" name="search1" class="form-control" id="validationDefault01" placeholder="     Search">

								</div>
							</div>
							<div class="col-md-2 col-sm-3 col-3">
								<div class="search-btn">
									<button type="submit" name="submit1" class="btn btn-block btn-general">SEARCH</button>
								</div>
							</div>
						</div>
						</form>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-12">
						<div class="progress-table">
							<table class="table table-bordered table-hover-1">
								<thead>
									<tr>
										<th scope="col">ADDED DATE</th>
										<th scope="col">TITLE</th>
										<th scope="col">CTEGORY</th>
										<th scope="col">SELL TYPE</th>
										<th scope="col">PRICE</th>
										<th scope="col">ACTION</th>
									</tr>
								</thead>
								<tbody>
<!--
									<tr>
										<td>09-10-2020</td>
										<td>Data Science</td>
										<td>Science</td>
										<td>PAID</td>
										<td>$575</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/Dashboard/eye.png" alt="img" class="img-responsive">
										</td>

									</tr>
-->
		<?php 
//for pageination
	$limit=5;
if(isset($_GET['search1'])){
	 $search1 = $_GET['search1'];
	$query = "SELECT * FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID  WHERE Sellernotes.Status=11 AND (Sellernotes.Title LIKE  '%$search1%' OR notecategories.Name LIKE '%$search1%' OR Sellernotes.SellingPrice LIKE '%$search1%') ";
$buyer_request_page_query = mysqli_query($connection,$query);
confirmq($buyer_request_page_query);
$totallist = mysqli_num_rows($buyer_request_page_query);
$pagination = ceil($totallist/$limit);
$pageno=1;
if(isset($_GET['pg_id1'])){
	$pageno=$_GET['pg_id1'];
	 $pageno_1 = ($pageno-1)*$limit;
} else {
	$pageno_1=0;
}
}
else {
$query = "SELECT * FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID  WHERE Sellernotes.Status=11 ";
$buyer_request_page_query = mysqli_query($connection,$query);
confirmq($buyer_request_page_query);
$totallist = mysqli_num_rows($buyer_request_page_query);
$pagination = ceil($totallist/$limit);
$pageno=1;
if(isset($_GET['pg_id1'])){
	$pageno=$_GET['pg_id1'];
	 $pageno_1 = ($pageno-1)*$limit;
} else {
	$pageno_1=0;
}
}
	

?>
<?php 
if(isset($_GET['search1'])){

$search1 = $_GET['search1'];
//									
	$query = "SELECT * FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID  WHERE Sellernotes.Status=11 AND (Sellernotes.Title LIKE  '%$search1%' OR notecategories.Name LIKE '%$search1%' OR Sellernotes.SellingPrice LIKE '%$search1%')  LIMIT  $pageno_1,$limit";
}	else {
$query = "SELECT * FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON Sellernotes.Status=referencedata.ID WHERE Sellernotes.Status=11  LIMIT $pageno_1,$limit"; }
$buyer_request_query = mysqli_query($connection,$query);
$nodata = mysqli_num_rows($buyer_request_query);
if($nodata == 0){
	echo "<h3>No Record Found</h3>";
}
confirmq($buyer_request_query);

while($row = mysqli_fetch_assoc($buyer_request_query)){
	$title = $row['Title'];
	$categoryid = $row['Category'];
	$publisheddate = $row['PublishedDate'];
	$category = $row['Name'];
	
		$selltype = $row['IsPaid'];
		if($selltype == 0){
			$selltype = "Free";
		} else {
			$selltype = "Paid";
		}
		$sellprice = $row['SellingPrice'];




?>
									
								
								

									<tr>
										<td><?php echo $publisheddate; ?></td>
										<td><?php echo $title; ?></td>
										<td><?php echo $category; ?></td>
										<td><?php echo $selltype; ?></td>
										<td><?php echo "$".$sellprice; ?></td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/Dashboard/eye.png" alt="img" class="img-responsive"></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
								</div>
						</div>
							<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<a class="page-link" href="Dashboard page.php?pg_id1=<?php if($pageno==1){echo $pageno;} else {echo $pageno-1;} if(isset($_GET['search1'])){
							$search1 = $_GET['search1']; echo "&search1=$search1";}?>" aria-label="Previous">
										<span aria-hidden="true"> <img src="images/Search/left-arrow.png" alt="img" class="img-responsive "></span>
									</a>
								</li>
								<?php 
					for($i = 1;$i <= $pagination; $i++){
						if(isset($_GET['search1'])){
							$search1 = $_GET['search1'];
						if($i == $pageno){
							
						echo "<li class='page-item'><a class='page-link active' href='Dashboard page.php?pg_id1={$i}&search1=$search1'>$i</a></li>";
						} else {
							echo "<li class='page-item'><a  href='Dashboard page.php?pg_id1={$i}&search1=$search1'>$i</a></li>";
						}
						}
						else{
							if($i == $pageno){
							
						echo "<li class='page-item'><a class='page-link active' href='Dashboard page.php?pg_id1={$i}'>$i</a></li>";
						} else {
							echo "<li class='page-item'><a  href='Dashboard page.php?pg_id1={$i}'>$i</a></li>";
						}
						}
						
					}
				?>
								<li class="page-item">
									<a class="page-link" href="Dashboard page.php?pg_id1=<?php if($pageno==$pagination){echo $pageno;}else{echo $pageno+1;} if(isset($_GET['search1'])){
							$search1 = $_GET['search1']; echo "&search1=$search1";} ?>" aria-label="Next">
										<span aria-hidden="true"> <img src="images/Search/right-arrow.png" alt="img" class="img-responsive ">
										</span>
									</a>
								</li>
							</ul>
						</nav>
					
					</div>
				
			</div>
		</div>
	</section>
		<?php include "includes/footer.php" ?>