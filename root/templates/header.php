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
                <div class="avatar"><a href="profile_page.php"><img src= "../<?=$_SESSION["userInfo"]["pfp-path"];?>" alt="avatar"></a></div>
            <?php
            } else {
                echo '<div class="login-account"><a href="login_page.php">Login</a></div>';
            }
        ?>
        </div>
    </header>