<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Main Page</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <?php

                $query = "select * from categories";
                $result = mysqli_query($connection , $query);

                while($row = mysqli_fetch_assoc($result)){

                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    $category_class = '';
                    $registration_class = '';
                    $contact_class = '';
                    $registration = 'registration.php';
                    $contact = 'contact.php';
                    $pagename = basename($_SERVER['PHP_SELF']);
                    if(isset($_GET['category']) && $_GET['category'] == $cat_id){
                        $category_class = 'active';
                    }elseif ($pagename == $registration){
                        $registration_class = 'active';
                    }elseif ($pagename == $contact){
                        $contact_class = 'active';
                    }
                    echo "<li class='$category_class'><a href='category.php?category=$cat_id'>{$cat_title}</a></li>" ;



                }

                ?>

                 <li><a href="admin">admin</a></li>
                <li class="<?php echo $registration_class; ?> "><a href="registration.php">registration</a></li>
                <li class="<?php echo $contact_class; ?> "><a href="contact.php">contact</a></li>


                <?php

                        if(isset($_GET['p_id'])){
                            $the_edit_post = $_GET['p_id'];
                            echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_edit_post}'>Edit Post</a></li>";
                        }


                ?>








            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
