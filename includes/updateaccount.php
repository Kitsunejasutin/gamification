<?php
	require_once 'connection.php';
	include_once 'function.php';

    $id = $_POST['number'];
    $table = $_POST['submit'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = "";
	if(isset($_POST['submit'])){
        updateAccount($connection, $id, $table, $name, $email, $contact, $address);
	}else {
        echo "Something went wrong";
        header("location: ../editaccount.php?status=somethingwentwrong");
    }
