<?php

include_once __DIR__ . ('/models/news.php');

if($_GET['id'])
    $id = $_GET['id'];

    News_delete($id);
    $news = News_getAll();

// Вывод в шаблон.
include('view/index.php');
