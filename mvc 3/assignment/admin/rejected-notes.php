<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='rejected'; ?>
<?php
if(isset($_GET['approve'])){
	$approveid = $_GET['approve'];
	$query = "UPDATE `sellernotes` SET `Status`=9,`ModifiedDate`=now(),`ModifiedBy`=$adminid,`IsActive`=1 WHERE ID=$approveid";
	$approve_note_query = mysqli_query($connection,$query);
	confirmq($approve_note_query);
	redirect("rejected-notes.php");
}
?>
<?php
if(isset($_GET['download'])){
	$downloadnoteid = $_GET['download'];
	$attachmentdownload = 0;
	$query = "SELECT * FROM sellernotesattachements WHERE NoteID=$downloadnoteid ";
	$download_path_query = mysqli_query($connection,$query);
	confirmq($download_path_query);
	$countattachement = mysqli_num_rows($download_path_query);
	if($countattachement > 1){
	$bookfiles = [];
	while($row = mysqli_fetch_assoc($download_path_query)){
		 $filepth = $row['FilePath'];
		 $filepth ="../front/$filepth";
		if(!file_exists($filepth)){
			echo '<script>alert("file not found")</script>';
		} else {
			array_push($bookfiles,$filepth);
			}
		}
			

		$zipname = time().".zip";
		$zip = new ZipArchive;
		$zip->open($zipname,ZipArchive::CREATE | ZipArchive::OVERWRITE);
		foreach($bookfiles as $file){
		$zip->addFile($file,basename($file));
			}
	$zip->close();
	header('Content-type: aplication/zip');
	header('Content-Disposition: attachment;filename='.$zipname);
	readfile($zipname);
	unlink($zipname);
	redirect("rejected-notes.php");
		
		
		
		
		
	} else if($countattachement == 1){
		$row = mysqli_fetch_assoc($download_path_query);
		  $filepth = $row['FilePath'];
		  $filepth ="../front/$filepth";
		  $filename = $row['FileName'];
			if(!file_exists($filepth)){
			echo '<script>alert("file not found")</script>';
		} else {
	
			$ext = pathinfo($filename, PATHINFO_EXTENSION);	
			echo $filename = time().".$ext";	
			header("Content-Type: application/octet-stream");
			header('Content-Disposition: attachment;filename='.$filename);
			readfile($filepth);	
			redirect("rejected-notes.php");
		 }
		
	} 
	else {
		echo '<script>alert("file not found");
				window.location.href="rejected-notes.php";
			  </script>';	
	} 
}
?>
	<title>Rejected Notes</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/rejected-notes.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
 <?php include "includes/navigation.php"; ?>
	<section id="dashboard-admin-2">
		<div class="content-box-lg">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-12">
					<h4>Rejected Notes</h4>
				</div>
			</div>
				<div class="row">
					<div class="col-md-7 col-sm-12 col-12">

						<div class="progress-heading" class="text-left">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
							<div class="remove-margin">
								<label>Seller</label>
								</div>
							</div>
								<div class="col-md-12 col-sm-12 col-12">
		<form id="downloadfilter" action="" method="post">					
								<select name="selectSeller" class="custom-select" >
									<option value="">Select seller</option>
<?php
	$query = "SELECT DISTINCT SellerID FROM sellernotes WHERE Status	= 12  ";
	$seller_dropdown_query = mysqli_query($connection ,$query);
	confirmq($seller_dropdown_query);
	while($row =mysqli_fetch_assoc($seller_dropdown_query)){
	$sellerid_db = $row['SellerID'];	
		$firstnameseller 		= tabledata('users','FirstName','id',$sellerid_db);
		$lastnameseller 		= tabledata('users','LastName','id',$sellerid_db);
	if($sellerid_db != '' && $firstnameseller != '' && $lastnameseller != ''){
			if(isset($_POST['selectSeller'])){
			$seller_value = $_POST['selectSeller'];
			if($sellerid_db == $seller_value){
				
			echo "<option value='$sellerid_db' selected>$firstnameseller $lastnameseller</option>";
			} else {
				echo "<option value='$sellerid_db'>$firstnameseller $lastnameseller</option>";
			}
			
		} else {
		echo "<option value='$sellerid_db'>$firstnameseller $lastnameseller</option>";
		}
	}	
	}
?>	
								</select>
				</form>
							</div>
							</div>
						</div>
					</div>
						
				<div class="col-md-3 col-sm-5 col-5">

						<div class="search-bar text-right">
							<input type="text" class="form-control searchbox" id="validationDefault01" placeholder="     Search">

						</div>
					</div>
				<div class="col-md-2 col-sm-7 col-7">
						<div class="search-btn">
							<button type="submit" class="btn searchbtn btn-block btn-general btn-search">SEARCH</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<div class="progress-table  table-responsive">
							<table class="table  table-hover-1">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">NOTE TITLE</th>
										<th scope="col">CATEGORY</th>
										<th scope="col">SELLER</th>
									
										<th scope="col">DATE ADDED</th>
										<th scope="col">REJECTED BY</th>
										<th scope="col">REMARK</th>
										
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>
<!--
									<tr>
										<td>1</td>
									
										<td class="add-color">Software</td>
										<td>IT</td>
										<td>Parth Patel&nbsp;&nbsp;&nbsp;<img src="img/assets/eye.png" alt="img" class="img-responsive"></td>
										<td>09-10-2020</td>
										<td>Rahul patel</td>
										<td>Lorem ipsum dolor sit amet</td>
									
										<td><div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content setwidth">
												<a href="#">Approve</a>
												<a href="#">Downloaded Noted</a>
												<a href="#">View More Details</a>
													
												</div>
											</div></td>
									
									</tr>
-->
<?php
								
$query = "SELECT * FROM `sellernotes` ";
$query .= "WHERE Status	= 12 ";

if(isset($_POST['selectSeller'])){
	 $f_seller = $_POST['selectSeller'];
	if(!empty($f_seller) && $f_seller != ''){
		$query .= "AND SellerID=$f_seller ";
	}
}
$query .= "ORDER BY ID DESC";
$rejected_notes_query = mysqli_query($connection,$query);
confirmq($rejected_notes_query);									
$sr_no = 0;
while($row = mysqli_fetch_assoc($rejected_notes_query)){
	$Title			= $row['Title'];
	$Category 		= $row['Category'];
	$ID 			= $row['ID'];
	$SellerID 		= $row['SellerID'];
	$ActionedBy 	= $row['ActionedBy'];
	$CreatedDate 	= $row['CreatedDate'];
	$AdminRemarks 	= $row['AdminRemarks'];
	$firstnameseller 		= tabledata('users','FirstName','id',$SellerID);
	$lastnameseller 		= tabledata('users','LastName','id',$SellerID);
	$actionbyfn 			= tabledata('users','FirstName','id',$ActionedBy);
	$actionbyln 			= tabledata('users','LastName','id',$ActionedBy);
	$Category_name	 		= tabledata('notecategories','Name','ID',$Category);
	$sr_no 			= $sr_no + 1;
?>
									
									
						<tr>
										<td><?php echo $sr_no; ?></td>
									
							<td><a class="add-color" href="note-details.php?noteid=<?php echo $ID; ?>"><?php echo $Title; ?></a></td>
										<td><?php echo $Category_name; ?></td>
							<td><?php echo $firstnameseller ." ". $lastnameseller ; ?>&nbsp;&nbsp;&nbsp;<a href="member-detail.php?member=<?php echo $SellerID; ?>"><img src="img/assets/eye.png" alt="img" class="img-responsive"></a></td>
										<td><?php echo $CreatedDate; ?></td>
										<td><?php echo $actionbyfn ." ". $actionbyln ; ?></td>
										<td><?php echo $AdminRemarks; ?></td>
									
										<td><div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content setwidth">
												<a onclick="return confirm('If you approve the notes-System will publish the notes over portal. Please press yes to continue.');" href="rejected-notes.php?approve=<?php echo $ID; ?>">Approve</a>
												<a href="rejected-notes.php?download=<?php echo $ID; ?>">Download Noted</a>
												<a href="note-details.php?noteid=<?php echo $ID; ?>">View More Details</a>
													
												</div>
											</div></td>
									
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
	<script>
		if ( window.history.replaceState ) {
		  window.history.replaceState( null, null, window.location.href );
		}
	</script>
	<?php include "includes/footer.php" ?>