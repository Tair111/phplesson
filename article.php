<?php

include_once __DIR__ . ('/models/news.php');

if($_GET['id'])
    $id = $_GET['id'];

$article = News_OneArticle($id);



// Вывод в шаблон.
include('view/article.php');
