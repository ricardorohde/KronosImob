<?php

$model->getImovel();


?>
<!--/*<?//php echo $model->form_data['titulo']; 
         echo $model->form_data['descricao'];
		 echo $model->form_data['preco']; ?>*/-->
         
<div class="content">

    <div class="container">
    		
               <div class="col-sm-12">
               			<div class="box-titulo-imovel">
                        	<span class="layout-titulo"><?php echo $model->form_data['titulo']; ?></span>
                        </div><!--box-class-imovel-->
                        
                        <div class="box-especificacao-imovel">
                        	<span class="layout-especificacao-1">N° de Quartos <?php echo $model->form_data['n_Quartos']; ?> </span>
                            <span class="layout-especificacao-2">N° de Banheiros <?php echo $model->form_data['n_Banheiros']; ?> </span>
                            <span class="layout-especificacao-3">N° de Salas <?php echo $model->form_data['n_Salas']; ?> </span>
                            <span class="layout-especificacao-4">N° de Vagas <?php echo $model->form_data['n_Vagas']; ?> </span>
                        </div><!--box-class-imovel-->
                        
                        <div class="box-preco-imovel">
                        	<span class="layout-preco">R$<?php echo $model->form_data['preco']; ?></span>
                        </div><!--box-class-imovel-->
                   <div id="thumbImoveisCarousel" class="carousel slide box-img-imovel" data-ride="carousel">
                       <div class="carousel-inner" role="listbox">
                           <?php
                           $imgs = $model->getImages($model->form_data['IdImovel']);

                           $i = 0;
                           $active = null;
                           foreach($imgs as $img):
                               if($i == 0) {
                                   $active = 'active';
                                   $i++;
                               }
                               ?>
                               <div class="item <?php if($active = 'active' && $active != null){ echo 'active'; $active = null;} else {echo '';} ?>">
                                   <img src="<?php echo IMGIMOVEIS . '/' . $img['caminho_imagem'] ?>" alt="..." >
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
                           <span class="sr-only">Prï¿½ximo</span>
                       </a>
                   </div><!--box-class-imovel-->
                         <div class="box-descricao-imovel">
                        	<span class="layout-descricao"><?php echo $model->form_data['descricao']; ?></span>
                        </div><!--box-class-imovel-->
               	

				</div>        
    </div>

</div>