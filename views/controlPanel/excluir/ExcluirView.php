<?php
if (!$this->isLoggedIn){
    echo 'Você não pode acessar esta página sem estar logado...';
    return;
}

$model->deleteImovel();
$IdImovel = $model->deleteImovel();

?>
<div class="content">
    <div class="content">
        <form method="POST" action="">
            <input type="text" name="IdImovel" value="<?php echo $IdImovel; ?>"/>
            <h1>Deseja realmente excluir este anuncio?</h1>
            <button type="submit" class="btn" name="delete" >Sim</button>
            <a href="#" class="btn">Voltar</a>
        </form>
    </div>
</div>