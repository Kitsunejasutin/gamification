<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/dashboard.css">
	<title>DUMNSS Library</title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <div class="info">
                <div class="header">
                    <div class="row">
                        <div class="column first">
                            <p class="align-right"><?php 
                            $column = "book_id";
                            $table = "book";
                            $columnspecific = "book_status";
                            $columnspecific_value = "instock";
                            echo implode("|",countAllSpecific($connection, $column, $table, $columnspecific, $columnspecific_value)); ?></p>
                            <div class="indicator"><i class="fas fa-book"></i><p class="text margin15">Books</p></div>
                        </div>
                        <div class="column second">
                            <p class="align-right"><?php 
                                $column = "book_id";
                                $table = "transaction";
                                $columnspecific = "transaction_status";
                                $columnspecific_value = "borrowed";
                                echo implode("|",countAllSpecific($connection, $column, $table, $columnspecific, $columnspecific_value)); ?></p>
                                <div class="indicator"><i class="fas fa-book-reader"></i></i><p class="text margin5">Borrowed</p></div>
                        </div>
                        <div class="column third">
                            <p class="align-right"><?php 
                            $column = "book_id";
                            $table = "transaction";
                            $columnspecific = "transaction_status";
                            $columnspecific_value = "late";
                            echo implode("|",countAllSpecific($connection, $column, $table, $columnspecific, $columnspecific_value)); ?></p>
                            <div class="indicator"><i class="fas fa-clock"></i></i><p class="text margin25">Late</p></div>
                        </div>
                    </div>
                </div>
            </div>
<?php 
	include_once 'includes/footer.php';
?>
