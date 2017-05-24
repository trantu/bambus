<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

</head>
<body>
<div class="container">

    <div class="row" id="pwd-container">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <section class="login-form">
                <form method="post" action="check_login.php" role="login">
                    <img src="image/logo-banner.png" class="img-responsive" alt="" />
                    <input type="text" name="user" placeholder="User Name" required class="form-control input-lg" value="" />

                    <input type="password" name="pass" class="form-control input-lg" id="password" placeholder="Password" required="" />


                    <div class="pwstrength_viewport_progress"></div>


                    <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
<!--                    <div>-->
<!--                        <a href="#">Create account</a> or <a href="#">reset password</a>-->
<!--                    </div>-->

                </form>

                <div class="form-links">
                    <a href="#">asialecker.de</a>
                </div>
            </section>
        </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/login.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>