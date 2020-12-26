<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>

<body>
    <?php
    require('dbconnect.php');

    $id = $_REQUEST['id'];
    if (!is_numeric($id) || $id <= 0) {
        echo '1以上の数字で指定してください。' . PHP_EOL;
        echo '<br><a href="index.php">戻る</a>';
        exit();
    }


    $memos = $db->prepare('SELECT * FROM memos WHERE id=?');
    $memos->execute(array($id));
    $memo = $memos->fetch();
    ?>
    <article>
        <pre><?php echo $memo['memo']; ?></pre>
        <a href="update.php?id=<?php echo $memo['id']; ?>">編集する</a>
        <a href="delete.php?id=<?php echo $memo['id']; ?>">削除する</a>
        <a href="index.php">戻る</a>
    </article>
</body>

</html>
