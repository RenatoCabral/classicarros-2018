<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       http://idx.is
 * @since      1.0.0
 *
 * @package    Idx_User_Handler
 * @subpackage Idx_User_Handler/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Idx_User_Handler
 * @subpackage Idx_User_Handler/admin
 * @author     Bruno Rodrigues <bruno@idx.is>
 */
class Idx_User_Handler_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $idx_user_handler    The ID of this plugin.
	 */
	private $idx_user_handler;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $idx_user_handler       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $idx_user_handler, $version ) {

		$this->idx_user_handler = $idx_user_handler;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Idx_User_Handler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Idx_User_Handler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->idx_user_handler, plugin_dir_url( __FILE__ ) . 'css/idx-user-handler-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Idx_User_Handler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Idx_User_Handler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->idx_user_handler, plugin_dir_url( __FILE__ ) . 'js/idx-user-handler-admin.js', array( 'jquery' ), $this->version, false );

	}


}
