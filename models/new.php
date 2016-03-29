<?php
require_once __DIR__ . '/./AbstractArticle.php';

class News extends AbstractArticle
{

    public function News_getAll()
    {
        return $this->DBQuery("SELECT * FROM news");
    }

    public function News_OneArticle($id)
    {
        return $this->DBQueryOne("SELECT *  FROM news WHERE id =" . $id);
    }

    public function New_setArticle($title, $text)
    {
        $this->DBQueryExecut("INSERT INTO news (title, text) VALUE (" . $title . "," . $text .")");
    }

    public function New_editArticle($id, $title, $text)
    {
        $q = $this->DBQueryExecut("UPDATE news SET title = '$title', text = '$text' WHERE id =" .$id);
        if($q)
            return true;
        else
            return false;
    }

    public function New_delete($id)
    {
        $this->DBQueryExecut("DELETE FROM news WHERE id = " . $id);
    }
}
