<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/dashboard.css">
	<title><?php echo fetchcompanyname($connection); ?></title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <div class="info">
                <div class="header">
                    <div class="row">
                        <div class="column first">
                            <div class=""><i class="fas fa-cubes"></i><p class="text">Stocks</p></div>
                            <p class="align-right"><?php 
                            $column = "product_name";
                            $table = "stocks";
                            echo implode("|",countAll($connection, $column, $table)); ?></p>
                        </div>
                        <div class="column second">
                            <div class=""><i class="fas fa-user-check"></i><p class="text">Employees</p></div>
                            <p class="align-right"><?php 
                            $column = "employee_id";
                            $table = "accounts";
                            echo implode("|",countAll($connection, $column, $table)); ?></p>
                        </div>
                        <div class="column third">
                            <div class=""><i class="fas fa-parachute-box"></i><p class="text">Suppliers</p></div>
                            <p class="align-right"><?php 
                            $column = "supplier_name";
                            $table = "supplier";
                            echo implode("|",countAll($connection, $column, $table)); ?></p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="fourth">
                        <p>Try</p>
                    </div>
                    <div class="fifth">
                        <p class="header">Orders</p>
                        <table>
                            <thead>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<?php 
	include_once 'includes/footer.php';
?>
