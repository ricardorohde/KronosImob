<?php
/**
 * Created by Jonathan
 * Date: 14/05/2016
 * Time: 19:06
 */

session_start();

$sessionTime = 2 * 60 * 60; // 2 horas

session_set_cookie_params($sessionTime);


// esconde erros caso a constante DEVMODE (config.php) for setada para 'false'
if(!defined('DEVMODE') || DEVMODE === false) {
    error_reporting(0);
    ini_set("display_errors", 0);
}
else{
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

require_once SOURCEPATH . '/functions/globalfunctions.php';

$krimob = new KronosImob();

