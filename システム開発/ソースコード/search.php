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
    <link rel="stylesheet" href="./css/search.css">
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
$name = $_POST['name'];
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');
if ($name != "") {

    $stmt = $pdo->prepare("SELECT * FROM m_items WHERE item_name LIKE ?");
    $stmt->execute(['%' . $name . '%']);

    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $count = $stmt ->rowCount();

    if($count >=1){
        echo '<p>',$count,'個の商品が見つかりました','</p>';
        echo '<div id="container">';
        foreach ($records as $row) {
            echo '<div class = item>';
            echo '<a href="syouhinsyousai.php?name=',$row['item_code'],'">';
            echo '<p>';
            echo '<img src="', $row['image'], '">';
            echo '</p>';
            echo $row['item_name'], '<br>';
            echo $row['price'], '円(税込み)';
            echo '</div>';
        }
        echo '</div>';
    }else{
        echo '<p>','商品が見つかりませんでした','</p>';
    }
}
?>
</body>
</html>