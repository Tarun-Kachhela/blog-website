
<div class="row">
    <div class="col-md-12">
        <a type="button" href="users.php?source=add_user" class="btn btn-primary">Add users</a>
    </div>
</div>
<div class="mb-2"></div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>username</th>
                    <th>password</th>
                    <th>firt name </th>
                    <th>last name</th>
                    <th>Email</th>
                    <th>role</th>
                    <th></th>
                    <th></th>
                </tr>
                <tbody>
                <?php
                include_once("../includes/functions.php");
                $rs = getAllUsers();
                while ($row = mysqli_fetch_assoc($rs)) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $email = $row['email'];
                    $image = $row['image'];
                    $role = $row['role'];
                    //FETCH CATEGORY_TITLE FROM POST_CAT_ID
                    echo <<<USER
<tr>
<td>$user_id</td>
<td><img src="images/users/{$image}" class="img-fluid rounded-circle"  width="100px" alt=""></td>
<td>$username</td>
<td>$password</td>
<td>$first_name</td>
<td>$last_name</td>
<!--<td><img src="../images/{post_image}" class="img-fluid"  width="100px" alt=""></td>-->
<td>$email</td>
<td>$role</td>
<td><a href="post.php?source=edit_post&post_id=post_id" class="btn btn-outline-info "><span class="fa fa-edit"></span></a></td>
<td><a href="users.php?source=delete_user&user_id=$user_id" class="btn btn-outline-danger "><span class="fa fa-trash"></span></a></td>
</tr>
USER;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>