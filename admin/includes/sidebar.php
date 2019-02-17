<?php
if (!isset($_SESSION['username'])){
    session_start();
}
$role = $_SESSION['role'];
?>

<ul class="sidebar navbar-nav toggled" >
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Posts</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="post.php">view All post</a>
            <a class="dropdown-item" href="post.php?source=add_post">add post</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="categories.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Categories</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="comments.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>comment</span></a>
    </li>
    <?php
    if ($role == "super_admin") {
        ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>users</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="users.php">view All users</a>
                <a class="dropdown-item" href="users.php?source=add_user">add users</a>
            </div>
        </li>
        <?php

    }
    ?>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>profile</span></a>
    </li>
</ul>