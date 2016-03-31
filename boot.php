<?php

function __autoload($name)
{
    $arClasDir = array("Classes", "functions", "models");
    foreach($arClasDir as $folder)
    {
        $classPath = __DIR__ . "/$folder/$name.php";
         if(file_exists($classPath))
         {
             require $classPath;
             break;
         }
    }
}
