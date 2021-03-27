<?php  include "db.php"; ?>
<?php  include "functions.php"; ?>
<?php session_start(); ?>
<?php 
if(isset($_POST['id'])){
	
	
$downloadnoteid  =  $_POST['id'];
	
		$downloader = $_SESSION['ID'];
		$query = "SELECT * FROM sellernotes WHERE ID = $downloadnoteid";
		$run_query = mysqli_query($connection,$query);
		confirmq($run_query);
		$row = mysqli_fetch_assoc($run_query);
			$title 		 	= $row['Title'];
			$catid	 	 	= $row['Category'];
			$seller 		= $row['SellerID'];
			$price 			= $row['SellingPrice'];
			$category 		= tabledata('notecategories','Name','ID',$catid);
				
				
				
	 	$cquery = "SELECT * FROM downloads WHERE Downloader=$downloader AND NoteID=$downloadnoteid";
		$run_query = mysqli_query($connection,$cquery);
		confirmq($run_query);
		$isdownloaded = mysqli_num_rows($run_query);
			
		if($isdownloaded <= 0){	
		$iquery = "INSERT INTO `downloads`(`NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `IsAttachmentDownloaded`, `AttachmentDownloadedDate`, `IsPaid`,PurchasedPrice,`NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`) VALUES ($downloadnoteid,$seller,$downloader,0,0,now(),1,$price,'$title','$category',now(),$downloader)";
				
		$run_insert_query = mysqli_query($connection,$iquery);
		confirmq($run_insert_query);
			}
	
	
	
	
	$selleremail = tabledata('users','Email','ID',$seller);
	
		$downloaderfn = tabledata('users','FirstName','id',$downloader);
		$downloaderln = tabledata('users','LastName','id',$downloader);
	
		$sellerfn = tabledata('users','FirstName','id',$seller);
		$sellerln = tabledata('users','LastName','id',$seller);
	
	require '../PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                              

	$mail->isSMTP();                                      
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                               
	$mail->Username = 'parthdevani3817@gmail.com';                 
	$mail->Password = 'PDg@#123s';                           
	$mail->SMTPSecure = 'tls';                           
	$mail->Port = 587;                                    

	$mail->setFrom('parthdevani3817@gmail.com', 'Mailer');
	$mail->addAddress($selleremail, 'Joe User');     
	//$mail->addAddress('ellen@example.com');               
	$mail->addReplyTo($selleremail, 'Information');



	$mail->isHTML(true);                                  

	$mail->Subject = "$downloaderfn  $downloaderln Wants to purchase your notes." ;
	$mail->Body    =" Hello $sellerfn <br><br>
					We would like to inform you that ,$downloaderfn wants to purchase your notedes.<br>
					please see buyer-request tab to allow download access to buyer if youhave reciveed the payment from him.<br><br>
						Regards,<br>
						Notes Marketplace";

			if(!$mail->send()) {
					

			} 

	
							  

}


?>