<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/book.css">
	<title>DUMNSS Library</title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <div class="info">
                <form action="includes/addbook_inc.php" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Book ID</label>
                        </div>
                        <div class="col-75">
                            <input readonly type="text" id="id" name="id" value="<?php $data = fetchLatestBook($connection); if (!$data == false) {$id = $data['book_id'];for ($x = 0; $x <= $id; $x++){}echo $x;}else{echo "1";} ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="name" name="name" placeholder="Name..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Category</label>
                        </div>
                        <div class="col-75">
                            <select name="category">
                                <?php 
                                    $sql = "SELECT * FROM category";
                                    $stmt = mysqli_stmt_init($connection);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        header("location: ../addbook.php?error=stmtfailedexists");
                                        exit();
                                    }
                                    mysqli_stmt_execute($stmt);
                                    
                                    $resultData = mysqli_stmt_get_result($stmt);

                                    while($row = mysqli_fetch_array($resultData)){?>
                                        <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
                                    <?php }
                                    mysqli_stmt_close($stmt);
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Info</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="info" name="info" placeholder="Info..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Author</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="author" name="author" placeholder="Author..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Publish</label>
                        </div>
                        <div class="col-75">
                            <input type="date" id="publish" name="publish" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Copies</label>
                        </div>
                        <div class="col-75">
                            <input type="number" id="copies" name="copies" required>
                        </div>
                    </div>
                    <div class="row">
                        <button type="Submit" class="submit" name="submit">Add Book</button>
                    </div>
                </form>
                <?php include_once "includes/notification_handle.php" ?>
            </div>
<?php 
	include_once 'includes/footer.php';
?>
