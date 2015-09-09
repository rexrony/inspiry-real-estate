<?php
/**
 *
 * @link              http://themeforest.net/user/InspiryThemes
 * @since             1.0.0
 * @package           Inspiry_Real_Estate
 *
 * @wordpress-plugin
 * Plugin Name:       Inspiry Real Estate
 * Plugin URI:        http://inspirythemes.com/
 * Description:       Inspiry real estate plugin provides property post type and agent post type with related functionality.
 * Version:           1.0.1
 * Author:            M Saqib Sarwar
 * Author URI:        http://themeforest.net/user/InspiryThemes
 * Text Domain:       inspiry-real-estate
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'INSPIRY_REAL_ESTATE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-inspiry-real-estate-activator.php
 */
function activate_inspiry_real_estate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-inspiry-real-estate-activator.php';
	Inspiry_Real_Estate_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-inspiry-real-estate-deactivator.php
 */
function deactivate_inspiry_real_estate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-inspiry-real-estate-deactivator.php';
	Inspiry_Real_Estate_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_inspiry_real_estate' );
register_deactivation_hook( __FILE__, 'deactivate_inspiry_real_estate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-inspiry-real-estate.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */

$inspiry_real_estate = Inspiry_Real_Estate::get_instance();
$inspiry_real_estate->run();

/*
 * Meta Box Extensions
 */
require_once ( plugin_dir_path( __FILE__ ) . 'meta-box-extensions/meta-box-columns/meta-box-columns.php' );         // columns
require_once ( plugin_dir_path( __FILE__ ) . 'meta-box-extensions/meta-box-show-hide/meta-box-show-hide.php' );     // show hid
require_once ( plugin_dir_path( __FILE__ ) . 'meta-box-extensions/meta-box-tabs/meta-box-tabs.php' );               // tabs
