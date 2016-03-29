<?php

include_once __DIR__ . ('/models/New.php');

// Приведение переданного через адресную строку параметра id
// к положительному целому числу.

$model = new News();

if(isset($_GET['id']))
    $id = $_GET['id'];

// Проверка заполнены ли поля title и content при нажатии "Сохранить".
if(isset($_POST['ok']) and ($_POST['title'] == "" or isset($_POST['ok']) and $_POST['text'] == "")){
    $new_error = true;
}
else{
    if(isset($_POST['ok']) and isset($_POST['title']) and isset($_POST['text'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];
        $upd = $model->New_editArticle($id, $title, $text);
        if($upd)
            $msgOk = "Изменения сохранены.";
        else
            $msgOk = "Что то пошло не так!";
    }
}
// Извлечение статьи.
$article = $model->News_OneArticle($id);

// Кодировка.
header('Content-type: text/html; charset=utf-8');

// Вывод в шаблон.
include('view/edit.php');
