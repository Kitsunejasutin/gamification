<?php
	require_once 'connection.php';
	include_once 'function.php';

    $id = $_POST['id'];
    $book_name = $_POST['name'];
    $category = $_POST['category'];
    $account = $_POST['sname'];
    $borrow_date = $_POST['borrow-date'];
    $return_date = $_POST['return-date'];
    $return_status = $_POST['return-status'];
    $admin = $_POST['admin'];
    $borrow_admin = $_POST['borrow-admin'];
	if(isset($_POST['submit'])){
        $email = $id;
        $book_id = $_POST['submit'];
        $status = "borrowed";
        $column = "book_name";
        $table = "book";
        date_default_timezone_set('Asia/Manila');
        $current_date = date("Y-m-d");
        returnBook($connection, $borrow_admin, $id, $book_id, $account, $borrow_date, $return_date, $admin, $current_date, $return_status);
	}else {
        echo "Something went wrong";
        header("location: ../borrowbook.php?status=somethingwentwrong");
    }
