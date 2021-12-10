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
            <ul>
                <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard<i class="arrow right"></i></a></li>
                <li><a href="#"><i class="fas fa-boxes"></i>Stocks<i class="arrow right"></i></a></li>
                <li><a href="#"><i class="fas fa-user-tie"></i>Accounts<i class="arrow right"></i></a></li>
                <li><a href="#"><i class="fas fa-table"></i>Data & Reports<i class="arrow right"></i></a></li>
                <li><a href="#"><i class="fas fa-file-export"></i>Data Export<i class="arrow right"></i></a></li>
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
</body>
</html>
