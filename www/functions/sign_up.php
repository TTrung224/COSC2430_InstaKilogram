<?php
session_start();
if (
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['retype_password']) &&
    isset($_FILES['upload_file']) &&
    isset($_POST['uname']) &&
    isset($_POST['fname']) &&
    isset($_POST['lname'])
) {

    function formatInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = strip_tags($data);
        return $data;
    }

    $pwd = $_POST['password'];
    $uname = formatInput($_POST['uname']);
    $fname = formatInput($_POST['fname']);
    $lname = formatInput($_POST['lname']);

    if ($_POST['email'] !== "" && $_FILES["upload_file"]["error"] !== 4) {
        

        $errorList =  array();
      
        $email = formatInput($_POST['email']);
        $email = strtolower($email);

        // check email exist
        if (is_readable("../../data/account.db")) {
            $readFileToString = file_get_contents("../../data/account.db");
            $email_duplicate_check = str_contains($readFileToString, $email);
            if (str_contains($readFileToString, $email)) {
                $errorList["email_error"] =  $email_duplicate_check;
            } 
           
        }
      
        // check file extenstion
        $file = $_FILES['upload_file'];
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $file_extension_check = in_array($file_extension, ['gif', 'jpg', 'jpeg', 'png']);
        if (!$file_extension_check) {
            $errorList["file_extension_error"] = $file_extension_check;
        } 
    
        if (array_key_exists("email_error", $errorList) && array_key_exists("file_extension_error", $errorList)) {
            header("Location: ../sign_up_page.php?emailError=1&fileError=1");
        } else if (!array_key_exists("email_error", $errorList) && array_key_exists("file_extension_error", $errorList)) {
            header("Location: ../sign_up_page.php?fileError=1");
        } else if (array_key_exists("email_error", $errorList) && !array_key_exists("file_extension_error", $errorList)){
            header("Location: ../sign_up_page.php?emailError=1");
        } else{
            // Save file to the server
            $_FILES["upload_file"]["name"] = $email . '.' . $file_extension;
            $file_name = basename($_FILES["upload_file"]["name"]);

            $path = "../Assets/pfp/";
            $file = $path . $file_name;
            move_uploaded_file($_FILES["upload_file"]["tmp_name"], $file);

            $file = "Assets/pfp/" . $file_name;

            // Save account to account.db
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $db_file = fopen("../../data/account.db", "a");
            $text = $email . "|" . password_hash($pwd, PASSWORD_DEFAULT) . "|" . $uname . "|" . $fname." ".$lname . "|" . $file . "|" . "" . "|" . date("Y-m-d H:i:s") . "\n";
            fwrite($db_file, $text);
            fclose($db_file);

            header("Location: ../login_page.php");
        }
    }
}