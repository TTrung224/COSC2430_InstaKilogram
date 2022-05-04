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
        <title>Posts Images</title>
    </head>

    <body>
        <!-- header -->
        <?php require_once('admin_header.html') ?>

        <main class="home-page-main admin-page-main">
            
            <?php
            $out_root_dir = dirname($_SERVER['DOCUMENT_ROOT']);

            $file = fopen("$out_root_dir/data/post.db", "r");
            $flag = 0;
            $arr = array();
    
            while (($line = fgets($file)) !== false) {
                $flag++;
                if($flag == 1){continue;}
    
                $data = explode("|", $line);
                $data[3] = "<img class='post_img' src='../Assets/post_images/$data[3]'";
                array_splice($data,2,1);

                array_push($arr, $data);
            }
            fclose($file);
            
            $arr = array_reverse($arr);
            ?>

            <table class="list-table">
                <caption>Posts Images</caption>
                <theader>
                    <tr>
                        <th> User Email </th>
                        <th> Date Created</th>
                        <th> Image </th>
                        <th> Sharing Level </th>                        
                    </tr>
                </theader>

            <!-- table body -->
            <?php 
            require_once('paging.php');
            display_table_body($arr);
            ?>

            </table>

            <form class="page-number-form" action="<?=$current_file_name?>" method="get">
                <?php display_page_selection() ?>
            </form>
        </main>

        <!-- footer -->
        <?php require_once('admin_footer.html') ?>

        <script src = "page_enter.js"></script>
    </body>
</html>