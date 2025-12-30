<?php
if(isset($_COOKIE["name"])){
    setcookie("name", "", time() - 60 * 60);
}
header("location:./login.php");
exit; 
?>