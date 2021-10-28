<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DUMNSS E-Library</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/book.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body class="responsive">
<div class="navigation">
                <ul>
                    <li class="selection">
                        <?php if (isset($_SESSION["Fname"])) {?>
                            <a>
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <span class="title">Settings</span>
                        </a>
                        <?php }else { ?>
                            <a id="login">
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <span class="title">LogIn</span>
                        </a>
                        <?php }?>
                    </li>
                    <li class="selection">
                        <a href="">
                            <span class="icon"><i class="fas fa-question-circle"></i></span>
                            <span class="title">About</span>
                        </a>
                    </li>
                    <li class="selection">
                        <a href="">
                            <span class="icon"><i class="fas fa-ticket-alt"></i></span>
                            <span class="title">Support</span>
                        </a>
                    </li>
                    <?php if (isset($_SESSION["Fname"])) {?>
                        <li class="selection">
                            <a href="includes/signout.php">
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
                    <a href="index.html">Home</a>
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
