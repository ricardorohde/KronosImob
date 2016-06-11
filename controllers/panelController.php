<?php

/**
 * Created by Jonathan
 * Date: 22/05/2016
 * Time: 20:57
 */
class PanelController extends MainController
{
    public function index()
    {
        $this->titulo = ' - painel de controle';

        $model = $this->loadModels('imoveis/imoveisModel');

        require SOURCEPATH . '/views/_includes/header.php';

        require SOURCEPATH . '/views/controlPanel/ControlPanelView.php';

        require SOURCEPATH . '/views/_includes/footer.php';
    }
    
    public function criar()
    {
        $this->titulo = ' - criar';

        $model = $this->loadModels('imoveis/imoveisModel');

        require SOURCEPATH . '/views/_includes/header.php';

        require SOURCEPATH . '/views/controlPanel/criar/CriarView.php';

        require SOURCEPATH . '/views/_includes/footer.php';
    }

    public function editar()
    {
        $this->titulo = ' - editar';

        $model = $this->loadModels('imoveis/imoveisModel');

        require SOURCEPATH . '/views/_includes/header.php';

        require SOURCEPATH . '/views/controlPanel/editar/EditarView.php';

        require SOURCEPATH . '/views/_includes/footer.php';
    }
    
    public function excluir()
    {
        $this->titulo = ' - confirmação';
        
        $model = $this->loadModels('imoveis/imoveisModel');

        require SOURCEPATH . '/views/_includes/header.php';

        require SOURCEPATH . '/views/controlPanel/excluir/ExcluirView.php';

        require SOURCEPATH . '/views/_includes/footer.php';
    }
}