<?php
session_start();
if (
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['retype_password']) &&
    isset($_FILES['upload_file']) &&
    isset($_POST['fname']) &&
    isset($_POST['lname'])
) {

    if ($_POST['email'] !== "" && $_FILES["upload_file"]["error"] !== 4) {
        function formatInput($data)
        {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = strip_tags($data);
            return $data;
        }

        $errorList =  array();
      
        $email = formatInput($_POST['email']);
        $email = strtolower($email);
        $_SESSION['valid'] = false;
        $_SESSION['file_valid'] = false;
        $_SESSION['email_valid'] = false;
        // $email_validate = false;
        // $file_validate = false;

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
        $file_pathInn = pathinfo($file['name'], PATHINFO_EXTENSION);
        $file_extension_check = in_array($file_pathInn, ['gif', 'jpg', 'jpeg', 'png']);
        if (!$file_extension_check) {
            $errorList["file_extension_error"] = $file_extension_check;
        } 
    
        if (array_key_exists("email_error", $errorList) && array_key_exists("file_extension_error", $errorList)) {
            // $_SESSION['valid'] = true;
            header("Location: ../sign_up_page.php?error=email_error&file_extension_error");
        } else if (!array_key_exists("email_error", $errorList) && array_key_exists("file_extension_error", $errorList)) {
            
            // $_SESSION['file_valid'] = true;
            header("Location: ../sign_up_page.php?error=file_extension_error");
        } else if (array_key_exists("email_error", $errorList) && !array_key_exists("file_extension_error", $errorList)){
            // $_SESSION['email_valid'] = true;
            header("Location: ../sign_up_page.php?error=email_error");
        }
       
    }
// print_r($_GET['error']);
}
    //     C1
    //     arr.length == 2
    //     header("Location: ../sign_up.php?eamil_error=1&file_error=1
    //     arr.length == 0
    //         arr.getkey== email_error
    // header("Location: ../sign_up.php?error=email has been created");
    // C2
    // {email_error, file_error}
    // if(arr.length != 0)
    //     header("Location: sign_up.php?error=$errorList")

    // sign_up page:

    // email error:
    // else{
    //     header("Location: ../sign_up_page.php");
    // }

// if(array_search("email_error",$_GET['error']))
?>