<?php
/**
 * Created by Jonathan
 * Date: 10/06/2016
 * Time: 19:11
 */

/*
 * Configurações gerais
 */
define('SOURCEPATH', dirname(dirname(__FILE__)));

define('IMGIMOVEIS', dirname(dirname(__FILE__)) . '/files/imgimoveis');
//echo IMGIMOVEIS;

define('HOMEURL', $_SERVER['SERVER_NAME']);

// setar false para produção e true para desenvolvimento
define('DEVMODE', true);


// Configuraçoes do banco de dados para hospedagem local
define('HOST', 'localhost');
define('DBNAME', 'kronosimob');
define('DBUSER', 'root');
define('DBPASS', '');

//Configuraçoes do banco de dados para hospedagem no servidor
/*
define('HOST', 'localhost');
define('DBNAME', 'kronosimob');
define('DBUSER', 'kronosimob');
define('DBPASS', 'kronosimob');
*/


/*
 * Chama arquivo loadapp (arquivo para carregar a aplicação)
 */
require_once '/../loadapp.php';