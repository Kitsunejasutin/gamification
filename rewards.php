<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    setDay($connection);
    
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
                        <form action="includes/rewards.php" method="POST" >
                            <?php 
                            $id = $_SESSION['id'];
                            $info = fetchAccountInfo($connection, $id); ?>
                            <input readonly type="text" class="hidden" name="id" value="<?php echo $info['id']; ?>">
                            <input readonly type="text" class="hidden" name="checkIn" value="<?php echo $info['day_checkin']; ?>">
                            <input readonly type="text" class="hidden" name="points" value="<?php echo $info['points']; ?>">
                            <?php if ($info['day_checkin'] == "Out") { echo '<button type="Submit" class="submit" name="submit">SignIn </button>'; } ?>
                        </form>
                    </div>
                    <div class="current-points">
                        <span class="points">Current Rewards Points: <?php echo implode("|",fetchPoints($connection));   
                            ?></span>
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
