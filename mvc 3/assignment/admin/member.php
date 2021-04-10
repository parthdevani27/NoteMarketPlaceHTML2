<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='member'; ?>
<?php
if(isset($_GET['deactivate'])){
	$deactivate = $_GET['deactivate'];
	
	$query = "UPDATE `users` SET `IsActive`=0 WHERE ID=$deactivate ";
	$deactivate_user_query = mysqli_query($connection,$query);
	confirmq($deactivate_user_query);
	
	$query = "UPDATE `sellernotes` SET `Status`=13 WHERE SellerID=$deactivate ";
	$deactivate_user_published_note_query = mysqli_query($connection,$query);
	confirmq($deactivate_user_published_note_query);
	redirect('member.php');
}
?>
	<title>Member</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/member.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<?php include "includes/navigation.php"; ?>
	<section id="dashboard-admin-2">
		<div class="content-box-lg">
			<div class="container">
		
				<div class="row">
		<div class="col-md-7 col-sm-12 col-12">

						<div class="progress-heading" class="text-left">
							<h4>Members</h4>
						</div>
					</div>
				<div class="col-md-3 col-sm-5 col-5">

						<div class="search-bar" class="text-right">
							<input type="text" class="form-control searchbox" id="validationDefault01" placeholder="     Search">

						</div>
					</div>
				<div class="col-md-2 col-sm-7 col-7">
						<div class="search-btn">
							<button type="submit" class="btn searchbtn btn-block btn-general">SEARCH</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<div class="progress-table table-responsive">
							<table class="table  table-hover-1">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">FIRST NAME</th>
										<th scope="col">LAST NAME</th>
										<th scope="col">EMAIL</th>
										<th scope="col">JOINING DATE</th>
										<th scope="col">UNDER REVIEW</th>
										<th scope="col">PUBLISHED</th>
										<th scope="col">DOWNLOADED</th>
										<th scope="col">TOTAL EXPENSES</th>
										<th scope="col">TOTAL EARNING</th>
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>
<!--
									<tr>
										<td>1</td>
										<td>Rahul</td>
										<td>Patel</td>
										<td>rahul123@gmail.com</td>
													
										<td>27 nov 2020,11:22:34</td>
										<td class="add-color" >13</td>
										<td class="add-color" >13</td>
										<td class="add-color" >13</td>
										<td class="add-color">$313</td>
										<td>$13</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content setwidth">
													<a href="#">View More Details</a>
													<a href="#">Deactivate</a>
													
												</div>
											</div>
									
										</td>
									</tr>
									
-->
<?php
								
$query = "SELECT * FROM `users` WHERE RoleID = 3 AND IsActive=1 ";
$query .= "ORDER BY ID DESC";
$member_query = mysqli_query($connection,$query);
confirmq($member_query);									
$sr_no = 0;
while($row = mysqli_fetch_assoc($member_query)){
	$FirstName		= $row['FirstName'];
	$LastName 		= $row['LastName'];
	$ID 			= $row['ID'];
	$Email			= $row['Email'];
	$CreatedDate 	= $row['CreatedDate'];
	$sr_no 			= $sr_no + 1;
	$totaldownload 		= totalcountwithdata2('downloads','IsAttachmentDownloaded',1,'Downloader',$ID);
	$totalinreview 		= totalcountwithdata2('sellernotes','Status',10,'SellerID',$ID)+
						  totalcountwithdata2('sellernotes','Status',9,'SellerID',$ID);
	$totalpublished 	= totalcountwithdata2('sellernotes','Status',11,'SellerID',$ID);

	$query = "SELECT sum(PurchasedPrice) AS totalexpence FROM `downloads` WHERE IsAttachmentDownloaded=1 AND Downloader=$ID ";
	$totalexpence_query = mysqli_query($connection,$query);
	confirmq($totalexpence_query);
	$row = mysqli_fetch_assoc($totalexpence_query);
	$totalexpence = $row['totalexpence'];
	if(empty($totalexpence)){
		$totalexpence = 0;
	}
	$query = "SELECT sum(PurchasedPrice) AS totalearn FROM `downloads` WHERE IsAttachmentDownloaded=1 AND Seller=$ID ";
	$totalearn_query = mysqli_query($connection,$query);
	confirmq($totalearn_query);
	$row = mysqli_fetch_assoc($totalearn_query);
	$totalearn = $row['totalearn'];
		if(empty($totalearn)){
		$totalearn = 0;
	}
	
?>	

								
							<tr>
										<td><?php echo $sr_no; ?></td>
										<td><?php echo $FirstName; ?></td>
										<td><?php echo $LastName; ?></td>
										<td><?php echo $Email; ?></td>				
										<td><?php echo $CreatedDate; ?></td>
										<td><a class="add-color"  href="note-under-review.php?uinreview=<?php echo $ID; ?>"><?php echo $totalinreview; ?></a></td>
										<td><a class="add-color"  href="Published-notes.php?upublish=<?php echo $ID; ?>"><?php echo $totalpublished; ?></a></td>
										<td><a class="add-color"  href="download-notes.php?udownload=<?php echo $ID; ?>"><?php echo $totaldownload; ?></a></td>
										<td><a class="add-color"  href="download-notes.php?udownload=<?php echo $ID; ?>">$<?php echo $totalexpence; ?></a></td>
										<td>$<?php echo $totalearn; ?></td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content setwidth">
													<a href="member-detail.php?member=<?php echo $ID; ?>">View More Details</a>
													<a onclick="return confirm('Are you sure you want to make this user inactive?');" href="member.php?deactivate=<?php echo $ID; ?>">Deactivate</a>
													
												</div>
											</div>
									
										</td>
									</tr>
																		
																																
<?php } ?>									

								</tbody>
							</table>
						</div>
					</div>
					
				</div>

			</div>
		</div>
	</section>
<?php include "includes/footer.php"; ?>