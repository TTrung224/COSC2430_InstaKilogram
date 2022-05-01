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
      <title>Edit profile</title>
  </head>
  <body>
    <header>
      <!--header-->
      <?php require_once('templates/header.php'); ?>
    </header>
    <main>
      <div class="edit-profile-box">
        
        <form class="edit-profile-form" action="functions\edit-profile.php" method="post">
          <div class="edit-profile-page-pfp">
            <img src="<?=$_SESSION["userInfo"]["pfp_path"];?>" alt="">
            <button class="edit-profile-page-btn" type="button">Edit profile picture</button>
          </div>
          <label for="username">Username : </label>
          <input class="edit-profile-page-input" name="username" type="text" placeholder="Usename" value="<?=$_SESSION["userInfo"]["username"];?>">
          <label for="realname">Real Name : </label>
          <input class="edit-profile-page-input" name="realname" type="text" placeholder="Real Name" value="<?=$_SESSION["userInfo"]["realname"];?>">
          <label for="bio">Bio : </label>
          <input class="edit-profile-page-input" name="bio" type="text" placeholder="Bio">
          <div class="edit-profile-submit">
            <button class="edit-profile-page-btn" type="submit">Save changes</button>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>