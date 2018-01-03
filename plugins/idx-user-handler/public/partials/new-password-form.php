<?php
/**
 * Show password and confirmation fields, with 2 hidden ($user_id and a nonce)
 */
?>

<form action="" class="col s12 m12 l12" method="post">

    <div class="row">
        <div class="input-field col s12 m8 l8">
            <i class="material-icons prefix">lock</i>
            <input required id="icon_prefix" name="idx_new_password" type="password" class="validate">
            <label for="icon_prefix">Senha</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12 m8 l8">
            <i class="material-icons prefix">lock</i>
            <input required id="icon_prefix" name="idx_new_password_confirmation" type="password" class="validate">
            <label for="icon_prefix">Repita a Senha</label>
        </div>
    </div>


	<input type="hidden" name="idx_user_id" value="<?= $user_id; ?>"/>
	<input type="hidden" name="new_password_nonce"
	       value="<?= wp_create_nonce( 'new_password_nonce' ); ?>"/>
	<br>
<!--	<input type="submit" name="update_user_password_button" class="w-button bts" value="Alterar"/>-->
    <button class="w-button bts btn waves-effect waves-light col s12 m4 l4" type="submit" name="update_user_password_button">Alterar</button>
</form>


