<?php

include_once __DIR__ . ('/models/New.php');

$model = new News();

// Проверка заполнены ли поля title и content при нажатии "Добавить".
if(isset($_POST['ok']) and ($_POST['title'] == "" or $_POST['text'] == "")){
    $new_error = true;
}
else{
    if(isset($_POST['ok']) and isset($_POST['title']) and isset($_POST['text'])){
        $title = mysqli_real_escape_string($link, $_POST['title']);
        $text = mysqli_real_escape_string($link, $_POST['text']);
        $model->New_setArticle($title, $text);
        $msgOk = "Статья добавлена.";
        //header('Location: New.php');
    }
}

// Определение переменных для отображения в форме, чтобы сохранялись
// и не пришлось набирать весь текст снова после ошибки.
if(isset($_POST['title']))
    $title = mysqli_real_escape_string($link, $_POST['title']);
else $title = '';

if(isset($_POST['text']))
    $text = mysqli_real_escape_string($link, $_POST['text']);
else $content = '';

// Вывод в шаблон.
include('view/new.php');
