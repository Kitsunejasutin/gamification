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

function emailExists($connection, $email, $column, $table) {
    $sql = "SELECT * FROM $table WHERE  $column= ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addstudent.php?error=stmtfailedexists");
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

function createUser($connection, $name, $email, $contact, $address) {
    $sql = "INSERT INTO accounts (account_name, account_email, account_contact, account_address) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addstudent.php?error=stmtfailedcreate");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $contact, $address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../addstudent.php?success=added");
    exit();
}

function createPassword($connection, $email, $pwd) {
    $sql = "UPDATE accounts SET account_password=? WHERE account_email=?";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addstudent.php?error=stmtfailedcreate");
        exit();
    }

    $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $hashedPWD, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script> alert('Password Successfully Updated'); </script>";
}

function loginUser($connection, $email, $pwd, $column, $table, $continue) {
    $emailExists = emailExists($connection, $email, $column, $table);

    if ($emailExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    if ($table === "admins"){
        $pwdHashed = $emailExists["admin_password"];
    }elseif ($table === "accounts"){
        $pwdHashed = $emailExists["account_password"];
        if ($pwdHashed === ""){
            session_start();
            $_SESSION['account_email'] = $email;
            header("location: ../login.php?account=firsttimelogin");
            exit();
        }
    }

    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../index.php?error=wrongloginpassword");
        exit();
    }else if ($checkPwd === true) {
        if ($table === "admins"){
            session_start();
            $_SESSION["name"] = $emailExists["admin_name"];
            $_SESSION["email"] = $emailExists["admin_email"];
            $_SESSION["contact"] = $emailExists["admin_contact"];
            $_SESSION["type"] = "admin";
    
        }elseif ($table === "accounts"){
            session_start();
            $_SESSION["name"] = $emailExists["account_name"];
            $_SESSION["email"] = $emailExists["account_email"];
            $_SESSION["contact"] = $emailExists["account_contact"];
            $_SESSION["address"] = $emailExists["account_address"];
            $_SESSION["type"] = "account";    
        }
        if ($continue == null) {
            header("location: ../index.php");
        }else{
            header("location:" . $continue);
        }

        exit();
    }
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

function addBook($connection, $name, $id, $info, $author, $category, $publish) {
    $sql = "INSERT INTO book (book_id, book_name, book_category, book_info, book_author, book_publish, book_status) VALUES (?, ?, ?, ?, ?, ?, 'active');";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addbook.php?error=stmtfailedcreate");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $id, $name, $category, $info, $author, $publish);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../addbook.php?success=added");
    exit();
}

function borrowBook($connection, $admin, $id, $book_name, $book_author, $category, $account_name, $borrow, $return, $status) {
    $status = "active";
    $status2= "borrowed";
    $sql1 = "INSERT INTO transactions (admin_name, book_id, book_name, book_author, book_category, account_name, book_borrow, book_return, transaction_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $sql2 = "UPDATE book SET book_status=? WHERE book_id=?;";
    $stmt1 = mysqli_stmt_init($connection);
    $stmt2 = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("location: ../borrowbook.php?error=stmtfailedcreate1");
        exit();
    }else if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        header("location: ../borrowbook.php?error=stmtfailedcreate2");
        exit();
    }

    mysqli_stmt_bind_param($stmt1, "sssssssss", $admin, $id, $book_name, $book_author, $category, $account_name, $borrow, $return, $status);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_bind_param($stmt2, "ss", $status2, $id);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt1);
    header("location: ../borrowbook.php?success=borrowed");
    exit();
}

function returnBook($connection, $borrow_admin, $id, $account, $borrow_date, $return_date, $admin, $current_date, $return_status) {
    $book_status = "active";
    $sql1 = "INSERT INTO history (borrow_admin_name, book_id, account_name, book_borrow, book_return, return_admin_name, account_book_return, return_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $sql2 = "DELETE FROM transactions WHERE book_id=?";
    $sql3 = "UPDATE book SET book_status=?";
    $stmt1 = mysqli_stmt_init($connection);
    $stmt2 = mysqli_stmt_init($connection);
    $stmt3 = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("location: ../returnbook.php?error=stmtfailedcreate1");
        exit();
    }else if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        header("location: ../returnbook.php?error=stmtfailedcreate2");
        exit();
    }else if (!mysqli_stmt_prepare($stmt3, $sql3)) {
        header("location: ../returnbook.php?error=stmtfailedcreate2");
        exit();
    }

    mysqli_stmt_bind_param($stmt1, "ssssssss", $borrow_admin, $id, $account, $borrow_date, $return_date, $admin, $current_date, $return_status);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_bind_param($stmt2, "s", $id);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_bind_param($stmt3, "s", $book_status);
    mysqli_stmt_execute($stmt3);
    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt3);
    header("location: ../returnbook.php?success=returned");
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

function countAll($connection, $column, $table) {
    $sql = "SELECT COUNT($column)FROM $table;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error=stmtfailedexists");
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

function fetchLatestAccount($connection) {
    $sql = "SELECT account_id FROM accounts ORDER BY account_id DESC LIMIT 1";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addstudents.php?error=stmtfailedexists");
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

function fetchLatestBook($connection) {
    $sql = "SELECT book_id FROM book ORDER BY book_id DESC LIMIT 1";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addbook.php?error=stmtfailedexists");
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

function countAllCategories($connection, $columnspecific_value) {
    $sql = "SELECT COUNT(book_id)FROM book WHERE book_category=?;";
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

function countAllCategoriesBorrowed($connection, $columnspecific_value, $status) {
    $sql = "SELECT COUNT(book_id)FROM book WHERE book_category=? AND book_status=?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error=stmtfailedexists");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $columnspecific_value, $status);
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

function updateAccount($connection, $id, $table, $name, $email, $contact, $address) {
    if ($table == "admins"){
        $sql = "UPDATE admins SET admin_name=?, admin_email=?, admin_contact=? WHERE id=?;";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../editaccount.php?error=stmtfailedcreate2");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $contact, $id);
        mysqli_stmt_execute($stmt);
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['contact'] = $contact;
        mysqli_stmt_close($stmt);
        echo '<script>alert("Account successfully updated");';
        echo 'window.location = "../editaccount.php?edit='. $_SESSION['type'] . 's" </script>';
        exit();
    }elseif ($table == "accounts"){
        $sql = "UPDATE accounts SET account_name=?, account_email=?, acount_contact=?, account_address=? WHERE id=?;";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../editaccount.php?error=stmtfailedcreate1");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "", $name, $email, $contact, $address, $id);
        mysqli_stmt_execute($stmt);
    
        mysqli_stmt_close($stmt);
        header("location: ../editaccount.php?success=updated");
        exit();
    }

}
