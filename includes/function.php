<?php 

function emptyInputSignup($Fname, $Mname, $Lname, $Bdate, $address, $contact, $email, $pwd, $pwdRepeat) {
    if (empty($Fname) || empty($Mname) || empty($Lname) || empty($Bdate) || empty($address) || empty($contact) || empty($email) || empty( $pwd)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
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
}

function emailExists($connection, $email) {
    $sql = "SELECT * FROM account WHERE Email = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "?serror=stmtfailedexists");
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
    $sql = "INSERT INTO account (type, Surname, Firstname, Middlename, Birthday, location_address, Contact, Email, pwd) VALUES ('member', ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "?error=stmtfailedcreate");
        exit();
    }

    $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $Fname, $Mname, $Lname, $Bdate, $address, $contact, $email, $hashedPWD);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ". $_SERVER['HTTP_REFERER'] . "?error=none");
    exit();
}

function emptyInputLogin($email, $pwd) {
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
        header("location: ". $_SERVER['HTTP_REFERER'] . "?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "?error=wrongloginpassword");
        exit();
    }else if ($checkPwd === true) {
        session_start();
        $_SESSION["Lname"] = $emailExists["Surname"];
        $_SESSION["Fname"] = $emailExists["Firstname"];
        $_SESSION["Mname"] = $emailExists["Middlename"];
        $_SESSION["type"] = $emailExists["type"];
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

function emptyBook($book_title, $book_author, $book_info, $book_pub) {
    if (empty($book_title) || empty($book_author) || empty($book_info) || empty($book_pub)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function bookExists($connection, $book_title) {
    $sql = "SELECT * FROM books WHERE book_title = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "?error=stmtfailedexists");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $book_title);
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

function createBook($connection, $book_title, $book_author, $book_info, $book_pub) {
    $sql = "INSERT INTO books (book_title, book_author, book_info, book_publish) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ". $_SERVER['HTTP_REFERER'] . "?error=stmtfailedcreate");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $book_title, $book_author, $book_info, $book_pub);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ". $_SERVER['HTTP_REFERER'] . "?error=none");
    exit();
}
