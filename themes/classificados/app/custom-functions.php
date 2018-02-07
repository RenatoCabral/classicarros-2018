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
                cursor: default;
                
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
	return '';
}