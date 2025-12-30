<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報の登録</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div id="wrapper" class="form entryuser">
    <div id="inner">
        <h1>ユーザー登録</h1>
        <p class="txt">ユーザー情報の登録を行います。登録する内容を入力してください。</p>
        <form action="./entryuser_form.php" method="post">
            <table>
                <tr>
                    <th><label for="input-id">ユーザーID：</label></th>
                    <td>
                        <input id="input-id" name="input_id" type="text" placeholder="ユーザーID">
                    </td>
                </tr>
                <tr>
                    <th><label for="input-password">パスワード：</label></th>
                    <td>
                        <input id="input-password" name="input_password" type="password" placeholder="パスワード">
                    </td>
                </tr>
                <tr>
                    <th><label for="input-name">氏名：</label></th>
                    <td>
                        <input id="input-name" name="input_name" type="text" placeholder="氏名">
                    </td>
                </tr>
            </table>
            <button class="btn-blue" type="submit">確認</button>
        </form>
        <p class="move left"><a href="./index.php">キャンセル</a></p>
    </div>
</div>

</body>
</html>