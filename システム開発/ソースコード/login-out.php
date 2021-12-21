<?php
session_start();
$_SESSION = array();
if(isset($_COOKIE['PHPSESSID'])){
    setcookie('PHPSESSID','',time()-1800,'/');
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ログアウト</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<h3 style="text-align:center;">ログアウトしました</h3>
<a href="index.php"><button type="submit">トップページへ</button></a>
</body>
</html>
