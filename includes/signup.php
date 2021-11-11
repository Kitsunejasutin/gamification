<?php

if (isset($_POST["submit"])) {
    
    require_once 'connection.php';
    require_once 'function.php';
    
    $Fname = $_POST["Fname"];
    $Mname = $_POST["Mname"];
    $Lname = $_POST["Lname"];
    $Bdate = $_POST["Bdate"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["pwdrepeat"];

    if (emptyInputSignup($Fname, $Mname, $Lname, $Bdate, $address, $contact, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "&error=emptyinputsignup");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "&error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "&error=passworddontmatch");
        exit();
    }
    if (emailExists($connection, $email) !== false) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "&error=emailtaken");
        exit();
    }

    createUser($connection, $Lname, $Fname, $Mname, $Bdate, $address, $contact, $email, $pwd);

}else {
    header("location: ../index.php");
    exit();
}
