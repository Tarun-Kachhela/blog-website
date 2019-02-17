<!DOCTYPE html>
<html lang="en">
<?php
    $title = "please login";
    include_once ("includes/header.php");
?>
<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Enter proper username or password please</div>
        <div class="card-body">
            <form action="../includes/process-login.php" method="post">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" id="username" class="form-control" name="username" placeholder="Email address" required="required" autofocus="autofocus">
                        <label for="username">username</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                        <label for="password">Password</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" id="login" name="login">Login</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.html">Register an Account</a>
                <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
