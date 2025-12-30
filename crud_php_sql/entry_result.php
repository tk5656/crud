<?php
session_start();

if(!isset($_COOKIE["name"])){
    header("Location:./login.php");
    exit; 
}
if(!isset($_SESSION["item_id"])) {
    header("Location:./entry_form.php");
    exit;
}
$item_id = $_SESSION["item_id"];
session_destroy();

require_once "../db_config.php";

// ========================= DB操作 ==========================

$link = mysqli_connect(HOST, USER, PASSWORD, DB); // 接続
mysqli_set_charset($link, "utf8");

// ＊＊＊ 登録した値の取得 ＊＊＊
$sql = "SELECT title, price, remarks, image FROM items WHERE id = " . $item_id . ";"; // SQL文（値取得・SELECT）の作成
$result = mysqli_query($link, $sql); // 実行

mysqli_close($link); // 切断

// ==========================================================

$item = mysqli_fetch_assoc($result); // 登録した値の取得

if(isset($item["image"]) && !empty($item["image"])){
    // ファイルパスを分割
    $path_info = pathinfo($item["image"]);
    // dirname　ファイル名を除くディレクトリパス
    // basename　ディレクトリパスを除くファイル名
    // extension　引数で指定したファイル名の拡張子だけを抽出
    // filename　引数で指定したファイル名の拡張子を除いたファイル名を取得
    $item["thumb"] = $path_info["dirname"] . "/thumb_" . $path_info["basename"];
}

require_once "./tpl/entry_result.php";
?>