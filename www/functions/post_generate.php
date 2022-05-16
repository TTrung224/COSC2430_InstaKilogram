<?php
function get_post_user_info($email){
    $out_root_dir = dirname($_SERVER['DOCUMENT_ROOT']);
    $file = fopen("$out_root_dir/data/account.db", "r");
    $u_name;
    $pfp_path;

    $flag = 0;
        while (($line = fgets($file)) !== false) {
            $flag++;
            if($flag == 1){continue;}

            $data = explode("|", $line);  
            if($data[0] == $email){
                $u_name = $data[2];
                $pfp_path = $data[4];
                break;
            }
        }
        fclose($file);
        return array('u_name' => $u_name, 'pfp-path' => $pfp_path);
}

foreach($post_arr as $post){ 
    $info = get_post_user_info($post[0]);?>
    <div class="post">
        <header class="post-header">
            <img src="<?=$info['pfp-path']?>" alt="post-user avatar">
            <p><?=$info['u_name']?></p>
            <p class="post-date"><?=$post[1]?></p>
        </header>
        <div class="post-image"><img src="Assets/post_images/<?=$post[3]?>" alt="post-image"></div>
        <div class="post-description">
            <p><?=$post[2]?></p>
        </div>
    </div>
<?php }?>
