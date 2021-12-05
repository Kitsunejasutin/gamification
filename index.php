<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Landing Page</title>
</head>
<body>
    <div class="container">
        <div class="front-card">
            <div class="card-header">
                <div class="group-name">
                    Welcome to the website
                </div>
                <h6 class="line-on-side text-muted font-small-3">
                </h6>
                <span>Employee LogIn</span>
            </div>
            <div class="card-body">
                <form action="includes/login.php" method="POST" accept-charset="utf-8">
                    <fieldset class="form-group fieldset-border">
                        <i class="fas fa-user-circle"></i>
                        <input type="text" class="card-control no-outline" name="email" placeholder="Your Email" required>
                    </fieldset>
                    <fieldset class="form-group fieldset-border">
                        <i class="fas fa-key"></i>
                        <input type="text" class="card-control no-outline" name="password" placeholder="Your Password" required>
                    </fieldset>
                    <div class="form-group row">
                        <div class="remember-me">Remember Me</div>
                        <div class="forgot"><a href="forgot.php" class="forgot">Forgot Your Password?</a></div>
                    </div>
                    <button class="btn grey" name="login"><span>LogIn</span></button>
                </form>
                <h6 class="line-on-side text-muted font-small-3">
                </h6>
                <span>Are you a Client?</span>
                <button class="btn grey"><span>LogIn</span></button>
            </div>
        </div>
    </div>
</body>
</html>
