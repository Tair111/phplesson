<?php

include_once __DIR__ . ('/models/New.php');
include_once __DIR__ . ('/Classes/View.php');

$view = new View();

if($_GET['id'])
    $id = $_GET['id'];

$model = new News();

$model->New_delete($id);
$view->news = $model->News_getAll();
$view->id = $_GET['id'];

// Вывод в шаблон.
$html = $view->display('index.php');
echo $html;
