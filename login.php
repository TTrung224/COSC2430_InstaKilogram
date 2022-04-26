<?php
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){
    function formatInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$email = formatInput($_POST['email']);
$password = formatInput($_POST['password']);
$validated = false;

if (($file = fopen("data/account.csv", "r")) !== FALSE) 
  {

    while (($data = fgetcsv($file)) !== FALSE) 
    {        
        if($data[0] == $email && $data[1] == $password){
            $validated = true;
            break;
        }
    }
  
    fclose($file);
  }

if($validated == false){
    echo "not validated email or password";
} else {
    $_SESSION["logedIn"] = true;
    header("Location: index.php");
}