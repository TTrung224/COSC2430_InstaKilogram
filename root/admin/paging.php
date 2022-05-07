<?php

$number_of_pages;
$current_page;
$current_file_name = basename($_SERVER['PHP_SELF']);

function display_table_body($arr){
    $number_of_row = count($arr);
    if(sizeof($arr) > 0){$number_of_column = count($arr[0]);}

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

function display_table_accounts_header(){ ?>
    <theader>
        <tr>
            <?php if(isset($_GET['page'])){$page = $_GET['page'];}
                  if(isset($_GET['search'])){$search = $_GET['search'];} ?>
            <th><div>
                <p>Email</p>
                <form action="account_list.php" method="get">
                    <?php if(isset($_GET['search']) && $_GET['search']!=""){echo "<input type='text' name='search' value='$search' class='none_display'>";}
                    if(isset($_GET['page'])){ echo "<input type='text' name='page' value='$page' class='none_display'>";} ?>
                    <button type="submit" value="sort_email" name="sort"><i class="fa fa-caret-down" aria-hidden="true"></i></button> </form>
            </div></th>
            <th><div>
                <p>User Name</p>
                <form action="account_list.php" method="get">
                    <?php if(isset($_GET['search']) && $_GET['search']!=""){echo "<input type='text' name='search' value='$search' class='none_display'>";}
                    if(isset($_GET['page'])){ echo "<input type='text' name='page' value='$page' class='none_display'>";} ?>
                    <button type="submit" value="sort_uname" name="sort"><i class="fa fa-caret-down" aria-hidden="true"></i></button> </form>
            </div></th>
            <th><div>
                <p>Real Name</p>
                <form action="account_list.php" method="get">
                    <?php if(isset($_GET['search']) && $_GET['search']!=""){echo "<input type='text' name='search' value='$search' class='none_display'>";}
                    if(isset($_GET['page'])){ echo "<input type='text' name='page' value='$page' class='none_display'>";} ?>
                    <button type="submit" value="sort_rname" name="sort"><i class="fa fa-caret-down" aria-hidden="true"></i></button> </form>
            </div></th>
            <th><div>
                <p>Date Created</p>
                <form action="account_list.php" method="get">
                    <?php if(isset($_GET['search']) && $_GET['search']!=""){echo "<input type='text' name='search' value='$search' class='none_display'>";}
                    if(isset($_GET['page'])){ echo "<input type='text' name='page' value='$page' class='none_display'>";} ?>
                    <button type="submit" value="sort_date" name="sort"><i class="fa fa-caret-down" aria-hidden="true"></i></button> </form>
            </div></th>
        </tr>
    </theader>
<?php }

function display_table_images_header(){ ?>
    <theader>
        <tr>
            <?php if(isset($_GET['page'])){$page = $_GET['page'];}?>
            <th><div>
                <p>Email</p>
                <form action="image_list.php" method="get">
                    <?php if(isset($_GET['page'])){ echo "<input type='text' name='page' value='$page' class='none_display'>";} ?>
                    <button type="submit" value="sort_email" name="sort"><i class="fa fa-caret-down" aria-hidden="true"></i></button> </form>
            </div></th>
            <th><div>
                <p>Date Created</p>
                <form action="image_list.php" method="get">
                    <?php if(isset($_GET['page'])){ echo "<input type='text' name='page' value='$page' class='none_display'>";} ?>
                    <button type="submit" value="sort_date" name="sort"><i class="fa fa-caret-down" aria-hidden="true"></i></button> </form>
            </div></th>
            <th> Image </th>
            <th> Sharing Level </th>
            <th> Option </th>  
        </tr>
    </theader>
<?php }

function display_page_selection(){ ?>

    <div class="page-input">
        <input type="text" name="page" id="page" 
        value="<?= $GLOBALS['number_of_pages'] == 0 ? 0 : $GLOBALS['current_page'];?>">
        <p> / </p>
        <p class="number-of-pages"> <?= $GLOBALS['number_of_pages']?> </p> 
        <?php 
        if(isset($_GET['search']) && $_GET['search']!=""){?> 
            <input type="text" name="search" value="<?=$_GET['search']?>" class="none_display"> <?php } 
        if(isset($_GET['sort']) && $_GET['sort']!=""){?>
            <input type="text" name="sort" value="<?=$_GET['sort']?>" class="none_display"> <?php } 
        ?>
    </div>
    <button class="page-reach-btn" type="submit"><i class="fa fa-file-text-o" aria-hidden="true"></i></button>

<?php }