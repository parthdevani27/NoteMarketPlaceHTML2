<?php session_start(); ?>
<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php  include "includes/functions.php"; ?>
<?php
if(isset($_SESSION['Email'])){	
$sellerid = $_SESSION['ID']; 
} else {
	redirect();
}

if(isset($_GET['download'])){
	header('Content-Disposition: attachment; filename="images/sample.pdf"');
}


?>


<?php
if(isset($_GET['download'])){
	$downloadnoteid = $_GET['download'];
	 
	$query = "SELECT * FROM sellernotesattachements WHERE NoteID=$downloadnoteid ";
	$download_path_query = mysqli_query($connection,$query);
	confirmq($download_path_query);
	
	$bookfiles = [];
	while($row = mysqli_fetch_assoc($download_path_query)){
		 $filepth = $row['FilePath'];
		if(!file_exists($filepth)){
			echo "file not found";
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
	redirect('rejected_notes.php');



}


?>
	<title>My Rejected Notes</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/my-rejected-note-style.css">
<!--	<link rel="stylesheet" href="css/datatable/datatables.min.css">-->
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-my-rejected-note.css">
</head>

<body>
<?php include "includes/navigation.php"; ?>
	
	<section id="my-download-notes">
		<div class="content-box-lg">
			<div class="container">
			
				<div class="row">
					<div class="col-md-7 col-sm-5 col-12">
						<div class="progress-heading" class="text-left">
							<p>My Rejected Notes</p>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-4 col-6">
						<div class="search-bar dataTables_filter" class="text-right">
							<input type="text" name="search" class="form-control searchbox" id="validationDefault01" placeholder="     Search">
							

						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-6">
						<div class="search-btn">
							<button type="submit" name="submit" id="searchbtn" class="btn btn-block btn-general searchbtn">SEARCH</button>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="progress-table table-responsive">
					
							<table  class="table table-hover-1">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">NOTE TITLE</th>
										<th scope="col">CATEGORY</th>
										<th scope="col">REMARK</th>
										<th scope="col"></th>
										

									</tr>
								</thead>
								<tbody>




<?php 
									
$srcount	=	1;							

	
		$query   = "SELECT ";
		$query  .= "Sellernotes.Status, ";
		$query  .= "Sellernotes.SellerID, ";
		$query  .= "Sellernotes.Title, ";
		$query  .= "Sellernotes.AdminRemarks, ";
		$query  .= "Sellernotes.Category, ";
		$query  .= "Sellernotes.ID AS noteid ";
		$query  .= "FROM sellernotes ";
		$query  .= "LEFT JOIN notecategories ON Sellernotes.Category=notecategories.ID ";
		$query  .= "WHERE Sellernotes.Status=12 AND Sellernotes.SellerID=$sellerid  ";

	$rejected_notes_query = mysqli_query($connection,$query);
	while($row=mysqli_fetch_assoc($rejected_notes_query)){
	confirmq($rejected_notes_query);
		$sr_no       =  $srcount;
		$title 		 = 	$row['Title'];
		$categoryid  = 	$row['Category'];
		$category    =  tabledata('notecategories','Name','ID',$categoryid);	
		$adminremark =	$row['AdminRemarks'];
		$noteid      =	$row['noteid'];
		$srcount 	 =  $srcount+1;	
									
									
									
									
									
								
?>
					
	<tr>
		<td><?php echo $sr_no; ?></td>
		<td class="add-color"><a style="color:#6255a5" href="note-details.php?noteid=<?php echo $noteid; ?>"><?php echo 	  $title; ?></a></td>
		<td><?php echo $category; ?></td>
		<td><?php echo $adminremark; ?></td>
		<td><div class="dropdown">
			<button class="dropbtn"><img src="images/dots.png" alt="img" class="img-responsive"></button>
			<div class="dropdown-content">
				<a href="rejected_notes.php?download=<?php echo $noteid; ?>">Download Note</a>

			</div>
		    </div>
		</td>
	</tr>
<?php 	}//while
	
?>									
								</tbody>
							</table>
						</div>
					</div>
					
				</div>

			</div>
		</div>
	</section>
	
<?php include "includes/footer.php" ?>