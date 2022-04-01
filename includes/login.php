<?php

    require_once 'connection.php';
    require_once 'function.php';

    $email = $_POST["email"];
    $pwd = $_POST["password"];

if (isset($_POST["admin"])) {
    $table = "admins";
    $column = "admin_email";

    loginUser($connection, $email, $pwd, $column, $table, $continue);
}elseif (isset($_POST["login"])) {
    $continue = $_POST['login'];
    $table = "accounts";
    $column = "account_email";
    loginUser($connection, $email, $pwd, $column, $table, $continue);
}else{
    header("location: ../login.php?error=failed");
    exit();
}
