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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Edit profile</title>
  </head>
  <body>
    
    <!--header-->
    <?php require_once('templates/header.php'); ?>

    <main>
      <div class="edit-profile-box">
        
        <form class="edit-profile-form" action="functions\edit_profile.php" method="post" enctype="multipart/form-data">
          <div class="edit-profile-page-pfp">
            <img src="<?=$_SESSION["userInfo"]["pfp-path"];?>" alt="">
          </div>
          <label for="pfp">Change profile picture : </label>
          <input class="edit-profile-page-input" name="pfp-change" type="file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp">
          <label for="username">Username : </label>
          <input class="edit-profile-page-input" name="username" type="text" placeholder="Usename" value="<?=$_SESSION["userInfo"]["username"];?>">
          <label for="realname">Real Name : </label>
          <input class="edit-profile-page-input" name="realname" type="text" placeholder="Real Name" value="<?=$_SESSION["userInfo"]["realname"];?>">
          <label for="bio">Bio : </label>
          <input class="edit-profile-page-input" name="bio" type="text" placeholder="Bio" value="<?=$_SESSION["userInfo"]["bio"];?>">
          <div class="edit-profile-submit">
            <button class="edit-profile-page-btn" name="save-btn" type="submit">Save changes</button>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>