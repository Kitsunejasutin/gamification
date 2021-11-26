<?php
    if (isset($_GET["status"])) {
        if ($_GET["status"] == "incorrecttype"){
                echo "You cannot upload files of this type!";
            }else if ($_GET["status"] == "imagetoobig") {
                echo "Your file is too big!";
            }else if ($_GET["status"] == "error") {
                echo "There was an error uploading your file!";
            }else if ($_GET["status"] == "uploadsuccess") {
                echo "Image Successfully uploaded!";
        }
    }elseif (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput"){
            echo "Fill up all fields";
        }else if ($_GET["error"] == "bookexists") {
            echo "Book already exists";
        }else if ($_GET["error"] == "none") {
            echo "Book Added";
        }
    }
