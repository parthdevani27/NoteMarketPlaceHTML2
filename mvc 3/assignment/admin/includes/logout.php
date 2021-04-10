<?php ob_start(); ?>
<?php session_start(); ?>

<?php 


$_SESSION['username'] = null;
$_SESSION['Email'] =  null;
$_SESSION['ID'] =  null;
$_SESSION['RoleID'] =  null;
$_SESSION['firstname'] =  null;
$_SESSION['lastname'] =  null;
$_SESSION['isemailverified']=null;

	
header("Location: ../login-page.php");
  


?>
