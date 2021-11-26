<?php 
    include_once '../../includes/connection.php';
    include_once '../../includes/function.php';

    if (isset($_POST['submitImg'])) {

        $fileName = $_FILES['img']['name'];
        $fileTmpName = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $fileSize = $_FILES['img']['size'];
        $fileError = $_FILES['img']['error'];
        $fileType = $_FILES['img']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt =strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        $bookTitle = $_POST['books-title'];
        $sql = "SELECT book_id WHERE book_title=".$bookTitle;
        $result = mysqli_query($connection, $sql);
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = $bookTitle.".".$fileActualExt;
                    $sql = "UPDATE books SET book_image='".$fileTmpName."', book_image_name='".$fileNameNew."' WHERE book_title='".$bookTitle."'";
                    mysqli_query($connection, $sql);
                    /** 
                    $fileNameNew = $bookTitle.".".$fileActualExt;
                    $fileDestination = '../../images/book_image/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);*/
                    header("Location: ../index.php?status=uploadsuccess");
                }else {
                    header("Location: ../index.php?status=imagetoobig");
                }
            }else {
                header("Location: ../index.php?status=error");
            }
        }else{
            header("Location: ../index.php?status=incorrecttype");
        }
    }else if (isset($_POST['submitBook'])) {
        $book_title = $_POST["book_title"];
        $book_author = $_POST["book_author"];
        $book_info = $_POST["book_info"];
        $book_pub = $_POST["book_pub"];

        if (emptyBook($book_title, $book_author, $book_info, $book_pub) !== false) {
            header("location: ". $_SERVER['HTTP_REFERER'] . "?error=emptyinput");
            exit();
        }
        if (bookExists($connection, $book_title) !== false) {
            header("location: ". $_SERVER['HTTP_REFERER'] . "?error=bookexists");
            exit();
        }

        createBook($connection, $book_title, $book_author, $book_info, $book_pub);
    }
?>
