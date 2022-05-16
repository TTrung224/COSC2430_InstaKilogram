<?php
    session_start();

    if(isset($_SESSION["logedIn"])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <main class="login-page-cover">
        <div class="login-box">
            <a href="index.php"><div class="login-box-logo"><img src="Assets\InstaKilogram_logo.jpeg" alt="login box logo"></div></a>
            <form class="login-form" action="functions\login.php" method="post">
                <?php if(isset($_GET['error'])) { ?>
                    <p class="login-page-input error"> <?php echo $_GET['error'] ?> </p>
                <?php } ?>
                <input class="login-page-input email" name="email" type="email" placeholder="Email">
                <input class="login-page-input pwd" name="password" type="password" placeholder="Password">
                <button class="login-page-submit-btn" type="submit" disabled="true">Login</button>
            </form>
            <p class="sign-up-text">Don't have account?<a href="sign_up_page.php"> Sign up</a></p>
        </div>
    </main>
    <script src = "login_page_script.js"></script>
</body>
</html>