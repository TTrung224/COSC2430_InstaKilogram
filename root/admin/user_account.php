<?php 
    session_start(); 
    if(!isset($_SESSION["logedIn"])){
        header("Location: login.php");
      }

    $email = $_GET['email'];
    $user_info;
    $out_root_dir = dirname($_SERVER['DOCUMENT_ROOT']);

    $file = fopen("$out_root_dir/data/account.db", "r");
    $flag = 0;
    $arr = array();

    while (($line = fgets($file)) !== false) {
        $flag++;
        if($flag == 1){continue;}

        $data = explode("|", $line);
        if($data[0] == $email){
            $user_info = $data;
        }
    }
    fclose($file);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>User Account</title>
    </head>

    <body>
        <!-- header -->
        <?php require_once('admin_header.html') ?>

        <div class="profile-page-profile">
            <div class="profile-page-pfp">
                <img src="../<?=$user_info[4];?>" alt="user avatar">
            </div>
            <div class="profile-page-user-info">
                <div class="profile-page-user-settings">
                    <h1 class="profile-page-user-name"><?=$user_info[2];?></h1>
                    <form action="user_account.php?email=<?=$email?>" method="post"><button type="submit" name="reset_pwd">Reset Password</button></form>
                    <?php
                        if(isset($_POST['reset_pwd'])){
                            ?> 
                            <form action="reset_pwd.php?email=<?=$email?>" method="post">
                                <label for="pwd">Enter new password: </label>
                                <input type="password" name="pwd" id="pwd">
                                <button type="submit">Reset</button>
                            </form>
                            <?php
                        }

                        if(isset($_GET['reset_status'])){  ?>
                            <div class="success-message"><p>Password reseted successully</p></div>
                        <?php }                      
                    ?>
                </div>
                <div class="profile-page-stats">
                    <ul>
                        <li>Email Address: <span class="profile-page-stat-count"><?=$user_info[0];?></span></li>
                        <li>Date Created: <span class="profile-page-stat-count"><?=$user_info[6];?></span></li>
                    </ul>
                </div>
                <div class="profile-page-bio">
                    <p class="profile-page-real-name"><?=$user_info[3];?></p>
                    <p><?=$user_info[5];?></p>
                </div>
            </div>
        </div>
        
        <!-- admin footer -->
        <?php require_once('admin_footer.html') ?>
    </body>
</html>