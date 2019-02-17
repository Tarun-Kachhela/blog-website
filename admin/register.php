<!DOCTYPE html>
<html lang="en">

  <?php
  $title = "register";
    include_once("includes/header.php");
  ?>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <form action="../includes/process_register.php" method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="first_name">First name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" required="required">
                    <label for="last_name">Last name</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required">
                <label for="email">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                    <label for="password">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">

                      <select name="role" id="role" class="form-control" style="height: 50px">
                          <option value="0">Select Role...</option>
                          <option value="admin">admin</option>
                          <option value="subscriber">subscriber</option>
                      </select>
                  </div>
                </div>

              </div>
            </div>
          <div class="form-group">
                  <input type="file" class="form-control-file" name="userImage" id="userImage">
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="register" id="register">Register</button>
          </form>
          <div class="text-center">

            <a class="d-block small mt-3" href="no-access.php">Login Page</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>

        </div>
      </div>
    </div>

    <?php
        include_once("includes/scripts_btn_to_top.php");
    ?>>
  </body>

</html>
