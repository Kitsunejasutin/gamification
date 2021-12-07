<?php
    include_once 'includes/header.php';
    
    session_start();
    if (isset($_POST['next'])) {
        foreach ($_POST as $key => $value) {
            $_SESSION['info'][$key] = $value;
        }

        $keys = array_keys($_SESSION['info']);

        if (in_array('next', $keys)) {
            unset($_SESSION['info']['next']);
        }

        header("Location: registration2.php");
    }else{
    }
?>
    <link rel="stylesheet" href="styles/registration-1.css">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="front-card">
            <div class="card-header">
                <div class="group-name">
                    Welcome to the website
                </div>
                <h6 class="line-on-side text-muted font-small-3"></h6>
                <span>Looks like you're new</span><br>

            </div>
            <div class="card-body">
                <span class="spacing-2">Please enter your Company Name</span>
                <form method="POST" accept-charset="utf-8">
                    <fieldset class="form-group fieldset-border">
                        <i class="fas fa-building"></i>
                        <input type="text" class="card-control no-outline" name="company" value="<?= isset($_SESSION['info']['company']) 
                        ? $_SESSION['info']['company'] : '' ?>" placeholder="Company Name" required>
                    </fieldset>
                    <button class="btn grey" name="next"><span>Next</span></button>
                </form>
            </div>
        </div>
    </div>
