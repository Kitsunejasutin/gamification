<?php
	require_once 'connection.php';
	include_once 'function.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $info = $_POST['info'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $publish = $_POST['publish'];

	if(isset($_POST['submit'])){
        $email = $id;
        $column = "book_name";
        $table = "book";
        if(emailExists($connection, $email, $column, $table) !== false){
            header("location: ../addstudent.php?status=bookalreadytaken");
            exit();
        }
        addBook($connection, $name, $id, $info, $author, $category, $publish);
	}else {
        echo "Something went wrong";
        header("location: ../addstudent.php?status=somethingwentwrong");
    }
