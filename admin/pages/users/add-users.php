<?php
if (isset($_POST['add_user'])){
//        $post_id = $_POST['post_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = password_hash($password,PASSWORD_DEFAULT);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    $email = $_POST['email'];
    $role= $_POST['role'];
    move_uploaded_file($user_image_temp,"images/users/$image");
    //insert values
    include_once ("../includes/connection.php");
    $query = "INSERT INTO users (username, password, first_name, last_name, email, image, role) VALUES (?,?,?,?,?,?,?)";

    $ps= mysqli_prepare($connection,$query);

    mysqli_stmt_bind_param($ps,"sssssss",$username, $password, $first_name, $last_name, $email, $image, $role);

    mysqli_stmt_execute($ps);

    if (mysqli_errno($connection)){
        die(mysqli_error($connection));
    }else{
        header("Location: users.php");
    }
}
?>


<div class="row">
    <div class="col-md-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <legend>Add user</legend>

            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" name="username" id="username" >
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" name="password" id="password" >
            </div>

            <div class="form-group">
                <label for="first_name">first name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" >
            </div>

            <div class="form-group">
                <label for="last_name">last name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" >
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" name="email" id="email" >
            </div>

            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control-file" name="image" id="image" >
            </div>

            <div class="form-group">
                <label for="role">role</label>
                <select name="role" id="role" class="form-control">
                    <option value="0">select...</option>
                    <option value="admin">admin</option>
                    <option value="subscriber">subscriber</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="add_user" id="add_user">Add User</button>
        </form>
    </div>
</div>