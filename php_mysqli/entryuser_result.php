<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];
session_destroy();

require_once "../db_config.php";

// ========================= DB操作 ==========================

$link = mysqli_connect(HOST, USER, PASSWORD, DB); // 接続
mysqli_set_charset($link, "utf8");

// ＊＊＊ 登録した値の取得 ＊＊＊
$sql = "SELECT login_id, name FROM members WHERE id = " . $user_id . ";"; // SQL文（値取得・SELECT）の作成
$result = mysqli_query($link, $sql); // 実行

mysqli_close($link); // 切断

// ==========================================================

$item = mysqli_fetch_assoc($result); // 登録した値の取得

// クッキーに登録したユーザー名を保存（名前表示用）
setcookie("name", $item["name"], time() + 60 * 60);

require_once "./tpl/entryuser_result.php";
?>