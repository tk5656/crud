<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録完了</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
<div id="wrapper" class="result entryuser-result">
    <div id="inner">
        <p class="txt">ユーザー情報の登録が完了しました。</p>
        <table>
            <tr>
                <th>ログインID</th>
                <td><?php echo $item["login_id"]; ?></td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td>****</td>
            </tr>
            <tr>
                <th>氏名</th>
                <td><?php echo $item["name"]; ?></td>
            </tr>
        </table>
        <div class="link-wrap">
            <p class="move left"><a href="./logout.php">ログイン画面へ戻る</a></p>
            <p class="move right"><a href="./index.php">商品一覧へ移動する</a></p>
        </div>
    </div>
</div>

</body>
</html>