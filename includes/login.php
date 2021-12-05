<?php

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $pwd = $_POST["password"];

    require_once 'connection.php';
    require_once 'function.php';

    loginUser($connection, $email, $pwd);
}else {
    header("location: ../index.php");
    exit();
}
