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
<a href="index.php?r=news/all">Главная</a> |
<a href="index.php?r=news/new">Добавить статью</a> |
    <?php foreach ($news as $article): ?>
    <article>
        <h3 class="artitle">
            <a href="index.php?r=news/one&id=<?=$article['id']?>">
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