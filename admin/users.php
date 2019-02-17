<?php
    $title = "Post";
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include_once("includes/header.php");
?>
<body id="page-top" class="sidebar-toggled">

<?php
include_once("includes/navigation.php");
?>

<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once("includes/sidebar.php");
    ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>

            <?php
                if (isset($_GET['source'])){
                    $source = $_GET['source'];
                }
                else{
                    $source = "";
                }
                switch($source){
                    case "add_user" :
                        include_once ("pages/users/add-users.php");
                        break;
                    case "edit_post":
                        include_once ("pages/users/edit-users.php");
                        break;
                    case "delete_user":
                            include_once ("pages/users/delete-users.php");
                        break;
                    default:
                        include_once("pages/users/view-all-users.php");
                }
            ?>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php
        include_once("includes/footer.php");
        ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->


<!-- Bootstrap core JavaScript-->
<?php
include_once("includes/scripts_btn_to_top.php")
?>
</body>

</html>
