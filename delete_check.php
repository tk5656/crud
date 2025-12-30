<?php
session_start();

if(!isset($_COOKIE["name"])){
    header("location:./login.php");
    exit;
}

require_once "../db_config.php";

if(isset($_GET["delete_id"])){
    // ========================= DB操作 ==========================

    // deleted_atに日付を追加する
    $link = mysqli_connect(HOST, USER, PASSWORD, DB);
    mysqli_set_charset($link, "utf8");

    $sql = "UPDATE items SET deleted_at = CURRENT_TIMESTAMP() WHERE id = " . $_GET["delete_id"] . ";";
    mysqli_query($link, $sql);

    mysqli_close($link);

    // ==========================================================

    header("location:./delete_result.php");
    exit;
}

// indexの削除ボタンが押されたとき：該当商品情報を表示する
if(!isset($_GET["id"]) || empty($_GET["id"])){
    header("location:./index.php");
    exit;
}
$id = $_GET["id"];

// ========================= DB操作 ==========================

$link = mysqli_connect(HOST, USER, PASSWORD, DB);
mysqli_set_charset($link, "utf8");

$sql = "SELECT title, price, remarks, image, created_at, updated_at, id FROM items WHERE id = " . $id . ";";
$result = mysqli_query($link, $sql);

mysqli_close($link);

// ==========================================================

$item = mysqli_fetch_assoc($result);

if(!$item){
    header("location:./index.php");
    exit;
}

require_once "./tpl/delete_check.php";
?>