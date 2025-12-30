<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div id="wrapper" class="form">
    <div id="inner">
        <h1>新規登録</h1>
        <p class="txt">登録する商品の情報を入力してください。</p>
        <form action="./entry_form.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th><label for="input-title">タイトル：</label></th>
                    <td>
                        <input id="input-title" type="text" name="input_title" placeholder="商品タイトル">
                    </td>
                </tr>
                <tr>
                    <th><label for="input-price">価格：</label></th>
                    <td>
                        <input id="input-price" type="number" name="input_price" placeholder="0000"><span class="yen">円</span>
                    </td>
                </tr>
                <tr>
                    <th><label for="input-remarks">説明：</label></th>
                    <td>
                        <textarea id="input-remarks" name="input_remarks" placeholder="説明を入力してください"></textarea>
                    </td>
                </tr>
                <tr>
                    <th><label for="input-upload_file">商品画像：</label></th>
                    <td>
                        <input id="input-upload_file" type="file" name="input_upload_file"><br>
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