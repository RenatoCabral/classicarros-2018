<div id="test-swipe-1" class="col s12 m12 l12 login">
    <div class="row">
        <form class="col s12 m12 l12" action="" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_prefix" required name="idx_user_email" type="email" class="validate">
                    <label for="icon_prefix">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_lock" required name="idx_user_password" type="password" class="validate">
                    <label for="icon_lock">Senha</label>
                    <input type="hidden" name="idx_login_nonce" value="<?= wp_create_nonce( 'idx-login-nonce' ); ?>"/>
                </div>
            </div>
            <input type="hidden" name="url_redirect" value="<?= home_url() ?>">
            <a href="<?= get_permalink( get_page_by_path( 'recuperar-senha' ) ) ?>">Esqueceu sua senha?</a>
            <input id="idx_login_submit" class="waves-effect waves-light btn right" type="submit" value="Acessar"/>
        </form>

    </div>
</div>