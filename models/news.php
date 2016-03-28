<?php
require_once __DIR__ . '/../functions/db.php';

function News_getAll()
{
    return DBQuery("
    SELECT * FROM news
    ");
}

function News_OneArticle($id)
{
    return DBQueryOne("
    SELECT *  FROM news WHERE id = $id
    ");
}

function New_setArticle($title, $text)
{
    DBQuerySetArticle("
    INSERT INTO news (title, text) VALUE ('$title', '$text')
    ");
}

function New_editArticle($id, $title, $text)
{
    $q = DBQueryEdit("
    UPDATE news SET title = '$title', text = '$text' WHERE id = '$id'
    ");
    if($q)
        return true;
    else
        return false;
}

function News_delete($id)
{
    DBQueryDelete("
    DELETE FROM news WHERE id = $id
    ");
}