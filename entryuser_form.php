<?php
session_start();

// 確認ボタンが押されたときに入力内容をセッションに保存して確認画面へ遷移
if(!empty($_POST["input_id"]) && !empty($_POST["input_password"]) && !empty($_POST["input_name"])){
    $_SESSION["input_id"] = $_POST["input_id"];
    $_SESSION["input_password"] = $_POST["input_password"];
    $_SESSION["input_name"] = $_POST["input_name"];
    header("location:./entryuser_check.php");
    exit;
}

require_once "./tpl/entryuser_form.php";
?>