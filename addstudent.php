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
                <form action="includes/addstudent.php" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="name" name="name" placeholder="Full Name..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="email" name="email" placeholder="Email..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Contact</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="contact" name="contact" placeholder="Contact..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Address</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="address" name="address" placeholder="Address..." required>
                        </div>
                    </div>
                    <div class="row">
                        <button type="Submit" class="submit" name="submit">Add Student</button>
                    </div>
                </form>
            </div>
<?php 
	include_once 'includes/footer.php';
?>
