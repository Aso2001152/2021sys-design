<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="./css/touroku.css">
</head>
<body>
<h1>新規登録画面</h1>
<hr class="cp_hr01" /><br>
<form action="touroku-in.php" method="post">
    <h3>名前(入力必須)</h3>
    <input type="text" name="name" class="size" required>
    <h3>パスワード(入力必須)</h3>
    <input type="password" name="pass" class="yohaku2" required><br>
    <h3>メールアドレス(入力必須)</h3>
    <input type="email" name="mail_address" class="yohaku" required><br>
    <h3>住所(入力必須)</h3>
    <input type="text" name="address" required><br>
    <h3>クレジット番号(入力必須)</h3>
    <input type="text" name="credit" maxlength="16" required><br>
    <hr class="cp_hr01" /><br>
    <div class="wrap">
        <a href="touroku-in.php"><button type="submit" class="btn-orange">入力完了！</button></a><br>
    </div>
</form>
<a href="index.php"><button type="submit">トップページに戻る</button></a>
</body>
</html>