<?php
    session_start();
    if(!isset($_SESSION["logedIn"])){
      header("Location: login_page.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
      <title>Profile</title>
  </head>
  <body>
    <header>
      <!--header-->
      <?php require_once('templates/header.php'); ?>
      <div class="profile-page-profile">
        <div class="profile-page-pfp">
          <img src="<?=$_SESSION["userInfo"]["pfp-path"];?>" alt="">
        </div>
        <div class="profile-page-user-info">
          <div class="profile-page-user-settings">
            <h1 class="profile-page-user-name"><?=$_SESSION["userInfo"]["username"];?></h1>
            <div class="profile-page-button"><a href="edit_profile_page.php">Edit profile</a></div>
            <div class="profile-page-button"><a href="/functions/logout.php">Logout</a></div>
          </div>
          <!-- <div class="profile-page-stats">
            <ul>
              <li><span class="profile-page-stat-count">4</span> posts</li>
              <li><span class="profile-page-stat-count">204</span> followers</li>
              <li><span class="profile-page-stat-count">158</span> following</li>
            </ul>
          </div> -->
          <div class="profile-page-bio">
            <p class="profile-page-real-name"><?=$_SESSION["userInfo"]["realname"]; ?></p>
            <p><?=$_SESSION["userInfo"]["bio"]; ?></p>
          </div>
        </div>
      </div>
      <!-- End of profile section -->
    </header>
    <hr/>
    <main>
      <div class="container">
        <?php
          require_once("templates/gallery.php");
        ?>
        <!-- End of gallery -->
        <div class="loader"></div>
        
      </div>
      <!-- End of container -->
    </main>
  </body>
</html>