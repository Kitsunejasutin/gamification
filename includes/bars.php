<div class="container">
        <div class="sidebar">
            <h2>DUMNSS Library</h2>
            <ul id="categories">
                <li><a href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
            </ul>
            <ul id="categories">
                <li class="categories"><a><i class="fas fa-book-open"></i>Books<i class="arrow right"></i></a></li>
                <a href="listbook.php"><li class="dropdown account"><span>List Books</span></li></a>
                    <?php
                        if(isset($_SESSION['name'])){ 
                            ?>
                                <a href="addbook.php"><li class="dropdown account"><span>Add Books</span></li></a>
                                <a href="borrowbook.php"><li class="dropdown account"><span>Borrow Book</span></li></a>
                                <a href="returnbook.php"><li class="dropdown account"><span>Return Book</span></li></a>
                            <?php
                        }
                    ?>
            </ul>
            <ul id="categories">
                <li class="categories"><a><i class="fas fa-list"></i><span>Categories</span><i class="arrow right"></i></a></li>
                <?php 
                    $sql = "SELECT * FROM category";
                    $stmt = mysqli_stmt_init($connection);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../index.php?error=stmtfailedexists");
                        exit();
                    }
                    mysqli_stmt_execute($stmt);
                    
                    $resultData = mysqli_stmt_get_result($stmt);

                    while($row = mysqli_fetch_array($resultData)){?>
                        <a href="book.php?book=<?php echo $row[1]; ?>"><li class="dropdown account"><span><?php echo $row[1]; ?></span></li></a>
                    <?php }
                    
                    mysqli_stmt_close($stmt);
                ?>
            </ul>
            <?php 
                if(isset($_SESSION['name'])){ 
                    ?>
                    <ul id="categories">
                        <li class="categories"><a><i class="fas fa-user-tie"></i>Account<i class="arrow right"></i></a></li>
                        <a href="attendance.php"><li class="dropdown account"><span>Edit Account</span></li></a>
                        <a href="addstudent.php"><li class="dropdown account"><span>Add Student</span></li></a>
                        <?php if(isset($_SESSION['name'])){ echo '<a href="includes/logout.php"><li class="dropdown account"><span>LogOut</span></li></a>'; } ?>
                    </ul>
                <?php
                }else{ 
                    
                } 
            ?>
            <?php
                if(isset($_SESSION['name'])){ 
                    ?>
                        <ul id="categories">
                            <li class="categories"><a><i class="fas fa-table"></i>Data & Reports<i class="arrow right"></i></a></li>
                            <a href="transaction.php"><li class="dropdown"><span>Transaction History</span></li></a>
                        </ul>
                    <?php
                }
            ?>
        </div>
        <div class="main_content">
            <div class="topbar">
                <i class="fas fa-bell"></i>
                <div class="account">
                    <img src ="images/user-icon.png" class="user-icon"><span class="text"><?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; }else{ echo "<a href='login.php'>LogIn</a>"; } ?></span>
                </div>
            </div>
