<?php
function change_login_image() {
	echo '<style type="text/css">
            body.login, {
                background: #fff !important;
            }
            body.login #wp-submit{
             background: #26a69a !important
            }
            body.login h1 a{
                background-image: url(' . get_bloginfo( 'template_directory' ) . '/img/logo.png) !important;
                width: 410px !important;
                height: 69px !important;
                background-size: inherit;
                
            }
            body.login a{
                color: #26a69a !important;
            }
            body.login #login_error a{
                color: #26a69a !important;
            }
            
            #dashboard-widgets-wrap{
                display: none !important;
            }
        </style>';
}

function change_admin_footer_text() {
	echo "Desenvolvido por Classicarros";
}

function add_custom_login_logo_url_title() {
	return 'Classicarros';
}

function add_custom_login_logo_url() {
	return home_url();
}

# Remove unused admin bar items
function remove_unused_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
	$wp_admin_bar->remove_menu( 'about' );
	$wp_admin_bar->remove_menu( 'wporg' );
	$wp_admin_bar->remove_menu( 'documentation' );
	$wp_admin_bar->remove_menu( 'support-forums' );
	$wp_admin_bar->remove_menu( 'feedback' );
	$wp_admin_bar->remove_menu( 'view-site' );
	$wp_admin_bar->remove_menu( 'comments' );
	$wp_admin_bar->remove_menu( 'updates' );
	$wp_admin_bar->remove_menu( 'new-content' );
}
