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
    <title>購入履歴</title>
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
<h2  style="text-align:center;">購入履歴</h2>
<?php
$c_code = $_SESSION['c_code'];
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');
$sql = $pdo->prepare('select * from d_purchase where customer_code = ?');
$sql ->execute([$c_code]);
foreach($sql as $row) {
    echo '<div class = "item">';
    echo '商品名:',$row['item_name'],'</br>';
    echo '値段:',$row['price'],'</br>';
    echo '数量:',$row['num'],'</br>';
    echo '購入日',$row['purchase_date'],'<br>';
    echo '総額',$row['price']*$row['num'],'円<br>';
    echo '</div>';

}

$pdo = null;
?>
</body>
</html>