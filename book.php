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
                    <p>Information: <?php echo $row['book_info']; ?></p>
                    <p>Published: <?php echo $row['book_publish']; ?></p>
                    <p>Views: </p>
                </div>
                <div class="box2">
                    <img src="includes/showimage.php?book=<?php echo $book; ?>">
                </div>
                <div class="box3">
                    <a href="includes/bookmark.php">
                        <span class="mark"><i class="fas fa-bookmark"></i></span>
                        <span class="title">Bookmark</span>
                    </a>
                    <a href="includes/read.php">
                        <span mark="mark"><i class="fas fa-eye"></i></span>
                        <span class="title">Read</span>
                    </a>
                </div>
                <div class="box4">
                    <h1>Comments</h1>
                    <form action="" method="POST" class="form">
			            <div class="input-group textarea">
				            <textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
			            </div>
			            <div class="input-group">
				            <button name="submit" class="btn">Post Comment</button>
			                </div>
		            </form>
                    <div class="prev-comments">
                        <?php 
			
			                $sql = "SELECT * FROM comments";
			                $result = mysqli_query($connection, $sql);
			                if (mysqli_num_rows($result) > 0) {
				            while ($row = mysqli_fetch_assoc($result)) {
			            ?>
			            <div class="single-item">
                        <h4><?php echo $row['name']; ?></h4>
				        <p><?php echo $row['comment']; ?></p>
			        </div>
			        <?php
                            }
                        }
			        ?>
                    </div>
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
