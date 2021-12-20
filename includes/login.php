<?php

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $table = "admins";
    $column = "admin_email";

    require_once 'connection.php';
    require_once 'function.php';

    loginUser($connection, $email, $pwd, $table, $column);
}else {
    header("location: ../index.php");
    exit();
}
