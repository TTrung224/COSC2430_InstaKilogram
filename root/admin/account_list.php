<?php 
    session_start(); 
    if(!isset($_SESSION["logedIn"])){
        header("Location: login.php");
      }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Accounts</title>
    </head>

    <body>
        <!-- header -->
        <?php require_once('admin_header.html') ?>

        <main class="home-page-main admin-page-main">
            
            <?php
            $out_root_dir = dirname($_SERVER['DOCUMENT_ROOT']);

            $file = fopen("$out_root_dir/data/test.db", "r");
            $flag = 0;
            $arr = array();
    
            while (($line = fgets($file)) !== false) {
                $flag++;
                if($flag == 1){continue;}
    
                $data = explode("|", $line);
                $href = '"' . '"';
                $data[0] = "<a href=$href>$data[0]</a>";
                
                array_push($arr, $data);
            }
            fclose($file);
            
            $arr = array_reverse($arr);
            
            require_once('paging.php')

            ?>
        </main>

        <!-- footer -->
        <?php require_once('admin_footer.html') ?>

    </body>
</html>