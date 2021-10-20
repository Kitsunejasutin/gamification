<?php

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $pwd = $_POST["password"];

    require_once 'connection.php';
    require_once 'function.php';

    if (emptyInputLogin($email, $pwd) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($connection, $email, $pwd);
    }else {
        header("location: ../index.phpentered");
        exit();
    }
