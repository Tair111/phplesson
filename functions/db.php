<?php

function config(){
    return include __DIR__ . '/../config.php';
}

function DBConnect () {
 //   $config = config();

    global $link;
    // Настройки подключения к БД.
    /*
    $hostname = $config['db']['hostname'];
    $username = $config['db']['username'];
    $password = $config['db']['password'];
    $dbname = $config['db']['dbname'];
    */

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'php22';


    // Языковая настройка.
    setlocale(LC_ALL, 'ru_RU.UTF-8'); // Устанавливаем нужную локаль (для дат, денег, запятых и пр.)
    mb_internal_encoding('UTF-8'); // Устанавливаем кодировку строк

    // Подключение к БД.
    $link = mysqli_connect($hostname, $username, $password, $dbname) or die('No connect with data base');
    mysqli_query($link, 'SET NAMES utf8');

}

function DBQuery($sql)
{
    DBConnect();
    global $link;
    // Запрос.
   // $query = "SELECT art_id, art_title, art_content, art_add_date, art_author, pers_surname, pers_name FROM articles, persons WHERE pers_id = art_author AND art_state = 'A' ORDER BY art_add_date DESC";
    $result = mysqli_query($link, $sql);
    // mysqli_close($link);

    if (!$result)
        die(mysqli_error($link));

    // Извлечение из БД.
    $n = mysqli_num_rows($result);
    $articles = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;
}