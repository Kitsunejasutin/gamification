<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "wrongloginpassword"){
        echo "<span class='error'>Wrong Password</span>";
    }else if ($_GET["error"] == "wronglogin") {
        echo "<span class='error'>No user corresponding to this email</span>";
    }else {
        echo "<span class='error'>Something went wrong</span>";
    }
}

