<?php session_start()?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>InstaKilogram</title>
</head>

<body>
    <header id="top-nav-bar">
        <a href = "index.php"><div class="page-logo-div"><img class="page-logo" src="Assets\InstaKilogram_logo.jpeg" alt="page logo"></div></a>
        <div class="header-search-bar">
            <form action="">
                <input class="search-bar" type="text" placeholder="Search">
                <button class="search-icon" type="submit"><i class="fa fa-search"></i></button>
            </form>
            
        </div>
        <div class="header-login">
        
        <?php
            if(isset($_SESSION["logedIn"])){ ?>
                <div class="avatar"><a href="profile_page.php"><img src= "../<?=$_SESSION["userInfo"]["pfp_path"];?>" alt="avatar"></a></div>
            <?php
            } else {
                echo '<div class="login-account"><a href="login_page.php">Login</a></div>';
            }
        ?>
        </div>
    </header>