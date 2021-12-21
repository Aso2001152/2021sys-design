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
    <div class = "search">
        <input type="text" name="name">
        <button type="submit" name="action" value="send">検索</button>
    </div>
</form>
<a href="cart-in.php"><button type="submit" class="btn3" style="position: absolute;width: 130px; height: 40px; right: 300px; top: 80px">カート</button></a><br>
<a href="mypage.php"><button type="submit" class="btn3" style="position: absolute;width: 130px; height: 40px; right: 100px; top: 80px">マイページ</button></a><br>
<hr class="cp_hr01" /><br>
<?php
$c_code = $_SESSION['c_code'];
$i_code = $_SESSION['i_code'];
$name = $_SESSION['item_name'];
$image = $_SESSION['image'];
$price = $_SESSION['price'];
$num = $_POST['num'];
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');
$sql=$pdo->prepare('INSERT INTO d_cart(customer_code,item_code,item_name,image,price,num) VALUES(?,?,?,?,?,?)');
$sql->execute([$c_code,$i_code,$name,$image,$price,$num]);
$pdo = null;
?>
<p>商品をカートに追加しました</p>
<form action = "cart-in.php">
    <button type="submit" class="btn1-orange">カートへ</button>
</form>
</body>
</html>

