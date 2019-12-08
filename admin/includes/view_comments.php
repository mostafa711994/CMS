<table class = "table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response To </th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $query = "select * from comments order by comment_id desc ";
    $result_comments = mysqli_query($connection , $query);
    while($row = mysqli_fetch_assoc($result_comments)) {

        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];


        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";

            /*$query = "SELECT * FROM  categories WHERE cat_id = $post_category_id";
            $edit_categories = mysqli_query($connection , $query);
            while($row = mysqli_fetch_assoc($edit_categories)) {

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<td>{$cat_title}</td>";

            }*/


        echo "<td>$comment_email</td>";
        echo "<td>$comment_status</td>";

        $query = "select * from posts where post_id = $comment_post_id ";
        $title_result = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc( $title_result)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

        }




        echo "<td>$comment_date</td>";
        echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
        echo "<td><a onclick=\"javascript: return confirm('Are You Sure To Delete This comment');\" href='comments.php?delete=$comment_id'>Delete</a></td>";

        echo "</tr>";
    }
    ?>


    </tbody>
</table>

<?php
//delete comment
if(isset($_GET['delete'])){
    $delete_comment = $_GET['delete'];
    $query = "delete from comments where comment_id  = {$delete_comment}";
    $delete_result = mysqli_query($connection , $query);
    header("location:comments.php" );


}

//delete comment
if(isset($_GET['approve'])){
    $approve_comment = $_GET['approve'];
    $query = "update comments set comment_status = 'approved' where comment_id  = {$approve_comment}";
    $approve_result = mysqli_query($connection , $query);
    header("location:comments.php" );


}


//delete comment
if(isset($_GET['unapprove'])) {
    $unapprove_comment = $_GET['unapprove'];
    $query = "update comments set comment_status = 'unapproved' where comment_id  = {$unapprove_comment}";
    $approve_result = mysqli_query($connection, $query);
    header("location:comments.php");
}
?>