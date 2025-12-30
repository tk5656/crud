<?php
session_start();

if(!isset($_COOKIE["name"])){
    header("location:./login.php");
    exit;
}

require_once "../db_config.php";

// 確認ボタンが押されたときに入力内容をセッションに保存して確認画面へ遷移
if(!empty($_POST["input_title"]) && !empty($_POST["input_price"]) && !empty($_POST["input_remarks"])){
    $_SESSION["input_title"] = $_POST["input_title"];
    $_SESSION["input_price"] = $_POST["input_price"];
    $_SESSION["input_remarks"] = $_POST["input_remarks"];
    $_SESSION["id"] = $_POST["id"];
    
    // 画像がある場合：画像を一時保存用フォルダに保存、ファイル名をセッションに保存
    if(!empty($_FILES["input_upload_file"]["name"])){
        $dir = "./images/input_file/"; // 一時保存用画像フォルダ
        $file_name = time() . "_" . basename($_FILES["input_upload_file"]["name"]);
        $path = $dir . $file_name;
        move_uploaded_file($_FILES["input_upload_file"]["tmp_name"], $path);
        $_SESSION["input_file_path"] = $path;
    }
    else{
        $_SESSION["input_file_path"] = null;
        $_SESSION["uploaded_file_path"] = $_POST["uploaded_file_path"];
    }
    
    header("location:./edit_check.php");
    exit;
}

// 編集画面：初期値に該当商品情報を表示する
if(!isset($_GET["id"]) || empty($_GET["id"])){
    header("location:./index.php");
    exit;
}
$id = $_GET["id"];

// ========================= DB操作 ==========================

$link = mysqli_connect(HOST, USER, PASSWORD, DB); // 接続
mysqli_set_charset($link, "utf8");

// ＊＊＊ 該当商品情報の取得 ＊＊＊
$sql = "SELECT title, price, remarks, image, id FROM items WHERE id = " . $id . ";";
$result = mysqli_query($link, $sql);
mysqli_close($link); // 切断

// ==========================================================

$item = mysqli_fetch_assoc($result);

if(isset($item["image"]) && !empty($item["image"])){
    // ファイルパスを分割
    $path_info = pathinfo($item["image"]);
    // dirname　ファイル名を除くディレクトリパス
    // basename　ディレクトリパスを除くファイル名
    // extension　引数で指定したファイル名の拡張子だけを抽出
    // filename　引数で指定したファイル名の拡張子を除いたファイル名を取得
    $item["thumb"] = $path_info["dirname"] . "/thumb_" . $path_info["basename"];
}

require_once "./tpl/edit_form.php";
?>