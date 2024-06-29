<?php
/**
 * Plugin Name: SkyView Dentistry Addon
 * Description: SkyView Dentistry Addon
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Iftekhar Rahman
 * Author URI:  https://iftekharrahman.com/
 * Text Domain: skyview-dentistry-addon
 * 
 * Elementor tested up to:     3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function skyview_dentistry_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Skyview_Dentistry_Addon\Plugin::instance();

}
add_action( 'plugins_loaded', 'skyview_dentistry_addon' );