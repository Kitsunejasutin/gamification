<?php

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $Lname = $_POST["Lname"];
    $Fname = $_POST["Fname"];
    $Mname = $_POST["Mname"];

    require_once 'connection.php';
    require_once 'function.php';

    if (emptyInputLogin($email, $pwd) !== false) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "&error=emptyinput");
        exit();
    }

    loginUser($connection, $email, $pwd);
    }else {
        header("location: ". $_SERVER['HTTP_REFERER'] . "&entered");
        exit();
    }
