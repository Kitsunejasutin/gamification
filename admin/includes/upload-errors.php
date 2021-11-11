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
    }
?>
