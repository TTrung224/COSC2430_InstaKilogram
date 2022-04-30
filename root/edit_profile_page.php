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
      <div class="profile-page-profile">
        <div class="profile-page-pfp">
          <img src="https://images.unsplash.com/photo-1617633840837-b9164835073f?w=152&h=152&fit=crop&crop=faces" alt="">
        </div>
        <div class="profile-page-user-settings">
          <h1 class="profile-page-user-name">kevin_</h1>
          <div class="profile-page-edit-profile"><a href="edit_profile_page.php">Edit profile</a></div>
        </div>
        <div class="profile-page-stats">
          <ul>
            <li><span class="profile-page-stat-count">4</span> posts</li>
            <li><span class="profile-page-stat-count">204</span> followers</li>
            <li><span class="profile-page-stat-count">158</span> following</li>
          </ul>
        </div>
        <div class="profile-page-bio">
          <p class="profile-page-real-name">Kevin</p>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
        </div>
      </div>
      <!-- End of profile section -->
    </header>
    <main>
    </main>
  </body>
</html>