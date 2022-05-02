<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<body>
    <!--header-->
    <?php require_once('templates/header.php'); ?>

    <!--main-->
    <main class="home-page-main">
        main section
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