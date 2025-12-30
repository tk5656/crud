<?php
if(!isset($_COOKIE["name"])){
    header("location:./login.php");
    exit; 
}
if(!isset($_GET["id"]) || empty($_GET["id"])){
    header("location:./index.php");
    exit;
}
$id = $_GET["id"];

require_once "../db_config.php";

// ========================= DB操作 ==========================

$link = mysqli_connect(HOST, USER, PASSWORD, DB);
mysqli_set_charset($link, "utf8");

$sql = "SELECT title, price, remarks, image, created_at, updated_at FROM items WHERE id = " . $id . ";";
$result = mysqli_query($link, $sql);

mysqli_close($link);

// ==========================================================

$item = mysqli_fetch_assoc($result);

require_once "./tpl/detail.php";
?>