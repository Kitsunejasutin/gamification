<?php 

function emptyInputSignup($Fname, $Mname, $Lname, $Bdate, $address, $contact, $email, $pwd, $pwdRepeat) {
    $result = "";
    if (empty($Fname) || empty($Mname) || empty($Lname) || empty($Bdate) || empty($address) || empty($contact) || empty($email) || empty( $pwd)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result = "";
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function emailExists($connection, $email) {
    $sql = "SELECT * FROM account WHERE Email = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "&error=stmtfailedexists");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($connection, $Lname, $Fname, $Mname, $Bdate, $address, $contact, $email, $pwd) {
    $sql = "INSERT INTO account (Surname, Firstname, Middlename, Birthday, location_address, Contact, Email, pwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "&error=stmtfailedcreate");
        exit();
    }

    $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $Fname, $Mname, $Lname, $Bdate, $address, $contact, $email, $hashedPWD);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ". $_SERVER['HTTP_REFERER'] . "&error=none");
    exit();
}

function emptyInputLogin($email, $pwd) {
    $result="";
    if (empty($email) || empty( $pwd)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function loginUser($connection, $email, $pwd) {
    $emailExists = emailExists($connection, $email);

    if ($emailExists === false) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "&error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "&error=wrongloginpassword");
        exit();
    }else if ($checkPwd === true) {
        session_start();
        $_SESSION["Lname"] = $emailExists["Surname"];
        $_SESSION["Fname"] = $emailExists["Firstname"];
        $_SESSION["Mname"] = $emailExists["Middlename"];
        header("location: ../index.php");
        exit();

    }
}

function fetchbooks($connection) {
    $sql = "SELECT book_title FROM books";
    $result = mysqli_query($connection,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $bookArray[] = $row;
    }
    return $bookArray;
}
