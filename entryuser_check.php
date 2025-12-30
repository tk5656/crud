<?php
session_start();

// 登録ボタンが押されたときに入力内容をDBに保存して登録完了画面へ遷移
if(!empty($_POST["entry_id"]) && !empty($_POST["entry_password"]) && !empty($_POST["entry_name"])){
    
    // 値の取得
    $entry_id = $_POST["entry_id"];
    $entry_password = password_hash($_POST["entry_password"], PASSWORD_DEFAULT);
    $entry_name = $_POST["entry_name"];

    require_once "../db_config.php";
  
    // ========================= DB操作 ==========================
    
    $link = mysqli_connect(HOST, USER, PASSWORD, DB); // 接続
    mysqli_set_charset($link, "utf8");
    
    // ＊＊＊ DB登録 ＊＊＊
    $sql = "INSERT INTO members (login_id, password, name) VALUES ('" . $entry_id . "','" . $entry_password . "','" . $entry_name . "');";
    mysqli_query($link, $sql); // 実行
    
    // ＊＊＊ 直前に実行したINSERT文のidを取得 ＊＊＊
    $id = mysqli_insert_id($link);

    mysqli_close($link); // 切断
    
    // ==========================================================
    
    $_SESSION["user_id"] = $id;
    header("location:./entryuser_result.php");
    exit;
}

// entryuser_form.phpからリダイレクト時：セッションに保存された値を取得
if(!isset($_SESSION["input_id"]) || !isset($_SESSION["input_password"]) || !isset($_SESSION["input_name"])){
    header("location:./entryuser_form.php");
    exit; 
}
$input_id = $_SESSION["input_id"];
$input_password = $_SESSION["input_password"];
$input_name = $_SESSION["input_name"];
session_destroy();

require_once "./tpl/entryuser_check.php";
?>