<?php 
	session_start();
	if(isset($_SESSION['user'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Init</title>
	<?php require_once "menu.php"; ?>
</head>
<body>


</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>
