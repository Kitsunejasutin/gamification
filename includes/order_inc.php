<?php
    if (isset($_GET["success"])) {
        if ($_GET["success"] == "added"){
            echo "<span class='error'>Order Placed</span>";
        }
    }
