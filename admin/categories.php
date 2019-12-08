<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">



    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        welcome admin
                        <small>author</small>
                    </h1>

                        <div class = "col-xs-6">

                            <?php add_categories(); ?>


                               <!--- add form-->
                            <form action = "" method = "post" >
                              <div class = "form-group">
                                  <label for="cat_title"> Add Category</label>
                                  <input class = "form-control" type = "text" name = "cat_title">
                              </div>
                                <div class = "form-group">
                                    <input class = "btn btn-primary" type = "submit" name = "submit" value = "Add New category">
                                </div>



                            </form>


                            <!--- edit form-->
                            <?php
                            // edit and update categories
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];

                                include "includes/edit_categories.php";

                    }

                            ?>
                        </div>

                    <!--- TABLE form right side -->

                    <div class = "col-xs-6">

                        <!---- find categories--->
                        <table class = "table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  findcategories(); ?>

                            <?php deletecategories();  ?>

                            </tbody>

                        </table>

                    </div>


                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php"></a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


<?php include "includes/admin_footer.php"; ?>