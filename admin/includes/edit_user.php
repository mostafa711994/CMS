
<?php
if(isset($_GET['edit_user'])){
     $edit_user = $_GET['edit_user'];
     $query = "select * from users where user_id =  $edit_user";
    $result_users = mysqli_query($connection , $query);
    while($row = mysqli_fetch_assoc($result_users)) {

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



if(isset($_POST['edit_user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    //$post_image = $_FILES['image']['name'];
    //$post_image_temp = $_FILES['image']['tmp_name'];
    $user_password = $_POST['user_password'];
    $user__pass = password_hash($user_password,PASSWORD_BCRYPT,array('cost' => 10));


    //move_uploaded_file($post_image_temp, "../images/$post_image");



    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user__pass}' ";
    $query .= "where user_id = {$edit_user}";
    $new_update_user = mysqli_query($connection, $query);
    confirm($new_update_user);
    echo "user updated sucessfully" . "<a href='users.php'>View Users</a>";

}

?>

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
        <select name="user_role" id="">
            <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>
            <?php


            if($user_role == 'admin'){

                echo"<option value='subscriber'>subscriber</option>";
            }else{
               echo"<option value='admin'>admin</option>";
            }




            ?>






        </select>
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

        <input class = "btn btn-primary" type = "submit"  name = "edit_user" value = "Update User">
    </div>





</form>
