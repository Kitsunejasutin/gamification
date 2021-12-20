<?php
	require_once 'connection.php';
	include_once 'function.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

	if(isset($_POST['submit'])){
        $column = "account_email";
        $table = "accounts";
        if(emailExists($connection, $email, $column, $table) !== false){
            header("location: ../addstudent.php?status=emailtaken");
            exit();
        }
        createUser($connection, $name, $email, $contact, $address);
	}else {
        echo "galing";
    }
