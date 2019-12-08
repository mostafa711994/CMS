<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">




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



                    </div>
                </div>

                <!-- /.row -->

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                     <?php
                                     //count posts in dashboard
                                         $query = "select * from posts";
                                         $count_query = mysqli_query($connection,$query);
                                         $count_posts = mysqli_num_rows($count_query);

                                          echo "<div class='huge'>{$count_posts}</div>";





                                        ?>






                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">


                                        <?php
                                        //count comments in dashboard
                                        $query = "select * from comments";
                                        $count_comments_query = mysqli_query($connection,$query);
                                        $count_comments = mysqli_num_rows($count_comments_query);

                                        echo "<div class='huge'>{$count_comments}</div>";

                                        ?>



                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">


                                        <?php
                                        //count users in dashboard
                                        $query = "select * from users";
                                        $count_users_query = mysqli_query($connection,$query);
                                        $count_users = mysqli_num_rows($count_users_query);

                                        echo "<div class='huge'>{$count_users}</div>";

                                        ?>




                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">


                                        <?php
                                        //count categories in dashboard
                                        $query = "select * from categories";
                                        $count_categories_query = mysqli_query($connection,$query);
                                        $count_categories = mysqli_num_rows($count_categories_query);

                                        echo "<div class='huge'>{$count_categories}</div>";

                                        ?>


                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'count'],
                                <?php

                                $elements_text = ['posts','comments','users','categories'];
                                $elements_count = [$count_posts,$count_comments,$count_users,$count_categories];
                                for($i = 0; $i < 4; $i++){

                                    echo "['{$elements_text[$i]}'" . "," . "'{$elements_count[$i]}'],";

                                }



                                ?>

                            ]);

                            var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>
                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

                </div>





            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>