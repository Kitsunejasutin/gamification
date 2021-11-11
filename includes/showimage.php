<?php 
    require_once 'connection.php';

    if (isset($_GET['book'])) {
        $book = mysqli_real_escape_string($connection,$_GET['book']);
        $sql = mysqli_query($connection,"SELECT book_image FROM books WHERE book_title='". $book ."';");
        while ($row = mysqli_fetch_assoc($sql)){
            $imageData = $row["book_image"];
        }
        header("content-type: image/png");
        echo $imageData;
    }
?>
