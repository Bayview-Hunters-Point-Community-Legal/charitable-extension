<?php
/**
 * Plugin Name: 		Charitable - Extension Connect
 * Plugin URI:
 * Description:
 * Version: 			0.2.1
 * Author: 				WP Charitable
 * Author URI: 			https://www.wpcharitable.com
 * Requires at least: 	4.2
 * Tested up to: 		4.7.2
 *
 * Text Domain: 		charitable-extension
 * Domain Path: 		/languages/
 *
 * @package 			Charitable Extension Connect
 * @category 			Core
 * @author 				Studio164a
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/**
 * Load plugin class, but only if Charitable is found and activated.
 *
 * @return 	void
 * @since 	0.1.0
 */
function charitable_extension_load() {

	/* Check for Charitable */
	if ( ! class_exists( 'Charitable' ) ) {

		if ( ! class_exists( 'Charitable_Extension_Activation' ) ) {

			require_once 'includes/class-charitable-extension-activation.php';

		}

		$activation = new Charitable_Extension_Activation( plugin_dir_path( __FILE__ ), basename( __FILE__ ) );
		$activation = $activation->run();

	} elseif ( 'divi' != strtolower( wp_get_theme()->get_template() ) ) {

		// require_once 'includes/admin/class-divi-theme-activation.php';

		// $activation = new Charitable_Extension_Theme_Activation( plugin_dir_path( __FILE__ ), basename( __FILE__ ) );
		// $activation = $activation->run();

		// Do nothing
		return;

	} else {

		require_once( 'includes/class-charitable-extension.php' );

		new Charitable_Extension( __FILE__ );

	}
}

add_action( 'plugins_loaded', 'charitable_extension_load', 1 );
