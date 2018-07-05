<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Departments.php";
	$currentDate=date("Y-m-d");
	$iduser="admin";
	$department=$_POST['department'];
	$data=array(
		$iduser,
		$department,
		$currentDate
				);
	$obj= new departments();
	echo $obj->addDepartment($data);
 ?>
