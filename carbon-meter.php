<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://robmigchels.com/
 * @since             1.0.0
 * @package           Carbon_Meter
 *
 * @wordpress-plugin
 * Plugin Name:       Carbon Meter
 * Plugin URI:        https://robmigchels.com/carbon-meter/
 * Description:       Log and display how much carbon your website actually uses, powered by websitecarbon.com.
 * Version:           1.0.0
 * Author:            Rob Migchels
 * Author URI:        https://robmigchels.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       carbon-meter
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
define( 'CARBON_METER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-carbon-meter-activator.php
 */
function activate_carbon_meter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-carbon-meter-activator.php';
	Carbon_Meter_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-carbon-meter-deactivator.php
 */
function deactivate_carbon_meter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-carbon-meter-deactivator.php';
	Carbon_Meter_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_carbon_meter' );
register_deactivation_hook( __FILE__, 'deactivate_carbon_meter' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-carbon-meter.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_carbon_meter() {

	$plugin = new Carbon_Meter();
	$plugin->run();

}
run_carbon_meter();
