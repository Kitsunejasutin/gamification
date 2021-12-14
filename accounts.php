<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/accounts.css">
	<title><?php echo fetchcompanyname($connection); ?></title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <div class="info">
                <div class="card">
                    <?php ?>
                    <h1 id="header">Employees</h1>
                    <table>
                        <tr>
                            <td class="header"><b>Employee ID</td>
                            <td class="header"><b>Full Name</td>
                            <td class="header"><b>Email</td>
                            <td class="header"><b>Permission</td>
                            <td class="header"><b>Address</td>
                            <td class="header"><b>Contact</td>
                            <td class="header"><b>Action</td>
                        </tr>
                        <tr>
                            <?php
                                $sql = "SELECT * FROM accounts";
                                $stmt = mysqli_stmt_init($connection);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("location: ../index.php?error=stmtfailedexists");
                                    exit();
                                }

                                mysqli_stmt_execute($stmt);

                                $resultData = mysqli_stmt_get_result($stmt);

                                while($data = mysqli_fetch_array($resultData)){
                            ?>
                            <td><?php echo $data[1]; ?></td>
                            <td><?php echo $data[4] ." ". $data[5] ." ". $data[6]; ?></td>
                            <td><?php echo $data[2]?></td>
                            <td><?php echo $data[7]?></td>
                            <td><?php echo $data[8]?></td>
                            <td><?php echo $data[9]?></td>
                            <td><a href="includes/rmemp.php"><i class="fas fa-user-minus"></i></a></td>
                        </tr>
                            <?php }mysqli_stmt_close($stmt); ?>
                    </table>
                </div>
            </div>
<?php 
	include_once 'includes/footer.php';
?>

