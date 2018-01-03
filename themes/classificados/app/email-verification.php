<?php

/*
* Email Verification
*/



// this is just to prevent the user log in automatically after register
function wc_registration_redirect( $redirect_to ) {
    wp_logout();
    wp_redirect( get_permalink( get_page_by_path('minha-conta') )  . '/?q=');
    exit;
}


// when user login, we will check whether this guy email is verify
function wp_authenticate_user( $userdata ) {
    $isActivated = get_user_meta($userdata->ID, 'is_activated', true);
    if ( !$isActivated ) {
        $userdata = new WP_Error(
            'inkfool_confirmation_error',
            __( ' Sua conta tem que ser ativada para fazer o login.
                Você pode reenviar o email de confirmação clicando <a href="'. get_permalink( get_page_by_path('minha-conta') ) . '/?u='.$userdata->ID.'">aqui</a>', 'inkfool' )
        );
    }
    return $userdata;
}
// when a user register we need to send them an email to verify their account
function my_user_register($user_id) {
// get user data
    $user_info = get_userdata($user_id);
// create md5 code to verify later
    $code = md5(time());
// make it into a code to send it to user via email
    $string = array('id'=>$user_id, 'code'=>$code);
// create the activation code and activation status
    update_user_meta($user_id, 'is_activated', 0);
    update_user_meta($user_id, 'activationcode', $code);
// create the url

    if( isset( $_POST['redirect-user-register'] ) ) {
        $url = get_site_url(). '/finalizar-compra/?p=' .base64_encode( serialize($string));
    }
    else{
        $url = get_site_url(). '/minha-conta/?p=' .base64_encode( serialize($string));
    }

// basically we will edit here to make this nicer
//    $html = 'Confirme sua conta clicando no link abaixo ou copiando e colando no navegador: <br/><br/> <a href="'.$url.'">'.$url.'</a>';

$html = '
<!DOCTYPE html>
<html dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>ClassiCarros</title>
	</head>
	<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<div id="wrapper" dir="ltr" style="background-color: #f5f5f5; margin: 0; padding: 70px 0 70px 0; -webkit-text-size-adjust: none !important; width: 100%;">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="center" valign="top">
						<div id="template_header_image">
							<p style="margin-top: 0;">
								<img src="' . home_url().'/wp-content/themes/classificados/img/logo.png" alt="ClassiCarros" style="border: none; display: inline; font-size: 14px; font-weight: bold; height: auto; line-height: 100%; outline: none; text-decoration: none; text-transform: capitalize;">
							</p>
						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important; background-color: #fdfdfd; border: 1px solid #dcdcdc; border-radius: 3px !important;">
							<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style="background-color: #053b82; border-radius: 3px 3px 0 0 !important; color: #ffffff; border-bottom: 0; font-weight: bold; line-height: 100%; vertical-align: middle; font-family: Helvetica Neue, Helvetica, Roboto, Arial, sans-serif;" >
										<tr>
											<td id="header_wrapper" style="padding: 36px 48px; display: block;">
												<h1 style="color: #ffffff; font-family: Helvetica Neue, Helvetica, Roboto, Arial, sans-serif; font-size: 30px; font-weight: 300; line-height: 150%; margin: 0; text-align: left; text-shadow: 0 1px 0 #37629b; -webkit-font-smoothing: antialiased;">ClassiCarros | Verificação de Conta</h1>
											</td>
										</tr>
									</table>
									<!-- End Header -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
										<tr>
											<td valign="top" id="body_content" style="background-color: #fdfdfd;">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%">
													<tr>
														<td valign="top" style="padding: 48px;">
															<div id="body_content_inner" style="color: #737373; font-family: Helvetica Neue, Helvetica, Roboto, Arial, sans-serif; font-size: 14px; line-height: 150%; text-align: left;">
																<p style="margin: 0 0 16px;">Por favor clique no link abaixo para verificar sua conta na Móveis Estrela e ganhar acesso à nossa loja.</p>
																<p style="margin: 0 0 16px;">Caso o link não funcione, copie e cole em seu navegador</p>
																<p style="margin: 0 0 16px;"><a href="'.$url.'">'.$url.'</a></p>
																<p style="margin: 0 0 16px; font-size: 10px">** Não responda esse email.</p>
															</div>
														</td>
													</tr>
												</table>
												<!-- End Content -->
											</td>
										</tr>
									</table>
									<!-- End Body -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Footer -->
									<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer">
										<tr>
											<td valign="top" style="padding: 0; -webkit-border-radius: 6px;">
												<table border="0" cellpadding="10" cellspacing="0" width="100%">
													<tr>
														<td colspan="2" valign="middle" id="credit" style="padding: 0 48px 48px 48px; -webkit-border-radius: 6px; border: 0; color: #6989b4; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;">
															<p>COPYRIGHT © '.date( 'Y' ).' MÓVEIS ESTRELA - CNPJ: 05.888.347.0001/36</p>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<!-- End Footer -->
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>';


// send an email out to user
    wp_mail($user_info->user_email, __('Por favor, ative sua conta'), $html);
}
// we need this to handle all the getty hacks i made
function my_init(){
// check whether we get the activation message
    if(isset($_GET['p'])){
        $data = unserialize(base64_decode($_GET['p']));
        $code = get_user_meta($data['id'], 'activationcode', true);
// check whether the code given is the same as ours
        if($code == $data['code']){
// update the db on the activation process
            update_user_meta($data['id'], 'is_activated', 1);
            echo 'Sua conta foi ativada! ';
        }else{
            echo 'Falha ao ativar conta, por favor contate-nos. ';
        }
    }
    if(isset($_GET['q'])){
        echo 'Sua conta deve ser ativada antes de entrar. Por favor, verifique a caixa de entrada ou a caixa de spam em seu email.';
    }
    if(isset($_GET['u'])){
        my_user_register($_GET['u']);
        echo 'Verifique seu email para ativar sua conta.';
    }
}
// hooks handler
add_action( 'init', 'my_init' );
add_filter('registration_redirect', 'wc_registration_redirect');

add_filter('wp_authenticate_user', 'wp_authenticate_user',10,2);
add_action('user_register', 'my_user_register',10,2);