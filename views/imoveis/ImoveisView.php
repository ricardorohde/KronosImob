<?php
$list = $model->listaImoveis();
?>
<div class="content">
    <span class="titulo-de-criacao">Imóveis</span>
    <div class="container">
        <?php foreach($list as $imovel): ?>
            <div class="col-lg-3 col-md-8 col-sm-12">
                <div class="thumbnail">
                    <div class="caption">
                        <div id="thumbImoveisCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <?php
                                $imgs = $model->getImages($imovel['IdImovel']);

                                $i = 0;
                                $active = null;
                                foreach($imgs as $img):
                                    if($i == 0) {
                                        $active = 'active';
                                        $i++;
                                    }
                                ?>
                                    <div class="item <?php if($active = 'active' && $active != null){ echo 'active'; $active = null;} else {echo '';} ?>">
                                        <img src="<?php echo IMGIMOVEIS . '/' . $img['caminho_imagem'] ?>" alt="..." width="100%">
                                    </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                            <a class="left carousel-control" href="#thumbImoveisCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="right carousel-control" href="#thumbImoveisCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Pr�ximo</span>
                            </a>
                        </div>
                        <a href="<?php echo HOMEURL . '/imoveis/view/' . $imovel['IdImovel']; ?>" >
                            <h3><?php echo $imovel['titulo'] ?></h3>
                        </a>
                        <p><?php echo $imovel['descricao'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>