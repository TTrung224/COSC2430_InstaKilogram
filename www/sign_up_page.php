<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign up</title>
</head>

<body>
    <main class="login-page-cover">
        <div class="login-box">
            <a href="index.php">
                <div class="login-box-logo"><img src="Assets\InstaKilogram_logo.jpeg" alt="login box logo"></div>
            </a>
            <form class="login-form" action="functions\sign_up.php" method="post" enctype="multipart/form-data">
                <?php if(isset($_GET['emailError'])){ ?> 
                    <p class="login-page-input error"> Email has already existed</p>
                <?php } ?>
                <input class="login-page-input email" name="email" type="email" placeholder="Email">
                <input class="login-page-input pwd" name="password" type="password" placeholder="Password">
                <input class="login-page-input pwd-retype" name="retype_password" type="password" placeholder="Retype_password">
                <?php if(isset($_GET['fileError'])){ ?> 
                    <p class="login-page-input error"> Please choose image extensions: gif, jpg, jpeg, png</p>
                <?php } ?>
                <p class="pfp-input-label">Upload profile picture:</p>
                <input class="login-page-input file" id="pfp-input" name="upload_file" type="file">
                <input class="login-page-input username" name="uname" type="text" placeholder="Username">
                <input class="login-page-input fname" name="fname" type="text" placeholder="first name">
                <input class="login-page-input lname" name="lname" type="text" placeholder="last name">
                <button class="login-page-submit-btn login-page-clear-btn" type="reset">Clear</button>
                <button class="login-page-submit-btn signup-submit-btn" type="submit" disabled="true">Sign up</button>
            </form>
        </div>

    </main>
    <script src="signup_page_script.js"></script>
</body>

</html>