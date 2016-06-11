<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 14/05/2016
 * Time: 19:32
 */
class KronosImob
{

    /*
     * @var $controller
     * valor do controlador na url
     * kronosimob.com/controlador
     */
    private $controller;

    /*
     * @var $action
     * valor da ação na url
     * kronosimob.com/controlador/acao
     */
    private $action;

    /*
     * @var $params
     * array de parametros na url
     * kronosimob.com/controlador/acao/param1/param2
     */
    private $params;

    private $not_found = '/includes/404.php';

    public function __construct()
    {
        $this->getUrlData();

        // Se não existir controlador na url adiciona o controlador padrão
        if(! $this->controller){
            require_once SOURCEPATH . '/controllers/homeController.php';
            $this->controller = new HomeController();
            $this->controller->index();
            return;
        }

        // Se o arquivo do controlador não existir da erro 404
        if(!file_exists(SOURCEPATH.'/controllers/'.$this->controller.'.php')){
            require_once SOURCEPATH . $this->not_found;
            return;
        }

        // Adiciona controlador
        require_once SOURCEPATH.'/controllers/'.$this->controller.'.php';

        /*
         * Remove caracteres invalidos do arquivo controlador para criar o nome da classe
         * Ex. home-controller.php -> HomeController
         * Nesse caso, o padrão dos arquivos é sempre NomecontroladorController.php então não teria poblema
         */
        $this->controller = preg_replace( '/[^a-zA-Z]/i', '', $this->controller );

        // Se a classe não existir = not found
        if(!class_exists($this->controller)){
            require_once SOURCEPATH . $this->not_found;
            return;
        }

        // Instancia classe e envia os parametros
        $this->controller = new $this->controller ($this->params);

        // Se existir ação na url é executada, se não executa o método index
        if(method_exists($this->controller, $this->action)){
            $this->controller->{$this->action}($this->params);
            return;
        }
        if(!$this->action && method_exists($this->controller, 'index')){
            $this->controller->index($this->params);
            return;
        }

        require_once SOURCEPATH . $this->not_found;
        return;
    }

    public function getUrlData()
    {
        if(isset($_GET['path'])){

            // Captura valores do GET, limpa os dados e coloca em um array de parametros
            $path = $_GET['path'];
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);
            $path = explode('/', $path);

            // Define controlador
            $this->controller = checkArray($path, 0);
            $this->controller .= 'Controller';

            // Define ação
            $this->action = checkArray($path, 1);

            // Define parametros
            if(checkArray($path, 2));{
                unset($path[0]);
                unset($path[1]);

                $this->params = array_values($path);
            }
        }
    }
}