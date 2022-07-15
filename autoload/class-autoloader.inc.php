<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $path = "../models/";
    $extension = ".model.php";
    $fileName = $path . strtolower($className)  . $extension;

    if (!file_exists($fileName)) 
    {
        return false;
    }
    else
    {
        include_once $fileName;
    }

}