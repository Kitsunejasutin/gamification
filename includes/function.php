<?php

/*function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}*/

function emailExists($connection, $email) {
    $sql = "SELECT * FROM accounts WHERE email = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailedexists");
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

/*function createUser($connection,$pwd, $email) {
    $sql = "INSERT INTO account (type, Surname, Firstname, Middlename, Birthday, location_address, Contact, Email, pwd) VALUES ('0', ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailedcreate");
        exit();
    }

    $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $Fname, $Mname, $Lname, $Bdate, $address, $contact, $email, $hashedPWD);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}*/

function loginUser($connection, $email, $pwd) {
    $emailExists = emailExists($connection, $email);

    if ($emailExists === false) {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../index.php?error=wrongloginpassword");
        exit();
    }else if ($checkPwd === true) {
        session_start();
        $_SESSION["type"] = $emailExists["type"];
        if ($_SESSION['type'] == "1") {
            $_SESSION["LName"] = $emailExists["LName"];
            $_SESSION["FName"] = $emailExists["FName"];
            $_SESSION["MName"] = $emailExists["MName"];
            $_SESSION["type"] = $emailExists["type"];
            header("location: ../dashboard.php" );
            exit();
        }elseif ($_SESSION['type'] == "0"){
            //$_SESSION["admin"] = TRUE;
            $_SESSION["LName"] = $emailExists["LName"];
            $_SESSION["FName"] = $emailExists["FName"];
            $_SESSION["MName"] = $emailExists["MName"];
            $_SESSION["type"] = $emailExists["type"];
            $sql = "SELECT company_name FROM company_info"; $result = mysqli_query($connection, $sql); $column = mysqli_fetch_array($result);
            if ($column['company_name'] == ""){header("location: ../registration1.php");}else {header("location: ../dashboard.php");}
            exit();
        }
    }
}

function fetchcompanyname($connection){
    $sql = "SELECT company_name FROM company_info; ";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result);
    return $row['company_name'];
}

function checkin($connection) {
    
}
