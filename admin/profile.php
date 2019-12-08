<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">
       <?php

       if(isset($_SESSION['username'])){
         $username = $_SESSION['username'];
         $query = "select * from users where username = '{$username}'";
         $profile_query = mysqli_query($connection,$query);
         confirm($profile_query);
         while($row = mysqli_fetch_array($profile_query)){
             $user_id = $row['user_id'];
             $username = $row['username'];
             $user_password = $row['user_password'];
             $user_firstname = $row['user_firstname'];
             $user_lastname = $row['user_lastname'];
             $user_email = $row['user_email'];
             $user_image = $row['user_image'];
             $user_role = $row['user_role'];

         }
       }

       ?>
        <?php
        if(isset($_POST['edit_user'])){
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];

            $username = $_POST['username'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
            $profile__pass = password_hash($user_password,PASSWORD_BCRYPT,array('cost' => 10));



            //move_uploaded_file($post_image_temp, "../images/$post_image");

            $query = "UPDATE users SET ";
            $query .= "user_firstname = '{$user_firstname}', ";
            $query .= "user_lastname = '{$user_lastname}', ";
            $query .= "user_email = '{$user_email}', ";
            $query .= "user_password = '{$profile__pass}' ";
            $query .= "where username = '{$username}'";
            $update_profile = mysqli_query($connection, $query);
            confirm($update_profile);
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
                            <small>author</small>


                        </h1>

                        <form action ="" method ="post" enctype = "multipart/form-data">

                            <div class = "form-group">
                                <label for="user_firstname">firstname</label>
                                <input type = "text" value="<?php echo $user_firstname; ?>" class = "form-control" name = "user_firstname">
                            </div>
                            <div class = "form-group">
                                <label for="user_lastname">lastname</label>
                                <input type = "text" value="<?php echo $user_lastname; ?>" class = "form-control" name = "user_lastname">
                            </div>

                            <div class = "form-group">
                                <label for="username">Username</label>
                                <input type = "text" value="<?php echo $username; ?>" class = "form-control" name = "username">
                            </div>
                            <div class = "form-group">
                                <label for="user_email">email</label>
                                <input type = "email" value="<?php echo $user_email; ?>" class = "form-control" name = "user_email">
                            </div>
                            <!---<div class = "form-group">
                                <label for="post_image">Post_Image</label>
                                <input type = "file"  name = "image">
                            </div>--->
                            <div class = "form-group">
                                <label for="user_password">Password</label>
                                <input type = "password" value="<?php echo $user_password; ?>" class = "form-control" name = "user_password">
                            </div>

                            <div class = "form-group">

                                <input class = "btn btn-primary" type = "submit"  name = "edit_user" value = "Update profile">
                            </div>





                        </form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
    <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>

