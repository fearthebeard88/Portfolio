
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
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

<?php


// select all from table categories
$query = "SELECT * FROM categories ";
$selectCat = mysqli_query($connect, $query);
// assigning values from database into array
while ($row = mysqli_fetch_assoc($selectCat)) {
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];

    $query2 = "SELECT * FROM posts WHERE post_cat_id = {$cat_id} ";
    $find_posts = mysqli_query($connect, $query2);

    while ($row = mysqli_fetch_assoc($find_posts)) {
        $post_cat_id = $row['post_cat_id'];
}
    if (empty($post_cat_id)) {
        echo "<li><a href = '#'></a></li>";
    } else {
    echo "<li><a href = 'category.php?category=$post_cat_id'>{$cat_title}</a></li>";
    }
}

?>

                    <li>
                        <a href="./admin/includesA/index.php">Admin</a>
                    </li>
                    <!-- <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
