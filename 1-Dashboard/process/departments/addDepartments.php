<?php 
	session_start();

	require_once "../../classes/connection.php";
	require_once "../../classes/Departments.php";

	$currentDate=date("Y-m-d");
	$idUser=100;
	$department=$_POST['department'];

	$data=array(
		$idUser,
		$department,
		$currentDate
				);

	$obj= new departments();
	echo $obj->addDepartment($data);
 ?>
