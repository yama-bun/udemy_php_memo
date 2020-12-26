<?php require('dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $memos = $db->prepare('DELETE FROM memos WHERE id=?');
        $memos->execute(array($id));
    }
    ?>
    <p>メモを削除しました。</p>
    <a href="index.php">index.phpへ</a>
</body>

</html>
