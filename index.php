<!DOCTYPE html>
<html lang="en">


    <?php
    $active_page = "home";
    $post_per_page = 1;
        include_once ("includes/header.php");
    ?>
  <body>

    <!-- Navigation -->

    <?php
    include_once ("includes/navigation.php");
    ?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>
            <?php
                include_once ("includes/connection.php");
                if(isset($_GET['search'])){
                    $key = $_GET['search'];
                    $conditional_stmt ="(post_title like '%{$key}%' or post_tags like '%{$key}%' or CONCAT(users.first_name,CONCAT(\" \",users.last_name)) like '%{$key}%')";
                }elseif (isset($_GET['cat_id'])){
                    $cat_id = $_GET['cat_id'];
                    $conditional_stmt = "post_cat_id = $cat_id";
                }
                else{
                    $key = "";
                    $conditional_stmt = 1;
                }

            $query_count_posts = "SELECT posts.* ,CONCAT(users.first_name,CONCAT(\" \",users.last_name)) as author FROM posts ,users WHERE posts.post_author = users.user_id AND $conditional_stmt";
                $count_post = mysqli_query($connection,$query_count_posts);
                $count = mysqli_num_rows($count_post);

                $total_pages = ceil($count/$post_per_page);

                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }

                $start = ($page-1)*$post_per_page;

                $query_all_posts = "SELECT posts.* ,CONCAT(users.first_name,CONCAT(\" \",users.last_name)) as author FROM posts ,users WHERE posts.post_author = users.user_id AND $conditional_stmt LIMIT $start ,$post_per_page";
                $all_posts_rs = mysqli_query($connection ,$query_all_posts);
                while ($post = mysqli_fetch_assoc($all_posts_rs)) {
                    $post_id = $post['post_id'];
                    $post_title = $post['post_title'];
                    $post_author = $post['author'];
                    $post_date = $post['post_date'];
                    $post_content = substr(strip_tags($post['post_content']),1,100)."...";
                    $post_tags = $post['post_tags'];
                    $post_image = $post['post_image'];
                    ?>
                    <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top img-fluid" src="images/<?php echo $post_image?>" alt="<?php echo $post_title?>">
                        <div class="card-body">
                            <h2 class="card-title">
                                <a href="post.php?post_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                            </h2>
                            <p class="card-text"><?php echo $post_content ?></p>
                            <a href="post.php?post_id=<?php echo $post_id ?>" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer-tags text-muted">
                            <ul>
                                <?php
                                    $tags = explode(",",$post_tags);
                                    for ($i= 0;$i<count($tags);$i++){
                                        $tag = $tags[$i];
                                        echo "<li>$tag</li>";
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            Posted<?php
                            echo $post_date;
                            ?> by <a href="#"><?php
                                echo $post_author;
                                ?></a>
                        </div>
                    </div>
                    <?php
                }
            ?>

          <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item <?php echo $page==1?"disabled":""; ?>">
                    <a class="page-link" href="index.php?page=<?php echo $page-1; ?>">&laquo;</a>
                </li>
                <?php
                for($i = 1; $i<=$total_pages;$i++)
                    echo <<<PAGE
<li class="page-item">
    <a class="page-link" href="index.php?page={$i}">$i</a>
</li>
PAGE;

                ?>
                <li class="page-item <?php echo $page==$total_pages?"disabled":""; ?>">
                    <a class="page-link" href="index.php?page=<?php echo $page+1; ?>">&raquo;</a>
                </li>
            </ul>

        </div>

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
