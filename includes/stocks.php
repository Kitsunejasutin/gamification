<?php
    require_once 'connection.php';
    require_once 'function.php';

if(isset($_POST['addcat'])){
    $cat = $_POST['category'];
    addCategory($connection, $cat);
    
}elseif(isset($_POST['addstock'])){
    $name = $_POST['product-name'];
    $code = $_POST['code'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $supplier = $_POST['supplier'];
    $price = $_POST['price'];
    addStock($connection, $name, $code, $category, $quantity, $supplier, $price);
}elseif(isset($_POST['addsupp'])){
    $name = $_POST['supplier'];
    addSupplier($connection,$name);
}else{
    echo "parang may mali";
}
