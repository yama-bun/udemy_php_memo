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

    if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
    } else {
        $page = 1;
    }

    $page = $_REQUEST['page'];
    $start = 5 * ($page - 1);

    $memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?, 5');
    $memos->bindParam(1, $start, PDO::PARAM_INT);
    $memos->execute();
    ?>
    <article>
        <?php while ($memo = $memos->fetch()): ?>
            <p><a href="memo.php?id=<?php echo $memo['id']; ?>"><?php echo mb_substr($memo['memo'], 0, 50); ?></a></p>
            <time><?php echo $memo['created_at']; ?></time>
            <hr>
        <?php endwhile; ?>

        <?php if ($page >= 2) : ?>
            <a href="index.php?page=<?php echo $page-1; ?>"><?php echo $page-1; ?>ページ目へ</a>
        <?php endif; ?>
        |
        <?php
            $counts = $db->query('SELECT COUNT(*)as cnt FROM memos');
            $count = $counts->fetch();
            $max_page = ceil($count['cnt'] / 5);
            if ($page < $max_page):
        ?>
            <a href="index.php?page=<?php echo $page+1; ?>"><?php echo $page+1; ?>ページ目へ</a>
        <?php endif; ?>
    </article>
    <a href="input.html">input.htmlへ</a>
</body>

</html>
