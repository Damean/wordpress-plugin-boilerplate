<?php

/**
 * @wordpress-plugin
 * Plugin Name:       plugin-boilerplate
 * Plugin URI:        https://ventusinteractive.com/
 * Description:       This plugin adds extra components to be used by the theme
 * Version:           1.0.0
 * Author:            Manuel Abarca
 * Author URI:        https://twitter.com/DameanDaemon
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-boilerplate
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

function plugin_boilerplate_activate_plugin() {
  require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-activator.php';
  $activator = new Class_Plugin_Activator();
  $activator->activate();
}

function plugin_boilerplate_deactivate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-deactivator.php';
  $deactivator = new Class_Plugin_Deactivator();
  $deactivator->deactivate();
}

register_activation_hook( __FILE__, 'plugin_boilerplate_activate_plugin' );
register_deactivation_hook( __FILE__, 'plugin_boilerplate_deactivate_plugin' );

function run_plugin() {
  require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-main.php';

  $version = '1.1.0';
	$plugin_name = 'boilerplate';

	$plugin = new Class_Plugin_Main( $version, $plugin_name );
	$plugin->run();

}
run_plugin();
