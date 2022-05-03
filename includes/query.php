<?php
    require_once 'connection.php';
    if(isset($_POST['id'])){
        $sql = "SELECT * FROM transactions WHERE book_id LIKE '%".$_POST['id']."%' AND transaction_status='active' LIMIT 5";
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)>0){ session_start();?>
            <form action="includes/returnbook_inc.php" method="POST" id="search-result">
                <input readonly type="text" id="id" name="id" value="<?php echo $_POST['id']; ?>" style="display:none;"required>
                <input readonly type="text" id="admin" name="admin" value="<?php echo $_SESSION['name']; ?>" style="display:none;"required>
                <?php while($row=mysqli_fetch_array($result)){ ?>
                    <input readonly type="text" id="borrow-admin" name="borrow-admin" value="<?php echo $row[1]; ?>" style="display:none;"required>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Name</label>
                        </div>
                        <div class="col-75">
                            <input readonly type="text" id="name" name="name" value="<?php echo $row[3]; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Author</label>
                        </div>
                        <div class="col-75">
                            <input readonly type="text" id="author" name="author" value="<?php echo $row[4]; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Book Category</label>
                        </div>
                        <div class="col-75">
                            <input readonly type="text" id="category" name="category" value="<?php echo $row[5]; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Student Name</label>
                        </div>
                        <div class="col-75">
                            <input readonly type="text" id="sname" name="sname" value="<?php echo $row[6]; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Borrow Date</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="borrow-time" name="borrow-date" value="<?php echo $row[7]; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Return Date</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="return-time" name="return-date" value="<?php echo $row[8]; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Return Status</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="return-status" name="return-status" value="<?php if( strtotime($row[8]) > strtotime('now') ) {echo "Return on time";}else{ echo "Late Return";} ?>" required>
                        </div>
                    </div>
                    <div class="wrapper">
                        <div class="image">
                        <img src="images/books/<?php echo $_POST['id'];?>.jpg" alt="">
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="row">
                        <button type="Submit" class="submit" name="submit" value="<?php echo $row[0]; ?>">Return Book</button>
                    </div>
                <?php }?>
            </form>
        <?php }else{
            echo "Data not found";
        }
    }else{
        echo "parang may mali dito ah";
    }
?>
