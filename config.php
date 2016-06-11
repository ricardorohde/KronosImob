<?php
/**
 * Created by Jonathan
 * Date: 14/05/2016
 * Time: 18:24
 */

/*
 * Configurações gerais
 */
define('SOURCEPATH', dirname(__FILE__));

define('IMGIMOVEIS', '/files/imgimoveis/');

define('HOMEURL', 'http://kronosimob.esy.es');

// setar false para produção e true para desenvolvimento
define('DEVMODE', true);


// Configuraçoes do banco de dados para hospedagem local
define('HOST', 'mysql.hostinger.com.br');
define('DBNAME', 'u478312941_krono');
define('DBUSER', 'u478312941_krono');
define('DBPASS', 'kronosimob');

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
require_once 'loadapp.php';