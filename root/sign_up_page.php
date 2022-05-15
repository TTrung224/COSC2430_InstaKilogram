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
            <?php if(isset($_GET['error']) && $_GET['error'] == 'email_error'){ ?> <p class="login-page-input error"> Email has been created</p>
                <?php } ?>
                <input class="login-page-input email" name="email" type="email" placeholder="Email">
                <input class="login-page-input pwd" name="password" type="password" placeholder="Password">
                <input class="login-page-input pwd" name="retype_password" type="password" placeholder="Retype_password">
                    <?php if(isset($_GET['error']) && $_GET['error'] == 'file_extension_error'){ ?> <p class="login-page-input error"> File with extension gif, jpg, jpeg, png only</p>
                <?php } ?>
                <input class="login-page-input file" name="upload_file" type="file">
                <input class="login-page-input pwd" name="fname" type="text" placeholder="first name">
                <input class="login-page-input pwd" name="lname" type="text" placeholder="last name">
                <button class="login-page-submit-btn" type="submit">Sign up</button>
            </form>
        </div>

    </main>
</body>

</html>