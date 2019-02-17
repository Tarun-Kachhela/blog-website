<?php
$title = "Categorys";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title="categories";
include_once ("includes/header.php");
?>

<body id="page-top" class="sidebar-toggled">

<?php
include_once ("includes/navigation.php");
?>

<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once ("includes/sidebar.php");
    ?>

    <div id="content-wrapper">

        <div class="container-fluid">



            <!---->
            <div class="row">
                <div class="col-md-6">
                    <?php
                    include_once ("pages/categories/add-category-form.php");
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                        include_once ("pages/categories/edit-category-form.php");
                    ?>
                </div>
            </div>

            <?php
                include_once ("pages/categories/view-all-categories.php");
            ?>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php
        include_once ("includes/footer.php");
        ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->

<?php
include_once ("includes/scripts_btn_to_top.php");
?>

</body>

</html>
