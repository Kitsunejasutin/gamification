<?php
    require_once 'connection.php';
    $sql = "SELECT * FROM stocks WHERE product_name LIKE '%".$_POST['name']."%' LIMIT 1";
    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result)>0){?>
        <form action="includes/stocks.php" method="POST">
        <?php while($row=mysqli_fetch_assoc($result)){?>
                <p class="text">Code</p>
                <input type="text" class="placeholder disabled" name="product-code" id="product-code" placeholder="Product Code" value="<?php echo $row['product_code']?>">
                <p class="text">Category</p>
                <input readonly type="text" class="placeholder disabled" name="product-category" id="product-category" placeholder="Product Category" value="<?php echo $row['product_category']?>">
                <p class="text">Stock Quantity</p>
                <input readonly type="text" class="placeholder disabled" name="product-quantity" id="product-quantity" placeholder="Product Quantity" value="<?php echo $row['product_quantity']?>">
                <p class="text">Supplier</p>
                <input readonly type="text" class="placeholder disabled" name="product-supplier" id="product-supplier" placeholder="Product Supplier" value="<?php echo $row['product_supplier'] ?>">
                <p class="text">Price</p>
                <input readonly type="text" class="placeholder disabled" name="product-price" id="product-price" placeholder="Product Price" value="<?php echo $row['product_price'] ?>"><br>
                <input type="text" class="placeholder" name="user-quantity" id="user-quantity" placeholder="Input Quantity" value="" required>
                <?php }?>
                <button type="Submit" class="btn blue margin" name="submit"><span>Order</span></button>
            </form>
    <?php }else{
        echo "Data not found";
    }
?>
