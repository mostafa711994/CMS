
<?php


//acess only for admin to edit into usere
function is_admin($username){
    global $connection;
    $query = "select user_role from users where username = '$username'";
    $result = mysqli_query($connection,$query);
    confirm($result);
    $row = mysqli_fetch_array($result);
    if($row['user_role'] == 'admin' ){
        return true;

    }else{
        return false;

    }


}

function exist_user($username){
    global $connection;
    $query = "select username from users where username = '$username'";
    $result = mysqli_query($connection,$query);
    confirm($result);
    if(mysqli_num_rows($result) > 0){
        return true;

    }else{
        return false;

    }
}
function exist_email($email){
    global $connection;
    $query = "select user_email from users where user_email = '$email'";
    $email_result = mysqli_query($connection,$query);
    confirm($email_result);
    if(mysqli_num_rows($email_result) > 0){
        return true;

    }else{
        return false;

    }
}




function login($username,$password){
    global $connection;
$username = trim($username);
$password = trim($password);
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);


$query = "select * from users where username = '{$username}'";
$login_result = mysqli_query($connection, $query);
if (!$login_result) {
    die("query failed" . mysqli_error($connection));

}

while ($row = mysqli_fetch_assoc($login_result)) {
    $login_user_id = $row['user_id'];
    $login_username = $row['username'];
    $login_user_password = $row['password'];
    $login_user_password = $row['user_password'];
    $login_user_firstname = $row['user_firstname'];
    $login_user_lastname = $row['user_lastname'];
    $login_user_role = $row['user_role'];

    if (password_verify($password,$login_user_password)) {
        $_SESSION['username'] = $login_username;
        $_SESSION['firstname'] = $login_user_firstname;
        $_SESSION['lastname'] = $login_user_lastname;
        $_SESSION['user_role'] = $login_user_role;

        header("location:../admin");


    } else {
        header("location:../index.php");


    }

}


}

function register($username,$email,$password){
    global $connection;

    $username = mysqli_real_escape_string($connection,$username);
    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);
    $password = password_hash($password,PASSWORD_BCRYPT,array('cost' => 12));


    $query = "INSERT INTO users(username,user_email,user_password) values('{$username}','{$email}', '{$password}')";
    $register_result = mysqli_query($connection,$query);
    if(!$register_result){


        die("query failed" . mysqli_error($connection));

    }
    confirm($register_result);

}




//save data from mysqli injection
function escape($string){
    global $connection;

    return mysqli_real_escape_string($connection,trim($string));

}




function users_online(){


    if(isset($_GET['onlineusers'])){
        global $connection;

    if(!$connection){
        session_start();
        include("../includes/db.php");

        $session = session_id();
        $time = time();
        $time_in_second = 05;
        $time_out = $time - $time_in_second;
        $query = "select * from users_online where session  = '$session'";
        $count_query = mysqli_query($connection,$query);
        $count = mysqli_num_rows($count_query);
        if($count == null){
            mysqli_query($connection,"insert into users_online(session ,time) values ('$session','$time')");

        }else{
            mysqli_query($connection,"update users_online set time = '$time' where session = '$session'");
        }
        $users_query_count = mysqli_query($connection,"select * from users_online where time > '$time_out'");
        echo $user_count = mysqli_num_rows($users_query_count);


    }

    }


}

users_online();




function confirm($result){

    if(!$result){
        global $connection;
        die("query failed" . mysqli_error($connection));
    }
}




function add_categories(){
    //add gategory
    global $connection;
    if (isset($_POST['submit'])){

        $cat_title =  $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
            echo "This Field Must Be Fill";
        }else{




            $query = "INSERT INTO categories (cat_title) value('{$cat_title}')";
            $result_categories_query = mysqli_query($connection , $query);
            if(!$result_categories_query){
                die("query failed" . mysqli_error($connection));

            }
        }

    }


}

function findcategories(){
    global $connection;
    $query = "select * from categories";
    $result_categories = mysqli_query($connection , $query);
    while($row = mysqli_fetch_assoc($result_categories)){

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo"<td>{$cat_id}</td>";
        echo"<td>{$cat_title}</td>";
        echo"<td><a onclick=\"javascript: return confirm('Are You Sure To Delete This category');\" href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo"<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";

    }

}


function deletecategories(){
    global $connection;
    if(isset($_GET['delete'])){
        $get_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id}";
        $delete_categories = mysqli_query($connection , $query);
        header("location:categories.php" );

    }
}








?>