<?php
session_start();
if(isset($_SESSION['user'])){
}else{
    header('Location:http://aso2001152.mods.jp/system/login.php');
}
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
<hr class="cp_hr01" /><br>
<?php
$c_code = $_SESSION['c_code'];
$num = 0;
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');
$sql=$pdo->prepare('SELECT * FROM d_cart WHERE customer_code=?');
$sql->execute([$c_code]);
$records = $sql->fetchALL(PDO::FETCH_ASSOC);
$items = [];
foreach($records as $row){

    $items[count($items)] = $row;
    $items[count($items)-1] = array_merge($items[count($items)-1],["customer_code"=>$c_code]);

    echo '<div class="item">';
    echo '<img src="',$row['image'],'">';
    echo '</div>';
    echo '<div class="item_name">';
    echo $row['item_name'],'<br>';
    echo $row['price'],'円(税込み)','<br>';
    echo '</div>';
    echo '<div class="num">';
    echo '<form action="henko.php" method="post">';
    echo '数量:<input type="text" name="num" value="',$row['num'],'">';
    echo '<button type="submit">変更</button>';
    echo '</form>';
    echo '</div>';
    $num = $num + $row['price'] * $row['num'];
    echo '<form action="sakuzyo.php">';
    echo '<button type="submit">削除</button>';
    echo '</form>';
}
$_SESSION['items'] = $items;
echo '合計:',$num,'円';
$_SESSION['total'] = $num;
$pdo = null;
?>
<form action = "kakunin.php">
    <button type="submit" class="btn1-orange">購入</button>
</form>
</body>
</html>
