<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="Login">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="Close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="Login">Login</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form method="post" >
                            <div class="form-group">
                                <?php
                                if ( $this->isLoggedIn ) {
                                    echo '<p class="alert">Logado</p>';
                                }
                                ?>
                                <label class="lblLogin">E-mail</label>
                                <input type="email" class="form-control" id="frmLogin" name="userdata[email]" placeholder="exemplo@exemplo.com" />
                            </div>
                            <div class="form-group">
                                <label class="lblLogin">Senha</label>
                                <input type="password" class="form-control" id="frmPass" name="userdata[senha]" placeholder="*******" />
                            </div>
                            <?php
                            if ( $this->login_error ) {
                                echo '<tr><td colspan="2" class="error">' . $this->login_error . '</td></tr>';
                            }
                            ?>
                            <button type="submit" class="btn">Login</button>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <h1>Ainda não tem cadastro?</h1>
                        <p>Cadastre-se</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>