<?php
session_start(); 
if(!isset($_SESSION["logedIn"])){
    header("Location: login.php");
}

if(isset($_POST['pwd'])){
    $new_pwd = password_hash($_POST['pwd'],PASSWORD_DEFAULT);
    $email = $_GET['email'];

    $file_name = "../../data/account.db";
    $new_file_name = "../../data/account_edit.db";
    $new_file = fopen($new_file_name, "w") or die("can't open file");
    
    if (($file = fopen($file_name, "r")) !== FALSE) {
        while (($line = fgets($file)) !== false) {
            $data = explode("|", $line);  
            if($data[0] == $email){
                fwrite($new_file, $data[0] . "|" . $new_pwd . "|" . $data[2] . "|" . $data[3] . "|" . $data[4] . "|" . $data[5] . "|" . $data[6]);
            } else {
            fwrite($new_file, $line);
            }
        }
        fclose($file);
    }
    fclose($new_file);
    rename($new_file_name, $file_name);
    header("Location: user_account.php?email=$email&reset_status=1");
}