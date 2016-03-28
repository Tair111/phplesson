<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Новости</title>
    <link rel="stylesheet" type="text/css" media="screen" href="view/style.css" />
</head>
<body>
<h1>PHP. Уровень 2</h1>
<br/>
<a href="index.php">Главная</a> |
<a href="new.php">Добавить статью</a> |
    <?php foreach ($news as $article): ?>
    <article>
        <h3 class="artitle">
            <a href="article.php?id=<?=$article['id']?>">
                <?=$article['title']?>
            </a>
        </h3>
        <?=$article['date_create']?></br>
        <div><?=$article['text'];?></div>
        </br>
    <?php endforeach; ?>
    </article>
</body>
</html>