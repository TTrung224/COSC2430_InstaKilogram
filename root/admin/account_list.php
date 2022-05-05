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

            $file = fopen("$out_root_dir/data/account.db", "r");
            $flag = 0;
            $arr = array();
    
            while (($line = fgets($file)) !== false) {
                $flag++;
                if($flag == 1){continue;}
    
                $data = explode("|", $line);
                $href = "user_account.php?email=$data[0]";
                $data[0] = "<a href=$href>$data[0]</a>";
                array_splice($data,1,1);
                array_splice($data,3,2);

                array_push($arr, $data);
            }
            fclose($file);
            
            $arr = array_reverse($arr);

            if(isset($_GET['search']) && $_GET['search']!=""){
                $search_str = $_GET['search'];
                $pattern = "/$search_str/i";
                $search_arr;

                foreach($arr as $index => $item){
                    if (preg_match($pattern, $item[0]) || preg_match($pattern, $item[1])){
                        $search_arr[] = $item;
                    }
                }
                $arr = $search_arr;
            }
            ?>

            <table class="list-table">
                <caption>
                    <div><p>Accounts</p></div>
                    <div>
                        <form class="search-form" action="account_list.php" method="get">
                            <input type="text" name="search" id="search" placeholder="search for username or email"
                                <?php if(isset($_GET['search'])){?> value="<?=$_GET['search']?>" <?php }?>
                            >
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </caption>
                    
                <theader>
                    <tr>
                        <th> Email </th>
                        <th> UserName </th>
                        <th> Real Name </th>
                        <th> Date Created </th>
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