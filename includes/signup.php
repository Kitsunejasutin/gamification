<?php

if (isset($_POST["submit"])) {
    
    require_once 'connection.php';
    require_once 'function.php';
    
    $Fname = mysqli_real_escape_string($connection,$_POST["Fname"]);
    $Mname = mysqli_real_escape_string($connection,$_POST["Mname"]);
    $Lname = mysqli_real_escape_string($connection,$_POST["Lname"]);
    $Bdate = mysqli_real_escape_string($connection,$_POST["Bdate"]);
    $address = mysqli_real_escape_string($connection,$_POST["address"]);
    $contact = mysqli_real_escape_string($connection,$_POST["contact"]);
    $email = mysqli_real_escape_string($connection,$_POST["email"]);
    $pwd = mysqli_real_escape_string($connection,$_POST["password"]);
    $pwdRepeat = mysqli_real_escape_string($connection,$_POST["pwdrepeat"]);

    if (emptyInputSignup($Fname, $Mname, $Lname, $Bdate, $address, $contact, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../index.php?error=emptyinputsignup");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../index.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../index.php?error=passworddontmatch");
        exit();
    }
    if (emailExists($connection, $email) !== false) {
        header("location: ../index.php?error=emailtaken");
        exit();
    }

    createUser($connection, $Lname, $Fname, $Mname, $Bdate, $address, $contact, $email, $pwd);

}else {
    header("location: ../index.php");
    exit();
}
