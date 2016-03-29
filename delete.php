<?php

include_once __DIR__ . ('/models/New.php');

if($_GET['id'])
    $id = $_GET['id'];

$model = new News();

$model->New_delete($id);
$news = $model->News_getAll();

// Вывод в шаблон.
include('view/index.php');
