
<div class="row">
    <div class="col-md-12">
        <a type="button" href="post.php?source=add_post" class="btn btn-primary">Add post</a>
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
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>tags</th>
                    <th>comments</th>
                    <th>Date</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                <tbody>
                <?php
                include_once("../includes/functions.php");
                $rs = getAllPost("post_author = {$_SESSION['user_id']}");
                while ($row = mysqli_fetch_assoc($rs)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_cat_id = $row['post_cat_id'];
                    $post_status = $row['post_status'];
                    $post_tags = $row['post_tags'];
                    $post_comment = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    //FETCH CATEGORY_TITLE FROM POST_CAT_ID
                    $category = getAllCategories("cat_id = $post_cat_id");
                    $cat_title = $category[0]['cat_title'];
                    echo <<<DATA
<tr>
<td>$post_id</td>
<td>$post_author</td>
<td>$post_title</td>
<td>$post_cat_id</td>
<td>$post_status</td>
<td><img src="../images/{$post_image}" class="img-fluid"  width="100px" alt=""></td>
<td>$post_tags</td>
<td>$post_comment</td>
<td>$post_date</td>
<td><a href="post.php?source=edit_post&post_id=$post_id" class="btn btn-outline-info "><span class="fa fa-edit"></span></a></td>
<td><a href="post.php?source=delete_post&post_id=$post_id" class="btn btn-outline-danger "><span class="fa fa-trash"></span></a></td>
</tr>
DATA;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>