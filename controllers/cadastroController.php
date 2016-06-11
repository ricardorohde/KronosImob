<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 15/05/2016
 * Time: 22:27
 */
class CadastroController extends MainController
{
    public function index()
    {
        $this->titulo = " - Cadastro";

        $params = (func_num_args() >= 1) ? func_get_args() : array();

        $model = $this->loadModels('cadastro/CadastroModel');

        require SOURCEPATH . '/views/_includes/header.php';

        require SOURCEPATH . '/views/cadastro/cadastroView.php';

        require SOURCEPATH . '/views/_includes/footer.php';
    }
}