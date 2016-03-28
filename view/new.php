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
<a>Добавить статью</a>
<hr/>
<h1>Новая статья</h1>
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
    <input type="text" name="title" value="<?=$title?>" />
    <br/>
    <br/>
    Содержание:
    <br/>
    <textarea name="text"><?=$text?></textarea>
    <br/>
    <input type="submit" name="ok" value="Добавить" />
</form>
</body>
</html>