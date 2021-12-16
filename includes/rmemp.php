<?php
    require_once 'connection.php';
    require_once 'function.php';

if(isset($_POST['remove'])){
    $id = $_POST['remove'];
    deleteAccount($connection,$id);
}else{
    echo "parang may mali";
}
