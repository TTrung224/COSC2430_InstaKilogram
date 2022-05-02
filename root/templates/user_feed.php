<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="user-main-feed">
        <form action="functions/post.php" class="upload-img-section" method="post" enctype="multipart/form-data">
            <p>Let's share something!</p>
            <textarea name="img-description" id="img-description" cols="30" rows="1" placeholder="Write a description"></textarea>
            <div class="img-sharing-levels">
                <div>
                    <label for="image-input-file">Add an image:</label>
                    <input name="image" type="file" id="image-input-file" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp" required>
                </div>
                <div>
                    <label for="sharing-option">Sharing level</label>
                    <select name="sharing-option" id="sharing-option">
                        <option value="public">Public</option>
                        <option value="internal">Internal</option>
                        <option value="private">Private</option>
                    </select>
                </div>
            </div>
            <div class="img-sharing-btns">
                <button type="reset" >Cancel</button>
                <button type="submit" name="post">Upload</button>
            </div>        
        </form>
    </div>

    <main class="post-section">

        <?php 
        $file = fopen("../data/post.db", "r");
        $flag = 0;
        $post_arr = array();

        while (($line = fgets($file)) !== false) {
            $flag++;
            if($flag == 1){continue;}

            $data = explode("|", $line);  
            if($data[0] != $_SESSION["userInfo"]["email"] && strcmp(trim($data[4]),'private') == 0){
                continue;
            }

            array_push($post_arr, $data);
        }
        fclose($file);
        
        $post_arr = array_reverse($post_arr);

        include_once('functions/post_generate.php');
        ?>

    </main>
</body>
</html>