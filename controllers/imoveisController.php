<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 22/05/2016
 * Time: 11:37
 */
class ImoveisController extends MainController
{
    public function index()
    {
        $this->titulo = ' - imóveis';

        $model = $this->loadModels('imoveis/imoveisModel');

        require SOURCEPATH . '/views/_includes/header.php';

        require SOURCEPATH . '/views/imoveis/ImoveisView.php';

        require SOURCEPATH . '/views/_includes/footer.php';
    }
    
    public function view()
    {
        $this->titulo = ' - imóvel';

        $model = $this->loadModels('imoveis/imoveisModel');

        require SOURCEPATH . '/views/_includes/header.php';

        require SOURCEPATH . '/views/imoveis/imovel/ImovelView.php';

        require SOURCEPATH . '/views/_includes/footer.php';
    }
}