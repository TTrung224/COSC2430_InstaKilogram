<?php
    session_start();
?>

<?php
    if(isset($_POST['email']) && isset($_POST['password'])){
        function formatInput($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email = formatInput($_POST['email']);
        $email = strtolower($email);
        $password = formatInput($_POST['password']);
        
        if(strcmp($email,'admin@gmail.com')==0 && password_verify($password,'$2y$10$dkHdOVZeEYBnaib89Jrpveo/3wtllhA725mZ2SIwnm.pYKwjZAGxy')){
            $_SESSION["logedIn"] = true;
            $_SESSION["username"] = 'admin';
            header("Location: admin.php");
        } else {
            header("Location: login.php?error=not validated email or password");
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>InstaKilogram Admin</title>
</head>
<body>
    <main class="login-page-cover">
        <div class="login-box">
            <div class="login-box-logo"><img src="..\Assets\InstaKilogram_admin.jpeg" alt="login box logo"></div>
            <form class="login-form" action="login.php" method="post">
                <?php if(isset($_GET['error'])) { ?>
                    <p class="login-page-input error"> <?php echo $_GET['error'] ?> </p>
                <?php } ?>
                <input class="login-page-input email" name="email" type="email" placeholder="Email">
                <input class="login-page-input pwd" name="password" type="password" placeholder="Password">
                <button class="login-page-submit-btn" type="submit">Login</button>
            </form>
        </div>
    </main>
    <script src = "../login_page_script.js"></script>
</body>
</html>