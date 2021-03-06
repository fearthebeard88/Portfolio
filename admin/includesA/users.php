<?php include "header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                    <h1 class="page-header">
                            Welcome Oh-<strong>Mighty</strong>-One...
                            <small>Tim</small>
                        </h1>

<?php
// if the key source is set, assign it to a variable
if (isSet($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = '';
}
// routing to certain pages based off queries in HTML
switch($source) {
    case "add_user" :
    include "add_user.php";
    break;

    case "edit_user" :
    include "edit_user.php";
    break;

    default:
    include "view_all_users.php";
    break;
}

?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
   <?php include "footer.php"; ?>