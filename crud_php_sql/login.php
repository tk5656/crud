<?php
require_once "../db_config.php";

if(isset($_POST["login_id"]) && isset($_POST["password"])){
    $login_id = $_POST["login_id"];

    // ========================= DB操作 ==========================

    $link = mysqli_connect(HOST, USER, PASSWORD, DB);
    mysqli_set_charset($link, "utf8");

    $sql = "SELECT login_id, password, name FROM members WHERE login_id = '" . $login_id . "';";
    $result = mysqli_query($link, $sql);

    mysqli_close($link);

    // ==========================================================

    $item = mysqli_fetch_assoc($result);

    if($item && $login_id === $item["login_id"] && password_verify($_POST["password"], $item["password"])){
        setcookie("name", $item["name"], time() + 60 * 60 * 24 * 7);  //名前表示用クッキー
        header("location:./index.php");
        exit; 
    }
}

require_once "./tpl/login.php";
?>