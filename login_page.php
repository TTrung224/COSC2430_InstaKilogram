<?php
    session_start();
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
            <div class="login-box-logo"><img src="Assets\InstaKilogram_logo.jpeg" alt="login box logo"></div>
            <form class="login-form" action="login.php" method="post">
                <input class="login-page-input" name="email" type="email" placeholder="Email">
                <input class="login-page-input" name="password" type="password" placeholder="Password">
                <button class="login-page-submit-btn" type="submit">Login</button>
            </form>
            <p class="sign-up-text">Don't have account?<a href=""> Sign up</a></p>
        </div>
    </main>
</body>
</html>