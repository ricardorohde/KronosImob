<ul class="nav navbar-nav navbar-right">
    <li><a href="<?php echo HOMEURL; ?>">Home</a></li>
    <li><a href="<?php echo HOMEURL; ?>/imoveis/">Imóveis</a></li>
    <li><a href="#">Sobre</a></li>
    <li><a href="#">Contato</a></li>
    <?php
    if (!$this->isLoggedIn) {
        ?>
        <li><a href="<?php echo HOMEURL; ?>/login/">Login</a></li>
        <li><a href="<?php echo HOMEURL; ?>/cadastro/">Cadastre-se</a></li>
        <?php
    } else {
        ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo $this->userdata['nome']; ?> <span class="caret" />
            </a>
            <ul class="dropdown-menu ulDD">
                <li><a href="#">Perfil <span class="glyphicon glyphicon-user pull-right" /></a></li>
                <li role="separator" class="divider" />
                <li class="group-title">Imóveis</li>
                <li><a href="<?php echo HOMEURL; ?>/panel/">Painel de controle</a> </li>
                <li><a href="<?php echo HOMEURL; ?>/panel/criar">Criar anúncio</a></li>
                <li role="separator" class="divider" />
                <li><a href="<?php echo HOMEURL; ?>/login/logoff">Logout <span class="glyphicon glyphicon-log-out pull-right" /></a></li>
            </ul>
        </li>
        <?php
    }
    ?>
</ul>