<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
	<link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/stocks.css">
	<title><?php echo fetchcompanyname($connection); ?></title>
</head>
<body onload="startTime()">
<?php
    include_once 'includes/bars.php';
?>

<div class="info">
    <div class="card">
        <div class="header">
            <span class="span-header">Product Categories</span>
            <a class="action">Add Categories</a>
        </div>
        <table>
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <th>placeholder</th>
                    <th>placeholder</th>
                    <th>placeholder</th>
                    <th>placeholder</th>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>2</th>
                    <th>placeholder</th>
                    <th>placeholder</th>
                    <th>placeholder</th>
                    <th>placeholder</th>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <th>3</th>
                    <th>placeholder</th>
                    <th>placeholder</th>
                    <th>placeholder</th>
                    <th>placeholder</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php 
	include_once 'includes/footer.php';
?>

