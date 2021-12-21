<?php
session_start();
if(isset($_SESSION['user'])){
}else{
    header('Location:http://aso2001152.mods.jp/system/login.php');
}
$items = $_SESSION['items'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>購入</title>
    <link rel="stylesheet" href="./css/cart.css">
</head>
<body>
<p>購入完了しました</p>
<?php
$c_code = $_SESSION['c_code'];
$total = $_SESSION['total'];
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');

foreach ($items as $item){

    $i_code = $item['item_code'];
    $i_name = $item['item_name'];
    $price = $item['price'];
    $num = $item['num'];

    $sql=$pdo->prepare('INSERT INTO d_purchase(customer_code,item_code,item_name,price,num,total_price) VALUES(?,?,?,?,?,?)');
    $sql->execute([$c_code,$i_code,$i_name,$price,$num,$total]);
}

$sql=$pdo->prepare('DELETE FROM d_cart WHERE customer_code=?');
$sql->execute([$c_code]);
$pdo = null;
?>
<form action = "mypage.php">
    <button type="submit" class="btn1-orange">マイページへ</button>
</form>
</body>
</html>