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
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($connection, $email, $pwd, $Lname, $Fname, $Mname);
    }else {
        header("location: ../index.phpentered");
        exit();
    }
