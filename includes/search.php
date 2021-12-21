<?php
    require_once 'connection.php';
    if(isset($_POST['id']) || ($_POST['account-result'])){
        $sql = "SELECT * FROM book WHERE book_id LIKE '%".$_POST['id']."%' LIMIT 5";
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)>0){ session_start();?>
            <form action="includes/borrowbook_inc.php" method="POST" id="search-result">
                <input readonly type="text" id="id" name="id" value="<?php echo $_POST['id']; ?>" style="display:none;"required> 
                <input readonly type="text" id="account-result" name="account-result" value="<?php echo $_POST['account']; ?>" style="display:none;"required>
                <input readonly type="text" id="admin" name="admin" value="<?php echo $_SESSION['name']; ?>" style="display:none;"required>
                <?php while($row=mysqli_fetch_array($result)){?>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Name</label>
                        </div>
                        <div class="col-75">
                            <input readonly type="text" id="name" name="name" value="<?php echo $row[2]; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Category</label>
                        </div>
                        <div class="col-75">
                            <input readonly type="text" id="category" name="category" value="<?php echo $row[3]; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Author</label>
                        </div>
                        <div class="col-75">
                            <input readonly type="text" id="author" name="author" value="<?php echo $row[5]; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Borrow Duration</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="borrow-time" name="borrow-time" placeholder="Enter days..." required>
                        </div>
                    </div>
                    <div class="row">
                        <button type="Submit" class="submit" name="submit">Borrow Book</button>
                    </div>
                <?php }?>
            </form>
        <?php }else{
            echo "Data not found";
        }
    }else{
        echo "parang may mali";
    }
?>
