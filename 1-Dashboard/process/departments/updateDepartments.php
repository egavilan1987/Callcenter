<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Departments.php";

	$currentDate=date("Y-m-d");
	$user="admin";

	$data=array(
		$_POST['idDepartment'],
		$_POST['departmentUpdate'],
		$user,
		$currentDate
				);

	$obj= new departments();
	echo $obj->updateDepartment($data);
 ?>
