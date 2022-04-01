<?php

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $table = "admins";
    $column = "admin_email";
    $continue = $_POST['login'];

    require_once 'connection.php';
    require_once 'function.php';

    loginUser($connection, $email, $pwd, $table, $column, $continue);
}else {
    header("location: ../index.php");
    exit();
}
