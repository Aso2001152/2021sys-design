<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<?php
$pdo=new PDO('mysql:host=mysql154.phy.lolipop.lan;
            dbname=LAA1291133-system;charset=utf8',
    'LAA1291133',
    'system');
$sql=$pdo->prepare('select * from m_customers where mail_address=? and pass=?');
$sql->execute([$_POST['mail'],$_POST['password']]);

foreach($sql as $row){
    $_SESSION['user']=['mail'=>$row['mail_address'],'name'=>$row['name']];
    $_SESSION['c_code'] = $row['customer_code'];
}
if(isset($_SESSION['user'])){
    echo $_SESSION['user']['name'],'さん、ようこそ！','<br>';
}else{
    echo 'Email or Password err<br>';
}
$pdo = null;
?>
<form method="post" action="index.php">
    <button type="submit">トップページへ</button>
</form>
</body>