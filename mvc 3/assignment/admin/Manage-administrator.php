<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start();
if(isset($_SESSION['ID'])){
 		$superadmin = $_SESSION['ID'];
		$role = checkrole($superadmin);
		if($role == 1){
			
		} else if($role == 2) {
			if(checkAdminActive($superadmin)){
			redirect("dashboard.php");
			} else {
				header("Location: login-page.php");
			}
		} else {
			redirect("../front/search-page.php");
		}
}else 
{
	header("Location: login-page.php");
}
?>
<?php $page='manageadmin'; ?>
<?php
if(isset($_GET['ina'])){
	$inactive = $_GET['ina'];
	$query = "UPDATE `users` SET `ModifiedDate`=now(),`ModifiedBy`=$superadmin,`IsActive`=0  WHERE ID = $inactive";
	$inactive_admin_query = mysqli_query($connection,$query);
	confirmq($inactive_admin_query);
	redirect("Manage-administrator.php");
	
}
?>
	<title>Manage Administrator</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/Manage-administrator.css">
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
					<h4>Manage Administrator</h4>
				</div>
			</div>
				<div class="row">
					<div class="col-md-7 col-sm-12 col-12">

						<div class="progress-heading" class="text-left">
							<a href="add-administrator.php"><button type="button" class="btn btn-block btn-general">ADD ADMINISTRATOR</button></a>
						</div>
					</div>
					<div class="col-md-3 col-sm-5 col-5">

						<div class="search-bar manage-respo-bar" class="text-right">
							<input type="text" class="form-control searchbox" id="validationDefault01" placeholder="     Search">

						</div>

					</div>
					<div class="col-md-2 col-sm-7 col-7">
						<div class="search-btn manage-respo-btn">
							<button type="submit" class="btn btn-block btn-general searchbtn">SEARCH</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<div class="progress-table table-responsive">
							<table class="table  table-hover-1 ">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">FIRST NAME</th>
										<th scope="col">LAST NAME</th>
										<th scope="col">EMAIL</th>
										<th scope="col">PHONE NO.</th>
										<th scope="col">DATE ADDED</th>
										<th scope="col">ACTIVE</th>
										<th scope="col">ACTION</th>

									</tr>
								</thead>
								<tbody>
									
<?php
								
$query = "SELECT * FROM `users` WHERE RoleID = 2";
$manage_admin_query = mysqli_query($connection,$query);
confirmq($manage_admin_query);									
$sr_no = 0;
while($row = mysqli_fetch_assoc($manage_admin_query)){
	$FirstName 			= $row['FirstName'];
	$LastName 			= $row['LastName'];
	$Email 				= $row['Email'];
	$CreatedDate 		= $row['CreatedDate'];
	$CreatedBy 			= $row['CreatedBy'];
	$IsActive 			= $row['IsActive'];
	$ID		 			= $row['ID'];
	$phoneno			= tabledata('userprofile','Phonenumber','UserID',$ID);
	$sr_no 				= $sr_no + 1;
	if($IsActive){
		$a = 'Yes';
	} else {
		$a = 'No';
	}
?>
						
										
							<tr>
										<td><?php echo $sr_no; ?></td>
										<td><?php echo $FirstName; ?></td>
										<td><?php echo $LastName; ?></td>
										<td><?php echo $Email; ?></td>
										<td><?php echo $phoneno; ?></td>			
										<td><?php echo $CreatedDate; ?></td>
										<td><?php echo $a; ?></td>
										<td>
											<a href="add-administrator.php?edit=<?php echo $ID; ?>"><img src="img/assets/edit.png" alt="img" class="img-responsive"></a>&nbsp;&nbsp;
											<a onclick="return confirm('Are you sure you want to make this admin inactive?');" href="Manage-administrator.php?ina=<?php echo $ID; ?>"><img src="img/assets/delete.png" alt="img" class="img-responsive"></a>
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