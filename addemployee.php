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
        <div class="header">
            <span class="span-header">Add Employee</span>
        </div>
            <form action="includes/addemp.php" method="POST" accept-charset="utf-8">
            <fieldset class="form-group">
                    <input  readonly type="text" class="card-control no-outline" name="employee_number" value="<?php $data = fetchLatestAccount($connection); $id = $data['employee_id'];for ($x = 0; $x <= $id; $x++){}echo $x; ?>" required>
                </fieldset>
                <fieldset class="form-group">
                    <input type="text" class="card-control no-outline" name="FName" placeholder="First Name" required>
                </fieldset>
                <fieldset class="form-group">
                    <input type="text" class="card-control no-outline" name="MName" placeholder="Middle Name" required>
                </fieldset>
                <fieldset class="form-group">
                    <input type="text" class="card-control no-outline" name="LName" placeholder="Last Name" required>
                </fieldset>
                <fieldset class="form-group">
                    <input type="email" class="card-control no-outline" name="email" placeholder="Your Email" required>
                </fieldset>
                <fieldset class="form-group">
                    <input type="password" class="card-control no-outline" name="password" placeholder="Password" required>
                </fieldset>
                <fieldset class="form-group">
                    <input type="text" class="card-control no-outline" name="address" placeholder="Address" required>
                </fieldset>
                <fieldset class="form-group">
                    <input type="text" class="card-control no-outline" name="contact" placeholder="Contact" required>
                </fieldset>
                <?php include_once 'includes/registration_errors.php'; ?>
                <button type="Submit" class="btn blue" name="submit"><span>Add</span></button>
            </form>
        </div>
    </div>

<?php 
	include_once 'includes/footer.php';
?>
