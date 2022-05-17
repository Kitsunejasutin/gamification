<?php 
    require_once 'connection.php';
    require_once 'function.php';

    $id = $_POST['id'];
    $checkIn = $_POST['checkIn'];
    $points = $_POST['points'];

    if(isset($_POST['submit'])) {
        checkStatus($connection, $id, $points);
    }else {
        echo "Something went wrong";
        header("location: ../rewards.php?status=somethingwentwrong");
    }
