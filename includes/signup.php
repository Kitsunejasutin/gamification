<?php

/*if (isset($_POST["submit"])) {
    
    require_once 'connection.php';
    require_once 'function.php';
    
    $Fname = $_POST["Fname"];
    $Mname = $_POST["Mname"];
    $Lname = $_POST["Lname"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    //$pwdRepeat = $_POST["pwdrepeat"];

    if (emptyInputSignup($Fname, $Mname, $Lname, $Bdate, $address, $contact, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../index.php?error=emptyinputsignup");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../index.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../index.phperror=passworddontmatch");
        exit();
    }
    if (emailExists($connection, $email) !== false) {
        header("location: ../index.php?error=emailtaken");
        exit();
    }

    createUser($connection, $pwd, $email);

}else {
    header("location: ../index.php");
    exit();
}*/
