<?php
    $_SESSION["logedIn"] = false;
    session_start();
?>

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
    <header id="top-nav-bar">
        <div class="page-logo-div"><img class="page-logo" src="Assets\InstaKilogram_logo.jpeg" alt="page logo"></div>
        <div class="header-search-bar">
            <form action="">
                <input class="search-bar" type="text" placeholder="Search">
                <button class="search-icon" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="header-login">
        <?php
            if($_SESSION["logedIn"] == true){
                echo '<div class="login-account"><a href="login_page.php">Account</a></div>';
                //include_once("nav_account.php");
            } else if($_SESSION["logedIn"] != true) {
                echo '<div class="login-account"><a href="login_page.php">Login</a></div>';
            }
        ?>
        </div>
    </header>

    <!--main-->
    <main class="home-page-main">
        main section
        <?php
        if($_SESSION["logedIn"] == true){
                include_once("test.php");
            } else if($_SESSION["logedIn"] != true) {
                include_once("test1.php");
            }
        ?>
        <a href="logout.php">Logout</a>
    </main>
</body>
</html>