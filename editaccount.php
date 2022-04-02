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
                    if (isset($_SESSION['type'])){
                        if ($_SESSION['type'] == "admins"){
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
                            $data = mysqli_fetch_array($row);?>
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
                                        <input type="email" id="email" name="email" value="<?php echo $data[2]; ?>" required>
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
                                    <button type="Submit" class="submit" name="admins" value="admins">Update Account</button>
                                </div>
                            </form>
                        <?php
                        }elseif (isset($_SESSION['type']) == "accounts"){
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
                            $data = mysqli_fetch_array($row);?>
                            <form action="includes/updateaccount.php" method="POST">
                                <div class="row">
                                    <div class="col-25">
                                        <label for="lname">Account Number</label>
                                    </div>
                                    <div class="col-75">
                                        <input readonly type="text" id="number" name="number" value="<?php echo $data[0]; ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-25">
                                        <label for="lname">Account Name</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="name" name="name" value="<?php echo $data[1]; ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-25">
                                        <label for="lname">Account Email</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="email" id="email" name="email" value="<?php echo $data[2]; ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-25">
                                        <label for="lname">Account Password</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="password" id="password" name="password" value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-25">
                                        <label for="lname">Account Contact</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="contact" name="contact" value="<?php echo $data[4]; ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-25">
                                        <label for="lname">Account Address</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="address" name="address" value="<?php echo $data[5]; ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="Submit" class="submit" name="accounts" value="accounts">Update Account</button>
                                </div>
                            </form>
                        <?php
                        }
                    }else{
                        header("location: login.php?continue=http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                    }
                ?>
            </div>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php 
	include_once 'includes/footer.php';
?>
