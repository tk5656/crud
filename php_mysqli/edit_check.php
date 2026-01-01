<?php
session_start();

if(!isset($_COOKIE["name"])){
    header("location:./login.php");
    exit;
}

// 確認ボタンが押されたときに入力内容をDBに保存して確認画面へ遷移
if(!empty($_POST["entry_title"]) && !empty($_POST["entry_price"]) && !empty($_POST["entry_remarks"])){
    // 値の取得
    $entry_title = $_POST["entry_title"];
    $entry_price = $_POST["entry_price"];
    $entry_remarks = $_POST["entry_remarks"];
    $entry_file_path = $_POST["entry_file_path"];
    $id = $_POST["id"];
        
    require_once "../db_config.php";
    
    // ========================= DB操作 ==========================

    $link = mysqli_connect(HOST, USER, PASSWORD, DB); // 接続
    mysqli_set_charset($link, "utf8");

    // ＊＊＊ DB更新 ＊＊＊
    $sql1 = "UPDATE items SET title = '" . $entry_title . "', price = " . $entry_price . ", remarks = '" .  $entry_remarks . "' WHERE id = " . $id . ";";
    mysqli_query($link, $sql1);
    
    // ＊＊＊ 画像ファイルの更新 ＊＊＊
    if(!empty($entry_file_path)){  
        // ファイルパスを分割
        $path_info = pathinfo($entry_file_path);
        // 保存時のファイル名の指定
        $save_img_path = "./images/" . $id . "/" . $path_info["basename"];  // 元画像
        $save_thumb_path = "./images/" . $id . "/thumb_" . $path_info["basename"];  // サムネイル
        
        $sql2 = "UPDATE items SET image = '" . $save_img_path . "' WHERE id = " . $id . ";";
        mysqli_query($link, $sql2);
    }
    mysqli_close($link); // 切断

    // ==========================================================

    // ＊＊＊ imagesフォルダ内に$idフォルダを作成（この中に元の画像とサムネイルを保存）＊＊＊
    if(!empty($entry_file_path)){
        // フォルダ作成
        mkdir("./images/" . $id); 
        // 既存の画像を削除
        foreach(glob("./images/" . $id . "/*") as $file){
            unlink($file);
        }
        // 一時保存した画像を移動
        copy($entry_file_path, $save_img_path); 
        // 一時保存した画像を削除
        unlink($entry_file_path); 

        // *************************** サムネイル作成の流れ ***************************
        // ➀画像サイズを取得する
        // ➁拡張子による処理の分岐
        // ➂元画像をメモリに生成
        // ➃元の画像の比率から完成サイズを計算する（最大値：w150, h100）
        // ➄完成サイズに合わせた黒い画像ファイルを生成
        // ➅➃に➂を縮小しながらコピー
        // ⓻新しい画像のファイル名を指定
        // **************************************************************************

        // ➀
        $image_size = getimagesize($save_img_path);
        $imageW = $image_size[0];
        $imageH = $image_size[1];

        // ➁
        if($path_info["extension"] == "png"){
            // ➂
            $img_in = imagecreatefrompng($save_img_path);
            // ➃
            $thumbW = 150;
            $thumbH = 100;
            if(1.5 <= $imageW / $imageH){
                $thumbH = 150 * $imageH / $imageW;
            }
            else{
                $thumbW = 100 * $imageW / $imageH;
            }
            $img_out = imagecreatetruecolor($thumbW, $thumbH); // ➄
            // ➅
            imagecopyresampled($img_out, $img_in, 0, 0, 0, 0, $thumbW, $thumbH, $imageW, $imageH);
            // ⓻
            imagepng($img_out, $save_thumb_path);
        }
        elseif($path_info["extension"] == "jpeg" || $path_info["extension"] == "jpg"){
            $img_in = imagecreatefromjpeg($save_img_path);
            $thumbW = 150;
            $thumbH = 100;
            if(1.5 <= $imageW / $imageH){
                $thumbH = 150 * $imageH / $imageW;
            }
            else{
                $thumbW = 100 * $imageW / $imageH;
            }
            $img_out = imagecreatetruecolor($thumbW, $thumbH);
            imagecopyresampled($img_out, $img_in, 0, 0, 0, 0, $thumbW, $thumbH, $imageW, $imageH);
            imagejpeg($img_out, $save_thumb_path);
        }
        elseif($path_info["extension"] == "gif"){
            $img_in = imagecreatefromgif($save_img_path);
            $thumbW = 150;
            $thumbH = 100;
            if(1.5 <= $imageW / $imageH){
                $thumbH = 150 * $imageH / $imageW;
            }
            else{
                $thumbW = 100 * $imageW / $imageH;
            }
            $img_out = imagecreatetruecolor($thumbW, $thumbH);
            imagecopyresampled($img_out, $img_in, 0, 0, 0, 0, $thumbW, $thumbH, $imageW, $imageH);
            imagegif($img_out, $save_thumb_path);
        }
    }

    $_SESSION["id"] = $id;
    header("location:./edit_result.php");
    exit;
}

// edit_form.phpからリダイレクト時：セッションに保存された値を取得
if(!isset($_SESSION["input_title"]) || !isset($_SESSION["input_price"]) || !isset($_SESSION["input_remarks"])){
    header("location:./index.php");
    exit; 
}
$input_title = $_SESSION["input_title"];
$input_price = $_SESSION["input_price"];
$input_remarks = $_SESSION["input_remarks"];
$input_file_path = $_SESSION["input_file_path"];
if(isset($_SESSION["uploaded_file_path"])){
    $uploaded_file_path = $_SESSION["uploaded_file_path"];
}
$id = $_SESSION["id"];
session_destroy();

require_once "./tpl/edit_check.php";
?>