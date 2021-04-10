<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='underreview'; ?>
<?php
if(isset($_GET['InReview'])){
	$InReviewid = $_GET['InReview'];
	
	$query = "UPDATE `sellernotes` SET `Status`= 10,`ActionedBy`=$adminid  WHERE ID = $InReviewid ";
	$inreview_query = mysqli_query($connection,$query);
	confirmq($inreview_query);
	redirect('note-under-review.php');
}
if(isset($_GET['approve'])){
	$approveid = $_GET['approve'];
	
	$query = "UPDATE `sellernotes` SET `Status`= 11,`PublishedDate`=now(),`ActionedBy`=$adminid  WHERE ID = $approveid ";
	$approve_query = mysqli_query($connection,$query);
	confirmq($approve_query);
	redirect('note-under-review.php');
}
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
	redirect("note-under-review.php");
		
		
		
		
		
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
			redirect("note-under-review.php");
		 }
		
	} 
	else {
		echo '<script>alert("file not found");
				window.location.href="note-under-review.php";
			  </script>';	
	} 
}
?>
	<title>Notes Under Review</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/note-under-review.css">
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
					<h4>Notes Under Review</h4>
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
								<div class="respo-select">
	<form id="downloadfilter" action="" method="post">				
								<select name="selectSeller" class="custom-select my-1 mr-sm-2" >
									<option value="">Select seller</option>
<?php
	$query = "SELECT DISTINCT SellerID FROM sellernotes WHERE Status = 9 OR Status = 10 ";
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
										<th scope="col">SELLER</th>
										<th scope="col">DATE ADDED</th>
										<th scope="col">STATUS</th>
										<th width='36%' scope="col">ACTION</th>
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>
								
<?php
								
$query = "SELECT * FROM `sellernotes` ";
$query .= "WHERE (Status = 9 OR Status = 10) ";

if(isset($_POST['selectSeller'])){
	 $f_seller = $_POST['selectSeller'];
	if(!empty($f_seller) && $f_seller != ''){
		$query .= "AND SellerID=$f_seller ";
	}
}
if(isset($_GET['uinreview'])){
	$d_id = $_GET['uinreview'];
	if(!empty($d_id) && $d_id != ''){
		$query .= "AND SellerID=$d_id ";
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
	$StatusID 		= $row['Status'];
	$SellerID 		= $row['SellerID'];
	$CreatedDate 	= $row['PublishedDate'];
	$firstnameseller 		= tabledata('users','FirstName','id',$SellerID);
	$lastnameseller 		= tabledata('users','LastName','id',$SellerID);
	$Category_name	 		= tabledata('notecategories','Name','ID',$Category);
	$Status_name	 		= tabledata('referencedata','Value','ID',$StatusID);
	$sr_no 			= $sr_no + 1;


	
?>
									
									
						<tr>
							<td><?php echo $sr_no; ?></td>
									
							<td><a class="add-color" href="note-details.php?noteid=<?php echo $ID; ?>"><?php echo $Title; ?></a></td>
										<td><?php echo $Category_name; ?></td>
							<td><?php echo $firstnameseller ." ". $lastnameseller ; ?><a href="member-detail.php?member=<?php echo $SellerID; ?>"><img src="img/assets/eye.png" alt="img" class="img-responsive"></a></td>
										<td><?php echo $CreatedDate; ?></td>
										<td><?php echo $Status_name; ?></td>
									
							<td><a onclick="return confirm('If you approve the notes-system will publish the notes over portal please press ok to continue.')"  href="note-under-review.php?approve=<?php echo $ID; ?>"><button type="button" class="btn  btn-general btn-approve">Approvr</button></a>
											<button type="button" data-toggle="modal" data-target="#exampleModal<?php echo $ID; ?>" class="btn  btn-general btn-reject">Reject</button>
											<a onclick="return confirm('Via marking the note in review-system will let user know that review  process has been initited.')" href="note-under-review.php?InReview=<?php echo $ID; ?>"><button  type="button" class="btn btn-general btn-inreview">InReview</button></a></td>
										<td>
											<div class="dropdown">
												<button  class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
												<div class="dropdown-content setwidth">
												<a  href="note-details.php?noteid=<?php echo $ID; ?>">view more detail</a>
												<a href="note-under-review.php?download=<?php echo $ID; ?>">download note</a>
													
												</div>
											</div>
										</td>
									</tr>		
							
									
															
												
			
				
							
	        <div class="modal fade" id="exampleModal<?php echo $ID; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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