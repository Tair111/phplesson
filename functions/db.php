<?php

function config(){
    return include __DIR__ . '/../config.php';
}

function DBConnect () {
    $config = config();

    global $link;
    // Настройки подключения к БД.
    $hostname = $config['hostname'];
    $username = $config['username'];
    $password = $config['password'];
    $dbname = $config['dbname'];

    // Подключение к БД.
    $link = mysqli_connect($hostname, $username, $password, $dbname) or die('No connect with data base');
    mysqli_query($link, 'SET NAMES utf8');
    header('Content-type: text/html; charset=utf-8');
}

function DBQuery($sql)
{
    DBConnect();
    global $link;
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

function DBQueryOne($sql)
{
    DBConnect();
    global  $link;
    $result = mysqli_query($link,$sql);

    if(!$result)
        die(mysqli_errno($link));

    // Извлечение из БД.
    $article = mysqli_fetch_assoc($result);
    $n = mysqli_num_rows($result);
    if($n == 0){
        $noInDb_error = "Статья не найдена!";
    }

    return $article;
}

function DBQuerySetArticle($sql)
{
    DBConnect();
    global $link;
    $result = mysqli_query($link, $sql);
    $n = mysqli_affected_rows($link);
    if($n === 1)
        return true;
    else
        return false;
}

function DBQueryEdit($sql)
{
    DBConnect();
    global $link;
    $result = mysqli_query($link, $sql);
    $n = mysqli_affected_rows($link);
    var_dump($result);
    if($n === 1)
        return true;
    else
        return false;
}

function DBQueryDelete($sql)
{
    DBConnect();
    global $link;
    $result = mysqli_query($link, $sql);
    $n = mysqli_affected_rows($link);
    if($n === 1)
        return true;
    else
        return false;
}