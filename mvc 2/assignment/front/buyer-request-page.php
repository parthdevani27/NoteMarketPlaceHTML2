<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['ID'])){
	redirect();
}
if(isset($_GET['allowd'])){
	
	$updatenoteid = $_GET['allowd'];
	$buyer		 = $_GET['buyer'];
	
	
	 $filepath = tabledata('sellernotesattachements','FilePath','NoteID',$updatenoteid);
		
		
	$query = "UPDATE `downloads` SET `IsSellerHasAllowedDownload`=1,`AttachmentPath`='$filepath' 
	WHERE NoteID=$updatenoteid AND Downloader=$buyer";
	$run_query = mysqli_query($connection,$query);
	confirmq($run_query);
	redirect('buyer-request-page.php');

}
?>
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
				
				<div class="row">
					<div class="col-md-7 col-sm-5 col-12">
						<div class="progress-heading" class="text-left">
							<p>Buyer Requests</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-6">
						<div class="search-bar" class="text-right">
							<input type="text" class="form-control searchbox" name="search" id="validationDefault01" placeholder="     Search">

						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-6">
						<div class="search-btn">
							<button type="submit" name="searchbuyerreq" class="btn searchbtn btn-block btn-general">SEARCH</button>
						</div>
					</div>
				</div>
					
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="progress-table table-responsive">
							<table  class="table  table-hover-1">
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
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>


<?php 
$sellerid = $_SESSION['ID'];
$query = "SELECT * FROM downloads WHERE Seller=$sellerid AND IsSellerHasAllowedDownload=0"; 
$buyer_request_query = mysqli_query($connection,$query);
$nodata = mysqli_num_rows($buyer_request_query);
if($nodata == 0){
echo "<h3>No Record Found</h3>";
}
confirmq($buyer_request_query);
$i=0;
while($row = mysqli_fetch_assoc($buyer_request_query)){
$title 			= $row['NoteTitle'];
$noteid			= $row['NoteID'];
$category 		= $row['NoteCategory'];
$buyerid 		= $row['Downloader'];
$selltype 		= $row['IsPaid'];
$buyer 			= tabledata('users','Email','ID',$buyerid);
if($selltype == 0){
	$selltype 	= "Free";
} else {
	$selltype 	= "Paid";
}
$sellprice 		= $row['PurchasedPrice'];
$date 			= $row['CreatedDate'];
$i++;

?>
									<tr>
										<td><?php echo $i; ?></td>
										<td class="add-color"><?php echo $title; ?></td>
										<td><?php echo $category; ?></td>
										<td><?php echo $buyer; ?></td>
										<td>+91 9282748367</td>
										<td><?php echo $selltype; ?></td>
										<td><?php echo "$".$sellprice; ?></td>
										<td><?php echo $date; ?></td>
										<td><a href="note-details.php?noteid=<?php echo $noteid; ?>"><img src="images/Dashboard/eye.png" alt="img" class="img-responsive"></a></td>	
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="images/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
														<a href="buyer-request-page.php?allowd=<?php echo $noteid; ?>&buyer=<?php echo $buyerid; ?>">Allow Download</a>
												</div>
											</div>
										</td>
										
										
									</tr> 
<?php   } ?>

								</tbody>
							</table>
						</div>
					</div>
		
				</div>

			</div>
			
		</div>
	</section>
	<?php include "includes/footer.php"; ?>