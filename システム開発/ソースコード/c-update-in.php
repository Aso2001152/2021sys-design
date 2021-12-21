<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>会員情報編集</title>
    <link rel="stylesheet" href="./css/touroku.css">
</head>
<body>
<?php
$c_code = $_SESSION['c_code'];
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');
$stmt = $pdo->prepare('UPDATE m_customers SET pass=?,name=?,address=?,mail_address=?,credit=? WHERE customer_code=?');
$stmt->execute([$_POST['pass'],$_POST['name'],$_POST['address'],$_POST['mail_address'],$_POST['credit'],$c_code]);

$_SESSION['user']['name'] = $_POST['name'];
?>
<p>更新完了しました</p>
<a href="mypage.php"><button type="submit" class="btn-orange">マイページに戻る</button></a>
</body>
</html>
