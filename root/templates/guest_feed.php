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
            if(strcmp(trim($data[4]),'public') == 0){
                array_push($post_arr, $data);
            }
        }
        fclose($file);

        $post_arr = array_reverse($post_arr);
        foreach($post_arr as $post){
            echo $post[0].$post[1].$post[4]. "<br>";
        }
        ?>
    </main>
</body>
</html>