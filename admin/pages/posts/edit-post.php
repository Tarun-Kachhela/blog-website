<?php
include_once ("../includes/connection.php");
if (isset($_POST['published_post'])){
    $post_id = $_GET['post_id'];
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_cat_id = $_POST['post_cat_id'];
    $post_status = $_POST['post_status'];

    $old_image = $_POST['old_image'];
    $post_image = $_FILES['post_image']['name'] ;
    if ($post_image == ""){
        $post_image = $old_image;
    }else{
        $post_image_temp= $_FILES['post_image']['tmp_name'];
        move_uploaded_file($post_image_temp,"../images/$post_image");
    }


    $post_tags = $_POST['post_tags'];
    $post_content= $_POST['post_content'];
    $post_date =date("Y-m-d");

    //insert values
    include_once ("../includes/connection.php");
    $query = "UPDATE posts SET post_cat_id=?, post_title=?, post_author=?, post_date=?,post_image = ?,  post_content=?, post_tags=?,  post_status=? WHERE post_id = ?";

    $ps= mysqli_prepare($connection,$query);
//    echo $post_image.$post_image_temp;
    mysqli_stmt_bind_param($ps,"dsssssssd",$post_cat_id, $post_title, $post_author, $post_date,$post_image, $post_content, $post_tags, $post_status,$post_id);
    mysqli_stmt_execute($ps);

    if (mysqli_errno($connection)){
        die(mysqli_error($connection));
    }else{
        header("location: post.php");
    }
}
if (isset($_GET['post_id'])){
    $edit_post_id = $_GET['post_id'];
    $query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
    $result = mysqli_query($connection,$query);
    if ($row = mysqli_fetch_assoc($result)){
        $edit_post_title = $row['post_title'];
        $edit_post_status = $row['post_status'];
        $edit_post_cat_id = $row['post_cat_id'];
        $edit_post_author = $row['post_author'];
        $edit_post_image = $row['post_image'];
        $edit_post_content = $row['post_content'];
        $edit_post_tags= $row['post_tags'];
?>


<div class="row">
    <div class="col-md-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <legend>Edit post</legend>

            <div class="form-group">
                <label for="post_title">post title</label>
                <input type="text" class="form-control" name="post_title" id="post_title"
                       value="<?php echo $edit_post_title ?>">
            </div>


            <div class="form-group">
                <label for="post_cat_id">post category</label>
                <?php
                include_once("../includes/functions.php");
                $categories = getAllCategories();
                $categories_count = count($categories);
                $i = 0;
                ?>

                <select class="form-control" name="post_cat_id" id="post_cat_id">
                    <?php
                    while ($i < $categories_count) {
                        $cat_id = $categories[$i]['cat_id'];
                        $cat_title = $categories[$i]['cat_title'];
                        $option_equal  = "<option value='$cat_id' selected>$cat_title</option> ";
                        $option_normal = "<option value='$cat_id'>$cat_title</option> ";
                        if ($cat_id == $edit_post_cat_id) {
                              echo $option_equal;
                        }else{
                            echo $option_normal;
                        }
                        $i++;
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="post_author">post author</label>
                <input type="text" class="form-control" name="post_author" id="post_author" value="<?php echo $edit_post_author ?>">
            </div>

            <div class="form-group">
                <label for="post_status">post status</label>
                <select name="post_status" id="post_status" class="form-control">
                    <option value="draft "<?php echo $edit_post_status== "draft" ? "selected" : "" ?>>Draft</option>
                    <option value="published"<?php echo $edit_post_status== "published" ? "selected" : "" ?>>Published
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="post_image">post image</label>
                <input type="hidden" value="<?php echo $edit_post_image ?>" name="old_image" id="old_image">
                <input type="file" class="form-control-file" name="post_image" id="post_image">
            </div>

            <div class="form-group">
                <label for="post_tags">post tags</label>
                <input type="text" class="form-control" name="post_tags" id="post_tags"
                       value="<?php echo $edit_post_tags?>">
            </div>

            <div class="form-group">
                <label for="post_content">post contents</label>
                <textarea name="post_content" id="post_content" cols="30" rows="10"
                          class="form-control"><?php echo $edit_post_content ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="published_post" id="published_post">published post
            </button>
        </form>
        <?php
            }
        }
        ?>
    </div>
    </div>