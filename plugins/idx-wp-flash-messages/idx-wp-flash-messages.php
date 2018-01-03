<?php

/**
 *
 * @link              http://idx.is
 * @since             1.0.0
 * @package           Idx_Wp_Flash_Messages
 *
 * @wordpress-plugin
 * Plugin Name:       WP Flash Messages
 * Plugin URI:        http://idx.is
 * Description:       Allow showing flash messages in WP Front end with twitter bootstrap classes.
 * Version:           1.0.0
 * Author:            Bruno Rodrigues
 * Author URI:        http://idx.is
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       idx-wp-flash-messages
 * Domain Path:       /languages
 */
class WP_Flash_Messages {

	const ERROR = 'alert alert-danger';
	const WARNING = 'alert alert-warning';
	const INFO = 'alert alert-info';
	const SUCCESS = 'alert alert-success';

	const OPTION_NAME = 'wp_flash_message';

	static function show() {
		$flash = get_option( self::OPTION_NAME, array() );
		if ( ! empty( $flash ) ) {
			echo "<div class=\"{$flash['type']}\">{$flash['message']}</div>";
			delete_option( self::OPTION_NAME );
		}
	}

	static function add( $message, $type = self::INFO ) {
		$flash[ 'message' ] = $message;
		$flash[ 'type' ]    = $type;
		update_option( self::OPTION_NAME, $flash );
	}

	static function print_message( $message, $type = WP_Flash_Messages::INFO ) {
		require_once 'partials/messages.php';
	}
}