<div class="container">
        <div class="sidebar">
            <h2>
                <?php
                    echo fetchcompanyname($connection);
                ?>
            </h2>
            <ul id="categories">
                <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                <li class="categories"><a><i class="fas fa-boxes"></i>Stocks<i class="arrow right"></i></a></li>
                <li class="dropdown stocks"><span>Stock Manager</span><i class="arrow right"></i></li>
                <li class="dropdown stocks"><span>Product Categories</span><i class="arrow right"></i></li>
                <li class="dropdown stocks"><span>Purchase Order</span><i class="arrow right"></i></li>
                <li class="dropdown stocks"><span>Suppliers</span><i class="arrow right"></i></li>
            </ul>
            <ul id="categories">
                <li class="categories"><a><i class="fas fa-user-tie"></i>Account<i class="arrow right"></i></a></li>
                <li class="dropdown account"><span>Manage Accounts</span><i class="arrow right"></i></li>
                <li class="dropdown account"><span>Employees Transactions</span><i class="arrow right"></i></li>
                <a href="attendance.php"><li class="dropdown account"><span>Attendance</span><i class="arrow right"></i></li></a>
                <li class="dropdown account"><span>Tasks</span><i class="arrow right"></i></li>
                <li class="dropdown account"><span>Permissions</span><i class="arrow right"></i></li>
                <li class="dropdown account"><span>Add Employees</span><i class="arrow right"></i></li>
            </ul>
            <ul id="categories">
                <li class="categories"><a><i class="fas fa-table"></i>Data & Reports<i class="arrow right"></i></a></li>
                <li class="dropdown datareport"><span>Customer Transactions</span><i class="arrow right"></i></li>
                <li class="dropdown datareport"><span>Income Sales</span><i class="arrow right"></i></li>
                <li class="dropdown datareport"><span>Activity Report</span><i class="arrow right"></i></li>
            </ul>
            <ul id="categories">
                <li class="categories"><a><i class="fas fa-file-export"></i>Data Export<i class="arrow right"></i></a></li>
                <li class="dropdown export"><span>Income Export</span><i class="arrow right"></i></li>
                <li class="dropdown export"><span>Database Export</span><i class="arrow right"></i></li>
                <li class="dropdown export"><span>Customer Export</span><i class="arrow right"></i></li>
                <li class="dropdown export"><span>Transaction Export</span><i class="arrow right"></i></li>
                <li class="dropdown export"><span>Supplier Export</span><i class="arrow right"></i></li>
            </ul>
            <div class="social_media">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="main_content">
            <div class="topbar">
                <i class="fas fa-bell"></i>
                <div class="account">
                    <img src ="images/user-icon.png" class="user-icon"><span class="text"><?php echo $_SESSION['LName'].", ". $_SESSION['FName'];?></span><span class="indicator">^</span>
                </div>
                <div class="popup">
                    <span class="popuptext-account" id="myPopup"><a href="includes/logout.php">Log Out</a></span>
                </div>
            </div>
