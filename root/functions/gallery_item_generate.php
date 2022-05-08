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
?>

<div class="gallery">

<?php
foreach($post_arr as $post){ 
    ?>
    <div class="gallery-item" tabindex="0">
        <img src="Assets/post_images/<?=$post[3]?>" class="gallery-image" alt="">
        <div class="gallery-item-type">
          <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>
        </div>
        <div class="gallery-item-info">
          <ul>
            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 42</li>
            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 1</li>
           </ul>
        </div>
      </div>
<?php }?>

</div>
