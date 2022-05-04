<?php
session_start();

function formatInput($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = strip_tags($data);
    return $data;
}

$username = formatInput($_POST["username"]);
$realname = formatInput($_POST["realname"]);
$bio = formatInput($_POST["bio"]);

if ($username != $_SESSION["userInfo"]["username"] or $realname != $_SESSION["userInfo"]["realname"] or $bio != $_SESSION["userInfo"]["bio"]) {
  $file_name = "../../data/account.db";
  $new_file_name = "../../data/account_edit.db";
  $new_file = fopen($new_file_name, "w") or die("can't open file");

  if (($file = fopen($file_name, "r")) !== FALSE) {
    while (($line = fgets($file)) !== false) {
        $data = explode("|", $line);  
        if($data[0] == $_SESSION["userInfo"]["email"]){
            fwrite($new_file, $data[0] . "|" . $data[1] . "|" . $username . "|" . $realname . "|" . $data[4] . "|" . $bio . "|" . $data[6]);
            $_SESSION["userInfo"] = ["email" => $data[0], "username" => $username, "realname" => $realname, "pfp_path" => $data[4], "bio" => $bio];
            $validated = true;
        } else {
          fwrite($new_file, $line);
        }
    }
    fclose($file);
  }
  fclose($new_file);
  rename($new_file_name, $file_name);
  echo formatInput($_POST["username"]);
}
header("Location: ../profile_page.php");

?>