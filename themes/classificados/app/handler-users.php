<?php
add_action( 'show_user_profile', 'idx_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'idx_show_extra_profile_fields' );

add_action( 'personal_options_update', 'idx_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'idx_save_extra_profile_fields' );

function idx_show_extra_profile_fields( $user ) { ?>

    <h3>Dados do Usuário</h3>

    <table class="form-table">

        <tr>
            <th><label for="phone">Telefone</label></th>

            <td>
                <input type="text" name="idx_user_phone" id="phone" value="<?= esc_attr( get_the_author_meta( 'idx_user_phone', $user->ID ) ); ?>" class="phone" /><br />
                <span class="description">Informe o telefone do usuário.</span>
            </td>

        </tr>

    </table>
<?php }



function idx_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    update_user_meta( $user_id, 'idx_user_phone', $_POST['idx_user_phone'] );



    return $user_id;
}