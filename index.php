<?php
/**
 * Created by Jonathan
 * Date: 14/05/2016
 * Time: 18:20
 */

// TODO adicionar campo 'usuarios->idsession' no banco do servidor
// TODO alterar lenght do campo 'usuarios->senha' para (255)
switch($_SERVER['SERVER_NAME']){
    case 'kronosimob.esy.es':
        $fileConfig = 'config.php';
        break;
    case 'kronosimob.work':
        $fileConfig = '/configs/jonathan_config.php';
        break;
    default:
        $fileConfig = null;
}

echo $fileConfig;
// chama arquivo de configuração
require_once $fileConfig;