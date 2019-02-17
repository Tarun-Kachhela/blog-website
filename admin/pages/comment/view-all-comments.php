
<div class="mb-2"></div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>comment_id</th>
                    <th>comment_post_id</th>
                    <th>comment_author</th>
                    <th>comment_email</th>
                    <th>comment_context</th>
                    <th>comment_status</th>
                    <th>comment_date</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tbody>
                <?php
                include_once("../includes/functions.php");
                $rs = getAllComment();
                while ($row = mysqli_fetch_assoc($rs)) {
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_email = $row['comment_email'];
                    $comment_context= $row['comment_context'];
                    $comment_status= $row['comment_status'];
                    $comment_date = $row['comment_date'];

                    //FETCH CATEGORY_TITLE FROM POST_CAT_ID
                    $post= getAllPost("post_id = $comment_post_id");
                    if ($row = mysqli_fetch_assoc($post)) {
                        $post_title = $row['post_title'];
                        $post_id = $row['post_id'];
                    }
                    else
                        $post_title = "wrong";
                    echo <<<DATA
<tr>
<td>$comment_id</td>
<td>$comment_post_id</td>
<td><a href="../post.php?post_id=$post_id">$post_title</a></td>
<td>$comment_author</td>
<td>$comment_email</td>
<td>$comment_context</td>
<td>$comment_status</td>
<td>$comment_date</td>
<td><a href="comments.php?source=approved&comment_id=$comment_id" class="btn btn-outline-info "><span class="fa fa-thumbs-up"></span></a></td>
<td><a href="comments.php?source=unapproved&comment_id=$comment_id" class="btn btn-outline-info "><span class="fa fa-thumbs-down"></span></a></td>
<td><a href="comments.php?source=delete_post&comment_id=$comment_id" class="btn btn-outline-danger "><span class="fa fa-trash"></span></a></td>
</tr>
DATA;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>