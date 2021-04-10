<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php $page='sold'; ?>
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
	redirect('soldnotes.php');
}
?>
<title>My Sold Notes</title>
<!-- link css -->
<link rel="stylesheet" href="css/my-sold-note-style.css">
<!-- link responsive -->
<link rel="stylesheet" href="css/responsive/responsivemy-sold-note.css">
</head>

<body>
	<?php include "includes/navigation.php"; ?>

	<section id="my-download-notes">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-sm-5 col-12">
						<div class="progress-heading" class="text-left">
							<p>My Sold Notes</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-6">
						<div class="search-bar" class="text-right">
							<input type="text" class="form-control searchbox" id="validationDefault01" placeholder="     Search">

						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-6">
						<div class="search-btn">
							<button type="submit" class="btn btn-block btn-general searchbtn">SEARCH</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="progress-table table-responsive">
							<table class="table  table-hover-1 ">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">NOTE TITLE</th>
										<th scope="col">CATEGORY</th>
										<th scope="col">BUYER</th>
										<th scope="col">SELL TYPE</th>
										<th scope="col">PRICE</th>
										<th scope="col">DOWNLOAD DATE/TIME</th>
										<th scope="col"> </th>
										<th scope="col"> </th>

									</tr>
								</thead>
								<tbody>

									<?php
$sellerid = $_SESSION['ID'];									
$query = "SELECT * FROM `downloads` WHERE Seller = $sellerid AND IsSellerHasAllowedDownload = 1 ";

$soldnotes_query = mysqli_query($connection,$query);
confirmq($soldnotes_query);
$sr_no = 0;								
while($row = mysqli_fetch_assoc($soldnotes_query)){
	$title 			= $row['NoteTitle'];
	$noteid 		= $row['NoteID'];
	$category 		= $row['NoteCategory'];
	$buyerid 		= $row['Downloader'];
	$ispaid 		= $row['IsPaid'];
	$price 			= $row['PurchasedPrice'];
	$date 			= $row['CreatedDate'];
	$sr_no			= $sr_no+1;
	$buyer 			= tabledata('users','Email','ID',$buyerid);
	if($ispaid == 0){$selltype = 'Free';} else {$selltype = 'Paid';}
									
								
									
?>
									<tr>
										<td><?php echo $sr_no; ?></td>
										<td><a class="add-color" href="note-details.php?noteid=<?php echo $noteid; ?>"><?php echo $title; ?></a></td>
										<td><?php echo $category; ?></td>
										<td><?php echo $buyer; ?></td>
										<td><?php echo $selltype; ?></td>
										<td>$<?php echo $price; ?></td>
										<td><?php echo $date; ?></td>
										<td><a href="note-details.php?noteid=<?php echo $noteid; ?>"><img src="images/Dashboard/eye.png" alt="img" class="img-responsive"></a></td>
										<td>
											<div class="dropdown">
												<button class="dropbtn"><img src="images/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content setwidth">
													<a href="soldnotes.php?download=<?php echo $noteid; ?>">Download Note</a>
												</div>
											</div>
										</td>
									</tr><?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include "includes/footer.php"; ?>
