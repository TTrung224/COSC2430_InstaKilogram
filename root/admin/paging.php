<?php

$number_of_pages;
$current_page;
$current_file_name = basename($_SERVER['PHP_SELF']);

function display_table_body($arr){
    $number_of_row = count($arr);
    $number_of_column = count($arr[0]);

    $page_size = 10;
    $GLOBALS['number_of_pages'] = ceil($number_of_row/$page_size);

    if(!isset($_GET['page'])){
        $GLOBALS['current_page'] = 1;
    } else{
        $GLOBALS['current_page'] = $_GET['page'];
    }

    $page_start_index_row = ($GLOBALS['current_page'] - 1) * $page_size;

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
}

function display_page_selection(){ ?>

    <div class="page-input">
        <input type="text" name="page" id="page" value="<?=$GLOBALS['current_page']?>">
        <p> / </p>
        <p class="number-of-pages"><?=$GLOBALS['number_of_pages']?></p>
    </div>
    <button type="submit">search</button>

<?php }