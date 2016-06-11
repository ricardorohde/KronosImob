<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 14/05/2016
 * Time: 23:50
 */
class MainController extends UserLogin
{
    // Conexão com o banco (classe PDO)
    public $db;

    public $phpass;

    public $titulo;

    // Se precisa estar logado para acessar a página
    public $needsauth = false;

    // permissões
    public $permissao;

    public $params = array();

    public function __construct($params = array())
    {
        $this->db = new KronosDb();

        $this->phpass = new PasswordHash(8, false);

        $this->params = $params;

        $this->checkUserLogin();
    }

    public function loadModels($modelName = false)
    {
        if(!$modelName)
            return;

        $modelPath = SOURCEPATH."/models/".$modelName.".php";

        if(file_exists($modelPath)){
            require_once $modelPath;

            $modelName = explode('/', $modelName);

            $modelName = end($modelName);

            $modelName = preg_replace( '/[^a-zA-Z0-9]/is', '', $modelName );

            if (class_exists($modelName)){
                return new $modelName($this->db, $this);
            }
            return;
        }
    }
}