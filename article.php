<?php

include_once __DIR__ . ('/models/New.php');

if($_GET['id'])
    $id = $_GET['id'];

$model = new News();
$article = $model->News_OneArticle($id);



// Вывод в шаблон.
include('view/article.php');
