<?php
	require_once 'connection.php';
	include_once 'function.php';

    $id = $_POST['id'];
    $book_name = $_POST['name'];
    $book_author = $_POST['author'];
    $account_name = $_POST['account-result'];
    $category = $_POST['category'];
    $interval = $_POST['borrow-time'];
    $admin = $_POST['admin'];

	if(isset($_POST['submit'])){
        $email = $id;
        $status = "borrowed";
        $column = "book_name";
        $table = "book";
        date_default_timezone_set('Asia/Manila');
        $borrow = date("Y-m-d");
        $date = date_create($time);
        $return = date_format(date_add($date, date_interval_create_from_date_string($interval." days")), 'Y-m-d');
        borrowBook($connection, $admin, $id, $book_name, $book_author, $category, $account_name, $borrow, $return, $status);
	}else {
        echo "Something went wrong";
        header("location: ../borrowbook.php?status=somethingwentwrong");
    }
