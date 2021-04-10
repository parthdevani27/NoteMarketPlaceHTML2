<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php $page='dashboard'; ?>
<?php
if(isset($_SESSION['ID'])){
	$userid = $_SESSION['ID']; 
} else {	
	redirect();
}
?>
<?php
if(isset($_GET['delete'])){
	$d_id=$_GET['delete'];
	
	$query = "DELETE  FROM sellernotesattachements WHERE NoteID=$d_id";
	$delete_draft_query=mysqli_query($connection,$query);
	confirmq($delete_draft_query);
	
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
							<a href="add-note-page.php"><button type="button" class="btn btn-block btn-general btn-add-note">ADD NOTE</button></a>
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
										<p><span class="data-style">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<?php $soldnote= totalcountwithdata('downloads','IsSellerHasAllowedDownload',1,'Seller'); ?>
										<a class='add-color' href='soldnotes.php'><?php echo $soldnote; ?></a>	</span></p>
										<p class="data-style-1">Number of Notes Sold</p>
									</div>
									<div class="right-side-r text-right">
										<p><span class="data-style"> 
<?php 
$userid = $_SESSION['ID'];
$query = "SELECT SUM(PurchasedPrice) AS TotalEarn FROM downloads WHERE Seller=$userid AND IsSellerHasAllowedDownload=1";
$total_earning_query=mysqli_query($connection,$query);
confirmq($total_earning_query);
$row = mysqli_fetch_assoc($total_earning_query);											
$total_earning = $row['TotalEarn'];
if(empty($total_earning)){$total_earning=0;}											
?>
				<a class='add-color' href='soldnotes.php'><?php echo "$".$total_earning; ?></a>							
											</span></p>
										<p class="data-style-1">Money Earned</p>
									</div>
								</div>
								
								<div id="box-3">
									<p><span class="data-style">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php $downloadsnote= totalcountwithdata('downloads','IsSellerHasAllowedDownload',1,'Downloader'); ?>
									<a class='add-color' href='downloads.php'><?php echo $downloadsnote; ?></a>			
									</span></p>
									<p class="data-style-1">My Downloads</p>
								</div>
							
							
								<div id="box-4">
									<p><span class="data-style">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									
			
									<a class='add-color' href='rejected_notes.php'>
									<?php echo totalcountwithdata('Sellernotes','Status',12); ?></a>
									
									</span></p>
									<p class="data-style-1">My Rejected &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notes</p>
								</div>
							
							
								<div id="box-5">
									<p><span class="data-style">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a class='add-color' href='buyer-request-page.php'>
									<?php echo totalcountwithdata('downloads','IsSellerHasAllowedDownload',0,'Seller'); ?>
									</a>
									</span></p>
									<p class="data-style-1">Buyer Request</p>
								</div>
							
							
							</div>
							</div>
						</div>

					</div>
					<div id="progress-notes">
					
						<div class="row">
							<div class="col-md-7 col-sm-5 col-12">
								<div class="progress-heading" class="text-left">
									<p>In Progress Notes</p>
								</div>
							</div>
					<div class="col-md-3 col-sm-4 col-6">
								<div class="search-bar" class="text-right">
									<input type="text" name="search" class="searchbox form-control" id="validationDefault01" placeholder="     Search">

								</div>
							</div>
							<div class="col-md-2 col-sm-3 col-3">
								<div class="search-btn">
									<button type="submit"  class="btn searchbtn btn-block btn-general">SEARCH</button>
								</div>
							</div>
						</div>
					
						<div class="row">
								<div class="col-md-12 col-sm-12 col-12">
						<div class="progress-table  table-responsive">
							<table id="dashboardtable" class="table table-bordered table-hover-1">
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
							


<?php 
$userid = $_SESSION['ID'];
$query = "SELECT Sellernotes.ID AS noteid ,Sellernotes.SellerID,Sellernotes.Status,Sellernotes.Title,Sellernotes.Category,Sellernotes.PublishedDate,Sellernotes.NoteType,Sellernotes.SellingPrice,Sellernotes.IsPaid,referencedata.Value,notecategories.Name
FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON Sellernotes.Status=referencedata.ID WHERE (Sellernotes.Status=10 OR Sellernotes.Status=9 OR Sellernotes.Status=8)  AND Sellernotes.SellerID = $userid"; 
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
	$n_id = $row['noteid'];
	




?>
				
									<tr>
										<td><?php echo $publisheddate ?></td>
										<td><?php echo $title; ?></td>
										<td><?php echo $category; ?></td>
										<td><?php echo $Status ?></td>
										<?php 
										if($Status == 'Draft'){ ?>
											<td>&nbsp;&nbsp;&nbsp;<a href='edit-note-page.php?editnote=<?php echo $n_id; ?>'><img src='images/Dashboard/edit.png' alt='img' class='img-responsive editnotes'></a>&nbsp;&nbsp;
											<a onclick='return confirm("Are you sure you want to delete this note?")' href='Dashboard Page.php?delete=<?php echo $n_id; ?>'><img src='images/Dashboard/delete.png' alt='img' class='img-responsive deletenotes'></a>
										</td>;
										<?php } else {
											
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
					</div>	
					<div id="published-notes" >
						
							<div class="row">
							<div class="col-md-7 col-sm-5 col-12">
								<div class="progress-heading" class="text-left">
									<p>Published Notes</p>
								</div>
							</div>
							<div class="col-md-3 col-sm-4 col-5">
								<div class="search-bar" class="text-right">
									<input type="text" name="search1" class="searchbox-2 form-control" id="validationDefault01" placeholder="     Search">

								</div>
							</div>
							<div class="col-md-2 col-sm-3 col-3">
								<div class="search-btn">
									<button type="submit"  class="btn searchbtn-2 btn-block btn-general">SEARCH</button>
								</div>
							</div>
						</div>
						
							<div class="row">
								<div class="col-md-12 col-sm-12 col-12">
						<div class="progress-table">
							<table id="dashboardtable-2" class="table table-bordered table-hover-1">
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
<?php 

$query = "SELECT  Sellernotes.ID AS noteid ,Sellernotes.SellerID,Sellernotes.Status,Sellernotes.Title,Sellernotes.Category,Sellernotes.PublishedDate,Sellernotes.NoteType,Sellernotes.SellingPrice,Sellernotes.IsPaid,referencedata.Value,notecategories.Name FROM Sellernotes LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON Sellernotes.Status=referencedata.ID WHERE Sellernotes.Status=11 AND Sellernotes.SellerID = $userid"; 
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

	$n_id = $row['noteid'];


?>
									
								
								

									<tr>
										<td><?php echo $publisheddate; ?></td>
										<td><?php echo $title; ?></td>
										<td><?php echo $category; ?></td>
										<td><?php echo $selltype; ?></td>
										<td><?php echo "$".$sellprice; ?></td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='note-details.php?noteid=<?php echo $n_id; ?>'><img src='images/Dashboard/eye.png' alt='img' class='img-responsive viewnotes'></a></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
								</div>
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
	<script src="js/datatables.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!-- link js file-->
	<script>
	
	function sticky_header() {
    var header_height = jQuery('.site-header').innerHeight() / 2;
    var scrollTop = jQuery(window).scrollTop();;
    if (scrollTop > header_height) {
        jQuery('body').addClass('sticky-header');
    } else {
        jQuery('body').addClass('sticky-header');
    }
}

jQuery(document).ready(function () {
  sticky_header();
});

$(document).ready( function () {


	var table = $('#dashboardtable').DataTable({
		'sDom' : '"top"i',
		"iDisplayLength":5,
		 info: false,
		language:{
			paginate:{
				next:'<img src="images/Search/right-arrow.png">',
				previous:'<img src="images/Search/left-arrow.png">'
			}
		}
	});
	$('.searchbtn').click(function(){
		var a = $(".searchbox").val();
		table.search(a).draw();
	});
	var table2 = $('#dashboardtable-2').DataTable({
		'sDom' : '"top"i',
		"iDisplayLength":5,
		 info: false,
		language:{
			paginate:{
				next:'<img src="images/Search/right-arrow.png">',
				previous:'<img src="images/Search/left-arrow.png">'
			}
		}
	});
	
	$('.searchbtn-2').click(function(){
		var a = $(".searchbox-2").val();
		table2.search(a).draw();
	});
	
	
});


	
	
	
	
	
	</script>
	
</body></html>