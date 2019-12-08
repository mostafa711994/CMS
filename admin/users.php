<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">


        <?php
        //acess only for admin to edit into usere
        if(!is_admin($_SESSION['username'])){
            header("location:index.php");

        }







        ?>



        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <?php
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }

                        switch ($source){
                            case 'add_user':
                                include "includes/add_user.php";
                                break;
                            case 'edit_user':
                                include "includes/edit_user.php";
                                break;
                            default:
                                include "includes/view_users.php";
                                break;

                        }

                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
    <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>