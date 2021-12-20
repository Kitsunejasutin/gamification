<?php

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

function createUser($connection, $id, $email, $pwd, $FName, $MName, $LName, $address, $contact) {
    $sql = "INSERT INTO accounts (employee_id, email, pwd, FName, MName, LName, access, employee_status, employ_address, contact) VALUES (?, ?, ?, ?, ?, ?, '1', 'active', ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addemployee.php?error=stmtfailedcreate");
        exit();
    }

    $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $id, $email, $hashedPWD, $FName, $MName, $LName, $address, $contact);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../addemployee.php?success=added");
    exit();
}

function loginUser($connection, $email, $pwd) {
    $emailExists = emailExists($connection, $email);

    if ($emailExists === false) {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../index.php?error=wrongloginpassword");
        exit();
    }else if ($checkPwd === true) {
        session_start();
        $_SESSION["access"] = $emailExists["access"];
        if ($_SESSION['access'] == "1") {
            $_SESSION["LName"] = $emailExists["LName"];
            $_SESSION["FName"] = $emailExists["FName"];
            $_SESSION["MName"] = $emailExists["MName"];
            header("location: ../dashboard.php" );
            exit();
        }elseif ($_SESSION['access'] == "0"){
            $_SESSION["admin"] = TRUE;
            $_SESSION["LName"] = $emailExists["LName"];
            $_SESSION["FName"] = $emailExists["FName"];
            $_SESSION["MName"] = $emailExists["MName"];
            $_SESSION["email"] = $emailExists["email"];
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

function fetchAccounts($connection) {
    $sql = "SELECT * FROM accounts";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailedexists");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_array($resultData)) {
        return $row;
    }else {
        $result = false;
        return $result;
    }
}

function updateAccess($connection, $access, $id){
    $sql = "UPDATE accounts SET access=? WHERE employee_id=?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../permissions.php?error=stmtfailedcreate");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $access, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../permissions.php?success=updated");
    exit();
}

function deleteAccount($connection, $id){
    $sql = "DELETE FROM accounts WHERE employee_id=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../accounts.php?error=stmtfailedcreate");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../accounts.php?success=deleted");
    exit();
}

function addCategory($connection, $cat) {
    $sql = "INSERT INTO category (category_name) VALUES (?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pro-categories.php?error=stmtfailedcreate");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $cat);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pro-categories.php?success=added");
    exit();
}

function addStock($connection, $name, $code, $category, $quantity, $supplier, $price) {
    $sql = "INSERT INTO stocks (product_name, product_code, product_category, product_quantity, product_supplier, product_price) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../stock_manager.php?error=stmtfailedcreate");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $name, $code, $category, $quantity, $supplier, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../stock_manager.php?success=added");
    exit();
}

function fetchCategory($connection){
    $sql = "SELECT * FROM category";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailedexists");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
    exit();
}

function countAllSpecific($connection, $column, $table, $columnspecific, $columnspecific_value) {
    $sql = "SELECT COUNT($column)FROM $table WHERE $columnspecific=?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error=stmtfailedexists");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $columnspecific_value);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
    exit();
}
