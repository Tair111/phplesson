<?php
require_once __DIR__ . '/../functions/DBWork.php';

abstract class AbstractArticle extends DBWork
{
    abstract public function News_getAll();
    abstract public function News_OneArticle($id);
    abstract public function New_setArticle($title, $text);
    abstract public function New_editArticle($id, $title, $text);
    abstract public function New_delete($id);
}