<?php
    include_once 'includes/header.php';
    require_once 'includes/connection.php';
    require_once 'includes/function.php';
    session_start();
    
?>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/addstudent.css">
	<title>DUMNSS Library</title>
</head>
<body>
<?php
    include_once 'includes/bars.php';
?>
            <div class="info">
                <div class="card">
                    <div class="logo">
                        <img src="images/dumnss_logo.png">
                    </div>
                    <form action="includes/login.php" method="POST">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Email</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="email" name="email" placeholder="Email...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Passowrd</label>
                            </div>
                            <div class="col-75">
                                <input type="password" id="password" name="password" placeholder="Password...">
                            </div>
                        </div>
                        <div class="row">
                            <button type="Submit" class="submit" name="login">LogIn</button>
                        </div>
                    </form>
                </div>
            </div>
<?php 
	include_once 'includes/footer.php';
?>
