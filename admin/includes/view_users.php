<table class = "table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>username</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>email</th>
        <th>role</th>
        <th>Admin</th>
        <th>Subscriber</th>
        <th>Edit</th>
        <th>Delete</th>



    </tr>
    </thead>
    <tbody>
    <?php
    $query = "select * from users";
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




        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";

            /*$query = "SELECT * FROM  categories WHERE cat_id = $post_category_id";
            $edit_categories = mysqli_query($connection , $query);
            while($row = mysqli_fetch_assoc($edit_categories)) {

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<td>{$cat_title}</td>";

            }*/

        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";

        /*$query = "select * from posts where post_id = $comment_post_id";
        $title_result = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc( $title_result)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

        }*/





        echo "<td><a href='users.php?change_to_admin={$user_id}'>admin</a></td>";
        echo "<td><a href='users.php?change_to_sub={$user_id}'>subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
        echo "<td><a onclick=\"javascript: return confirm('Are You Sure To Delete This user');\" href='users.php?delete={$user_id}'>Delete</a></td>";

        echo "</tr>";
    }
    ?>


    </tbody>
</table>

<?php
//delete user
if(isset($_GET['delete'])){
    if(isset($_SESSION['user_role'])){

    $delete_user = $_GET['delete'];
    $query = "delete from users where user_id  = {$delete_user}";
    $delete_result = mysqli_query($connection , $query);
    header("location:users.php" );
        }

}


if(isset($_GET['change_to_admin'])){
    $admin_user = $_GET['change_to_admin'];
    $query = "update users set user_role = 'admin' where user_id  = {$admin_user}";
    $admin_user_result = mysqli_query($connection , $query);
    header("location:users.php" );


}



if(isset($_GET['change_to_sub'])) {
    $sub_user = $_GET['change_to_sub'];
    $query = "update users set user_role = 'subscriber' where user_id  = {$sub_user}";
    $sub_user_result = mysqli_query($connection, $query);
    header("location:users.php");
}
?>