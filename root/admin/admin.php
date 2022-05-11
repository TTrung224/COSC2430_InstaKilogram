<?php 
    session_start(); 
    if(!isset($_SESSION["adminLogedIn"])){
        header("Location: login.php");
    }

    if(isset($_GET['logout'])){
        session_start();

        session_unset();
        session_destroy();

        header("location: admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>InstaKilogram Admin</title>
    </head>

    <body>
        <!-- header -->
        <?php require_once('admin_header.html') ?>

        <main class="home-page-main admin-page-main">
            <div class = dashboard>
                <div class="dashboard-item" id="account-list"><a href="account_list.php">
                    <div class="header"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <div class="body"><p>account list</p></div>
                </a></div>
                <div class="dashboard-item" id="image-list"><a href="image_list.php">
                    <div class="header"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                    <div class="body"><p>image list</p></div>
                </a></div>
            </div>

            <a href="admin.php?logout=1">logout</a>

        </main>

        <!-- footer -->
        <?php require_once('admin_footer.html') ?>

    </body>
</html>