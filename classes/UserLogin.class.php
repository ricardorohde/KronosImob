<?php

/**
 * Created by Jonathan
 * Date: 15/05/2016
 * Time: 00:21
 */
class UserLogin
{
    public $isLoggedIn;

    public $userdata;

    public $login_error;

    public $db;

    public function checkUserLogin()
    {
        if (isset($_SESSION['userdata'])
            && !empty($_SESSION['userdata'])
            && is_array($_SESSION['userdata'])
            && !isset($_POST['userdata'])
        ){
            $userdata = $_SESSION['userdata'];
            $userdata['post'] = false;
        }

        if (isset( $_POST['userdata'])
            && ! empty( $_POST['userdata'] )
            && is_array( $_POST['userdata'] )
        ) {
            $userdata = $_POST['userdata'];
            $userdata['post'] = true;
        }

        if (! isset($userdata) || ! is_array($userdata)){
            $this->logout();
            return;
        }

        if ( $userdata['post'] === true ) {
            $post = true;
        } else {
            $post = false;
        }

        unset($userdata['post']);

        if (empty($userdata)){
            $this->isLoggedIn = false;
            $this->login_error = null;
            // print_r($_SESSION); die();

            $this->logout();

            return;
        }

        extract($userdata);

        if ((!isset($email) || ! isset($senha)) && (!isset($userdata['email']) || !isset($userdata['senha']))){
            $this->isLoggedIn = false;
            $this->login_error = null;

            $this->logout();
            return;
        }

        $query = $this->db->query(
            'SELECT *
               FROM usuarios
                  , pessoas
              WHERE email = ?
                AND pessoas.idpessoa = usuarios.idpessoa
              LIMIT 1',
            array($email)
        );

        if (! $query){
            $this->isLoggedIn = false;
            $this->login_error = 'Internal Error';

            $this->logout();
            return;
        }

        $fetch = $query->fetch(PDO::FETCH_ASSOC);

        $user_id = (int) $fetch['idusuario'];

        if (empty($user_id)){
            $this->isLoggedIn = false;
            $this->login_error = "Usuário inexistente";

            $this->logout();
            return;
        }

        if ($senha == $fetch['senha'] && $email == $fetch['email']){
            if (session_id() != $fetch['idsession'] && ! $post){
                $this->isLoggedIn = false;
                $this->login_error = "Session id error: wrong session id";
                // print_r($_SESSION);die();
                $this->logout();
                return;
            }
            if ($post){
                session_regenerate_id();
                $session_id = session_id();

                $_SESSION['userdata'] = $fetch;
                $_SESSION['userdata']['senha'] = $senha;
                $_SESSION['userdata']['idsession'] = $session_id;
                // print_r($_SESSION); die();

                $query = $this->db->query(
                    'UPDATE usuarios
                        SET idsession = ?
                      WHERE idusuario = ?',
                    array($session_id, $user_id)
                );
            }

            // TODO: pegar permissoes de usuario aqui

            $this->isLoggedIn = true;

            // Traz os dados do usuario para o array $this->userdata
            $this->userdata = $_SESSION['userdata'];


            if (isset($_SESSION['goto_url'])){
                $goto_url = urlencode($_SESSION['goto_url']);

                unset($_SESSION['goto_url']);

                echo '<meta http-equiv="Refresh" content="0; url=' . HOMEURL . '">';
                echo '<script type="text/javascript">window.location.href = "' . HOMEURL . '";</script>';
            }
            /*$this->go_to(HOMEURL.'/home/');*/


            return;
        } else {
            $this->isLoggedIn = false;
            $this->login_error = "Senha incorreta";
            $this->logout();
            return;
        }
    }

    protected function logout($redirect = false)
    {
        $_SESSION['userdata'] = array();

        session_regenerate_id();

        if ($redirect === true){
            $this->goto_login();
        }
    }

    protected function goto_login()
    {
        if (defined('HOMEURL')){
            $login_uri = HOMEURL.'/login/';

            $_SESSION['goto_url'] = urlencode($_SERVER['REQUEST_URI']);

            echo '<meta http-equiv="Refresh" content="0; url=' . $login_uri . '">';
            echo '<script type="text/javascript">window.location.href = "' . $login_uri . '";</script>';
        }
    }

    final protected function go_to($page_uri)
    {
        /*if(isset($_GET['url']) && ! empty( $_GET['url'] ) && ! $page_uri){
            $page_uri = urldecode($_GET['url']);
        }*/
        if($page_uri){
            echo '<meta http-equiv="Refresh" content="0; url=' . $page_uri . '">';
            echo '<script type="text/javascript">window.location.href = "' . $page_uri . '";</script>';

            return;
        }
    }

    // TODO function checkPermissions()
}