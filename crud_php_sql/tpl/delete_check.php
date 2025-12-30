<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除内容の確認</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div id="wrapper" class="check">
    <div id="inner">
        <p>以下の情報を削除します。よろしいですか？</p>
        <table>
            <tr>
                <th>タイトル：</th>
                <td><?php echo $item["title"]; ?></td>
            </tr>
            <tr>
                <th>商品画像：</th>
                <td>
                    <?php if(isset($item["image"]) && !empty($item["image"])){ ?>
                        <img src="<?php echo $item["image"]; ?>" alt="<?php echo $item["title"]; ?>の商品画像">
                    <?php } else { ?>
                        商品画像がありません
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th>価格：</th>
                <td><?php echo number_format($item["price"]); ?>円</td>
            </tr>
            <tr>
                <th>説明：</th>
                <td><?php echo nl2br($item["remarks"]); ?></td>
            </tr>
            <tr>
                <th>登録日時：</th>
                <td><?php echo date("Y年m月d日 H時i分s秒", strtotime($item["created_at"])); ?></td>
            </tr>
            <tr>
                <th>更新日時：</th>
                <td><?php echo date("Y年m月d日 H時i分s秒", strtotime($item["updated_at"])); ?></td>
            </tr>

        </table>
        <form action="./delete_check.php" method="get">
            <input type="hidden" name="delete_id" value="<?php echo $item["id"]; ?>">
            <button class="btn-blue" type="submit">削除</button>
        </form>
        <p class="move left"><a href="./index.php">キャンセル</a></p>
    </div>
</div>

</body>
</html>