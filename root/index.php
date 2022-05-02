<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>InstaKilogram</title>
</head>
<body>
    <!--header-->
    <?php require_once('templates/header.php'); ?>

    <!--main-->
    <main class="home-page-main">
        <?php
            if(isset($_SESSION["logedIn"])){
                require_once("templates/user_feed.php");
            } else {
                require_once("templates/guest_feed.php");
            } 
        ?>
        
        <a href="functions/logout.php">Logout</a>
        
    </main>

    <!--footer-->
    <?php require_once('templates/footer.php'); ?>
</body>
</html>