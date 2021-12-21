<?php
session_start();
if(isset($_SESSION['user'])){
    echo $_SESSION['user']['name'],'さん、ようこそ！','<br>';
}else{
    echo 'ゲストさん、ようこそ！';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./css/syousai.css">
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
$name = $_GET['name'];
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');

$stmt = $pdo->prepare('select * from m_items where item_code = ?');
$stmt->execute([$name]);
$records = $stmt->fetchALL(PDO::FETCH_ASSOC);
foreach($records as $row){
    $_SESSION['i_code'] = $row['item_code'];
    echo '<div class="item">';
    echo '<img src="',$row['image'],'">';
    $_SESSION['image'] = $row['image'];
    echo '</div>';
    echo '<div class="item_name">';
    echo $row['item_name'],'<br>';
    $_SESSION['item_name'] = $row['item_name'];
    echo '</div>';
    echo '<div class="detail">';
    echo $row['detail'];
    echo '</div>';
    echo '<div class="price">';
    echo '価格:',$row['price'],'円(税込み)','<br>';
    $_SESSION['price'] = $row['price'];
    echo '</div>';
}
?>
<div class="cart">
    <form action="cart.php" method="post">
        ご注文数:<input type="text" name="num">
        <button type="submit" name="action" value="send">カートに入れる</button>
        <br>※カートを使用する際はログインしてください。<br>
        <a href = "login.php">ログインページへ</a>
    </form>
</div>
</body>
</html>
