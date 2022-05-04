<?php 
    session_start(); 
    if(!isset($_SESSION["logedIn"])){
        header("Location: login.php");
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
            <div><a href="account_list.php?data=accounts">
                <p>account list</p>
                <!-- icon -->
            </a></div>
            <div><a href="paging_list.php?data=accounts">
                <p>image list</p>
                <!-- icon -->
            </a></div>

        </main>

        <!-- footer -->
        <?php require_once('admin_footer.html') ?>

    </body>
</html>