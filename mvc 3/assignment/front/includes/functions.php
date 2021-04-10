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
	if(!empty($row)){
	$data = $row["$getdata"];
		
	return $data;
	}
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
//default profile pic
function defaultprofilePic(){
	
global $connection;
$query = "SELECT * FROM `systemconfigurations` WHERE ID = 5";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
return  $row['Value'];
	 	
}
//default note pic
function defaultnote(){

global $connection;
$query = "SELECT * FROM `systemconfigurations` WHERE ID = 4";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
return $row['Value'];

}
//default note pic
function SystemEmail(){

global $connection;
$query = "SELECT * FROM `systemconfigurations` WHERE ID = 1";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
return $row['Value'];

}
//facebook
function SystemFB(){

global $connection;
$query = "SELECT * FROM `systemconfigurations` WHERE ID = 6";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
return $row['Value'];

}
//twitter
function SystemTwitter(){

global $connection;
$query = "SELECT * FROM `systemconfigurations` WHERE ID = 7";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
return $row['Value'];

}
//linkdin
function SystemLinkedin(){

global $connection;
$query = "SELECT * FROM `systemconfigurations` WHERE ID = 8";
$take_data_from_systemconfigurations = mysqli_query($connection,$query);
confirmq($take_data_from_systemconfigurations);
$row = mysqli_fetch_assoc($take_data_from_systemconfigurations);
return $row['Value'];

}
//for profile picture
function profilePicPath($id){
	global $connection;

	$query = "SELECT ProfilePicture FROM userprofile WHERE UserID = $id ";
	$user_image_query = mysqli_query($connection,$query);
	confirmq($user_image_query);
	$c = mysqli_num_rows($user_image_query);
	if($c <= 0){
		$img = defaultprofilePic();
	$path = "member/$img";
	} else {
		
	
	$row = mysqli_fetch_assoc($user_image_query);
	$image = $row['ProfilePicture'];
	if(!empty($image)){
	$path = "member/$id/$image";
	} else {
	$img = defaultprofilePic();
	$path = "member/$img";
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

function checkrole($id){
	global $connection; 
	$q = "SELECT RoleID FROM `users` WHERE ID=$id ";
	$run_query = mysqli_query($connection,$q);
	$row = mysqli_fetch_assoc($run_query);
	return $role = $row['RoleID'];
}

function checkAdminActive($id){
	global $connection; 
	$q = "SELECT IsActive FROM `users` WHERE ID=$id ";
	$run_query = mysqli_query($connection,$q);
	$row = mysqli_fetch_assoc($run_query);
	 return $row['IsActive'];

		
}

function checksessionforadmin(){
	if(isset($_SESSION['ID'])){
	$adminid = $_SESSION['ID'];
	if(checkrole($adminid) != 3){
		if(checkAdminActive($adminid)){
		return $adminid;
		} else {
			header("Location: login-page.php");
		}
	} else {
		redirect("../front/search-page.php");
	}
} else {
	header("Location: login-page.php");
}
}

//find count of published/rejected/submites notes
function  totalcountwithdata2($table,$column,$data,$column2,$data2){
	global $connection;
	$query = "SELECT * FROM `$table` WHERE `$column`='$data' AND $column2 = $data2 ";
	$totl_row_count_query = mysqli_query($connection,$query);
	$c=mysqli_num_rows($totl_row_count_query);
	return $c;
	
}

  function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}


//check for active user or note
function IsActive($table,$id){
	global $connection;
	$query = "SELECT IsActive FROM `$table` WHERE ID=$id ";
	$run_query = mysqli_query($connection,$query);
	confirmq($run_query);
	$row = mysqli_fetch_assoc($run_query);
	return $row['IsActive'];	
}

function systemSendEmail(){
	return $Email = 'parthdevani3817@gmail.com';
}
function SendEmailPwd(){
	return $P = 'PDg@#123s';
}
	
function unpublishSendMail($note,$remark){
	$SystemEmail 	= systemSendEmail();
	$S_PWD 			= SendEmailPwd();
	$notetitle 		= tabledata('sellernotes','Title','ID',$note);	
	$a_id 			= tabledata('sellernotes','SellerID','ID',$note);	
	$a_Fn 			= tabledata('users','FirstName','ID',$a_id);
	$a_Ln 			= tabledata('users','LastName','ID',$a_id);
	$a_Email 		= tabledata('users','Email','ID',$a_id);
	require '../front/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                              

	$mail->isSMTP();                                      
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                               
	$mail->Username = "$SystemEmail";                 
	$mail->Password = "$S_PWD";                           
	$mail->SMTPSecure = 'tls';                           
	$mail->Port = 587;                                    

	$mail->setFrom("$SystemEmail", 'Mailer');
	$mail->addAddress("$a_Email", 'User');     
	//$mail->addAddress('ellen@example.com');               
	$mail->addReplyTo("$SystemEmail", 'Information');



	$mail->isHTML(true);                                  

	$mail->Subject = "Sorry! We need to remove your notes from our portal.";
	$mail->Body    = "hello $a_Fn $a_Ln,<br><br>We want to inform you that,your note $notetitle has been removed from the portal. Please find our remarks below-<br><br>$remark<br><br>Regards,<br>Notes Marketplace.";


	if(!$mail->send()) {


	} else {
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

	
	























?>