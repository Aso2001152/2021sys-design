<?php
session_start();
if(isset($_SESSION['user'])){
    echo $_SESSION['user']['name'],'さん、ようこそ！','<br>';
}else{
    header('Location:http://aso2001152.mods.jp/system/login.php');
}
$items = $_SESSION['items'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./css/cart.css">
</head>
<body>
<h1 style="text-align:center"><a href="index.php" class="title">福岡のお土産注文サイト</a></h1>
<a href="login.php"><button type="submit" class="btn" style="position: absolute; width: 130px; height: 40px; right: 300px; top: 20px">ログイン</button></a>
<a href="touroku.php"><button type="submit" class="btn2" style="position: absolute; width: 130px; height: 40px; right: 100px; top: 20px">新規登録</button></a>
<form action="search.php" method="post">
    <div class = "kensaku">
        <input type="text" name="name">
        <button type="submit" name="action" value="send">検索</button>
    </div>
</form>
<a href="cart-in.php"><button type="submit" class="btn3" style="position: absolute;width: 130px; height: 40px; right: 300px; top: 80px">カート</button></a><br>
<a href="mypage.php"><button type="submit" class="btn3" style="position: absolute;width: 130px; height: 40px; right: 100px; top: 80px">マイページ</button></a><br>
<?php
$c_code = $_SESSION['c_code'];
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');
foreach ($items as $item){
    $i_code = $item['item_code'];
}
$sql=$pdo->prepare('DELETE FROM d_cart WHERE customer_code=? && item_code=?');
$sql->execute([$c_code,$i_code]);
$pdo = null;
?>
<form action = "cart-in.php">
    <p>削除が完了しました</p>
    <button type="submit" class="btn1-orange">カートへ</button>
</form>
</body>
</html>
