<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/accounts.css">
            <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <style type="text/css">
</style>
	<title><?php echo fetchcompanyname($connection); ?></title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <div class="info">
                <div class="card">
                    <?php ?>
                    <h1 id="header">Permissions</h1>
                    <table id = "tableData">
                        <thead>
                            <th class="header"><b>Employee ID</th>
                            <th class="header"><b>Full Name</th>
                            <th class="header"><b>Email</th>
                            <th class="header"><b>Permission</th>
                            <th class="header"><b>Address</th>
                            <th class="header"><b>Contact</th>
                            <th class="header"><b>Action</th>
                        </thead>
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
                        <tbody>
                            <tr>
                                <th><?php echo $data[1]; ?></th>
                                <th><?php echo $data[4] ." ". $data[5] ." ". $data[6]; ?></th>
                                <th><?php echo $data[2]?></th>
                                <th><?php echo $data[7]?></th>
                                <th><?php echo $data[8]?></th>
                                <th><?php echo $data[9]?></th>
                                <th><a href="includes/rmemp.php"><i class="fas fa-chevron-circle-up"></i></i></a></th>
                            </tr>
                        </tbody>
                            <?php }mysqli_stmt_close($stmt); ?>
                    </table>
                </div>
            </div>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="script/paging.js"></script> 
<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData').paging({limit:5});
            });
        </script>
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php 
	include_once 'includes/footer.php';
?>

