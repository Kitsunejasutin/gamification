<?php
    if (isset($_GET["status"])) {
        if ($_GET["status"] == "incorrecttype"){
            echo "<span class='error'>You cannot upload files of this type!</span>";
        }else if ($_GET["status"] == "imagetoobig") {
            echo "<span class='error'>Your file is too big!</span>";
        }else if ($_GET["status"] == "error") {
            echo "<span class='error'>There was an error uploading your file!</span>";
        }
    }
