<?php
session_start();
if(isset($_SESSION['user'])){
}else{
    header('Location:http://aso2001152.mods.jp/system/login.php');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>マイページ</title>
    <link rel="stylesheet" href="./css/mypage.css">
</head>
<body>
<h1 style="text-align:center"><a href="index.php" class="title">福岡のお土産注文サイト</a></h1>
<a href="login.php"><button type="submit" class="btn" style="position: absolute; width: 130px; height: 40px; right: 300px; top: 20px">ログイン</button></a>
<a href="touroku.php"><button type="submit" class="btn2" style="position: absolute; width: 130px; height: 40px; right: 100px; top: 20px">新規登録</button></a>
<form action="search.php" method="post">
    <div class = "search">
        <input type="text" name="name">
        <button type="submit" name="action" value="send">検索</button>
    </div>
</form>
<a href="cart-in.php"><button type="submit" class="btn3" style="position: absolute;width: 130px; height: 40px; right: 300px; top: 80px">カート</button></a><br>
<a href="mypage.php"><button type="submit" class="btn3" style="position: absolute;width: 130px; height: 40px; right: 100px; top: 80px">マイページ</button></a><br>
<hr class="cp_hr01" /><br>
<h2  style="text-align:center;">マイページ</h2>
<div class=name>
    <h2><?php echo $_SESSION['user']['name'],'さん、ようこそ！','<br>';?></h2>
</div>
<div class=form-element>
    <a href="cart-in.php"><button type="submit" class="btn1-orange">カートの中</button></a>
    <a href="rireki.php"><button type="submit" class="btn2-orange">購入履歴</button></a>
</div>
<div class=form-element>
    <a href="c-update.php"><button type="submit" class="btn3-orange">会員情報更新</button></a>
    <a href="login-out.php"><button type="submit" class="btn4-orange">ログアウト</button></a>
</div>
</form>
</body>
</html>