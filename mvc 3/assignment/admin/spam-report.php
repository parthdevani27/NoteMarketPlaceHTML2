<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php  $page='spam'; ?>
<?php
if(isset($_GET['spamd'])){
	$deletespamid = $_GET['spamd'];
	
	$query = "DELETE FROM `sellernotesreportedissues` WHERE  ID = $deletespamid ";
	$delete_spam_query = mysqli_query($connection,$query);
	confirmq($delete_spam_query);
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
	redirect("spam-report.php");
		
		
		
		
		
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
			redirect("spam-report.php");
		 }
		
	} 
	else {
		echo '<script>alert("file not found");
				window.location.href="spam-report.php";
			  </script>';	
	} 






}
?>
	<title>Spam Report</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/spam-report.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<?php  include "includes/navigation.php"; ?>
	<section id="dashboard-admin-2">
		<div class="content-box-lg">
			<div class="container">
			<div class="row">
				
			</div>
				<div class="row">
				<div class="col-md-7 col-sm-12 col-12">

						<div class="progress-heading" class="text-left">
							<h4>Spam Report</h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-5 col-5">

						<div class="search-bar" class="text-right">
							<input type="text" class="searchbox form-control" id="validationDefault01" placeholder="     Search">

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
										<th scope="col">REPORTED BY</th>
										<th scope="col">NOTE TITLE</th>
										<th scope="col">CATEGORY</th>
									
									
										<th scope="col">DATE EDITED&nbsp;&nbsp;</th>
										<th scope="col">REMARK</th>
										<th scope="col">ACTION</th>
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>
<!--
									<tr>
										<td>1</td>
										<td>Parth Patel</td>
										<td class="add-color">Software</td>
										<td>IT</td>
									
										<td>09-10-2020</td>
										<td>Lorem ipsum dolor sit amet</td>
										<td><img src="img/assets/delete.png" alt="img" class="img-responsive"></td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													<a href="#">View More Details</a>
													
												</div>
											</div>
										</td>
									</tr>
-->
<?php

	$query = "SELECT * FROM `sellernotesreportedissues` ";
 	$spam_report_query = mysqli_query($connection,$query);
 	confirmq($spam_report_query);
 	$sr_no = 0;									
 	while($row = mysqli_fetch_assoc($spam_report_query)){
		$NoteID 			= $row['NoteID'];
		$ID 				= $row['ID'];
		$ReportedBYID 		= $row['ReportedBYID'];
		$Remarks 			= $row['Remarks'];
		$CreatedDate 		= $row['CreatedDate'];
		$notetitle 			= tabledata('sellernotes','Title','ID',$NoteID);
		$notecatid			= tabledata('sellernotes','Category','ID',$NoteID);
		$notecat			= tabledata('notecategories','Name','ID',$notecatid);
		$ReportedBYfn 		= tabledata('users','FirstName','id',$ReportedBYID);
		$ReportedBYln 		= tabledata('users','LastName','id',$ReportedBYID);
		$sr_no = $sr_no + 1;
		?>
									
							<tr>
										<td><?php echo $sr_no; ?></td>
										<td><?php echo $ReportedBYfn.' '.$ReportedBYln; ?></td>
										<td ><a class="add-color" href="note-details.php?noteid=<?php echo $NoteID; ?>"><?php echo $notetitle; ?></a></td>
										<td><?php echo $notecat; ?></td>	
										<td><?php echo $CreatedDate; ?></td>
										<td><?php echo $Remarks; ?></td>
										<td><a onclick="return confirm('Are you sure you want to delete this reported issue?');" href="spam-report.php?spamd=<?php echo $ID; ?>"><img src="img/assets/delete.png" alt="img" class="img-responsive"></a></td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content setwidth">
													<a href="spam-report.php?download=<?php echo $NoteID; ?>">Download Note</a>
													<a href="note-details.php?noteid=<?php echo $NoteID; ?>">View More Details</a>
													
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