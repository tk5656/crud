<?php
if(!isset($_COOKIE["name"])){
    header("location:./login.php");
    exit; 
}
$name = $_COOKIE["name"];

require_once "../db_config.php";

// ========================= DB操作 ==========================

// 一覧画面：削除日がNULLのものを全て一覧表示する（タイトル・価格）
$link = mysqli_connect(HOST, USER, PASSWORD, DB);
mysqli_set_charset($link, "utf8");

$result = mysqli_query($link, "SELECT title, price, id, image FROM items WHERE deleted_at IS NULL ORDER BY id ASC;");
mysqli_close($link);

// ==========================================================

// 全件取得する（配列に格納）
$items = [];
// 1件目の取得
$row = mysqli_fetch_assoc($result);
// $rowが取得されていれば（NULL）でなければ、配列に格納する
while($row){
    $items[] = $row; 
    $row = mysqli_fetch_assoc($result);
}

// サムネイルのパスとalt属性の内容を配列に格納する
$thumb_info = [];
$thumb = [];
foreach($items as $item){
    if($item["image"]){
        // ファイルパスを分割
        $path_info = pathinfo($item["image"]);
        // dirname　ファイル名を除くディレクトリパス
        // basename　ディレクトリパスを除くファイル名
        // extension　引数で指定したファイル名の拡張子だけを抽出
        // filename　引数で指定したファイル名の拡張子を除いたファイル名を取得
        $thumb["src"] = $path_info["dirname"] . "/thumb_" . $path_info["basename"];
        $thumb["alt"] = $item["title"] . "のサムネイル画像";
    }
    else{
        $thumb["src"] = "";
        $thumb["alt"] = "";
    }
    $thumb_info[$item["id"]] = $thumb;
}


require_once "./tpl/index.php";
?>