<?php

class Idx_User_Handler_Public {


	private $idx_user_handler;


	private $version;

	public function __construct( $idx_user_handler, $version ) {

		$this->idx_user_handler = $idx_user_handler;
		$this->version          = $version;

	}

	public function enqueue_styles() {

		wp_enqueue_style(
			$this->idx_user_handler,
			plugin_dir_url( __FILE__ ) . 'css/idx-user-handler-public.css',
			array(),
			$this->version, 'all'
		);

	}

	public function enqueue_scripts() {

		wp_enqueue_script(
			$this->idx_user_handler,
			plugin_dir_url( __FILE__ ) . 'js/idx-user-handler-public.js',
			array( 'jquery' ),
			$this->version,
			true
		);
	}


	public function register_shortcodes() {
		add_shortcode( 'idx_register_form', array( $this, 'show_registration_form' ) );
		add_shortcode( 'idx_login_form', array( $this, 'show_login_form' ) );
		add_shortcode( 'idx_recover_password', array( $this, 'show_password_recover_form' ) );
		add_shortcode( 'idx_new_password', array( $this, 'show_new_password_form' ) );

		add_shortcode( 'idx_manage_account', array( $this, 'show_manage_account_form' ) );
	}

	### USER LOGIN


	public function show_login_form() {
		if ( is_user_logged_in() ) {
			WP_Flash_Messages::print_message( 'Você já está logado no sistema. Ir para o <a href="' . home_url() . '">Início.</a>' );
		} else {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/login-form.php';
		}
	}


	public function idx_process_login() {
		if ( ! isset( $_POST['idx_login_nonce'] ) || ! isset( $_POST['idx_user_email'] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST['idx_login_nonce'], 'idx-login-nonce' ) ) {
			WP_Flash_Messages::add( 'Requisição inválida', WP_Flash_Messages::ERROR );
		} else {
			if ( ! isset( $_POST['idx_user_email'] ) || empty( $_POST['idx_user_email'] ) ) {
				$message = 'Insira seu email de cadastro';
				WP_Flash_Messages::add( $message, WP_Flash_Messages::ERROR );

				return;
			}

			$user = get_user_by( 'email', $_POST['idx_user_email'] );

			if ( ! $user ) {
				$message = 'O email informado ainda não possui cadastro. ';
				WP_Flash_Messages::add( $message, WP_Flash_Messages::ERROR );

				return;
			}

			if ( ! wp_check_password( $_POST['idx_user_password'], $user->user_pass, $user->ID ) ) {
				$message = 'Senha inválida';
				WP_Flash_Messages::add( $message, WP_Flash_Messages::ERROR );

				return;
			}

			// So far so good, can log the user in.
			wp_set_auth_cookie( $user->get( 'ID' ) );
			wp_set_current_user( $user->ID, $_POST['idx_user_email'] );
			do_action( 'wp_login', $_POST['idx_user_email'], $_POST['idx_user_password'] );
			echo '<script>
                window.location.href = "' . $_POST["url_redirect"] . '";
                </script>';
			exit;

		}
	}

	### ACCOUNT CREATION

	public function show_registration_form() {
		if ( ! get_option( 'users_can_register' ) ) {
			WP_Flash_Messages::print_message( 'O registro de usuários está desabilitado.', WP_Flash_Messages::ERROR );
		} else {
			if ( is_user_logged_in() ) {
				WP_Flash_Messages::print_message( 'Você já está logado no site.</a>' );
			} else {
				require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/registration-form.php';
			}
		}


	}

	public function idx_process_registration() {
		if ( ! isset( $_POST['idx_register_nonce'] ) || ! isset( $_POST['idx_user_email'] ) ) {
			return;
		}
		if ( ! wp_verify_nonce( $_POST['idx_register_nonce'], 'idx-register-nonce' ) ) {
			WP_Flash_Messages::print_message( 'Requisição inválida', WP_Flash_Messages::ERROR );
		} else {

			if ( ! isset( $_POST["idx_user_name"] ) || empty( $_POST['idx_user_name'] ) ) {
				WP_Flash_Messages::add( 'Informe o seu nome', WP_Flash_Messages::ERROR );

				return;
			}
			if ( ! isset( $_POST["idx_user_last_name"] ) || empty( $_POST['idx_user_last_name'] ) ) {
				WP_Flash_Messages::add( 'Informe o seu sobrenome', WP_Flash_Messages::ERROR );

				return;
			}

			if ( ! isset( $_POST["idx_user_email"] ) || empty( $_POST['idx_user_email'] ) ) {
				WP_Flash_Messages::add( 'Informe o seu e-mail', WP_Flash_Messages::ERROR );

				return;
			}
			if ( ! isset( $_POST["idx_user_phone"] ) || empty( $_POST['idx_user_phone'] ) ) {
				WP_Flash_Messages::add( 'Informe o seu  telefone', WP_Flash_Messages::ERROR );

				return;
			}

			$user_login     = $_POST["idx_user_email"];
			$user_email     = $_POST["idx_user_email"];
			$user_name      = $_POST["idx_user_name"];
			$user_last_name = $_POST["idx_user_last_name"];

			if ( ! is_email( $user_email ) ) {
				WP_Flash_Messages::add( 'Email inválido', WP_Flash_Messages::ERROR );

				return;
			}
			if ( email_exists( $user_email ) ) {
				WP_Flash_Messages::add( 'Email já existe', WP_Flash_Messages::ERROR );

				return;
			}

			$password = rand( 1000, 5000 );

			// So far so good, can create user.
			$new_user_id = wp_insert_user( array(
					'user_nicename'   => $user_email,
					'user_login'      => $user_login,
					'user_pass'       => $password,
					'user_email'      => $user_email,
					'user_registered' => date( 'Y-m-d H:i:s' ),
					'role'            => 'vendedor',
					'first_name'      => $user_name,
					'last_name'       => $user_last_name,
					'display_name'    => $user_name

				)
			);

			if ( ! $new_user_id ) {
				$message = 'Houve um erro ao salvar os seus dados, tente novamente';
				WP_Flash_Messages::add( $message, WP_Flash_Messages::ERROR );

				return;
			} else {

				update_user_meta( $new_user_id, 'idx_user_phone', $_POST['idx_user_phone'] );

				$html      = '<p>Usuário: ' . $user_email . '</p>
 				<p>Senha: ' . $password . '</p>
				<p>Clique para ativar a conta: <a href="' . home_url() . '/minha-conta">Clique aqui para entrar</a></p>';
				$user_info = get_userdata( $new_user_id );
				wp_mail( $user_info->user_email, __( 'Por favor, ative sua conta' ), $html );

//				$this->log_user_in( $new_user_id, $user_login );
				echo '<script>
                window.location.href = "' . $_POST["url_redirect"] . '?create-account=true";
                </script>';
				exit;
			}
		}
	}

	### HELPERS


	/**
	 * @param $new_user_id
	 * @param $user_login
	 */
	private function log_user_in( $new_user_id, $user_login ) {
		wp_set_auth_cookie( $new_user_id );
		wp_set_current_user( $new_user_id, $user_login );
		do_action( 'wp_login', $user_login );
	}

	### PASSWORD RECOVER

	public function show_password_recover_form() {
		if ( is_user_logged_in() ) {
			WP_Flash_Messages::print_message(
				'Você já está logado!'
			);
		} else {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/password-recover-form.php';
		}
	}

	public function idx_process_password_recover() {
		global $wpdb;

		if (
			! isset( $_POST['idx_recover_password_nonce'] ) ||
			! wp_verify_nonce( $_POST['idx_recover_password_nonce'], 'idx_recover_password_nonce' )
		) {
			return;
		}

		if ( ! email_exists( $_POST['user_email'] ) ) {
			WP_Flash_Messages::add( 'Email inválido', WP_Flash_Messages::ERROR );

			return;
		}

		// So far, so good, can generate and sent token.

		$key     = wp_generate_password( 15, false );
		$updated = $wpdb->update(
			$wpdb->users,
			array( 'user_activation_key' => $key ),
			array( 'user_email' => $_POST['user_email'] )
		);

		if ( ! $updated ) {
			WP_Flash_Messages::add( 'Houve um erro ao salvar o token do usuário . Tente novamente . ', WP_Flash_Messages::ERROR );
		} else {
			$message = '<h3>Recuperação de Senha | ' . get_bloginfo( 'name' ) . '</h3>';
			$message .= 'Olá,' . PHP_EOL;
			$message .= 'Esse email permite que você recupere sua senha . ' . PHP_EOL;
			$message .= 'Caso você não tenha solicitado recuperação de senha, apenas ignore esta mensagem . ' . PHP_EOL;
			$message .= '<br>Para recuperar sua senha, clique no link a seguir( ou copie e cole em seu navegador)' . PHP_EOL;
			$link    = home_url() . '/criar-nova-senha?token=' . $key;
			$message .= $link;
			if ( ! wp_mail( $_POST['user_email'], 'Recuperação de senha', $message ) ) {
				WP_Flash_Messages::add( 'Erro ao enviar o email de recuperação de senha . ', WP_Flash_Messages::ERROR );
			} else {
				WP_Flash_Messages::add( 'Confira sua caixa de entrada', WP_Flash_Messages::SUCCESS );
			}
		}
	}

	public function show_new_password_form() {
		if ( is_user_logged_in() ) {
			WP_Flash_Messages::print_message( 'Você já está logado!' );
		} else {
			if ( ! isset( $_GET['token'] ) || empty( $_GET['token'] ) ) {
				WP_Flash_Messages::print_message(
					' Token inválido, para alterar sua senha <a href="' . home_url() . '/recuperar-senha" >crie outro token</a>'
				);
			} else {
				global $wpdb;

				$token   = $_GET['token'];
				$sql     = "SELECT id FROM tcc_users WHERE user_activation_key = '{$token}'";
				$results = $wpdb->get_row( $sql );

				if ( empty( $results ) ) {
					WP_Flash_Messages::print_message(
						'Token inválido, para alterar sua senha <a class="button" href="' . home_url() . '/recuperar-senha" >crie outro token</a>'
					);
				} else {
					$user_id = $results->id;
					require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/new-password-form.php';
				}
			}
		}
	}

	public function idx_process_password_change() {
		if (
			! isset( $_POST['new_password_nonce'] ) ||
			! wp_verify_nonce( $_POST['new_password_nonce'], 'new_password_nonce' )
		) {
			return;
		}

		$user_id   = $_POST['idx_user_id'];
		$pass      = $_POST['idx_new_password'];
		$pass_conf = $_POST['idx_new_password_confirmation'];

		if ( empty( $pass ) || empty( $pass_conf ) ) {
			WP_Flash_Messages::add( 'Preencha todos os campos', WP_Flash_Messages::ERROR );

			return;
		}

		if ( $pass != $pass_conf ) {
			WP_Flash_Messages::add( 'A senha e a confirmação de senha devem ser idênticas', WP_Flash_Messages::ERROR );

			return;
		}

		wp_set_password( $pass, $user_id );
		$user = get_user_by( 'id', $user_id );
		wp_password_change_notification( $user );

		$this->log_user_in( $user_id, $user->data->user_login );

		WP_Flash_Messages::add( 'Senha alterada com sucesso', WP_Flash_Messages::SUCCESS );
		$redirect = home_url();
		wp_redirect( $redirect );
		exit;
	}


	public function my_init() {
		if ( isset( $_GET['create-account'] ) && $_GET['create-account'] == true ) {
			$message = 'Verifique seu email, lá contem sua senha de acesso';
			WP_Flash_Messages::add( $message, WP_Flash_Messages::SUCCESS );
		}
	}

}
