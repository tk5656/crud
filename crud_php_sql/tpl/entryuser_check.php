<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録内容の確認</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div id="wrapper" class="check entryuser">
    <div id="inner">
        <p class="txt">以下の情報をユーザー登録します。よろしいですか？</p>
        <table>
            <tr>
                <th>ユーザーID：</th>
                <td><?php echo $input_id; ?></td>
            </tr>
            <tr>
                <th>パスワード：</th>
                <td>****</td>
            </tr>
            <tr>
                <th>氏名：</th>
                <td><?php echo $input_name; ?></td>
            </tr>
        </table>
        <form action="./entryuser_check.php" method="post">
            <input type="hidden" name="entry_id" value="<?php echo $input_id; ?>">
            <input type="hidden" name="entry_password" value="<?php echo $input_password; ?>">
            <input type="hidden" name="entry_name" value="<?php echo $input_name; ?>">
            <button class="btn-blue" type="submit">登録</button>
        </form>
        <div class="link-wrap">
            <p class="move left"><a href="./entryuser_form.php">登録画面へ戻る</a></p>
            <p class="move center"><a href="./login.php">キャンセル</a></p>
        </div>
    </div>
</div>

</body>
</html>