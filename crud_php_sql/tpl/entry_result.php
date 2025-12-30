<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録結果</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
<div id="wrapper" class="result">
    <div id="inner">
        <p class="txt">以下の情報を登録しました。</p>
        <table>
            <tr>
                <th>タイトル：</th>
                <td><?php echo $item["title"]; ?></td>
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
                <th>サムネイル：</th>
                <td>
                    <?php if(isset($item["thumb"]) && !empty($item["thumb"])){ ?>
                        <img src="<?php echo $item["thumb"]; ?>" alt="サムネイル画像">
                    <?php } else { ?>
                        サムネイル画像がありません
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th>商品画像：</th>
                <td>
                    <?php if(isset($item["image"]) && !empty($item["image"])){ ?>
                        <img src="<?php echo $item["image"]; ?>" alt="商品画像">
                    <?php } else { ?>
                        商品画像がありません
                    <?php } ?>
                </td>
            </tr>
        </table>
        <p class="move center"><a href="./index.php">商品一覧へ戻る</a></p>
    </div>
</div>

</body>
</html>