<?php

$model->criarAnuncio();
$model->getImovel();

$imovel_uri = HOMEURL . '/panel/imovel/';
$edit_uri = $imovel_uri . 'editar/';
$del_uri = $imovel_uri . 'deletar/';

if(isset($this->success_message)){
    echo $this->success_message;
    unset($this->success_message);
    return;
}

?>
<div class="content">
    <div class="container">
        <h1>Criar</h1>
        <form method="POST" enctype="multipart/form-data" action="">
            <div class="row">
                <div class="col-lg-8">

                    <label>Título</label>
                    <input class="form-control" type="text" name="titulo" value="" />

                    <label>Descrição</label>
                    <textarea class="form-control" name="descricao" rows="10"></textarea>

                    </br></br>
                    <div class="row">
                        <div class="col-lg-3">

                            <label>Nº de quartos</label>
                            <input class="form-control" type="number" name="n_Quartos" />

                        </div>
                        <div class="col-lg-3">

                            <label>Nº de banheiros</label>
                            <input class="form-control" type="number" name="n_Banheiros" />

                        </div>
                        <div class="col-lg-3">

                            <label>Nº de salas</label>
                            <input class="form-control" type="number" name="n_Salas" />

                        </div>
                        <div class="col-lg-3">

                            <label>Nº de vagas</label>
                            <input class="form-control" type="number" name="n_Vagas" />

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-6">

                            <label>Preço</label>
                            <input class="form-control" type="text" name="preco" />

                        </div>
                        <div class="col-lg-6">

                            <label>Tamanho <small>(em metros)</small></label>
                            <input class="form-control" type="text" name="tamanho_M" />

                        </div>
                    </div>
                    </br></br>
                    <div class="row">
                        <div class="col-lg-12">

                            <input class="form-control" type="file" name="imagens_imovel[]" multiple />

                        </div>
                    </div>
                </div>
            </div>
            </br></br>
            <div class="row">
                <div class="col-lg-2">

                    <label>CEP</label>
                    <input class="form-control" type="text" name="cep" />

                </div>
                <div class="col-lg-3">

                    <label>Rua</label>
                    <input class="form-control" type="text" name="rua" />

                </div>
                <div class="col-lg-1">

                    <label>Nº</label>
                    <input class="form-control" type="text" name="numero" />

                </div>
                <div class="col-lg-2">

                    <label>Bairro</label>
                    <input class="form-control" type="text" name="bairro" />

                </div>
                <div class="col-lg-3">

                    <label>Cidade</label>
                    <input class="form-control" type="text" name="cidade" />

                </div>
                <div class="col-lg-1">

                    <label>Estado</label>
                    <input class="form-control" type="text" name="estado" />

                </div>
            </div>
            <input type="hidden" name="IdTipoDeImovel" value="1">
            <input type="hidden" name="IdTipoDeAcao" value="1">
            <input type="hidden" value="<?php echo $this->userdata['idpessoa']; ?>" name="IdPessoa" />
            <input type="submit" class="btn" name="criarAnuncio" value="vai" />
        </form>
    </div>
</div>