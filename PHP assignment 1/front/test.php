
<?php 
if(isset($_POST['value'])){
	 
	echo "yes";	
} else {
	echo "notget";
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<br><br>
		<label >name</label>
	
		<br><br>
		 <input type="file" name="files[]" multiple>
		<button type="submit" name="submit">submit</button>
	</form>
	
	<!-- link jquery file-->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script>
//	$(document).ready(function(){
//
//	$("button").click(function(){
//		
//		var a=$(".validate").val();
//		$.post('test.php?value=a');
//	});
//});
	</script>
</body>

</html>