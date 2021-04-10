<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='published'; ?>
<?php
if(isset($_POST['reject'])){
	$rejectedid  = $_POST['rejectedid'];
	$adminremark = $_POST['adminremark'];
	
	$query = "UPDATE `sellernotes` SET `Status`= 12,`ActionedBy`=$adminid,`AdminRemarks`='$adminremark'  WHERE ID = $rejectedid ";
	$reject_query = mysqli_query($connection,$query);
	confirmq($reject_query);
	unpublishSendMail($rejectedid,$adminremark);
	
}
?>
<?php 
if(isset($_GET['unpublish'])){
		$rejectedid  = $_GET['unpublish'];
	
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
	redirect("Published-notes.php");
		
		
		
		
		
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
			redirect("Published-notes.php");
		 }
		
	} 
	else {
		echo '<script>alert("file not found");
				window.location.href="Published-notes.php";
			  </script>';	
	} 
}


?>
	<title>Published Notes</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/Published-notes.css">
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
					<h4>Published Notes</h4>
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
								<select name="selectSeller" class="custom-select my-1 mr-sm-2" >
									<option value="">Select seller</option>
<?php
	$query = "SELECT DISTINCT SellerID FROM sellernotes WHERE Status	= 11  ";
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

						<div class="search-bar" class="text-right">
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
						<div class="progress-table table-responsive">
							<table class="table  table-hover-1">
								<thead>
									<tr>
										<th scope="col">SR NO.</th>
										<th scope="col">NOTE TITLE</th>
										<th scope="col">CATEGORY</th>
										<th scope="col">SELL TYPE</th>
									
										<th scope="col">PRICE</th>
										<th scope="col">SELLER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th scope="col">PUBLISHED DATE</th>
										<th scope="col">APPROVED BY</th>
										<th scope="col">NUMBER OF DOWNLOAD</th>
									
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>

<?php
								
$query = "SELECT * FROM `sellernotes` ";
$query .= "WHERE Status	= 11 ";
if(isset($_GET['upublish'])){
	$d_id = $_GET['upublish'];
	if(!empty($d_id) && $d_id != ''){
		$query .= "AND SellerID=$d_id ";
	}
}

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
	$IsPaid			= $row['IsPaid'];
	$SellingPrice 	= $row['SellingPrice'];
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
	if($IsPaid == 0){
		$selltype = 'Free';
		$SellingPrice = 0;
	} else {
		$selltype = 'Paid';	
	}
	$query = "SELECT COUNT(NoteID) AS count FROM `downloads` WHERE IsAttachmentDownloaded=1 AND NoteID=$ID ";
	$count_num_download = mysqli_query($connection,$query);
	confirmq($count_num_download);
	$row = mysqli_fetch_assoc($count_num_download);
	$numOfDownload = $row['count'];
	
?>
									
									
						<tr>
							<td><?php echo $sr_no; ?></td>
									
							<td><a class="add-color" href="note-details.php?noteid=<?php echo $ID; ?>"><?php echo $Title; ?></a></td>
										<td><?php echo $Category_name; ?></td>
										<td><?php echo $selltype; ?></td>
										<td><?php echo '$'.$SellingPrice; ?></td>
							<td><?php echo $firstnameseller ." ". $lastnameseller ; ?><a href="member-detail.php?member=<?php echo $SellerID; ?>"><img src="img/assets/eye.png" alt="img" class="img-responsive"></a></td>
										<td><?php echo $CreatedDate; ?></td>
										<td><?php echo $actionbyfn ." ". $actionbyln ; ?></td>
							<td><a class="add-color" href="download-notes.php?viewdownload=<?php echo $ID; ?>"><?php echo $numOfDownload ; ?></a></td>
										<td>
										<div class="dropdown">
												<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content setwidth">
												<a href="Published-notes.php?download=<?php echo $ID; ?>">Download Noted</a>
												<a href="note-details.php?noteid=<?php echo $ID; ?>">View More Details</a>
												<a data-toggle="modal" data-target="#exampleModal<?php echo $ID; ?>" href="Published-notes.php?unpublish=<?php echo $ID; ?>">Unpublish</a>
												</div>
											</div>
										</td>
									
									</tr>	
				<div class="modal fade" id="exampleModal<?php echo $ID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $Title; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12 add-margin">
                                       
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" id="comments">Remarks</label>
                                                <input type="hidden" name="rejectedid" value="<?php echo $ID; ?>">
                                                <textarea name="adminremark" class="form-control" id="exampleFormControlTextarea1" rows="5"
                                                 placeholder="Write Remarks" required></textarea>
                                            </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="return confirm('Are you sure you want to Unpublish this note?')" type="submit" name="reject" class="btn btn-reject">Reject</button>
                            <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
                        </div>
                          </form>
                    </div>
                </div>
            </div>	
									
									
							
									
									
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
	 <?php include "includes/footer.php"; ?>