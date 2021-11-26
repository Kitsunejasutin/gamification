<?php 
    session_start();
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DUMNSS E-Library</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/mainpage.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body class="responsive">
    <div class="navigation">
        <ul>
        <?php if (isset($_SESSION["Fname"])) {
                    if ($_SESSION["type"] == "member") {?>
                <li class="user">
                    <a>
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="title"> Hi!, <?php echo $_SESSION['Fname']; ?></span>
                    </a>
                </li>
                <li class="selection">
                    <a class="selection-links">
                        <span class="icon"><i class="fas fa-user-cog"></i></span>
                        <span class="title">Account Settings</span>
                    </a>
                </li>
                <?php }elseif($_SESSION["type"] == "admin") {?>
                    <li class="user">
                        <a>
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <span class="title"> Hi!, <?php echo $_SESSION['Fname']; ?></span>

                        </a>
                    </li>
                    <li class="selection">
                        <a class="selection-links">
                            <span class="icon"><i class="fas fa-user-cog"></i></span>
                            <span class="title">Account Settings</span>
                        </a>
                    </li>
                    <li class="selection">
                        <a href="admin/index.php" class="selection-links">
                            <span class="icon"><i class="fas fa-book"></i></span>
                            <span class="title"> Add Books</span>
                        </a>
                    </li>
            <?php }}else { ?>
                <li class="selection">
                    <a class="selection-links" id="login">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="title">LogIn</span>
                    </a>
                </li>
                <?php }?>
                <li class="selection">
                    <a href="" class="selection-links">
                        <span class="icon"><i class="fas fa-question-circle"></i></span>
                        <span class="title">About</span>
                    </a>
                </li>
                <li class="selection">
                    <a href="" class="selection-links">
                        <span class="icon"><i class="fas fa-ticket-alt"></i></span>
                        <span class="title">Support</span>
                    </a>
                </li>
                <?php if (isset($_SESSION["Fname"])) {?>
                <li class="selection">
                    <a href="includes/signout.php" class="selection-links">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="title">Signout</span>
                    </a>
                 </li>
            <?php }?>
        </ul>
    </div>
    <div class="container">
    <div id="home-options">
        <div id="home-options-contents">
            <div class="tab" id="home">
                <span class="pulldown">
                    <a href="index.php">Home</a>
                </span>
            </div>
            <div class="tab" id="categories">
                <span class="pulldown">
                    <a href="index.html">Categories</a>
                </span>
            </div>
            <div class="searchbox">
                 <input type="text" id="input-default" placeholder="search" size="22" autocomplete="off" maxlength="64" >
            </div>
        </div>
    </div>
        <!-- Popup LogIn -->
        <div class="bg-modal">
        <div class="modal-content">
            <div class="close">+</div>
            <img src="images/dumnss_logo.png" height="100px">
            <form action="includes/login.php" method="post">
                <p class="tag-name">Email</p>
                <input type="email" class="login" name="email">
                <p class="tag-name">Password</p>
                <input type="password" class="login" name="password">
                <button id="btnLogin" name="login">LogIn</button>
            </form>
            <button id="btnSignup">SignUp</button>
            <div class="error-messages">
            <?php  include 'includes/login-errors.php'; ?>
        </div>
        </div>
    </div>
    <!-- Popup SignUp -->
    <div class="bg-modal-signup">
        <div class="modal-content-signup">
            <div class="close-signup">+</div>
            <div class="back-signup">
                <i class="arrow left"></i>
            </div>
            <img src="images/dumnss_logo.png" height="95px">
            <form action="includes/signup.php" method="post">
                <p class="tag-name">Name</p>
                <input type="text" class="name" name="Lname" placeholder="Surname">
                <input type="text" class="name" name="Fname" placeholder="First Name">
                <input type="text" class="name" name="Mname" placeholder="Middle Name">
                <p class="tag-name">Birthdate</p>
                <input type="date" class="date" name="Bdate">
                <p class="tag-name">Address</p>
                <input type="text" class="signup-text" name="address">
                <p class="tag-name">Contact</p>
                <input type="text" class="signup-text" name="contact">
                <p class="tag-name">Email</p>
                <input type="text" class="signup-text" name="email">
                <p class="tag-name">Password</p>
                <input type="password" class="signup-text" name="password">
                <p class="tag-name">Confirm Password</p>
                <input type="password" class="signup-text" name="pwdrepeat">
                <button id="btnSubmit" name="submit">Signup</button>
                <div class="error-messages">
                    <?php  include 'includes/signup-errors.php'; ?>
                </div>
            </form>
        </div>
    </div>

