<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 14/05/2016
 * Time: 19:15
 */

// verifica arrays
function checkArray($array, $key)
{
    if(isset($array[$key]) && ! empty($array[$key])){
        return $array[$key];
    }
}

// Funcao para carregar todas as classes principais
function __autoload($class)
{
    $file = SOURCEPATH.'/classes/'.$class.'.class.php';

    if(!file_exists($file)){
        echo "Erro 404: fpágina não encontrada";
        require_once SOURCEPATH.'/includes/404.php';
        return;
    }
    require_once $file;
}