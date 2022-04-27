<?php
if($_SESSION["logedIn"]){
    echo '<div class="login-account"><a href="login_page.php">Account</a></div>';
} else {
    echo '<div class="login-account"><a href="login_page.php">Login</a></div>';
}
?>
