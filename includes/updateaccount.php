<?php
	require_once 'connection.php';
	include_once 'function.php';

    $id = $_POST['number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    if (isset($_POST['admins'])){
        $table = 'admins';
        $address= '';
        $pwd = '';
        updateAccount($connection, $id, $table, $name, $email, $contact, $address, $pwd);
	}elseif (isset($_POST['accounts'])) {
        $table = 'accounts';
        $address = $_POST['address'];
        $pwd = $_POST['password'];
        updateAccount($connection, $id, $table, $name, $email, $contact, $address, $pwd);
    }else{
        echo "Something went wrong";
        header("location: ../editaccount.php?status=somethingwentwrong");
        exit();
    }
