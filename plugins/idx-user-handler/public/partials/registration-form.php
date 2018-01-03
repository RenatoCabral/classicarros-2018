<div id="test-swipe-2" class="col s12">
    <div class="row">
        <form class="col s12 m12 l12 " method="post">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input required id="icon_prefix" name="idx_user_name" type="text" class="validate">
                    <label for="icon_prefix">Primeiro Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input required id="icon_prefix" name="idx_user_last_name" type="text" class="validate">
                    <label for="icon_prefix">Sobrenome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input required id="icon_prefix" name="idx_user_email" type="email" class="validate">
                    <label for="icon_prefix">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input required id="icon_prefix" name="idx_user_phone" type="text" class="validate phone">
                    <label for="icon_prefix">Telefone</label>
                </div>
            </div>

            <input type="hidden" name="idx_register_nonce" value="<?= wp_create_nonce( 'idx-register-nonce' ); ?>"/>
            <input type="hidden" name="url_redirect" id="no-single" value="<?= home_url(); ?>">
            <input class="waves-effect waves-light btn right" type="submit" value="Criar Conta"/>
        </form>


    </div>