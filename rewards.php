<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/rewards.css">
    <title>DUMNSS Library</title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <div class="info">
                <div class="card">
                    <div class="header">
                        <span class="span-header">Rewards</span>
                        <button type="Submit" class="submit" name="accounts" value="accounts">SignIn</button>
                    </div>
                    <div class="current-points">
                        <span class="points">Current Rewards Points: <?php echo implode("|",fetchPoints($connection)); ?></span>
                    </div>
                    <div class="rewards-table">
                        <table>
                            <thead>
                                <th colspan=3>Rewards</th>
                            </thead>
                            <tbody>
                                <th>Reward Name</th>
                                <th>Points Required</th>
                                <th>Redeem</th>
                            </tbody>
                            <tbody>
                                <th>Placeholder Reward Item</th>
                                <th></th>
                                <th><button type="Submit" class="submit" name="accounts" value="accounts">Redeem</button></th>
                            </tbody>
                            <tbody>
                                <th>Placeholder Reward Item</th>
                                <th></th>
                                <th><button type="Submit" class="submit" name="accounts" value="accounts">Redeem</button></th>
                            </tbody>
                            <tbody>
                                <th>Placeholder Reward Item</th>
                                <th></th>
                                <th><button type="Submit" class="submit" name="accounts" value="accounts">Redeem</button></th>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<?php 
	include_once 'includes/footer.php';
?>
