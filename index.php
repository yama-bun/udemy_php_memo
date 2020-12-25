<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<body>
<?php
try {
    $db = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8','root', 'root');
} catch(PDOException $e) {
    echo 'DB接続エラー： ' . $e->getMessage();
}
?>
</body>
</html>
