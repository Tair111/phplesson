<?php

abstract class AbstractArticle
{
    abstract public function News_getAll();
    abstract public function News_OneArticle($id);
    abstract public function New_setArticle($title, $text);
    abstract public function New_editArticle($id, $title, $text);
    abstract public function New_delete($id);
}