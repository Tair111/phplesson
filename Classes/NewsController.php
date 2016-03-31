<?php

include_once __DIR__ . '/AController.php';

class NewsController
    extends AController
{

    public function actionAll()
    {
        $view = new View();
        $model = new News();
        $view->news = $model->News_getAll();

        // Вывод в шаблон.
        $html = $view->display('index.php');
        echo $html;
    }

    public function actionOne()
    {
        $view = new View();

        if($_GET['id'])
            $id = $_GET['id'];

        $model = new News();
        $view->article = $model->News_OneArticle($id);
        $view->id = $_GET['id'];



    // Вывод в шаблон.
        $html = $view->display('article.php');
        echo $html;
    }

    public function actionDelete()
    {
        $view = new View();

        if($_GET['id'])
            $id = $_GET['id'];

        $model = new News();

        $model->New_delete($id);
        $view->news = $model->News_getAll();
        $view->id = $_GET['id'];

        // Вывод в шаблон.
        $html = $view->display('index.php');
        echo $html;
    }

    public function actionNew()
    {
        $model = new News();

// Проверка заполнены ли поля title и content при нажатии "Добавить".
        if(isset($_POST['ok']) and ($_POST['title'] == "" or $_POST['text'] == "")){
            $new_error = true;
        }
        else{
            if(isset($_POST['ok']) and isset($_POST['title']) and isset($_POST['text'])){
                $title = $_POST['title'];
                $text = $_POST['text'];
                $model->New_setArticle($title, $text);
                $msgOk = "Статья добавлена.";
                //header('Location: New.php');
            }
        }

// Определение переменных для отображения в форме, чтобы сохранялись
// и не пришлось набирать весь текст снова после ошибки.
        if(isset($_POST['title']))
            $title = $_POST['title'];
        else $title = '';

        if(isset($_POST['text']))
            $text = $_POST['text'];
        else $content = '';

// Вывод в шаблон.
        include('view/new.php');
    }

    public function actionEdit()
    {
        $view = new View();
        $model = new News();

        if(isset($_GET['id']))
            $id = $_GET['id'];

// Проверка заполнены ли поля title и content при нажатии "Сохранить".
        if(isset($_POST['ok']) and ($_POST['title'] == "" or isset($_POST['ok']) and $_POST['text'] == "")){
            $view->new_error = true;
        }
        else{
            if(isset($_POST['ok']) and isset($_POST['title']) and isset($_POST['text'])){
                $id = $_POST['id'];

                $title = $_POST['title'];
                $text = $_POST['text'];
                $upd = $model->New_editArticle($id, $title, $text);
                if($upd)
                    $view->msgOk = "Изменения сохранены.";
                else
                    $view->msgOk = "Что то пошло не так!";
            }
        }
// Извлечение статьи.
        $view->article = $model->News_OneArticle($id);

// Вывод в шаблон.
        $html = $view->display('edit.php');
        echo $html;
    }
}
