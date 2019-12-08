
<?php
if(isset($_POST['submit'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $user_username = $_POST['username'];
    $user_email = $_POST['user_email'];
    //$post_image = $_FILES['image']['name'];
    //$post_image_temp = $_FILES['image']['tmp_name'];
    $user_password = $_POST['user_password'];
    $user_hashed_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost' => 10));


    //move_uploaded_file($post_image_temp, "../images/$post_image");
    if(!empty($user_firstname) && !empty($user_lastname) && !empty($user_role) && !empty($user_username) && !empty($user_email) && !empty($user_password)){


    $query = "INSERT INTO users(user_firstname,user_lastname,user_role, username,user_email,user_password) values('{$user_firstname}','{$user_lastname}','{$user_role}','{$user_username}','{$user_email}', '{$user_hashed_password}')";
    $users_result = mysqli_query($connection,$query);
    confirm($users_result);

    echo "user created sucessfully" . "<a href='users.php'>View Users</a>";
    }else{
        echo "<script>alert('This Field Can Not Be Empty')</script>";
    }
}

?>

<form action ="" method ="post" enctype = "multipart/form-data">

   <div class = "form-group">
       <label for="user_firstname">firstname</label>
       <input type = "text" class = "form-control" name = "user_firstname">
   </div>
    <div class = "form-group">
        <label for="user_lastname">lastname</label>
        <input type = "text" class = "form-control" name = "user_lastname">
    </div>
    <div class = "form-group">
        <select name="user_role" id="">

            <option value='subscriber'>Select Option</option>
            <option value='admin'>Admin</option>
            <option value='subscriber'>Subscriber</option>


        </select>
    </div>
    <div class = "form-group">
        <label for="username">Username</label>
        <input type = "text" class = "form-control" name = "username">
    </div>
    <div class = "form-group">
        <label for="user_email">email</label>
        <input type = "email" class = "form-control" name = "user_email">
    </div>
    <!---<div class = "form-group">
        <label for="post_image">Post_Image</label>
        <input type = "file"  name = "image">
    </div>--->
    <div class = "form-group">
        <label for="user_password">Password</label>
        <input type = "password" class = "form-control" name = "user_password">

    </div>

    <div class = "form-group">

        <input class = "btn btn-primary" type = "submit"  name = "submit" value = "Add User">
    </div>





</form>
