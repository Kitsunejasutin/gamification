<?php
	require_once 'connection.php';
	include_once 'function.php';

	$id = $_POST['employee_number'];
    $FName = $_POST['FName'];
    $MName = $_POST['MName'];
    $LName = $_POST['LName'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

	if(isset($_POST['submit'])){
        if(emailExists($connection, $email) !== false){
            header("location: ../addemployee.php?status=emailtaken");
            exit();
        }
        createUser($connection, $id, $email, $pwd, $FName, $MName, $LName, $address, $contact);
	}else {

    }
