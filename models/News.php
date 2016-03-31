<?php
require_once __DIR__ . '/AbstractArticle.php';
require_once __DIR__ . '/../functions/DBWork.php';

class News extends AbstractArticle
{
    private $db;

    public function __construct()
    {
        $this->db = new DBWork();
    }

    public function News_getAll()
    {
        return $this->db->DBQuery("SELECT * FROM news");
    }

    public function News_OneArticle($id)
    {
        return $this->db->DBQueryOne("SELECT *  FROM news WHERE id =" . $id);
    }

    public function New_setArticle($title, $text)
    {
        $this->db->DBQueryExecut("INSERT INTO news (title, text) VALUE ('$title', '$text')");
    }

    public function New_editArticle($id, $title, $text)
    {
        $q = $this->db->DBQueryExecut("UPDATE news SET title = '$title', text = '$text' WHERE id =" .$id);
        if($q)
            return true;
        else
            return false;
    }

    public function New_delete($id)
    {
        $this->db->DBQueryExecut("DELETE FROM news WHERE id = " . $id);
    }
}
