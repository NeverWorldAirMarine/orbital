<?php
$page_title = "Courses ";
require $_SERVER['DOCUMENT_ROOT'] . "/includes/load.php";
?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $page_title; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
			<div class="row">
                    <div class="col-lg-12">
                        <?php
					$courses->Display_Courses();
					?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


<?php
require $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php";
?>

