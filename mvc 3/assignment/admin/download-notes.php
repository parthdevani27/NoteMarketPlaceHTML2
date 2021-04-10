<?php 	include "includes/header.php"; 
 		include "../front/includes/db.php";
 		include "../front/includes/functions.php";
 		session_start(); 
 		$adminid = checksessionforadmin();
?>
<?php $page='download'; ?>
<?php
if(isset($_GET['download'])){
	//check for allow download
	
	
	///deedeed
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
	redirect("download-notes.php");
		
		
		
		
		
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
			redirect("download-notes.php");
		 }
		
	} 
	else {
		echo '<script>alert("file not found");
				window.location.href="download-notes.php";
			  </script>';	
	} 






}
?>
	<title>Downloaded Notes</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/download-notes.css">
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
					<h4>Downloaded Notes</h4>
				</div>
			</div>
				<div class="row">
					<div class="col-md-7 col-sm-12 col-12">
						<div class="progress-heading" class="text-left">
		<form id="downloadfilter" action="" method="post">			
						<div class="row">
						<div class="col-md-3 col-sm-3 col-4">
								<div class="row">
							<div class="col-md-12 col-sm-12">
						
								<label>Note</label>
							
							</div>
								<div class="col-md-12 col-sm-12 col-12">
								
								<select name="selectNote" class="custom-select" >
									<option value="">Select note</option>
<?php
	$query = "SELECT DISTINCT NoteCategory FROM downloads ";
	$note_dropdown_query = mysqli_query($connection ,$query);
	confirmq($note_dropdown_query);
	while($row =mysqli_fetch_assoc($note_dropdown_query)){
	$Name_db = $row['NoteCategory'];	
		
	if($Name_db != ''){
			if(isset($_POST['selectNote'])){
			$note_value = $_POST['selectNote'];
			if($Name_db == $note_value){
				echo "<option value='$Name_db' selected>$Name_db</option>";
			} else {
				echo "<option value='$Name_db'>$Name_db</option>";
			}
			
		} else {
		echo "<option value='$Name_db'>$Name_db</option>";
				}
	}	
	}
?>
								</select>
							</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-4">
								<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
						
								<label>Seller</label>
								
							</div>
								<div class="col-md-12 col-sm-12 col-12">
								
								<select name="selectSeller" class="custom-select">
								<option value="">Selcect seller</option>
<?php
	$query = "SELECT DISTINCT Seller FROM downloads ";
	$seller_dropdown_query = mysqli_query($connection ,$query);
	confirmq($seller_dropdown_query);
	while($row =mysqli_fetch_assoc($seller_dropdown_query)){
	$sellerid_db = $row['Seller'];	
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
							</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-4">
								<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
						
								<label>Buyer</label>
							
							</div>
								<div class="col-md-12 col-sm-12 col-12">
								
								<select name="selectBuyer" class="custom-select" >
									<option value="" >Selcect buyer</option>
<?php
	$query = "SELECT DISTINCT Downloader FROM downloads ";
	$buyer_dropdown_query = mysqli_query($connection ,$query);
	confirmq($buyer_dropdown_query);
	while($row =mysqli_fetch_assoc($buyer_dropdown_query)){
	$buyerid_db = $row['Downloader'];	
		$firstnamebuyer		= tabledata('users','FirstName','id',$buyerid_db);
		$lastnamebuyer 		= tabledata('users','LastName','id',$buyerid_db);
	if($sellerid_db != '' && $firstnameseller != '' && $lastnameseller != ''){
		if(isset($_POST['selectBuyer'])){
			$buyer_value = $_POST['selectBuyer'];
			if($buyerid_db == $buyer_value){
				
			echo "<option value='$buyerid_db' selected>$firstnamebuyer $lastnamebuyer</option>";
			} else {
				echo "<option value='$buyerid_db'>$firstnamebuyer $lastnamebuyer</option>";
			}
			
		} else {
		echo "<option value='$buyerid_db'>$firstnamebuyer $lastnamebuyer</option>";
		}
	}	
	}
?>	
								</select>
							</div>
							</div>
						</div>
							</div>
			</form>
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
										<th scope="col">BUYER</th>
										<th scope="col">SELLER</th>
										<th scope="col">SELL TYPE</th>
										<th scope="col">PRICE</th>
										<th scope="col">DOWNLOADED DATE/TIME</th>
										<th scope="col"></th>

									</tr>
								</thead>
								<tbody>

<?php
								
$query = "SELECT * FROM `downloads` ";
$query .= "WHERE IsAttachmentDownloaded=1  ";
if(isset($_POST['selectNote'])){
	$f_note = $_POST['selectNote'];
	if(!empty($f_note) && $f_note != ''){
		$query .= "AND NoteCategory LIKE '$f_note' ";
	}
}
if(isset($_POST['selectSeller'])){
	$f_seller = $_POST['selectSeller'];
	if(!empty($f_seller) && $f_seller != ''){
		$query .= "AND Seller=$f_seller ";
	}
}
if(isset($_POST['selectBuyer'])){
	$f_buyer = $_POST['selectBuyer'];
	if(!empty($f_buyer) && $f_buyer != ''){
		$query .= "AND Downloader=$f_buyer ";
	}
}
if(isset($_GET['viewdownload'])){
	$d_id = $_GET['viewdownload'];
	if(!empty($d_id) && $d_id != ''){
		$query .= "AND NoteID=$d_id ";
	}
}
if(isset($_GET['udownload'])){
	$d_id = $_GET['udownload'];
	if(!empty($d_id) && $d_id != ''){
		$query .= "AND Downloader=$d_id ";
	}
}
$query .= "ORDER BY ID DESC  ";
$download_notes_query = mysqli_query($connection,$query);
confirmq($download_notes_query);									
$sr_no = 0;
while($row = mysqli_fetch_assoc($download_notes_query)){
	$NoteID			= $row['NoteID'];
	$Seller 		= $row['Seller'];
	$ID 			= $row['ID'];
	$Downloader 	= $row['Downloader'];
	$IsPaid 		= $row['IsPaid'];
	$PurchasedPrice = $row['PurchasedPrice'];
	$NoteTitle 		= $row['NoteTitle'];
	$NoteCategory 	= $row['NoteCategory'];
	$CreatedDate 	= $row['CreatedDate'];
	$firstnameseller 		= tabledata('users','FirstName','id',$Seller);
	$lastnameseller 		= tabledata('users','LastName','id',$Seller);
	$firstnamebuyer 		= tabledata('users','FirstName','id',$Downloader);
	$lastnamebuyer 			= tabledata('users','LastName','id',$Downloader);
	$sr_no 			= $sr_no + 1;
	if($IsPaid){
		$a = 'Paid';
	} else {
		$a = 'Free';
		$PurchasedPrice=0;
	}
?>
									
									
				<tr>
						<td><?php echo $sr_no; ?></td>
					<td><a class="add-color" href="note-details.php?noteid=<?php echo $NoteID; ?>"><?php echo $NoteTitle; ?></a></td>
						<td><?php echo $NoteCategory; ?></td>				
						<td><?php echo $firstnamebuyer ." ". $lastnamebuyer ; ?>&nbsp;&nbsp;&nbsp;<a href="member-detail.php?member=<?php echo $Downloader; ?>"><img src="img/assets/eye.png" alt="img" class="img-responsive"></a></td>
						<td><?php echo $firstnameseller ." ". $lastnameseller ; ?>&nbsp;&nbsp;&nbsp;<a href="member-detail.php?member=<?php echo $Seller; ?>"><img src="img/assets/eye.png" alt="img" class="img-responsive"></a></td>
						<td><?php echo $a; ?></td>
						<td><?php echo '$'.$PurchasedPrice; ?></td>
						<td><?php echo $CreatedDate; ?></td>
						<td>	
							<div class="dropdown">
							<button class="dropbtn"><img src="img/assets/dots.png" alt="img" class="img-responsive"></button>
							<div class="dropdown-content setwidth">
							<a href="download-notes.php?download=<?php echo $NoteID; ?>">Download notes</a>
							<a href="note-details.php?noteid=<?php echo $NoteID; ?>">View more details</a>
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
	<script>
		if ( window.history.replaceState ) {
		  window.history.replaceState( null, null, window.location.href );
		}
	</script>
<?php include "includes/footer.php" ?>