<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Admin_Command_Palette
 *
 * @wordpress-plugin
 * Plugin Name:       Admin Command Palette
 * Plugin URI:        http://example.com/admin-command-palette-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Clark Nildek Powell
 * Author URI:        http://clarknikdelpowell.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       admin-command-palette
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-admin-command-palette-activator.php
 */
function activate_admin_command_palette() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-command-palette-activator.php';
	Admin_Command_Palette_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-admin-command-palette-deactivator.php
 */
function deactivate_admin_command_palette() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-command-palette-deactivator.php';
	Admin_Command_Palette_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_admin_command_palette' );
register_deactivation_hook( __FILE__, 'deactivate_admin_command_palette' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-admin-command-palette.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_admin_command_palette() {

	$plugin = new Admin_Command_Palette();
	$plugin->run();

}
run_admin_command_palette();
