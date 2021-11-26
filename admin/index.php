<?php
    include_once '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUMNSS Admin Page</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="container">
        <div class="box1">
            <form action='includes/upload.php' method='POST' enctype='multipart/form-data'>
            <select class="books-title" name="books-title">
            <?php
                $sql = "SELECT * FROM books";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($rowBook = mysqli_fetch_array($result)) {
                        echo "<option value='". $rowBook['book_title'] ."'>" .$rowBook['book_title'] ."</option>";
                    }             
                    echo "</select><br>"; 
                    echo "<input type='file' name='img' class='uploadImg'>
                    <button type='submit' name='submitImg'>UPLOAD</button>";
                    echo "</form>";
                    if (isset($_GET["status"])) { 
                    include_once 'includes/upload-errors.php';
                    }
                }else {
                    echo "There's no Books yet!";
                }
            ?>
        </div>
        <div class="box2">
            <form action='includes/upload.php' method="POST">
                <input type="text" name="book_title" placeholder="Book Title">
                <input type="text" name="book_author" placeholder="Book Author">
                <input type="text" name="book_info" placeholder="Book Info">
                <input type="text" name="book_pub" placeholder="Book Published">
                <br><button type="submit" name="submitBook">Add Book</button>
            </form>
            <?php 
                if (isset($_GET["error"])) { 
                    include_once 'includes/upload-errors.php';
                }
            ?>
        </div>
    </div>
</body>
</html>
