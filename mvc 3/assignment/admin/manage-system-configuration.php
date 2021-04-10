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
<?php $page='managesystem'; ?>
<?php


$query = "SELECT * FROM `systemconfigurations` WHERE ID = 1";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
$db_systemEmail = $row['Value'];

$query = "SELECT * FROM `systemconfigurations` WHERE ID = 2";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
$db_systemPhone = $row['Value'];

$query = "SELECT * FROM `systemconfigurations` WHERE ID = 3";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
$db_systemEsEmail = $row['Value'];

$query = "SELECT * FROM `systemconfigurations` WHERE ID = 4";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
$db_notepic = $row['Value'];

$query = "SELECT * FROM `systemconfigurations` WHERE ID = 5";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
$db_profilepic = $row['Value'];

$query = "SELECT * FROM `systemconfigurations` WHERE ID = 6";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
$db_facebookUrl = $row['Value'];

$query = "SELECT * FROM `systemconfigurations` WHERE ID = 7";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
$db_twitterUrl = $row['Value'];

$query = "SELECT * FROM `systemconfigurations` WHERE ID = 8";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
$db_linkedinUrl = $row['Value'];

if(isset($_POST['submit'])){
 	$systemEmail 	= $_POST['systemEmail'];
 	$systemPhone 	= $_POST['systemPhone'];
 	$systemEsEmail 	= $_POST['systemEsEmail'];
 	$facebookUrl 	= $_POST['facebookUrl'];
 	$twitterUrl 	= $_POST['twitterUrl'];
 	$linkedinUrl 	= $_POST['linkedinUrl'];
	$profilepic        	=  $_FILES['profilepic']['name'];
	$profilepic_temp   	=  $_FILES['profilepic']['tmp_name'];
	$notepic        	=  $_FILES['defaultNoteImg']['name'];
	$notepic_temp   	=  $_FILES['defaultNoteImg']['tmp_name'];

	

	$query = "UPDATE `systemconfigurations` SET
	`Value`='$systemEmail',`ModifiedDate`=now(),`ModifiedBy`=$superadmin WHERE ID = 1";
	$systemconfigurations_query = mysqli_query($connection,$query);
	confirmq($systemconfigurations_query);
	
	$query = "UPDATE `systemconfigurations` SET
	`Value`='$systemPhone' ,`ModifiedDate`=now(),`ModifiedBy`=$superadmin WHERE ID = 2";
	$systemconfigurations_query = mysqli_query($connection,$query);
	confirmq($systemconfigurations_query);
	
	$query = "UPDATE `systemconfigurations` SET
	`Value`='$systemEsEmail',`ModifiedDate`=now(),`ModifiedBy`=$superadmin WHERE ID = 3";
	$systemconfigurations_query = mysqli_query($connection,$query);
	confirmq($systemconfigurations_query);
	

	$query = "UPDATE `systemconfigurations` SET
	`Value`='$facebookUrl', `ModifiedDate`=now(),`ModifiedBy`=$superadmin WHERE ID = 6";
	$systemconfigurations_query = mysqli_query($connection,$query);
	confirmq($systemconfigurations_query);
	
	$query = "UPDATE `systemconfigurations` SET
	`Value`='$twitterUrl' ,`ModifiedDate`=now(),`ModifiedBy`=$superadmin WHERE ID = 7";
	$systemconfigurations_query = mysqli_query($connection,$query);
	confirmq($systemconfigurations_query);
	
	$query = "UPDATE `systemconfigurations` SET
	`Value`='$linkedinUrl', `ModifiedDate`=now(),`ModifiedBy`=$superadmin WHERE ID = 8";
	$systemconfigurations_query = mysqli_query($connection,$query);
	confirmq($systemconfigurations_query);

	
	
		if (!file_exists("../front/member")) {
		mkdir("../front/member", 0777, true);
		}
		$accepted_image 	=  array('png','jpg','jpeg');		
		if(!empty($_FILES['profilepic']['tmp_name'])){
                $profilepic_ext = strtolower(pathinfo( $_FILES["profilepic"]["name"], PATHINFO_EXTENSION )); 
                $profilepic = "Defaultmember_". date("dmYhis") . "." .  $profilepic_ext;
		if(!in_array($profilepic_ext,$accepted_image) ){
				echo "<script>alert('please enter valid image file extension like .jpg ,.jpeg or .png ');</script>";
        } else {
				unlink("../front/member/$db_profilepic");
				move_uploaded_file($profilepic_temp, "../front/member/$profilepic" );
				$query    		=  "UPDATE `systemconfigurations` SET ";
				$query		   .=  "`Value`='$profilepic' ";
				$query		   .=  "WHERE ID=5 ";
				$update_progilepic_query = mysqli_query($connection,$query);
				confirmq($update_progilepic_query);
			}
		}
	
	
	
		if(!empty($_FILES['defaultNoteImg']['tmp_name'])){
                $notepic_ext = strtolower(pathinfo( $_FILES["defaultNoteImg"]["name"], PATHINFO_EXTENSION )); 
                $notepic = "DefaultNote_". date("dmYhis") . "." .  $notepic_ext;
		if(!in_array($notepic_ext,$accepted_image) ){
				echo "<script>alert('please enter valid image file extension like .jpg ,.jpeg or .png ');</script>";
        } else {
				unlink("../front/member/$db_notepic");
				move_uploaded_file($notepic_temp, "../front/member/$notepic" );
				$query    		=  "UPDATE `systemconfigurations` SET ";
				$query		   .=  "`Value`='$notepic' ";
				$query		   .=  "WHERE ID=4 ";
				$update_notepic_query = mysqli_query($connection,$query);
				confirmq($update_notepic_query);
			}
		}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	redirect('manage-system-configuration.php');
}
?>
	<title>Manage System Configuration</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/manage-system-configuration.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <?php include "includes/navigation.php"; ?>
	<section id="my-profile">
		<div class="content-box-lg">
			<div class="container">
<form action="" method="post" name="myForm" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<h4>Manage System Configuration</h4>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
							<label for="exampleInputEmail1" id="email">Support Email Address*</label>
						<input type="email" value="<?php echo $db_systemEmail; ?>" name="systemEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="john" required>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<div class="responsive-number">
						<label for="validationDefault02" id="last-name">Support Phone Number*</label>
						<input type="number" value="<?php echo $db_systemPhone; ?>" name="systemPhone" class="form-control" id="validationDefault02" placeholder="Enter Phone Number" required>
					</div>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="exampleInputEmail" >Email Address(es)(for various events system will send motyfication to these user)*</label>
						<input type="email" value="<?php echo $db_systemEsEmail; ?>" name="systemEsEmail" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault12">Facebook URL</label>
						<input type="url" value="<?php echo $db_facebookUrl; ?>" name="facebookUrl" class="form-control" id="validationDefault12" placeholder="Enter url" >
					</div>
					<div class="col-md-12 col-sm-12 col-12">
				<label for="validationDefault13" >Twitter URL</label>
						<input type="url" name="twitterUrl" value="<?php echo $db_twitterUrl; ?>" class="form-control" id="validationDefault13" placeholder="Enter url" >
					
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<label for="validationDefault14" >Linkedin URL</label>
						<input type="url" name="linkedinUrl" value="<?php echo $db_linkedinUrl; ?>" class="form-control" id="validationDefault14" placeholder="Enter url" >
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
								<label>Default image for notes(if seller do not upload)</label>
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<div class="add-border text-center">
									<label for="defaultnotepic">
										<img src="img/assets/upload.png">
										<p id="textdisplay" style="color: lightgray;">Upload a Picture</p>
										<input type="file" id="defaultnotepic" name="defaultNoteImg" class="upload" style="display:none;">
									</label>
								</div>
							</div>
							
						</div>
					</div>
								<div class="col-md-12 col-sm-12 col-12">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
								<label>Default profile picture(if seller do not upload)</label>
							</div>
							<div class="col-md-12 col-sm-12 col-12">
								<div class="add-border text-center">
									<label for="upload">
										<img src="img/assets/upload.png">
										<p id="textdisplaypic" style="color: lightgray;">Upload a Picture</p>
										<input type="file" id="upload" name="profilepic" class="upload" style="display:none;">
									</label>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-12">
						<button type="submit" name="submit" class="btn btn-block btn-general btnsubmit">SUBMIT</button>
					</div>
				</div>
		</form>
			</div>
		</div>
	</section>
	    <?php include "includes/footer.php"; ?>