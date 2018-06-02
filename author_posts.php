<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/includesA/functions.php"; ?>
<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <h1 class="page-header">
                    Tim's Portfolio Page
                    <small>Grab a beer while you're here...</small>
                </h1>


            <?php
            if (isSet($_GET['author'])) {
                $post_author = $_GET['author'];
            }

            // selecting all from posts table
            $query = "SELECT * FROM posts WHERE post_status = 'Published' ";
            $query .= "AND post_author = '{$post_author}' ";
            $select_all_posts_query = mysqli_query($connect, $query);
            why($select_all_posts_query);
            // sorting the array returned from the database

            if (mysqli_num_rows($select_all_posts_query) == 0) {
                echo "<h1 class = 'text-center'>No Posts Here</h1>";
            }

            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_img = $row['post_img'];
                $post_content = substr($row['post_content'], 0, 100);
                $post_status = $row['post_status'];
                
                ?>
                
                <!-- First Blog Post -->
                <h2><!--using the database entries to use an HTTP query -->
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <a href = 'post.php?p_id=<?php echo $post_id; ?>'><img class="img-responsive" src="images/<?php echo $post_img; ?>" alt="Project Image"></a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php }  ?>

                <hr>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sideBar.php"; ?>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include "includes/footer.php"; ?>