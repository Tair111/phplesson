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
<a href="index.php?r=news/edit&id=<?=$id?>">Редактировать статью</a> |
<a href="index.php?r=news/new">Добавить статью</a> |
<a href="index.php?r=news/delete&id=<?=$id?>">Удалить статью</a>
<hr/>
<h1><?=$article['title']?></h1>
<br/>
<br/>
<div><p><?=$article['text']?></p></div>
<br/>
<hr/>

</body>
</html>