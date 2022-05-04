<?php

$number_of_row = count($arr);
$number_of_column = count($arr[0]);

$page_size = 10;
$number_of_pages = ceil($number_of_row/$page_size);

if(!isset($_GET['page'])){
    $current_page = 1;
} else{
    $current_page = $_GET['page'];
}

$page_start_index_row = ($current_page - 1) * $page_size;

?> <tbody> <?php
for($i = 0; $i < $number_of_row && $i <= ($page_start_index_row + $page_size - 1); $i++){
    
    if($i >= $page_start_index_row){
        ?> <tr> <?php
        for($j = 0; $j < $number_of_column; $j++){
            ?> <td> <?php
            echo $arr[$i][$j];
            ?> </td> <?php
        }
        ?> </tr> <?php
    }
}
?> </tbody> <?php

$current_file_name = basename($_SERVER['PHP_SELF']);

?> <div class="page-menu"> <?php

for($page=1; $page <= $number_of_pages; $page++){ ?>
    <a href="<?=$current_file_name?>?page=<?=$page?>"> <?= $page ?> </a>
<?php } ?>

</div>