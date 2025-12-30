<?php
session_start();

if(!isset($_COOKIE["name"])){
    header("location:./login.php");
    exit; 
}

// 確認ボタンが押されたときに入力内容をセッションに保存して確認画面へ遷移
if(!empty($_POST["input_title"]) && !empty($_POST["input_price"]) && !empty($_POST["input_remarks"])){
    $_SESSION["input_title"] = $_POST["input_title"];
    $_SESSION["input_price"] = $_POST["input_price"];
    $_SESSION["input_remarks"] = $_POST["input_remarks"];

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
    }

    header("location:./entry_check.php");
    exit;
}

require_once "./tpl/entry_form.php";
?>