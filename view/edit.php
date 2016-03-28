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
<a href="delete.php?id=<?=$id?>">Удалить статью</a>
<hr/>
<h1>Редактирование статьи</h1>
<? if (isset($msgOk)){?>
    <b style="color: green;">
        <?="$msgOk<br/><br/>"?></b>
<? }else{ ?>
    <? 	if($new_error) {?>
        <b style="color: red;">Заполните все поля!</b><br/><br/>
    <? 	}}?>
    <form method="post">
        Название:
        <br/>
        <input type="text" name="title" value="<?=$article['title']?>" />
        <br/>
        <br/>
        Содержание:
        <br/>
        <textarea name="text"><?=$article['text']?></textarea>
        <br/>
        <input type="submit" name="ok" value="Сохранить" />
        <input type="hidden" name="id" value="<?=$article['id']?>" />
    </form>

<hr/>
</body>
</html>