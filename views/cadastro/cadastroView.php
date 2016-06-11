<?php
$model->validateForm();
?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form method="POST" action="">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="nome" />
                    </br>

                    <label>E-mail:</label>
                    <input type="email" class="form-control" name="email" />
                    </br>

                    <label>Senha:</label>
                    <input type="password" class="form-control" name="senha" />
                    <div class="alert alert-warning" role="alert">As senhas não são criptografadas ainda, então não coloque senhas pessoais para testar!!</div>
                    </br>

                    <label>Confirme a senha:</label>
                    <input type="password" class="form-control" name="confSenha" />
                    </br>
                    <?php echo $model->form_message; ?>

                    <input type="submit" class="btn" value="Cadastrar" />
                </form>
            </div>
        </div>
    </div>
</div>