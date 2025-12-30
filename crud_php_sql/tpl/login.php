<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div id="wrapper" class="login">
    <div id="inner">
        <p class="txt">ログイン情報を入力してください。</p>
        <form action="./login.php" method="POST">
            <label for="login-id">ユーザーID</label>
            <input id="login-id" name="login_id" type="text" placeholder="User ID">
            <label for="login-pass">パスワード</label>
            <input id="login-pass" name="password" type="password" placeholder="Password">
            <button class="btn-blue" type="submit">ログイン</button>
        </form>
        <p class="move center"><a href="./entryuser_form.php">新規会員登録</a></p>
    </div>
</div>

</body>
</html>