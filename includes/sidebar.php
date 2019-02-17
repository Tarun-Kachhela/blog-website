<div class="col-md-4">

    <?php
        include_once ("includes/functions.php");
        error_reporting(0);
        session_start();

        if(!isLoggedIn()) {
    ?>
            <!-- LOGIN FORM -->
            <div class="card my-4">
                <h5 class="card-header">Login</h5>
                <div class="card-body">
                    <form action="includes/process-login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">

                        </div>
                        <button type="submit" class="btn btn-primary" name="login" id="login">Login</button>
                        <a href="admin/register.php" class="btn btn-primary pull-right" style="float: right;" name="register" id="register">register</a>
                        <a href="admin/forgot_password.php?forgot=<?php echo uniqid(true)?>" class="pull-right">forgot password</a>
                    </form>

                </div>
            </div>
            <?php
        }
    ?>
    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <form action="index.php" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for...">
                    <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit"  value="search">Go!</button>
                </span>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                    <?php
                        include_once ("functions.php");
                        $category = getAllCategories();
                        for ($i=0;$i<ceil(count($category)/2);$i++){
                            echo <<<LINK
<li>
<a href="index.php?cat_id={$category[$i]['cat_id']}">{$category[$i]['cat_title']}</a>
</li>
LINK;
                        }
                    ?>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <?php
                    for ($i=ceil(count($category)/2);$i<count($category);$i++) {
                        echo <<<LINK
                        <li>
                            <a href="index.php?cat_id={$category[$i]['cat_id']}">{$category[$i]['cat_title']}</a>
                        </li>         
LINK;
                    }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>
</div>