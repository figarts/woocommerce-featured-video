<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://figarts.co
 * @since             1.0.0
 * @package           Woofv
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Featured Video
 * Plugin URI:        https://figarts.co
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            David Towoju
 * Author URI:        https://figarts.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woofv
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WOOFV_SLUG', 'woofv' );
define( 'WOOFV_PATH', plugin_dir_path( __FILE__ ) );
define( 'WOOFV_VERSION', '2.0.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'class-woofv-ctrl.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woofv() {

	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	$plugin = new Woofv_Ctrl();
	// $plugin->run();
}
add_action( 'plugins_loaded', 'run_woofv', 1 );
