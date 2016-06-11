<?php

/**
 * Created by Jonathan
 * Date: 15/05/2016
 * Time: 14:19
 */
class LoginController extends MainController
{
    public function index()
    {
        $this->titulo = " - login";

        $this->params = (func_num_args() >= 1) ? func_get_args(0) : array();

        require SOURCEPATH . '/views/_includes/header.php';

        require SOURCEPATH . '/views/login/loginView.php';

        require SOURCEPATH . '/views/_includes/footer.php';
    }

    public function logoff()
    {
        $_SESSION['userdata'] = array();

        session_regenerate_id();

        echo '<meta http-equiv="Refresh" content="0; url=' . HOMEURL . '">';
        echo '<script type="text/javascript">window.location.href = "' . HOMEURL . '";</script>';
    }
}