<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body background="img/school2.jpg" class="body_deg">
    <center>
        <div class="form_deg">
            <center class="title_deg">
                Login Form
                <h4>
                    <?php
                    error_reporting(0);
                    session_start();
                    session_destroy();
                    echo$_SESSION["loginMessage"];
                    ?>
                </h4>
            </center>
            <form class="login_form" action="login_check.php" method="POST">
                <div>
                    <label class="lbl_deg" for="">Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label class="lbl_deg"  for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>
    </center>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>