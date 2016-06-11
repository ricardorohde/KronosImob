<?php

/**
 * Created by Jonathan
 * Date: 22/05/2016
 * Time: 22:10
 */
class ImoveisModel extends MainModel
{
    public $success_message = null;
    public $IdImovel;

    public function __construct($db = false, $controller = null)
    {
        $this->db = $db;

        $this->controller = $controller;

        $this->params = $this->controller->params;

        $this->userdata = $this->controller->userdata;
    }

    /*
     * Lista imoveis
     * se o parametro cpanel = true for passado lista somente os imoveis do usuario logado
     */
    public function listaImoveis($cpanel = false)
    {
        $id = null;
        $where = null;

        if($cpanel == true){
            $where = " WHERE IdPessoa = " . $this->userdata['idpessoa'];
        }

        $query = $this->db->query('SELECT * FROM imoveis' . $where);
        return $query->fetchAll();
    }

    public function getImages($idImovel = null)
    {
        $where = null;

        if($idImovel != null){
            $where = ' WHERE id_imovel = '.$idImovel;
        }

        $query = $this->db->query('SELECT * FROM imagens_imoveis'.$where);
        return $query->fetchAll();
    }

    public function criarAnuncio()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST' || empty($_POST['criarAnuncio'])){
            return;
        }

        $imgs = $this->saveImages();

        unset($_POST['criarAnuncio']);

        $query = $this->db->insert('imoveis', $_POST);

        $selectIdImovel = $this->db->query(
            'SELECT LAST_INSERT_ID()'
        );

        $fetchIdImovel = $selectIdImovel->fetch();
        $idImovel = $fetchIdImovel[0];

        foreach ($imgs as $image) {
            $imageQuery = $this->db->insert('imagens_imoveis', array(
                'id_imovel' => $idImovel,
                'caminho_imagem' => $image,
            ));
        }

        if($query){

            echo '<meta http-equiv="Refresh" content="0; url='. HOMEURL . '/panel">';
            echo '<script type="text/javascript">window.location.href = "'. HOMEURL . '/panel";</script>';
        } else {
            $this->success_message = 'Erro';
        }

    }

    public function getImovel()
    {
        if (!is_numeric(checkArray( $this->params, 0 ))){
            return;
        }

        $IdImovel = checkArray($this->params, 0);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['criarAnuncio'])){
            unset($_POST['criarAnuncio']);

            $query = $this->db->update('imoveis', 'IdImovel', $IdImovel, $_POST);

            echo '<meta http-equiv="Refresh" content="0; url='. HOMEURL . '/panel">';
            echo '<script type="text/javascript">window.location.href = "'. HOMEURL . '/panel";</script>';

        }

        $query = $this->db->query(
            'SELECT * FROM imoveis WHERE IdImovel = ? LIMIT 1',
            array($IdImovel)
        );

        $fetch_data = $query->fetch();

        if ( empty( $fetch_data ) ) {
            return;
        }

        $this->form_data = $fetch_data;

        
    }
    
    public function deleteImovel()
    {
        if (!is_numeric(checkArray( $this->params, 0 ))){
            return;
        }

        $IdImovel = checkArray($this->params, 0);
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            unset($_POST['delete']);

            $Id = $_POST['IdImovel'];
            
            $query = $this->db->delete('imoveis', 'IdImovel', $Id);

            echo '<meta http-equiv="Refresh" content="0; url='. HOMEURL . '/panel">';
            echo '<script type="text/javascript">window.location.href = "'. HOMEURL . '/panel";</script>';
        }

        return $IdImovel;
        
    }

    public function saveImages()
    {
        if (empty($_FILES['imagens_imovel'])){
            return;
        }

        $imgNome = $_FILES['imagens_imovel']['name'];

        $tmp_image = $_FILES['imagens_imovel']['tmp_name'];

        $extAllow = array(".jpeg", ".jpg", ".bmp", ".png");

        $dir = SOURCEPATH . IMGIMOVEIS;

        for($i = 0; $i < count($imgNome); $i++){
            $ext = strtolower(substr($imgNome[$i], -4));

            if (in_array($ext, $extAllow)){
                $new_name = date("Y:m:d-H.i.s") . 'kronosimob-' . $this->userdata['idpessoa'] . '' . $i . $ext;

                $imgPath = $dir . $new_name;

                move_uploaded_file($tmp_image[$i], $imgPath);

                $imagePath[$i] = $new_name;

            }
        }
        return $imagePath;
    }
}