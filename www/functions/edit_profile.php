<?php
session_start();

function formatInput($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = strip_tags($data);
    return $data;
}

function uploadImage() {
  $temp = explode('.',$_FILES["pfp-change"]["name"]);
  $fileExtension = strtolower(end($temp));
  $_FILES["pfp-change"]["name"] = $_SESSION["userInfo"]["email"] . "." . $fileExtension;
  $file_name = basename($_FILES["pfp-change"]["name"]);
  $path = "../Assets/pfp/";
  $file = $path . $file_name;

  if ($_SESSION["userInfo"]["pfp-path"] != "/Assets/pfp/default_user.png") {
    unlink(".." . $_SESSION["userInfo"]["pfp-path"]);
  }
    
  move_uploaded_file($_FILES["pfp-change"]["tmp_name"], $file);
  return "/Assets/pfp/" . $file_name;
}

$username = formatInput($_POST["username"]);
$realname = formatInput($_POST["realname"]);
$bio = formatInput($_POST["bio"]);
$pfp_path = $_SESSION["userInfo"]["pfp-path"];

if ($username != $_SESSION["userInfo"]["username"] or $realname != $_SESSION["userInfo"]["realname"] or $bio != $_SESSION["userInfo"]["bio"] or $_FILES["pfp-change"]["error"] != 4) {
  $file_name = "../../data/account.db";
  $new_file_name = "../../data/account_edit.db";
  $new_file = fopen($new_file_name, "w") or die("can't open file");

  if ($_FILES["pfp-change"]["error"] != 4) {
    $pfp_path = uploadImage();
  }
  
  if (($file = fopen($file_name, "r")) !== FALSE) {
    while (($line = fgets($file)) !== false) {
        $data = explode("|", $line);  
        if($data[0] == $_SESSION["userInfo"]["email"]){
            fwrite($new_file, $data[0] . "|" . $data[1] . "|" . $username . "|" . $realname . "|" . $pfp_path . "|" . $bio . "|" . $data[6]);
            $_SESSION["userInfo"] = ["email" => $data[0], "username" => $username, "realname" => $realname, "pfp-path" => $pfp_path, "bio" => $bio];
            $validated = true;
        } else {
          fwrite($new_file, $line);
        }
    }
    fclose($file);
  }
  fclose($new_file);
  rename($new_file_name, $file_name);
}
header("Location: ../profile_page.php");

?>