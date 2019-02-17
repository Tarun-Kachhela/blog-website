<!DOCTYPE html>
<html lang="en">

    <?php
    include_once ("includes/header.php");
    ?>

  <body>

    <!-- Navigation -->
    <?php
    include_once ("includes/navigation.php");
    ?>
    <div class="clearfix"></div>
    <!-- Page Content -->
    <div class="container">

      <div class="row">
          <?php
            if (isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];
                $query_all_posts = "SELECT * FROM posts WHERE post_id =$post_id";
                $all_posts_rs = mysqli_query($connection, $query_all_posts);
                if ($post = mysqli_fetch_assoc($all_posts_rs)) {
                    $post_id = $post['post_id'];
                    $post_title = $post['post_title'];
                    $post_author = $post['post_author'];
                    $post_date = $post['post_date'];
                    $post_content = substr($post['post_content'], 1, 100) . "...";
                    $post_tags = $post['post_tags'];
                    $post_image = $post['post_image'];
                    ?>
                    <!-- Post Content Column -->
                    <div class="col-lg-8">

                        <!-- Title -->
                        <h1 class="mt-4"><?php echo $post_title ?></h1>

                        <!-- Author -->
                        <p class="lead">
                            by
                            <a href="#"><?php
                                echo $post_author;
                                ?></a>
                        </p>

                        <hr>

                        <!-- Date/Time -->
                        <p>Posted on <?php
                            echo $post_date;
                            ?></p>

                        <hr>

                        <!-- Preview Image -->
                        <img class="img-fluid rounded-circle" src="images/<?php echo $post_image?>" alt="">

                        <hr>

                        <!-- Post Content -->
                        <p><?php
                            echo $post_content;
                            ?></p>


                        <hr>
                        <?php
                            if (isset($_POST['post_comment'])){
                                $comment_author = $_POST['comment_author'];
                                $comment_email = $_POST['comment_email'];
                                $comment_context = $_POST['comment_context'];
                                $comment_date= date("Y-m-d");

                                include_once ("includes/connection.php");
                                $query_insert_comment = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_context,comment_date) VALUES('$post_id','$comment_author','$comment_email','$comment_context','$comment_date')";
                                $rs = mysqli_query($connection,$query_insert_comment);
                                if (mysqli_errno($connection)){
                                    die("hel".mysqli_error($connection));
                                }
//                                header("Location: post.php");
                            }
                        ?>

                        <!-- Comments Form -->
                        <div class="card my-4">
                            <h5 class="card-header">Leave a Comment:</h5>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="comment_author">author</label>
                                        <input type="text" class="form-control" rows="3" id="comment_author" name="comment_author">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment_email">email</label>
                                        <input type="text" class="form-control" rows="3" id="comment_email" name="comment_email">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment_context">content</label>
                                        <textarea class="form-control" rows="3" id="comment_context" name="comment_context"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="post_comment">Submit</button>
                                </form>

                            </div>
                        </div>
                        <?php
                        include_once ("includes/connection.php");
                        include_once ("includes/functions.php");
                        if (isset($_GET['post_id'])) {
                            $id = $_GET['post_id'];
                            $rs = getAllComment("comment_post_id = $id and comment_status = 'approved   '");
                            while ($row = mysqli_fetch_assoc($rs)) {
                                $comment_author= $row['comment_author'];
                                $comment_email = $row['comment_email'];
                                $comment_context = $row['comment_context'];
                                $comment_date = date("Y-m-d");

                                ?>

                                <!-- Single Comment -->
                                <div class="media mb-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0"><?php echo $comment_author?> <span class="small"><?php echo $comment_date?></span></h5>
                                        <?php echo $comment_context?>
                                    </div>
                                </div>


                                <?php
                            }
                        }
                }
            }
          ?>
                    </div>
        <!-- Sidebar Widgets Column -->
          <?php
          include_once ("includes/sidebar.php");
          ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
    include_once ("includes/footer.php");
    ?>

    <!-- Bootstrap core JavaScript -->
    <?php
    include_once ("includes/core-script.php");
    ?>
  </body>

</html>
