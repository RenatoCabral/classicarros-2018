<form action="" method="post">
    <div class="row">
        <div class="div-recuperar-senha input-field col s12 m8 l8">
    <!--		<input class="w-input input-contato input-email input-recuperar-senha" name="user_email" type="email" placeholder="Email" required="required">-->
            <i class="material-icons prefix">email</i>
            <input id="icon_prefix" type="email" class="w-input input-contato input-email input-recuperar-senha validate" name="user_email">
            <label id="icon_prefix" data-error="wrong" data-success="right">Email</label>
            <input type="hidden" name="idx_recover_password_nonce"
                   value="<?php echo wp_create_nonce( 'idx_recover_password_nonce' ); ?>"/>
    <!--		<input class="w-button button-enviar bt" type="submit" value="Enviar">-->
        </div>
    </div>
    <div class="col s12 m12 l6">
        <row>
            <button class="w-button button-enviar bt btn btn-enviar-recover-password waves-effect waves-light col s12 m4 l4" type="submit" name="action">Enviar</button>
            <!--                <button class="btn waves-effect waves-light red col s12 m4 l4" type="reset" name="action">Cancelar</button>-->
            <a class="btn waves-effect waves-light red col s12 m4 l4" href="<?= home_url(); ?>">Cancelar</a>
        </row>
    </div>
</form>
