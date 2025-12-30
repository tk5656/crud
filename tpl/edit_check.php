<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録内容の確認</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div id="wrapper" class="check">
    <div id="inner">
        <p class="txt">以下の情報を登録します。よろしいですか？</p>
        <table>
            <tr>
                <th>タイトル：</th>
                <td><?php echo $input_title; ?></td>
            </tr>
            <tr>
                <th>価格：</th>
                <td><?php echo number_format($input_price); ?>円</td>
            </tr>
            <tr>
                <th>説明：</th>
                <td><?php echo nl2br($input_remarks); ?></td>
            </tr>
            <tr>
                <th>商品画像：</th>
                <td>
                    <?php if (isset($input_file_path) && !empty($input_file_path)) { ?>
                        <img src="<?php echo $input_file_path; ?>" alt="商品画像">
                    <?php } else if (isset($uploaded_file_path) && !empty($uploaded_file_path)){ ?>
                        <img src="<?php echo $uploaded_file_path; ?>" alt="商品画像">
                    <?php } else { ?>
                        商品画像がありません
                    <?php } ?>
                </td>
            </tr>
        </table>
        <form action="./edit_check.php" method="post">
            <input type="hidden" name="entry_title" value="<?php echo $input_title; ?>">
            <input type="hidden" name="entry_price" value="<?php echo $input_price; ?>">
            <input type="hidden" name="entry_remarks" value="<?php echo $input_remarks; ?>">
            <input type="hidden" name="entry_file_path" value="<?php echo $input_file_path; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button class="btn-blue" type="submit">登録</button>
        </form>
        <div class="link-wrap">
            <p class="move left"><a href="./edit_form.php?id=<?php echo $id; ?>">登録画面へ戻る</a></p>
            <p class="move center"><a href="./index.php">キャンセル</a></p>
        </div>
    </div>
</div>

</body>
</html>