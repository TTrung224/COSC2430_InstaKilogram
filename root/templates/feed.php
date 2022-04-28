<?php
if(isset($_SESSION["logedIn"])){
    require_once("user_feed.php");
} else {
    require_once("guest_feed.php");
}