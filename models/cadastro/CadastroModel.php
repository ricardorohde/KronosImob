<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 18/05/2016
 * Time: 23:17
 */
class CadastroModel
{
    public $form_data;

    public $form_message;

    public $db;

    public function __construct ($db = false){
        $this->db = $db;
    }

    public function validateForm ()
    {
        $this->form_data = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && ! empty($_POST)){
            foreach ($_POST as $key => $value){
                $this->form_data[$key] = $value;

                if (empty($value)){
                    $this->form_message = 'Há campos vazios, preencha esses campos';
                    return;
                }
            }
        } else {
            return;
        }

        if (empty($this->form_data)) return;

        if($this->form_data['senha'] != $this->form_data['confSenha']){
            $this->form_message = 'Senhas diferentes';
            return;
        }

        $ckUserDb = $this->db->query(
                'SELECT *
                   FROM usuarios
                  WHERE email = ?',
                array(checkArray($this->form_data, 'email'))
            );

        if (!$ckUserDb){
            $this->form_message = 'Problemas internos, tente novamente mais tarde';
            return;
        }

        $fetch = $ckUserDb->fetch();


        //TODO configurar id

        $pessoasQuery = $this->db->insert('pessoas', array(
            'nome' => checkArray($this->form_data, 'nome'),
        ));



        $selectIdPessoa = $this->db->query(
            'SELECT LAST_INSERT_ID()'
        );

        $fetchIdPessoa = $selectIdPessoa->fetch();
        $idPessoa = $fetchIdPessoa[0];

        $usuariosQuery = $this->db->insert('usuarios', array(
            'idpessoa' => $idPessoa,
            'email' => checkArray($this->form_data, 'email'),
            'senha' => checkArray($this->form_data, 'senha'),
        ));

        if(!$pessoasQuery || !$usuariosQuery){
            $this->form_message = 'Problemas internos';
        } else {
            $this->gologin();
        }
    }

    private function gologin()
    {
        echo '<meta http-equiv="Refresh" content="0; url=' . HOMEURL . '/login">';
        echo '<script type="text/javascript">window.location.href = "' . HOMEURL . '/login";</script>';
    }
}