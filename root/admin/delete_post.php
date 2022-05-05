<?php
session_start(); 
if(!isset($_SESSION["logedIn"])){
    header("Location: login.php");
}

if(isset($_GET['img'])){
    $img_name = $_GET['img'];
    $file_name = "../../data/post.db";
    $new_file_name = "../../data/post_edit.db";
    $new_file = fopen($new_file_name, "w") or die("can't open file");

    if (($file = fopen($file_name, "r")) !== FALSE) {
        while (($line = fgets($file)) !== false) {
            $data = explode("|", $line);  
            if($data[3] != $img_name){
                fwrite($new_file, $line);
            }
        }
        fclose($file);
    }
    fclose($new_file);
    rename($new_file_name, $file_name);
    unlink("../Assets/post_images/$img_name");
    header('Location: image_list.php');
}