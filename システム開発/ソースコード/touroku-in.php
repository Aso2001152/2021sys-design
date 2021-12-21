<?php
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');

$sql=$pdo->prepare('INSERT INTO m_customers(pass,name,address,mail_address,credit) VALUES(?,?,?,?,?)');
$sql->execute([$_POST['pass'],$_POST['name'],$_POST['address'],$_POST['mail_address'],$_POST['credit']]);
$pdo = null;
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>register</title>
    <link rel="stylesheet" href="./css/touroku.css">
</head>
<body>
<div class="message">
    <h1>登録完了です！<br>
        引き続きお買い物を<br>お楽しみください</br></h1>
</div>
<div class="wrap">
    <form action="login.php">
        <button type="submit" class="btn-orange">ログインページへ</button><br>
    </form>
</div>
</body>
</html>