<?php 
	session_start();

	require_once "../../classes/connection.php";
	require_once "../../classes/Departments.php";

	$currentDate=date("Y-m-d");

	$data=array(
		$idUser,
		$_POST['idDepartment'],
		$_POST['departmentUpdate'],
		$currentDate
				);

	$obj= new departments();
	echo $obj->updateDepartment($data);
 ?>
