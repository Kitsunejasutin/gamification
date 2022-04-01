<?php

    require_once 'connection.php';
    require_once 'function.php';
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $table= "accounts";
    $column = "account_email";

    createPassword($connection, $email, $pwd);
    loginUser($connection, $email, $pwd, $column, $table, $continue);
}else{
    header("location: ../login.php?error=youshouldntbefore");
    exit();
}
