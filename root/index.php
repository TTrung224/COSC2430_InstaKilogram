<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

    <?php require_once('templates/header.php'); ?>

    <!--main-->
    <main class="home-page-main">
        main section
        <?php require_once('templates/feed.php'); ?>
        <a href="functions/logout.php">Logout</a>
    </main>

    <!--footer-->
    <footer>

    </footer>
</body>
</html>