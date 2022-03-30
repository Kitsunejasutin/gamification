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
                <?php 
                    if (isset($_GET['edit'])){
                        if ($_GET['edit'] == 'admins'){
                            $email= $_SESSION['email'];
                            $sql = "SELECT * FROM admins WHERE admin_email=?";
                            $stmt = mysqli_stmt_init($connection);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("location: ../index.php?error=stmtfailedexists");
                                exit();
                            }
                            mysqli_stmt_bind_param($stmt, "s", $email);
                            mysqli_stmt_execute($stmt);
                            
                            $row = mysqli_stmt_get_result($stmt);
                            $data = mysqli_fetch_array($row);
                            if (isset($_SESSION['email'])){?>
                                <form action="includes/updateaccount.php" method="POST">
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="lname">Admin Number</label>
                                        </div>
                                        <div class="col-75">
                                            <input readonly type="text" id="number" name="number" value="<?php echo $data[0]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="lname">Admin Name</label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" id="name" name="name" value="<?php echo $data[1]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="lname">Admin Email</label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" id="email" name="email" value="<?php echo $data[2]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="lname">Admin Contact</label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" id="contact" name="contact" value="<?php echo $data[4]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="Submit" class="submit" name="submit" value="admins">Update Account</button>
                                    </div>
                                </form>
                        <?php
                            }/*else{
                                header("location: editaccount.php?edit=admin"); 
                            }*/
                        }elseif ($_GET['edit'] == 'accounts'){
                            $account_id= $_SESSION['id'];
                            $sql = "SELECT * FROM accounts WHERE id=?";
                            $stmt = mysqli_stmt_init($connection);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("location: ../index.php?error=stmtfailedexists");
                                exit();
                            }
                            mysqli_stmt_bind_param($stmt, "s", $account_id);
                            mysqli_stmt_execute($stmt);
                            
                            $row = mysqli_stmt_get_result($stmt);
                            $data = mysqli_fetch_array($row);
                            if (isset($_SESSION['email'])){?>
                                <form action="includes/updateaccount.php" method="POST">
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="lname">Admin Number</label>
                                        </div>
                                        <div class="col-75">
                                            <input readonly type="text" id="number" name="number" value="<?php echo $data[0]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="lname">Admin Name</label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" id="name" name="name" value="<?php echo $data[1]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="lname">Admin Email</label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" id="email" name="email" value="<?php echo $data[2]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="lname">Admin Contact</label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" id="contact" name="contact" value="<?php echo $data[4]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="Submit" class="submit" name="submit" value="admins">Update Account</button>
                                    </div>
                                </form>
                        <?php
                            }else{
                                header("location: login.php");
                            }
                        }
                    }else{
                        echo '<script>alert("Please go back to the previous page");';
                        echo 'window.location = "editaccount.php?edit='. $_SESSION['type'] . 's" </script>';
                    }
                ?>
            </div>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php 
	include_once 'includes/footer.php';
?>
