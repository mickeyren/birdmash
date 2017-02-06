<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://programmingmind.com
 * @since             1.0.0
 * @package           Birdmash
 *
 * @wordpress-plugin
 * Plugin Name:       Birdmash
 * Description:       Twitter mashup widget. Simply provide usernames separated by comma.
 * Version:           1.0.0
 * Author:            David Ang
 * Author URI:        https://programmingmind.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       birdmash
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-birdmash-activator.php
 */
function activate_birdmash() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-birdmash-activator.php';
	Birdmash_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-birdmash-deactivator.php
 */
function deactivate_birdmash() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-birdmash-deactivator.php';
	Birdmash_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_birdmash' );
register_deactivation_hook( __FILE__, 'deactivate_birdmash' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-birdmash.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_birdmash() {

	$plugin = new Birdmash();
	$plugin->run();

}
run_birdmash();
