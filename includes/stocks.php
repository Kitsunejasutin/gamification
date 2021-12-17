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
}elseif(isset($_POST['submit'])){
    session_start();
    $code = $_POST['product-code'];
    $category = $_POST['product-category'];
    $quantity = $_POST['product-quantity'];
    $userQuantity = $_POST['user-quantity'];
    $price = $_POST['product-price'];
    $employee_name = $_SESSION['FName']." ".$_SESSION['MName']." ".$_SESSION['LName']; 

    include_once 'header.php';
    require_once 'connection.php';
    require_once 'function.php';
    ?>
	<link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/stocks.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<title><?php echo fetchcompanyname($connection); ?></title>
</head>
<body>
<?php
    include_once 'bars-confirm.php';
?>
<div class="info">
    <div class="card">
        <div class="header">
            <span class="span-header">Confirm Order</span>
            </div>
                <form action="confirm.php" method="POST">
                    <div class="header-input">
                        <input readonly type="text" class="header-input" name="search_text" id="search_text" value=" <?php $sql = 'SELECT product_name FROM stocks WHERE product_category="'.$category.'"'; $result = mysqli_query($connection,$sql); $row = mysqli_fetch_assoc($result); echo $product_name = $row['product_name']; ?>" />
                    </div>
                    <div id="result">
                            <p class="text">Code</p>
                            <input type="text" class="placeholder disabled" name="product-code" id="product-code" placeholder="Product Code" value="<?php echo $code; ?>">
                            <p class="text">Category</p>
                            <input readonly type="text" class="placeholder disabled" name="product-category" id="product-category" placeholder="Product Category" value="<?php echo $category; ?>">
                            <p class="text">Stock Quantity</p>
                            <input readonly type="text" class="placeholder disabled" name="product-quantity" id="product-quantity" placeholder="Product Quantity" value="<?php echo $quantity?>">
                            <p class="text">Price</p>
                            <input readonly type="text" class="placeholder disabled" name="product-prices" id="product-supplier" placeholder="Product Price" value="<?php echo $price ?>">
                            <p class="text">User Quantity</p>
                            <input readonly type="text" class="placeholder disabled" name="user-quantity" id="user-quantity" placeholder="User Quantity" value="<?php echo $userQuantity ?>"><br>
                            <input type="text" class="hidden" name="product-price" value="<?php $final = $price * $userQuantity; echo $final; ?>"><br>
                        </div>
                    <div class="compute">
                        <p class="text compute">Quantity: <?php echo $userQuantity ?></p>
                        <p class="text compute">Price: <?php echo $price; ?> </p>
                        <p class="text compute">------------------</p>
                        <p class="text compute">Price: <?php $final = $price * $userQuantity; echo $final; ?> </p>
                        <button type="Submit" class="btn blue margin confirm" name="confirm"><span>Confirm Order</span></button>
                </form> 
                    <button type="Submit" class="btn blue margin"><span>Cancel</span></button>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    </div>
</div>
    <script src="../script/app.js"></script>
</body>
</html>

<?php }elseif(isset($_POST['update'])){
    $name = $_POST['name'];
    $code = $_POST['code'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $supplier = $_POST['supplier'];
    $price = $_POST['price'];
    updateStock($connection, $name, $code, $category, $quantity, $supplier, $price);
}elseif(isset($_POST['remove'])){
    $id = $_POST['remove'];
    echo $id;
    deleteStock($connection, $id);
}elseif(isset($_POST['update-category'])){
    $name = $_POST['name'];
    $id = $_POST['update-category'];
    updateCategory($connection, $name, $id);
}elseif(isset($_POST['remove-category'])){
    $id = $_POST['remove'];
    echo $id;
    deleteStock($connection, $id);
}else{
    echo "parang may mali";
}
