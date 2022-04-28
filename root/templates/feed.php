<?php
if(isset($_SESSION["logedIn"])){
    require_once("userFeed.php");
} else {
    require_once("guestFeed.php");
}