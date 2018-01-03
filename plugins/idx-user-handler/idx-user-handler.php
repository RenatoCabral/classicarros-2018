<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://idx.is
 * @since             1.0.0
 * @package           Idx_User_Handler
 *
 * @wordpress-plugin
 * Plugin Name:       IDX User Handler
 * Plugin URI:        http://idx.is
 * Description:       This plugins handles front-end user registration, login, lost passwords and profile edit.
 * Version:           1.0.0
 * Author:            Bruno Rodrigues
 * Author URI:        http://idx.is
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       idx-user-handler
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-idx-user-handler-activator.php
 */
function activate_idx_user_handler() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-idx-user-handler-activator.php';
	Idx_User_Handler_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-idx-user-handler-deactivator.php
 */
function deactivate_idx_user_handler() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-idx-user-handler-deactivator.php';
	Idx_User_Handler_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_idx_user_handler' );
register_deactivation_hook( __FILE__, 'deactivate_idx_user_handler' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-idx-user-handler.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_idx_user_handler() {

	$plugin = new Idx_User_Handler();
	$plugin->run();

}
run_idx_user_handler();
