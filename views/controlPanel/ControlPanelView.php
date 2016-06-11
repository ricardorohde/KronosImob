<?php

if (!$this->isLoggedIn){

    echo 'Você não pode accessar esta página sem estar logado...';

    return;

}



$list = $model->listaImoveis(true);

?>

    <div class="content">

        <div class="container">

            <a href="<?php echo HOMEURL; ?>/panel/criar" class="btn" >Criar anuncio</a></br>
             



            <div class="table-responsive">

                <table class="table">

                    <tr>

                        <th>Id</th>

                        <th>Titulo</th>

                        <th>Descrição</th>

                        <th></th>

                        <th></th>

                    </tr>

                    <?php foreach($list as $imovel): ?>

                        <tr>

                            <?php

                            echo '<td>' . $imovel['IdImovel'] . '</td>';

                            echo '<td>' . $imovel['titulo'] . '</td>';

                            echo '<td>' . $imovel['descricao'] . '</td>';

                            echo '<td><a href="' . HOMEURL . '/panel/editar/' . $imovel['IdImovel'] . '" title="Editar"><span class="glyphicon glyphicon-pencil" /></a>';

                            echo '<a href="'. HOMEURL . '/panel/excluir/' . $imovel['IdImovel'] . '" title="Excluir"><span class="glyphicon glyphicon-remove" /></a></td>';

                            ?>

                        </tr>

                    <?php endforeach; ?>

                </table>

            </div>



        </div>

    </div>

