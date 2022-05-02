<?php
session_start();

$description = htmlspecialchars($_POST['img-description']);
$sharing_level = $_POST['sharing-option'];

// Add image into images folder
$temp = explode('.',$_FILES["image"]["name"]);
$fileExtension = strtolower(end($temp));

// Get the line number of the post.csv to rename the new image
$file = fopen("../../data/post.db", "r");
$flag = 0;
$line_index = 0;
while (($line = fgets($file)) !== false) {
    $flag++;
    if($flag == 1){continue;}
    $line_index++;
}
fclose($file);

$line_index++;

// Save file to the server
$_FILES["image"]["name"] = (string)$line_index . '.' . $fileExtension;

$file_name = basename($_FILES["image"]["name"]);

$path = "../../data/images/";
$file = $path . $file_name;
move_uploaded_file($_FILES["image"]["tmp_name"], $file);

// Add post information into post.db
date_default_timezone_set('Asia/Ho_Chi_Minh');

$db_file = fopen("../../data/post.db", "a");
$text = $_SESSION["userInfo"]["email"] . "|" . date("Y-m-d H:i:s") . "|" . $description . "|" . $file_name . "|" . $sharing_level . "\n";
fwrite($db_file, $text);
fclose($db_file);