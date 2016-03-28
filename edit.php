<?php

include_once __DIR__ . ('/models/news.php');

// Приведение переданного через адресную строку параметра id
// к положительному целому числу.
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

//
//
if(!isset($_POST['ok'])){
    $article = News_OneArticle($id);
}


// Проверка заполнены ли поля title и content при нажатии "Сохранить".
if(isset($_POST['ok']) and ($_POST['title'] == "" or $_POST['text'] == "")){
    $new_error = true;
}
else{
    if(isset($_POST['ok']) and isset($_POST['title']) and isset($_POST['text'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];
        $upd = New_editArticle($id, $title, $text);
        if($upd)
            $msgOk = "Изменения сохранены.";
        else
            $msgOk = "Что то пошло не так!";
    }
}
// Извлечение статьи.
$article = News_OneArticle($id);

// Кодировка.
header('Content-type: text/html; charset=utf-8');

// Вывод в шаблон.
include('view/edit.php');
