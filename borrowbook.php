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
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Book ID</label>
                    </div>
                    <div class="col-75">
                        <input list="book" id="book_search" required>
                        <datalist id="book">
                            <?php 
                                $sql = "SELECT * FROM book";
                                $stmt = mysqli_stmt_init($connection);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("location: ../borrowbook.php?error=stmtfailedexists");
                                    exit();
                                }
                                mysqli_stmt_execute($stmt);
                                            
                                $resultData = mysqli_stmt_get_result($stmt);

                                while($row = mysqli_fetch_array($resultData)){?>
                                    <option value="<?php echo $row[1];?>">
                                <?php }
                                            
                                mysqli_stmt_close($stmt);
                            ?>
                        </datalist>     
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Student Name</label>
                    </div>
                    <div class="col-75">
                        <input name="account" list="account" required>
                        <datalist id="account" required>
                            <?php 
                                $sql = "SELECT * FROM accounts";
                                $stmt = mysqli_stmt_init($connection);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("location: ../borrowbook.php?error=stmtfailedexists");
                                    exit();
                                }
                                mysqli_stmt_execute($stmt);
                                        
                                $resultData = mysqli_stmt_get_result($stmt);

                                while($row = mysqli_fetch_array($resultData)){?>
                                    <option data-value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                                <?php }
                                        
                                mysqli_stmt_close($stmt);
                                ?>
                        </datalist>     
                        <input readonly type="text" id="account-result" name="account-result" style="display:none;" required> 
                    </div>
                    <div class="row">
                        <button type="Submit" class="submit" id="submit" name="query">Query</button>
                    </div>
                </div>
                <div id="results"></div>
            </div>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php 
	include_once 'includes/footer.php';
?>
