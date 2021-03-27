<?php



//check error of query
function confirmq($r){
	global $connection;
	  if(!$r){
		   die ("error" .mysqli_error($connection));
	   }
}




//escape
function escape($string) {
global $connection;
return mysqli_real_escape_string($connection, trim($string));
}


//count total row in table
function  totalcount($table){
	global $connection;
	$query = "SELECT * FROM $table ";
	$totl_row_count_query = mysqli_query($connection,$query);
	$c=mysqli_num_rows($totl_row_count_query);
	return $c;
	
}


//redirect to onther page
function redirect($location='login-page.php'){
	header("Location: $location");
}

//check login user



//check email verfication
function isemailverified($email){
	global $connection;
	$query = "SELECT IsEmailVerified FROM users WHERE Email = '$email'  ";
	$check_email_verify_query = mysqli_query($connection,$query);
	confirmq($check_email_verify_query);
	$row = mysqli_fetch_assoc($check_email_verify_query);
	$isemailverified = $row['IsEmailVerified'];
	return $isemailverified;
}


//find count of published/rejected/submites notes
function  totalcountwithdata($table,$column,$data,$column2='SellerID'){
	global $connection;
	$seller = $_SESSION['ID']; 
	$query = "SELECT * FROM `$table` WHERE `$column`='$data' AND $column2 = $seller ";
	$totl_row_count_query = mysqli_query($connection,$query);
	$c=mysqli_num_rows($totl_row_count_query);
	return $c;
	
}


//for find categoryname by id 
function  tabledata($table,$getdata,$yourdatacolumn,$yourdata){
	global $connection;
	$query = "SELECT `$getdata` FROM `$table` WHERE `$yourdatacolumn`='$yourdata' ";
	$get_table_data_by_id_query = mysqli_query($connection,$query);
	$row = mysqli_fetch_assoc($get_table_data_by_id_query);
	$data = $row["$getdata"];
	return $data;
	
}

//find count of searched string
function  searchedstringcount($like,$table='sellernotes',$c1='Title'){
	global $connection;
	$seller = $_SESSION['ID']; 
	$query  = "SELECT * FROM sellernotes    ";
	$query .= "LEFT JOIN notecategories ON ";
	$query .= "Sellernotes.Category=notecategories.ID ";
	$query .= "WHERE $table.$c1 LIKE '%$like%' ";
	$query .= "AND Sellernotes.SellerID = $seller ";
	$totl_searched_row_count_query = mysqli_query($connection,$query);
	$c=mysqli_num_rows($totl_searched_row_count_query);
	return $c;
	
}
//
function checkForUserProfile($id){
	global $connection;
	$query    	= "SELECT * FROM userprofile WHERE UserID = $id ";
	$run_query 	= mysqli_query($connection,$query);
	confirmq($run_query);
	$count     	= mysqli_num_rows($run_query);
	if($count > 0){
		return true;
	} else {
		return false;
	}	
	
} 

//for profile picture
function profilePicPath($id){
	global $connection;

	$query 				= "SELECT ProfilePicture FROM userprofile WHERE UserID = $id ";
	$user_image_query 	= mysqli_query($connection,$query);
	confirmq($user_image_query);
	$c                  = mysqli_num_rows($user_image_query);
	if($c <= 0){
	$path				= "images/User-Profile/defaultprofile.jpg";
	} else {
		
	
	$row 				= mysqli_fetch_assoc($user_image_query);
	$image 				= $row['ProfilePicture'];
	if(!empty($image)){
	$path 				= "member/$id/$image";
	} else {
	$path				= "images/User-Profile/defaultprofile.jpg";
	}
}
	return $path;
}
//count reported book
function  totalcountwithdata1($table,$column,$data){
	global $connection; 
	$query = "SELECT * FROM `$table` WHERE `$column`='$data' ";
	$totl_row_count_query = mysqli_query($connection,$query);
	$c=mysqli_num_rows($totl_row_count_query);
	return $c;
	
}





























?>