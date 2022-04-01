<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/addstudent.css">
	<title>DUMNSS Library</title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <div class="info">
                <div class="card">
                    <div class="logo">
                        <img src="images/dumnss_logo.png">
                    </div>
                    <?php if(isset($_GET['login'])){
                        echo '<span class="header">Admin LogIn</span>';
                    } ?>
                    <?php 
                    if (isset($_GET['account']) == "firsttimelogin"){?>
                        <form action="includes/createpassword.php" method="POST">'
                            <span class="greetings">Hello <?php echo $_SESSION['account_email'] ?> , Please Set your password</span>
                            <div class="row">
                                <div class="col-25">
                                    <label for="fname">Email</label>
                                </div>
                                <div class="col-75">
                                    <input readonly type="text" id="email" name="email" placeholder="Email..." value="<?php echo $_SESSION['account_email']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Passowrd</label>
                                </div>
                                <div class="col-75">
                                    <input type="password" id="password" name="password" placeholder="Password...">
                                </div>
                            </div>
                            <div class="row">
                                <button type="Submit" class="submit" name="login">LogIn</button>
                            </div>
                        </form>
                    <?php
                    }else{?>
                    <form action="includes/login.php" method="POST">
                        <div class="row">
                                <div class="col-25">
                                    <label for="fname">Email</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="email" name="email" placeholder="Email...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="lname">Passowrd</label>
                                </div>
                                <div class="col-75">
                                    <input type="password" id="password" name="password" placeholder="Password...">
                                </div>
                            </div>
                            <div class="row">
                            <?php if(!isset($_GET['login'])){
                                echo '<a href="login.php?login=admin" class="admin"><span class="admin-login">If you are a admin, Click Here</span></a><br><br>';
                                error_reporting(E_ERROR | E_PARSE);
                                if ($_GET['continue'] == null){
                                    echo '<button type="Submit" class="submit" name="login">LogIn</button>';
                                }else{
                                    echo '<button type="Submit" class="submit" name="login" value="'. $_GET['continue'] .'">LogIn</button>';
                                }
                            }else{
                                echo '<a href="login.php" class="admin"><span class="admin-login">Back</span></a><br><br>'; 
                                //error_reporting(E_ERROR | E_PARSE);
                                if ($_GET['continue'] == null){
                                    echo '<button type="Submit" class="submit" name="admin">LogIn</button>';
                                }else{
                                    echo '<button type="Submit" class="submit" name="admin" value="'. $_GET['continue'] .'">LogIn</button>';
                                }
                            } ?>
                            <?php
                            }
                        ?>
                        </div>
                    </form>
                </div>
            </div>
<?php 
	include_once 'includes/footer.php';
?>
