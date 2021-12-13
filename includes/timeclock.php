<?php
	require_once 'connection.php';
	include_once 'function.php';

	$id = $_POST['EmployeeIDinput'];
	date_default_timezone_set('Asia/Manila');
	$time = date("Y-m-d H:i:s");

	if(isset($_POST['TimeIN-btn'])){
		timeIn($connection, $id, $time);
	}elseif(isset($_POST['TimeOUT-btn'])){
		timeOut($connection, $id, $time);
	}
