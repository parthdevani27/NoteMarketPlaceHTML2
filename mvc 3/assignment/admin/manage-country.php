<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='managecountry'; ?>
<?php
if(isset($_GET['delete'])){
	$d_id = $_GET['delete'];
	$query = "UPDATE `countries` SET `ModifiedDate`=now(),`ModifiedBy`=$adminid,`IsActive`=0 WHERE ID = $d_id ";
	$inactive_country_query = mysqli_query($connection,$query);
	confirmq($inactive_country_query);
	redirect("manage-country.php");

}
?>
	<title>Manage Country</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/manage-country.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<?php include "includes/navigation.php" ?>
	<section id="dashboard-admin-2">
		<div class="content-box-lg">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-12">
					<h4>Manage Country</h4>
				</div>
			</div>
				<div class="row">
					<div class="col-md-7 col-sm-12 col-12">

						<div class="progress-heading" class="text-left">
							<a href="add-country.php"><button type="button" class="btn btn-block btn-general">ADD Country</button></a>
						</div>
					</div>
					<div class="col-md-3 col-sm-5 col-5">

						<div class="search-bar" class="text-right">
							<input type="text" class="form-control searchbox" id="validationDefault01" placeholder="     Search">

						</div>
					</div>
			<div class="col-md-2 col-sm-7 col-7">
						<div class="search-btn">
							<button type="submit" class="btn btn-block btn-general searchbtn">SEARCH</button>
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
										<th scope="col">COUNTRY NAME</th>
										<th scope="col">COUNTRY CODE</th>
										<th scope="col">DATE ADDED</th>
										<th scope="col">ADDED BY</th>
										<th scope="col">ACTIVE</th>
										<th scope="col">ACTION</th>

									</tr>
								</thead>
								<tbody>
						
<?php
								
$query = "SELECT * FROM `countries`";
$manage_country_query = mysqli_query($connection,$query);
confirmq($manage_country_query);									
$sr_no = 0;
while($row = mysqli_fetch_assoc($manage_country_query)){
	$code 			= $row['phonecode'];
	$Name 			= $row['Name'];
	$ID 			= $row['ID'];
	$CreatedDate 	= $row['CreatedDate'];
	$CreatedBy 		= $row['CreatedBy'];
	$IsActive 		= $row['IsActive'];
	$firstname 		= tabledata('users','FirstName','id',$CreatedBy);
	$lastname 		= tabledata('users','LastName','id',$CreatedBy);
	$sr_no 			= $sr_no + 1;
	if($IsActive){
		$a = 'Yes';
	} else {
		$a = 'No';
	}
?>
									
									
				<tr>
						<td><?php echo $sr_no; ?></td>
						<td><?php echo $Name; ?></td>

						<td><?php echo $code; ?></td>				
						<td><?php echo $CreatedDate; ?></td>
						<td><?php echo $firstname ." ". $lastname ; ?></td>
						<td><?php echo $a; ?></td>
						<td>
							<a href="add-country.php?edit=<?php echo $ID; ?>"><img src="img/assets/edit.png" alt="img" class="img-responsive"></a>&nbsp;&nbsp;
							<a onclick="return confirm('Are you sure you want to make this country inactive?');" class="confirmDelete" href="manage-country.php?delete=<?php echo $ID; ?>"><img src="img/assets/delete.png" alt="img" class="img-responsive"></a>
						
							
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
<?php include "includes/footer.php" ?>