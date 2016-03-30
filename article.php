<?php

include_once __DIR__ . ('/models/New.php');
include_once __DIR__ . ('/Classes/View.php');

$view = new View();

if($_GET['id'])
    $id = $_GET['id'];

$model = new News();
$view->article = $model->News_OneArticle($id);
$view->id = $_GET['id'];



// Вывод в шаблон.
$html = $view->display('article.php');
echo $html;

