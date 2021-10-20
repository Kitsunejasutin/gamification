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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body class="responsive">
    <div class="container">
        <nav>
            <div class="logo">
                DUMNSS
            </div>
            <ul class="nav-links">
                <li>
                    <a href="">About</a>
                </li>
                <li>
                    <a>Support</a>
                </li>
                <li>
                    <?php 
                        if (isset($_SESSION["userid"])) {
                            echo '<a href="includes/signout.php"><button class="navbar_button" id="signout">LOG OUT</button></a>';
                        }else {
                            echo '<button class="navbar_button" id="login">LOG IN</button>';
                        }
                    ?>
                </li>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
