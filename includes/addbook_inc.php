<?php
	require_once 'connection.php';
	include_once 'function.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $info = $_POST['info'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $publish = $_POST['publish'];
    $copies = $_POST['copies'];
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if($fileSize < 500000) {
                $fileNameNew = $id . ".jpg";
                $fileDestination = '../images/books/'. $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                if(isset($_POST['submit'])){
                    $email = $id;
                    $column = "book_name";
                    $table = "book";
                    if(emailExists($connection, $email, $column, $table) !== false){
                        header("location: ../addbook.php?status=bookalreadytaken");
                        exit();
                    }
                    addBook($connection, $name, $id, $info, $author, $category, $publish, $copies);
                }else {
                    echo "Something went wrong";
                    header("location: ../addbook.php?status=somethingwentwrong");
                }
            }else {
                echo "File is too big~";
            }
        }else {
            echo "There's a error";
        }
    }else{
        echo "You cannot upload files of this type!";
    }
