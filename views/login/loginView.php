<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form method="post">
                    <div class="form-group">
                        <?php
                        if ( $this->isLoggedIn ) {
                            echo '<p class="alert">Logado</p>';
                            header('location: '.HOMEURL);
                        }
                        ?>
                        <label class="lblLogin">E-mail</label>
                        <input type="email" class="form-control" id="frmLogin" autofocus="autofocus" name="userdata[email]" placeholder="exemplo@exemplo.com" />
                    </div>
                    <div class="form-group">
                        <label class="lblLogin">Senha</label>
                        <input type="password" class="form-control" id="frmPass" name="userdata[senha]" placeholder="*******" />
                    </div>
                    <?php
                    if ( $this->login_error ) {
                        echo '<div class="alert alert-danger" role="alert">
                                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                  <span class="sr-only">Error:</span>
                                  '.$this->login_error.'
                                </div>';
                    }
                    ?>
                    <input type="submit" class="btn" value="Login" />
                </form>
            </div>
        </div>
    </div>
</div>