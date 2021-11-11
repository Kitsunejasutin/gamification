<?php
    include_once 'includes/book-headers.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';

    if (isset($_GET["book"])) {
        $book = $_GET["book"];
        $sql = "SELECT * FROM books WHERE book_title='". $book ."'";
        $result = mysqli_query($connection,$sql);
        $row = mysqli_fetch_assoc($result);
        if ($_GET["book"] = fetchbooks($connection)) {
            ?>
            <div class="grid">
                <div class="box">
                    <h1><?php echo $row['book_title']; ?></h1>
                </div>
                <div class="box1">
                    <p>Author: <?php echo $row['book_author']; ?></p>
                    <p>Information: </p>
                    <p>Views: </p>
                </div>
                <div class="box2">
                    <img src="includes/showimage.php?book=<?php echo $book; ?>">
                </div>
                <div class="box3">
                    <h1><i class="fas fa-bookmark"></i></h1>
                    <h1></h1>
                </div>
                <div class="box4">
                    <h1>Comments</h1>
                </div>
            </div>
            <?php
        }
    }else {
        echo "You didn't access the site correctly, Please go back to last page";
    }
?>

<?php
    include_once 'includes/footer.php'
?>
