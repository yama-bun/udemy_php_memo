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

        $memos = $db->prepare('SELECT * FROM memos WHERE id=?');
        $memos->execute(array($id));
        $memo = $memos->fetch();
    }
    ?>
    <form action="update_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <textarea name="memo" id="" cols="50" rows="10"><?php echo $memo['memo']; ?></textarea><br>
        <button type="submit">登録</button>
    </form>
    <a href="index.php">index.phpへ</a>
</body>

</html>
