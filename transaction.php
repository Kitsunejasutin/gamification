<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/listbook.css">
	<title>DUMNSS Library</title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <div class="info">
                <div class="card">
                <div class="header">
                    <span class="span-header">Books</span>
                    <select class="form-control" name="state" id="maxRows">
                        <option value="5000">Show ALL Rows</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="70">70</option>
                        <option value="100">100</option>
                    </select>
                </div>
                    <table id = "tableData" class="onetable">
                        <thead>
                            <th class="header"><b>Borrow Admin</th>
                            <th class="header"><b>Book ID</th>
                            <th class="header"><b>Account Name</th>
                            <th class="header"><b>Borrow Time</th>
                            <th class="header"><b>Return Admin</th>
                            <th class="header"><b>Return Time</th>
                            <th class="header"><b>Account Return Time</th>
                            <th class="header"><b>Return Status</th>
                        </thead>
                            <?php
                                $type = $_SESSION['type'];
                                if($type === "admins"){
                                    $sql = "SELECT * FROM history";
                                }elseif ($type === "accounts"){
                                    $name = $_SESSION['name'];
                                    $sql = "SELECT * FROM history WHERE account_name=?";
                                }

                                $stmt = mysqli_stmt_init($connection);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("location: ../listbook.php?error=stmtfailedexists");
                                    exit();
                                }

                                if ($type === "accounts") {
                                    mysqli_stmt_bind_param($stmt, "s", $name);
                                }
                                mysqli_stmt_execute($stmt);

                                $resultData = mysqli_stmt_get_result($stmt);

                                while($data = mysqli_fetch_array($resultData)){
                            ?>
                                <tbody>
                                    <tr>
                                        <th><?php echo $data[1]; ?></th>
                                        <th><?php echo $data[2]?></th>
                                        <th><?php echo $data[3]?></th>
                                        <th><?php echo $data[4]?></th>
                                        <th><?php echo $data[6]?></th>
                                        <th><?php echo $data[5]?></th>
                                        <th><?php echo $data[7]?></th>
                                        <th><?php echo $data[8]?></th>
                                    </tr>
                                </tbody>
                            <?php }mysqli_stmt_close($stmt); ?>
                    </table>
                </div>
                <div class='pagination-container' >
				        <nav>
				            <ul class="pagination">
                                <li data-page="prev" >
								     <span> < <span class="sr-only">(current)</span></span>
								</li>
                                <li data-page="next" id="prev">
								    <span> > <span class="sr-only">(current)</span></span>
								</li>
				            </ul>
				        </nav>
			        </div>
                </div>
                <?php include_once "includes/notification_handle.php" ?>
            </div>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<?php 
	include_once 'includes/footer.php';
?>
