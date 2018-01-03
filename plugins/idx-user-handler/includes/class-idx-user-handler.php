<?php


class Idx_User_Handler {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 *
	 * @access   protected
	 * @var      Idx_User_Handler_Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 *
	 * @access   protected
	 * @var      string $idx_user_handler The string used to uniquely identify this plugin.
	 */
	protected $idx_user_handler;

	/**
	 * The current version of the plugin.
	 *
	 *
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 *
	 */
	public function __construct() {

		$this->idx_user_handler = 'idx-user-handler';
		$this->version          = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Idx_User_Handler_Loader. Orchestrates the hooks of the plugin.
	 * - Idx_User_Handler_i18n. Defines internationalization functionality.
	 * - Idx_User_Handler_Admin. Defines all hooks for the dashboard.
	 * - Idx_User_Handler_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 *
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-idx-user-handler-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-idx-user-handler-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the Dashboard.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-idx-user-handler-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-idx-user-handler-public.php';

		$this->loader = new Idx_User_Handler_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Idx_User_Handler_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 *
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Idx_User_Handler_i18n();
		$plugin_i18n->set_domain( $this->get_idx_user_handler() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the dashboard functionality
	 * of the plugin.
	 *
	 *
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Idx_User_Handler_Admin( $this->get_idx_user_handler(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );


	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 *
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new Idx_User_Handler_Public( $this->get_idx_user_handler(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$this->loader->add_action( 'init', $plugin_public, 'register_shortcodes' );

		$this->loader->add_action( 'init', $plugin_public, 'idx_process_login' );
		$this->loader->add_action( 'init', $plugin_public, 'idx_process_registration' );
		$this->loader->add_action( 'init', $plugin_public, 'idx_process_password_recover' );
		$this->loader->add_action( 'init', $plugin_public, 'idx_process_password_change' );


		//verification email
		$this->loader->add_action( 'init', $plugin_public, 'my_init' );
	}


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 *
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 *
	 * @return    string    The name of the plugin.
	 */
	public function get_idx_user_handler() {
		return $this->idx_user_handler;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 *
	 * @return    Idx_User_Handler_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 *
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
