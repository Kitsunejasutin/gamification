<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
?>
    <link rel="stylesheet" href="styles/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
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
                <div class="popup"><!--<a href="includes/attendance.php">--><i class="fas fa-clock"></i><!--</a>-->
                    <span class="popuptext" id="myPopup">Check In</span>
                </div>
                <img src ="images/user-icon.png" class="user-icon"><span class="text">Account</span><span class="indicator">^</span>
            </div>
            <div class="info">
                <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis 
                    at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, 
                    beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis 
                    facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non 
                    obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!
                </div>
                <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, 
                    nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, 
                    veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident 
                    accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur 
                    culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!
                </div>
                <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla 
                    et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam 
                    tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus 
                    temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni 
                    omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!
                </div>
            </div>
        </div>
    </div>
    <script src="script/app.js"></script>
</body>
</html>
