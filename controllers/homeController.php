<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 14/05/2016
 * Time: 21:40
 */
class HomeController extends MainController
{
    public function index()
    {
        $this->titulo = null;

        $this->params = (func_num_args() >= 1) ? func_get_args(0) : array();

        require SOURCEPATH . '/views/_includes/header.php';

        require SOURCEPATH . '/views/home/homeView.php';

        require SOURCEPATH . '/views/_includes/footer.php';
    }
}