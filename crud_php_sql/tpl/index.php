<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div id="wrapper" class="index">
    <div id="inner">
        <div class="welcome-wrap">
            <p>ようこそ、<?php echo $name; ?>さん</p>
            <p><a href="./logout.php">ログアウト</a></p>
        </div>
        <h1>商品一覧</h1>
        <p class="new-item"><a class="btn btn-blue" href="./entry_form.php">新規登録</a></p>
        <table>
            <tr>
                <th colspan="2">タイトル</th>
                <th>価格</th>
                <th>編集・削除</th>
            </tr>
            <?php foreach($items as $item){ ?>
                <tr>
                    <td><a href="./detail.php?id=<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></a></td>
                    <td><img src="<?php echo $thumb_info[$item["id"]]["src"]; ?>" alt="<?php echo $thumb_info[$item["id"]]["alt"]; ?>"></td>
                    <td><?php echo number_format($item["price"]); ?><span class="yen">円</span></td>
                    <td>
                        <a class="btn btn-gray" href="./edit_form.php?id=<?php echo $item["id"]; ?>">編集</a>
                        <a class="btn btn-gray" href="./delete_check.php?id=<?php echo $item["id"]; ?>">削除</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>