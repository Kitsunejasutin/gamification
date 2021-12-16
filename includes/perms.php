<?php
    require_once 'connection.php';
    require_once 'function.php';

if(isset($_POST['update'])){
    $id = $_POST['update'];
    $data = (fetchDataid($connection,$id));
    $id = $data['employee_id'];
    $temp = $data['access'];
    if($temp =="1"){
        $access = "0";
    }elseif($temp == "0"){
        $access = "1";
    }
    updateAccess($connection, $access, $id);
    
}else{
    echo "parang may mali";
}
