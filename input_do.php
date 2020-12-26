<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <?php
    require('dbconnect.php');

    $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
    $statement->bindParam(1, $_POST['memo']);
    $statement->execute();
    echo 'メッセージが登録されました' . PHP_EOL;

    ?>
    <br>
    <a href="input.html">続けて登録</a>
    <br>
    <a href="index.php">index.phpへ</a>
</body>
</html>
