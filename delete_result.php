<?php

if(!isset($_COOKIE["name"])){
    header("location:./login.php");
    exit;
}

require_once "./tpl/delete_result.php";
?>