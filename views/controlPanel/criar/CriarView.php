<?php

if (!$this->isLoggedIn){

    echo 'Você não pode accessar esta página sem estar logado...';

    return;

}



$model->criarAnuncio();



if(isset($this->success_message)){

    echo $this->success_message;

    unset($this->success_message);

    return;

}



?>

<div class="content">

    <div class="container">

        <span class="titulo-de-criacao">Descreva seu Imovel</span>
        		
                <hr id="hr-criacao-imovel" align="center" size="40" />

        <form method="POST" enctype="multipart/form-data" action="">

            <div class="row">

                <div class="col-lg-8"> <label><span class="criacao-anuncio-titulo">Título do seu Anuncio</span></label>

                    <input class="form-control" type="text" name="titulo"  placeholder="Exempo: Alugo Casa com 2 Quartos" /> 
                    <label><span class="criacao-anuncio-titulo">Descrição</span></label>

                    <textarea class="form-control" name="descricao" rows="10"></textarea>



                    </br></br>

                    <div class="row">

                        <div class="col-lg-3"> <label><span class="criacao-anuncio-titulo">Nº de quartos</span></label>

                            <input class="form-control" type="number" name="n_Quartos" />



                        </div>

                        <div class="col-lg-3"> <label><span class="criacao-anuncio-titulo">Nº de banheiros</span></label>

                            <input class="form-control" type="number" name="n_Banheiros" />



                        </div>

                        <div class="col-lg-3"> <label><span class="criacao-anuncio-titulo">Nº de salas</span></label>

                            <input class="form-control" type="number" name="n_Salas" />



                        </div>

                        <div class="col-lg-3"> <label><span class="criacao-anuncio-titulo">Nº de vagas</span></label>

                            <input class="form-control" type="number" name="n_Vagas" />



                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="row">

                        <div class="col-lg-6"> <label><span class="criacao-anuncio-titulo">Preço</span></label>

                            <input class="form-control" type="text" name="preco" />



                        </div>

                        <div class="col-lg-6"> <label><span class="criacao-anuncio-titulo">Tamanho <small>(em metros)</small></span></label>

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

                <div class="col-lg-2"> <label><span class="criacao-anuncio-titulo">CEP</span></label>

                    <input class="form-control" type="text" name="cep" />



                </div>

                <div class="col-lg-3"> <label><span class="criacao-anuncio-titulo">Rua</span></label>

                    <input class="form-control" type="text" name="rua" />



                </div>

                <div class="col-lg-1"> <label><span class="criacao-anuncio-titulo">Nº</span></label>

                    <input class="form-control" type="text" name="numero" />



                </div>

                <div class="col-lg-2"> <label><span class="criacao-anuncio-titulo">Bairro</span></label>

                    <input class="form-control" type="text" name="bairro" />



                </div>

                <div class="col-lg-3"> <label><span class="criacao-anuncio-titulo">Cidade</span></label>

                    <input class="form-control" type="text" name="cidade" />



                </div>

                <div class="col-lg-1"> <label><span class="criacao-anuncio-titulo">Estado</span></label>

                    <input class="form-control" type="text" name="estado" />



                </div>

            </div>

            <input type="hidden" name="IdTipoDeImovel" value="1">

            <input type="hidden" name="IdTipoDeAcao" value="1">

            <input type="hidden" value="<?php echo $this->userdata['idpessoa']; ?>" name="IdPessoa" />

            <input type="submit" class="btn" name="criarAnuncio" value="Cadastrar Imovel" /> 
            
            <input type="reset" class="btn" value="Apagar Dados ">

        </form>

    </div>

</div>