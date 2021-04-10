<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='memberdetail'; ?>
<?php
if(isset($_GET['member'])){
	$memberid=$_GET['member'];
} else {
	redirect('member.php');
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
	redirect("member-detail.php?member=$memberid");
		
		
		
		
		
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
			redirect("member-detail.php?member=$memberid");
		 }
		
	} 
	else {
		echo "<script>alert('file not found');
				window.location.href='member-detail.php?member=$memberid';
			  </script>";	
	} 

}
?>
	<!-- link css -->
	<link rel="stylesheet" href="css/member-detail.css">
	<title>Member Details</title>
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive-member-details.css">
	<!-- link responsive for mobile menu-->
	<link rel="stylesheet" href="css/responsive.css">
</head>
<?php
		$DOB 			= '';
		$Phonenumber 	= '';
		$AddressLine1 	= '';
		$AddressLine2 	= '';
		$City 			= '';
		$State 			= '';
		$ZipCode 		= '';
		$Country 		= '';
		$College 		= '';
		$University 	= '';	
		$FirstName 		= '';						
		$LastName 		= '';						
		$Email 			= '';						
		$img 			= defaultprofilePic();
		$dp_path 		= "../front/member/$img";
						
	$query = "SELECT * FROM `users` WHERE ID=$memberid ";
 	$member_detail_query = mysqli_query($connection,$query);
 	confirmq($member_detail_query);
	$row = mysqli_fetch_assoc($member_detail_query);
 	$RoleID 	= $row['RoleID'];
	if($RoleID == 3 || checkrole($adminid) == 1){
 	$FirstName 	= $row['FirstName'];						
 	$LastName 	= $row['LastName'];						
 	$Email 		= $row['Email'];
	
	$query = "SELECT * FROM `userprofile` WHERE UserID=$memberid ";
 	$userpfofile_member_detail_query = mysqli_query($connection,$query);
 	confirmq($userpfofile_member_detail_query);
	$row = mysqli_fetch_assoc($userpfofile_member_detail_query);
		if(!empty($row)){
		$DOB 			= $row['DOB'];			if(empty($DOB)){$DOB='&nbsp;';}
		$Phonenumber 	= $row['Phonenumber'];	if(empty($Phonenumber)){$Phonenumber='&nbsp;';}
		$AddressLine1 	= $row['AddressLine1'];	if(empty($AddressLine1)){$AddressLine1='&nbsp;';}
		$AddressLine2 	= $row['AddressLine2'];	if(empty($AddressLine2)){$AddressLine2='&nbsp;';}
		$City 			= $row['City'];			if(empty($City)){$City='&nbsp;';}
		$State 			= $row['State'];		if(empty($State)){$State='&nbsp;';}
		$ZipCode 		= $row['ZipCode'];		if(empty($ZipCode)){$ZipCode='&nbsp;';}
		$Country 		= $row['Country'];		if(empty($Country)){$Country='&nbsp;';}
		$College 		= $row['College'];		if(empty($College)){$College='&nbsp;';}
		$University 	= $row['University'];	if(empty($University)){$University='&nbsp;';}
		$ProfilePicture = $row['ProfilePicture'];
			if(!empty($ProfilePicture)){
				if(file_exists("../front/member/$memberid/$ProfilePicture")){
				$dp_path ="../front/member/$memberid/$ProfilePicture";
				}
			}
		}
	}
?>	
<body>
<?php include "includes/navigation.php"; ?>
	<section id="member-details">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
					<h4>Member Details</h4>
					</div>
					<div class="col-md-6 col-sm-12">
					<div class="row">
						<div class="col-md-4 col-sm-12 col-12">
						<?php
						if($dp_path == 'img/defaultprofile.jpg'){
							echo '<div style="border: 1px solid #999;" class="member-img">';
						} else {
							echo '<div class="member-img">';	
						}
							?>
				
						<img width="155" height="200" src="<?php echo $dp_path; ?>" alt="img" class="img-responsive">
						</div>
						</div>	
						<div class="col-md-3 col-sm-4 col-4">
							<p>First Name:</p>
							<p>Last Name:</p>
							<p>Email:</p>
							<p>DOB:</p>
							<p>Phone:</p>
							<p>Collage/University:</p>
						</div>
						<div class="col-md-1 col-sm-1 col-1"></div>
						<div class="col-md-4 col-sm-6 col-6">
						<p><span><?php echo $FirstName; ?></span></p>
						<p><span><?php echo $LastName; ?></span></p>
						<p><span><?php echo $Email; ?></span></p>
						<p><span><?php echo $DOB; ?></span></p>
						<p><span><?php echo $Phonenumber; ?></span></p>
						<p><span><?php echo $College.' '.$University; ?></span></p>
						</div>
						
						</div>
					</div>
					<div class="col-md-1 ">
						<div class="vl"></div>
					</div>
					<div class="col-md-5 col-sm-12 ">
						<div class="row">
					
							<div class="col-md-4 col-sm-4 col-4">
								<p>Address 1:</p>
								<p>Address 2:</p>
								<p>City:</p>
								<p>State:</p>
								<p>Country:</p>
								<p>Zip code:</p>
							</div>
							<div class="col-md-1 col-sm-1 col-1"></div>
							<div class="col-md-6 col-sm-6 col-6">
						<p><span><?php echo $AddressLine1; ?></span></p>
						<p><span><?php echo $AddressLine2; ?></span></p>
						<p><span><?php echo $City; ?></span></p>
						<p><span><?php echo $State; ?></span></p>
						<p><span><?php echo $Country; ?></span></p>
						<p><span><?php echo $ZipCode; ?></span></p>
								
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<h6>Notes</h6>
					</div>
				<div class="col-md-12 col-sm-12">
					<div class="progress-table table-responsive">
							<table class="table  table-hover-1 ">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">NOTE TITLE</th>
										<th scope="col">CATEGORY</th>
										<th scope="col">STATUS</th>
										<th scope="col">DOWNLOAD NOTES</th>
										<th scope="col">TOTAL EARNING</th>
										<th scope="col">DATE ADDED&nbsp;&nbsp;</th>
										<th scope="col">PUBLISHED DATE</th>
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>
<!--
									<tr>
										<td>1</td>
										<td class="add-color">Software</td>
										<td>IT</td>
										<td>published</td>				
										<td>27</td>
										<td>$177</td>
										<td>09-10-2020</td>
										<td>09-10-2020</td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content">
													<a href="#">Download Note</a>
													
												</div>
											</div>
										</td>
									</tr>
								
-->
<?php
								
$query = "SELECT * FROM `sellernotes` ";
$query .= "WHERE SellerID = $memberid ";
$query .= "ORDER BY ID DESC";
$member_notes_query = mysqli_query($connection,$query);
confirmq($member_notes_query);									
$sr_no = 0;
while($row = mysqli_fetch_assoc($member_notes_query)){
	$Title			= $row['Title'];
	$Category 		= $row['Category'];
	$ID 			= $row['ID'];
	$Status 		= $row['Status'];;
	$PublishedDate 	= $row['PublishedDate'];
	$CreatedDate 	= $row['CreatedDate'];
	$AdminRemarks 	= $row['AdminRemarks'];
	$Category_name	= tabledata('notecategories','Name','ID',$Category);
	$Status_name	= tabledata('referencedata','Value','ID',$Status);
	$sr_no 			= $sr_no + 1;

	$query = "SELECT COUNT(NoteID) AS count FROM `downloads` WHERE IsAttachmentDownloaded=1 AND NoteID=$ID ";
	$count_num_download = mysqli_query($connection,$query);
	confirmq($count_num_download);
	$row = mysqli_fetch_assoc($count_num_download);
	$numOfDownload = $row['count'];
	
	$query = "SELECT sum(PurchasedPrice) AS totalearn FROM `downloads` WHERE IsAttachmentDownloaded=1 AND Seller=$memberid AND NoteID=$ID ";
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
										<td><a class="add-color" href="note-details.php?noteid=<?php echo $ID; ?>"><?php echo $Title; ?></a></td>
										<td><?php echo $Category_name; ?></td>
										<td><?php echo $Status_name; ?></td>			
										<td><a class="add-color" href="download-notes.php?viewdownload=<?php echo $ID; ?>"><?php echo $numOfDownload; ?></a></td>			
										<td><a class="add-color" href="download-notes.php?viewdownload=<?php echo $ID; ?>">$<?php echo $totalearn; ?></a></td>			
										<td><?php echo $CreatedDate; ?></td>			
										<td><?php echo $PublishedDate; ?></td>			
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content setwidth">
													<a href="member-detail.php?member=<?php echo $memberid; ?>&download=<?php echo $ID; ?>">Download Note</a>
													
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