<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "stmtfailedexists"){
        echo "<span class='error'>Something Went Wrong</span>";
    }
}else if (isset($_GET["success"])){
    if ($_GET["success"] == "addedUser"){
        echo "<span class='error'>User is successfully added</span>";
    }else if ($_GET["success"] == "addedBook") {
        echo "<span class='error'>Book is successfully added</span>";
    }else if ($_GET["success"] == "borrowed") {
        echo "<span class='error'>Book is successfully Borrowed</span>";
    }else if ($_GET["success"] == "returned") {
        echo "<span class='error'>Book is successfully Returned</span>";
    }
}
