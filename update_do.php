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

    $statement = $db->prepare('UPDATE memos SET memo=? WHERE id=?');
    $statement->execute(array($_POST['memo'], $_POST['id']));
    ?>
    <br>
    <p>メモの内容を変更しました。</p>
    <br>
    <a href="index.php">戻る</a>
</body>

</html>
