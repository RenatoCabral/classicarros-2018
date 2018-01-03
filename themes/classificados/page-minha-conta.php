<?php if ( ! is_user_logged_in() ) {

	get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="col s6 m12 l6 offset-l3">

                    <ul id="tabs-swipe-demo" class="tabs tabs-login-create-count">
                        <li class="tab col s3"><a href="#test-swipe-1">Login</a></li>
                        <li class="tab col s3"><a class="active" href="#test-swipe-2">Criar Conta</a></li>
                    </ul>

                    <!--Login-->
					<?= do_shortcode( '[idx_login_form]' ); ?>

                    <!--cadastro-->
					<?= do_shortcode( '[idx_register_form]' ); ?>

                </div>
            </div>
        </div>
    </div>

	<?php get_footer();

} else {
	wp_redirect( home_url() . '/wp-admin/edit.php?post_type=veiculo' );
	exit;
}


