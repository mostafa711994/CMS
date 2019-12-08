



<div class="col-md-4">



    <!-- Blog Search Well -->
    <!-- Search Area-->
    <div class="well">
        <h4>Blog Search</h4>
        <form action = "search.php" method="post">
        <div class="input-group">
            <input name =  "search" type="text" class="form-control">
            <span class="input-group-btn">
                            <button name = "submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>

        </div>

        </form> <!-- search form-->




        <!-- /.login -->
    </div>

    <div class="well">

        <?php if(isset($_SESSION['user_role'])): ?>

            <h4>Welcome <?php echo $_SESSION['username']; ?></h4>
            <a href="includes/logout.php" class="btn btn-primary">logout</a>
        <?php else: ?>

            <h4>login</h4>
            <form action = "includes/login.php" method="post">
                <div class="form-group">
                    <input name =  "username" type="text" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <input name =  "password" type="password" class="form-control" placeholder="Enter Password">
                </div>
                <div><span class = "input-group-btn">
                       <button name = "login" class = "btn btn-primary"  type="submit">Submit

                       </button>
                    </span>
                </div>
            </form>


        <?php endif; ?>
       <!-- search form-->



        <!-- /.input-group -->
    </div>



    <!-- Blog Categories Well -->
    <div class="well">
        <?php

        $query = "select * from categories";
        $result = mysqli_query($connection , $query);
        ?>

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    while($row = mysqli_fetch_assoc($result)){

                    $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>" ;



                    }

                    ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">

                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <!---<div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>--->

