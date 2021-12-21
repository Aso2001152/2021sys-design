<?php
session_start();
if(isset($_SESSION['user'])){
}else{
    header('Location:http://aso2001152.mods.jp/system/login.php');
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>会員情報編集</title>
    <link rel="stylesheet" href="./css/touroku.css">
</head>
<body>
<h1>情報編集</h1>
<?php
$c_code = $_SESSION['c_code'];
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');

$stmt = $pdo->prepare('select * from m_customers where customer_code = ?');
$stmt->execute([$c_code]);
$records = $stmt->fetchALL(PDO::FETCH_ASSOC);
foreach($records as $row){
    $name = $row['name'];
    $pass = $row['pass'];
    $mail_address = $row['mail_address'];
    $address = $row['address'];
    $credit = $row['credit'];
}
?>
<hr class="cp_hr01" /><br>
<form action="c-update-in.php" method="post">
    <h3>名前(入力必須)</h3>
    <?php
    echo '<input type="text" name="name" class="size"  required value = ',$name,'>';
    ?>
    <h3>パスワード(入力必須)</h3>
    <?php
    echo '<input type="password" name="pass" class="yohaku2" required value =',$pass,'><br>';
    ?>
    <h3>メールアドレス(入力必須)</h3>
    <?php
    echo '<input type="email" name="mail_address" class="yohaku" required value = ',$mail_address,'><br>';
    ?>
    <h3>住所(入力必須)</h3>
    <?php
    echo '<input type="text" name="address" required value =',$address,'><br>';
    ?>
    <h3>クレジット番号(入力必須)</h3>
    <?php
    echo '<input type="text" name="credit"  required value = ',$credit,'><br>';
    ?>
    <hr class="cp_hr01" /><br>
    <div class="wrap">
        <button type="submit" class="btn-orange">入力完了！</button><br>
    </div>
</form>
<a href="mypage.php"><button type="submit" class="btn-orange">マイページに戻る</button></a>
</body>
</html>