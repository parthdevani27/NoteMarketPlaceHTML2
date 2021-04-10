<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<?php session_start(); ?>
<?php $page='userprofile'; ?>
<?php
	$firstname  	=  '';
	$lastname  		=  '';
	$email  		=  '';
	$dob  			=  '';
	$gender 		=  '';
	$phonecode  	=  '';
	$phoneno  		=  '';
	$profilepic_db  =  '';
	$addline1  		=  '';
	$addline2  		=  '';
	$city  			=  '';
	$state  		=  '';
	$zipcode 		=  '';
	$country  		=  '';
	$university  	=  '';
	$collage  		=  '';
?>
<?php 
if(!isset($_SESSION['Email'])){
	redirect();
} else {
	
		$userid 		=  $_SESSION['ID'];
		$firstname 		=  $_SESSION['firstname']; 
		$lastname 		=  $_SESSION['lastname'];
		$email 			=  $_SESSION['Email'];
		//make folder for profile pic
		if (!file_exists("member/$userid")) {
		mkdir("member/$userid", 0777, true);
		}
	
		if(checkForUserProfile($userid)){
		
		
		//when user already filled userdetails -for update
		$query = "SELECT * FROM userprofile WHERE UserID = $userid";
		$get_data_userprofile_query = mysqli_query($connection,$query);
		confirmq($get_data_userprofile_query);
		
		
		$row   			=  mysqli_fetch_assoc($get_data_userprofile_query);
		$dob  			=  $row['DOB'];
		$gender 		=  $row['Gender'];
		$phonecode  	=  $row['Phonenumber–CountryCode'];
		$phoneno  		=  $row['Phonenumber'];
		$profilepic_db  =  $row['ProfilePicture'];
		$addline1  		=  $row['AddressLine1'];
		$addline2  		=  $row['AddressLine2'];
		$city  			=  $row['City'];
		$state  		=  $row['State'];
		$zipcode 		=  $row['ZipCode'];
		$country  		=  $row['Country'];
		$university  	=  $row['University'];
		$collage  		=  $row['College'];
		
		

	if(isset($_POST['submit'])){
		$firstname	  		=  $_POST['firstname'];
		$lastname  			=  $_POST['lastname'];
		$email  			=  $_POST['email'];
		$dob  				=  $_POST['dob'];
		$gender 			=  $_POST['gender'];
		$phonecode  		=  $_POST['phonecode'];
		$phoneno  			=  $_POST['phoneno'];
		$addline1  			=  $_POST['addline1'];
		$addline2  			=  $_POST['addline2'];
		$city  				=  $_POST['city'];
		$state  			=  $_POST['state'];
		$zipcode 			=  $_POST['zipcode'];
		$country  			=  $_POST['country'];
		$university  		=  $_POST['university'];
		$collage  			=  $_POST['collage'];
		$profilepic        	=  $_FILES['profilepic']['name'];
    	$profilepic_temp   	=  $_FILES['profilepic']['tmp_name'];
		$accepted_image 	=  array('png','jpg','jpeg');
		
		if(!empty($_FILES['profilepic']['tmp_name'])){
                unlink("member/$userid/$profilepic_db");
                $profilepic_ext = strtolower(pathinfo( $_FILES["profilepic"]["name"], PATHINFO_EXTENSION )); 
                $profilepic = "DP_". date("dmYhis") . "." .  $profilepic_ext;
         
		if(!in_array($profilepic_ext,$accepted_image) ){
				echo "<script>alert('please enter valid image file extension like .jpg ,.jpeg or .png ');</script>";
        } else {
				move_uploaded_file($profilepic_temp, "member/$userid/$profilepic" );
				$query    		=  "UPDATE `userprofile` SET ";
				$query		   .=  "`ProfilePicture`='$profilepic' ";
				$query		   .=  "WHERE UserID=$userid ";
				$update_progilepic_query = mysqli_query($connection,$query);
				confirmq($update_progilepic_query);
			}
		}		
		
		
		
		$query    		=  "UPDATE `userprofile` SET ";
		$query		   .=  "`DOB`='$dob',
							`Gender`=$gender,
							`SecondaryEmailAddress`='$email',
							`Phonenumber–CountryCode`='$phonecode',
							`Phonenumber`='$phoneno',
							`AddressLine1`='$addline1',
							`AddressLine2`='$addline2',
							`City`='$city',
							`State`='$state',
							`ZipCode`='$zipcode',
							`Country`='$country',
							`University`='$university',
							`College`='$collage',
							`ModifiedDate`=now(),
							`ModifiedBy`=$userid ";
		$query			.=  "WHERE UserID=$userid";
		
		$update_userprofile_query  = mysqli_query($connection,$query);
		confirmq($update_userprofile_query);
		
		
		//update first and last name
		$query  = "UPDATE `users` SET `FirstName`='$firstname',`LastName`='$lastname' WHERE ID= $userid";
		$update_firstlast_name_query = mysqli_query($connection,$query);
		confirmq($update_firstlast_name_query);		
		$_SESSION['firstname'] 	=  	$firstname;
		$_SESSION['lastname']	=	$lastname;
		
		
		
		
	}
		
		
		
		
		
	} else {
		
	//for first time insert userdetails	
	if(isset($_POST['submit'])){
		$firstname		  	=  $_POST['firstname'];
		$lastname	  		=  $_POST['lastname'];
		$email		  		=  $_POST['email'];
		$dob	  			=  $_POST['dob'];
		$gender 			=  $_POST['gender'];
		$phonecode  		=  $_POST['phonecode'];
		$phoneno  			=  $_POST['phoneno'];
		$addline1  			=  $_POST['addline1'];
		$addline2  			=  $_POST['addline2'];
		$city  				=  $_POST['city'];
		$state  			=  $_POST['state'];
		$zipcode 			=  $_POST['zipcode'];
		$country  			=  $_POST['country'];
		$university  		=  $_POST['university'];
		$collage  			=  $_POST['collage'];
		$profilepic        	=  $_FILES['profilepic']['name'];
    	$profilepic_temp   	=  $_FILES['profilepic']['tmp_name'];
		$accepted_image 	=  array('png','jpg','jpeg');
		
		
		
		if(!empty($_FILES['profilepic']['tmp_name'])){
                
		$profilepic_ext = strtolower(pathinfo( $_FILES["profilepic"]["name"], PATHINFO_EXTENSION )); 
		$profilepic = "DP_". date("dmYhis") . "." .  $profilepic_ext;
         
		if(!in_array($profilepic_ext,$accepted_image) ){
				echo "<script>alert('please enter valid image file extension like .jpg ,.jpeg or .png ');</script>";
        } else {
				move_uploaded_file($profilepic_temp, "member/$userid/$profilepic" );
			}
		}
		
	$query  = "INSERT INTO `userprofile` ";
	$query .="(`UserID`, `DOB`, `Gender`, `SecondaryEmailAddress`, `Phonenumber–CountryCode`, `Phonenumber`, `ProfilePicture`, `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`) ";
	$query.="VALUES($userid,'$dob',$gender,'$email','$phonecode','$phoneno','$profilepic','$addline1','$addline2','$city','$state','$zipcode','$country','$university','$collage',now(),$userid) "; 
	
	$insert_user_detail_query = mysqli_query($connection,$query);
	confirmq($insert_user_detail_query);

		
	//update first and last name
	$query  = "UPDATE `users` SET `FirstName`='$firstname',`LastName`='$lastname' WHERE ID= $userid";
	$update_firstlast_name_query = mysqli_query($connection,$query);
	confirmq($update_firstlast_name_query);
	$_SESSION['firstname'] 	=  	$firstname;
	$_SESSION['lastname']	=	$lastname;	
		
		
		
		
	
	
		}//if -submit
	}//else- when user fill first time details
} //else- user not login	
?>
	<title>User Profile</title>
	<!-- link css -->
	<link rel="stylesheet" href="css/user-profile.css">
	<!-- link responsive -->
	<link rel="stylesheet" href="css/responsive/responsive-user-profile.css">
</head>

<body>
<?php include "includes/navigation.php"; ?>

	<section id="background-img-user-page">
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div id="user-bacground-img">
					<img src="images/User-Profile/banner-with-overlay.jpg" alt="img" class="img-responsive">
					<div id="user-title">
						<p class="text-center">User Profile</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="user-profile">

		<div class="content-box-lg">
	<form action="" method="post" name="myForm" enctype="multipart/form-data">
			<div class="container">
				<div id="user-data">
					<div id="basic-profile-details">
					
						<div class="row">

							<div class="col-md-12 col-sm-12">

								<div class="user-profile-heading">
									<h2>Basic Profile Details</h2>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="validationDefault01" id="first-name">First name*</label>
								<input type="text" value="<?php echo $firstname; ?>" class="form-control" pattern=".*[^0-9].*.{1,}" title="Must contain 2 or more characters  and not only number" name="firstname" id="validationDefault01" placeholder="Enter your first name" required>
								<div id="fnamemsg" style="color:#ff3636; font-size:14px;"></div>
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="validationDefault02"  id="last-name">Last name*</label>
								<input type="text" value="<?php echo $lastname  ; ?>" class="form-control" name="lastname" pattern=".*[^0-9].*.{1,}" title="Must contain 2 or more characters  and not only number" id="validationDefault02" placeholder="Enter your last name" required>
								<div id="lnamemsg" style="color:#ff3636; font-size:14px;"></div>
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="exampleInputEmail1" id="email">Email*</label>
								<input type="email" value="<?php echo $email; ?>" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address" required readonly>
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="validationDefault03" id="date-of-birth">Date Of Birth*</label>
								<input type="date" value="<?php echo $dob; ?>" class="form-control" name="dob" id="validationDefault03" placeholder="Enter your birth date " required>
							</div>
							<div class="col-md-6 col-sm-6">
								<label  for="inlineFormCustomSelectPref">Gender</label>
								<select class="custom-select" name="gender" id="inlineFormCustomSelectPref"   placeholder="select your gender">
									<?php
									if($gender == 1){
										echo '<option value="1" selected>Male</option>';
										echo '<option value="2">Female</option>';
										echo '<option value="5">Other</option>';
									} else if($gender == 2){
										echo '<option value="1">Male</option>';
										echo '<option value="2" selected>Female</option>';
										echo '<option value="5">Other</option>';
									} else if($gender == 5){
										echo '<option value="1">Male</option>';
										echo '<option value="2">Female</option>';
										echo '<option value="5" selected>Other</option>';
									} else {
										echo '<option value="1">Male</option>';
										echo '<option value="2">Female</option>';
										echo '<option value="5">Other</option>';
									}
									?>
									
								</select>
								
							</div>
							<div class="col-md-6 col-sm-6">
						<label>Phone number</label>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-3">
								<div class="select-code">
								<select name="phonecode" class="custom-select" >
									<option value="+91" selected>+91</option>
									
								</select>
								</div>
							</div>
							<div class="col-md-9 col-sm-9 col-9">
								
						<input type="number" name="phoneno" value="<?php echo $phoneno; ?>" class="form-control" id="validationDefault022" placeholder="Enter your phone number" >
							</div>
						</div>

							</div>

							<div class="col-md-6 col-sm-6">
									<div class="row">
							<div class="col-md-12 col-sm-12">
								<label>Profile Picture</label>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="add-border text-center">
									<label for="upload">
										<img src="images/User-Profile/upload.png">
										<?php
										if($profilepic_db == ''){
											echo "<p id='uppictext' style='color: lightgray;'>Upload a Picture</p>";
										} else {
											echo "<p id='uppictext' style='color: #333333;'>Change Profile Picture </p>";
										}
										?>
										
										<input type="file" id="upload" name="profilepic" class="upload" style="display:none;">
									</label>
								</div>
							</div>
						</div>
							</div>
						</div>
						<div id="address-details">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="user-profile-heading">
										<h2>Address Details</h2>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault04" id="add-line-1">Address Line 1*</label>
									<input type="text" value="<?php echo $addline1  ; ?>" name="addline1" class="form-control" id="validationDefault04" placeholder="Enter your address" required>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault05" id="add-line-2">Address Line 2</label>
									<input type="text" value="<?php echo $addline2  ; ?>" name="addline2" class="form-control" id="validationDefault05" placeholder="Enter your address">
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault06" id="city">City*</label>
									<input type="text" value="<?php echo $city  ; ?>" name="city" class="form-control" id="validationDefault06" placeholder="Enter your city" required>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault07"  id="state">State*</label>
									<input type="text" value="<?php echo $state  ; ?>" name="state" class="form-control" id="validationDefault07" placeholder="Enter your state" required>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault08" id="zip-code">Zip Code*</label>
									<input type="number" value="<?php echo $zipcode ; ?>" name="zipcode" class="form-control" id="validationDefault08" placeholder="Enter your zip code" required>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault09" id="country">Country*</label>
									<input type="text" value="<?php echo $country  ; ?>" name="country" class="form-control" id="validationDefault09" placeholder="Enter your country" required>
								</div>
							</div>
						</div>
						<div id="univercity-info">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="user-profile-heading">
										<h2>University and collage information</h2>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault10" id="university">University</label>
									<input type="text" value="<?php echo $university  ; ?>" name="university" class="form-control" id="validationDefault10" placeholder="Enter your university">
								</div>
								<div class="col-md-6 col-sm-6">
									<label for="validationDefault11" id="collage">collage</label>
									<input type="text" value="<?php echo $collage  ; ?>" name="collage" class="form-control" id="validationDefault11" placeholder="Enter your collage">
								</div>
								<div class="col-md-2 col-sm-2">
									<button type="submit" name="submit" id="validatebtn" class="btn btn-block btn-general btn-margin">SUBMIT</button>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>
	<?php include "includes/footer.php"; ?>