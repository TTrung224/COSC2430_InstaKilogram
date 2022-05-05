<?php
session_start();

if(isset($_POST['img-description']) && isset($_POST['sharing-option']) && isset($_FILES["image"])){

    $description = strip_tags($_POST['img-description']);
    $sharing_level = strip_tags($_POST['sharing-option']);

    // Add image into images folder
    $temp = explode('.',$_FILES["image"]["name"]);
    $fileExtension = strtolower(end($temp));

    // Get the last image name of the post.db to rename the new image
    $file = fopen("../../data/post.db", "r");
    $flag = 0;
    while (($line = fgets($file)) !== false) {
        $flag++;
        if($flag == 1){continue;}
        $data = explode("|", $line);
        $index = (int) current(explode('.',$data[3]));
    }
    fclose($file);

    $index++;

    // Save file to the server
    $_FILES["image"]["name"] = (string)$index . '.' . $fileExtension;

    $file_name = basename($_FILES["image"]["name"]);

    $path = "../Assets/post_images/";
    $file = $path . $file_name;
    move_uploaded_file($_FILES["image"]["tmp_name"], $file);

    // Add post information into post.db
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $db_file = fopen("../../data/post.db", "a");
    $text = $_SESSION["userInfo"]["email"] . "|" . date("Y-m-d H:i:s") . "|" . $description . "|" . $file_name . "|" . $sharing_level . "\n";
    fwrite($db_file, $text);
    fclose($db_file);
    header("Location: ../index.php");
}