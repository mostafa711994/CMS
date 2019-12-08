
<?php

include("delete_modal.php");

if(isset($_POST['checkboxarray'])) {
    foreach ($_POST['checkboxarray'] as $postid) {
        $post_options = $_POST['post_options'];
        switch ($post_options) {
            case 'published':
                $query = "update posts set post_status = '{$post_options}' where post_id = '{$postid}'";
                $update_status_post = mysqli_query($connection, $query);
                confirm($update_status_post);
                break;
            case 'draft':
                $query = "update posts set post_status = '{$post_options}' where post_id = '{$postid}'";
                $update_status = mysqli_query($connection, $query);
                confirm($update_status);
                break;
            case 'delete':
                $query = "delete from posts where post_id = '{$postid}'";
                $update_status_delete = mysqli_query($connection, $query);
                confirm($update_status_delete);
                break;

            case 'clone':
                $query = "select * from posts where post_id = '{$postid}'";
                $result_posts = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result_posts)) {

                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_content = $row['post_content'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_date = $row['post_date'];
                    $post_view_count = $row['post_view_count'];

                }
                $query = "INSERT INTO posts(post_category_id,post_title, post_author,post_date,post_image,post_content,post_tags,post_status) values('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}', '{$post_content}', '{$post_tags}','{$post_status}')";
                $result = mysqli_query($connection,$query);
                confirm($result);



        }
    }


}



?>







<form action="" method = "post">
<table class = "table table-bordered table-hover">
<div id = "bulkOptionscontainer" class = "col-xs-4" >

    <select class = "form-control" name="post_options" id="">

        <option value="">Select Options</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
        <option value="clone">clone</option>
    </select>
</div>
<div class = "col-xs-4">
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a class = "btn btn-primary" href="posts.php?source=add_post">Add New</a>

</div>


    <thead>
    <tr>
        <th ><input id="selectallboxs" type="checkbox"></th>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Category</th>
        <th>status</th>
        <th>content</th>
        <th>Image</th>
        <th>tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>View Post Count</th>
        <th>View Post</th>

        <th>Edit</th>
        <th>Delete</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $query = "select * from posts order by post_id desc ";
    $result_posts = mysqli_query($connection , $query);
    while($row = mysqli_fetch_assoc($result_posts)) {

        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_content = $row['post_content'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_view_count = $row['post_view_count'];
        echo "<tr>";
        ?>


        <td><input class="checkboxs" type="checkbox" name="checkboxarray[]" value="<?php echo $post_id; ?>"></td>


        <?php
            echo "<td>$post_id</td>";
            echo "<td>$post_title</td>";
                echo "<td>$post_author</td>";

        $query = "SELECT * FROM  categories WHERE cat_id = $post_category_id";
            $edit_categories = mysqli_query($connection , $query);
            while($row = mysqli_fetch_assoc($edit_categories)) {

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

        echo "<td>{$cat_title}</td>";

            }



        echo "<td>$post_status</td>";
        echo "<td>$post_content</td>";
        echo "<td><img width = '100' src ='../images/$post_image' alt='image'></td>";
        echo "<td>$post_tags</td>";

        $query = "select * from comments where comment_post_id = $post_id";
        $count_comments = mysqli_query($connection,$query);
        $count = mysqli_num_rows($count_comments);
        echo "<td>$count</td>";




        echo "<td>$post_date</td>";
        echo "<td>{$post_view_count}</td>";
        echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        ?>
        <form action="" method="post">

            <input type="hidden" name = "post_id" value = "<?php echo $post_id; ?>">

            <?php
            echo '<td><input class = "btn btn-danger" type="submit" name = "delete" value = "Delete"></td>';

            ?>



        </form>



        <?php
        //echo "<td><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";


        //echo "<td><a onclick=\"javascript: return confirm('Are You Sure To Delete This post');\"  href='posts.php?delete={$post_id}'>Delete</a></td>";

        echo "</tr>";
    }
    ?>


    </tbody>
</table>
</form>

<?php
//delete post
if(isset($_POST['delete'])){

    $delete_post = $_POST['post_id'];
    $query = "delete from posts where post_id  = {$delete_post}";
    $delete_result = mysqli_query($connection , $query);
    header("location:posts.php" );


}


?>

<script>

    $(document).ready(function(){

    $(".delete_link").on('click', function (){


        var id = $(this).attr("rel");

        var delete_url = "posts.php?delete="+ id +" ";

        $(".modal_delete_link").attr("href", delete_url);

        $("#myModal").modal('show');






    });



    });

</script>
