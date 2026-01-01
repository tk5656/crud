<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品情報の編集</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div id="wrapper" class="form">
    <div id="inner">
        <h1>商品情報の編集</h1>
        <p class="txt">商品情報を入力してください。</p>
        <form action="./edit_form.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th><label for="input-title">タイトル：</label></th>
                    <td>
                        <input id="input-title" type="text" name="input_title" value="<?php echo $item["title"]; ?>">
                    </td>
                </tr>
                <tr>
                    <th><label for="input-price">価格：</label></th>
                    <td>
                        <input id="input-price" type="number" name="input_price" value="<?php echo $item["price"]; ?>"><span class="yen">円</span>
                    </td>
                </tr>
                <tr>
                    <th><label for="input-remarks">説明：</label></th>
                    <td>
                        <textarea id="input-remarks" name="input_remarks"><?php echo $item["remarks"]; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th><label for="input-upload_file">商品画像：</label></th>
                    <td>
                        <?php if(isset($item["image"]) && !empty($item["image"])) { ?>
                            <img src="<?php echo $item["thumb"]; ?>" alt="<?php echo $item["title"]; ?>のサムネイル画像">
                        <?php } ?>
                        <input id="input-upload_file" type="file" name="input_upload_file"><br>
                    </td>
                </tr>
            </table>

            <input type="hidden" name="uploaded_file_path" value="<?php echo $item["image"]; ?>">
            <input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
            <button class="btn-blue" type="submit">確認</button>
        </form>
        <p class="move left"><a href="./index.php">キャンセル</a></p>
    </div>
</div>

</body>
</html>