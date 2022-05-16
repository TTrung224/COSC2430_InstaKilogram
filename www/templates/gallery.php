<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <main class="post-section">
        <?php 
        $file = fopen("../data/post.db", "r");
        $flag = 0;
        $post_arr = array();

        while (($line = fgets($file)) !== false) {
            $flag++;
            if($flag == 1){continue;}

            $data = explode("|", $line);  
            if($data[0] == $_SESSION["userInfo"]["email"]){
              array_push($post_arr, $data);
            }
        }
        fclose($file);
        
        $post_arr = array_reverse($post_arr);
        include_once('functions/gallery_item_generate.php');
        ?>
    </main>
</body>
</html>