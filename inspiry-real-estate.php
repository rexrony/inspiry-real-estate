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
 * Version:           1.2.0
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
 * Meta Boxes Stuff
 */

// Deactivate Meta Box Plugin and related extensions if Installed
add_action( 'init', function() {

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	// Meta Box Plugin
	if ( is_plugin_active( 'meta-box/meta-box.php' ) ) {
		deactivate_plugins( 'meta-box/meta-box.php' );
		add_action( 'admin_notices', function () {
			?>
			<div class="update-nag notice is-dismissible">
				<p><strong><?php _e( 'Meta Box plugin has been deactivated!', 'inspiry-real-estate' ); ?></strong></p>
				<p><?php _e( 'As now its functionality is embedded with in Inspiry Real Estate plugin.', 'inspiry-real-estate' ); ?></p>
				<p><em><?php _e( 'So, You should completely remove it from your plugins.', 'inspiry-real-estate' ); ?></em></p>
			</div>
			<?php
		} );
	}

	// Meta Box Columns Extension
	if ( is_plugin_active( 'meta-box-columns/meta-box-columns.php' ) ) {
		deactivate_plugins( 'meta-box-columns/meta-box-columns.php' );
		add_action( 'admin_notices', function () {
			?>
			<div class="update-nag notice is-dismissible">
				<p>
					<strong><?php _e( 'Meta Box Columns plugin has been deactivated!', 'inspiry-real-estate' ); ?></strong>
					&nbsp;<?php _e( 'As now its functionality is embedded with in Inspiry Real Estate plugin.', 'inspiry-real-estate' ); ?>
				</p>
				<p><em><?php _e( 'So, You should completely remove it from your plugins.', 'inspiry-real-estate' ); ?></em></p>
			</div>
			<?php
		} );
	}

	// Meta Box Tabs Extension
	if ( is_plugin_active( 'meta-box-tabs/meta-box-tabs.php' ) ) {
		deactivate_plugins( 'meta-box-tabs/meta-box-tabs.php' );
		add_action( 'admin_notices', function () {
			?>
			<div class="update-nag notice is-dismissible">
				<p>
					<strong><?php _e( 'Meta Box Tabs plugin has been deactivated!', 'inspiry-real-estate' ); ?></strong>
					&nbsp;<?php _e( 'As now its functionality is embedded with in Inspiry Real Estate plugin.', 'inspiry-real-estate' ); ?>
				</p>
				<p><em><?php _e( 'So, You should completely remove it from your plugins.', 'inspiry-real-estate' ); ?></em></p>
			</div>
			<?php
		} );
	}

	// Meta Box Show Hide Extension
	if ( is_plugin_active( 'meta-box-show-hide/meta-box-show-hide.php' ) ) {
		deactivate_plugins( 'meta-box-show-hide/meta-box-show-hide.php' );
		add_action( 'admin_notices', function () {
			?>
			<div class="update-nag notice is-dismissible">
				<p>
					<strong><?php _e( 'Meta Box Show Hide plugin has been deactivated!', 'inspiry-real-estate' ); ?></strong>
					&nbsp;<?php _e( 'As now its functionality is embedded with in Inspiry Real Estate plugin.', 'inspiry-real-estate' ); ?>
				</p>
				<p><em><?php _e( 'So, You should completely remove it from your plugins.', 'inspiry-real-estate' ); ?></em></p>
			</div>
			<?php
		} );
	}

	// Meta Box Group Extension
	if ( is_plugin_active( 'meta-box-group/meta-box-group.php' ) ) {
		deactivate_plugins( 'meta-box-group/meta-box-group.php' );
		add_action( 'admin_notices', function () {
			?>
			<div class="update-nag notice is-dismissible">
				<p>
					<strong><?php _e( 'Meta Box Group plugin has been deactivated!', 'inspiry-real-estate' ); ?></strong>
					&nbsp;<?php _e( 'As now its functionality is embedded with in Inspiry Real Estate plugin.', 'inspiry-real-estate' ); ?>
				</p>
				<p><em><?php _e( 'So, You should completely remove it from your plugins.', 'inspiry-real-estate' ); ?></em></p>
			</div>
			<?php
		} );
	}

} );

// Embedded meta box plugin
if ( ! class_exists( 'RWMB_Core' ) ) {
	require_once ( plugin_dir_path( __FILE__ ) . '/plugins/meta-box/meta-box.php' );
}

// Meta Box Plugin Extensions

// Columns extension
if ( !class_exists( 'RWMB_Columns' ) ) {
	require_once ( plugin_dir_path( __FILE__ ) . 'meta-box-extensions/meta-box-columns/meta-box-columns.php' );
}

// Show Hide extension
if ( !class_exists( 'RWMB_Show_Hide' ) ) {
	require_once ( plugin_dir_path( __FILE__ ) . 'meta-box-extensions/meta-box-show-hide/meta-box-show-hide.php' );
}

// Tabs extension
if ( !class_exists( 'RWMB_Tabs' ) ) {
	require_once ( plugin_dir_path( __FILE__ ) . 'meta-box-extensions/meta-box-tabs/meta-box-tabs.php' );               // tabs
}

// Group extension
if ( !class_exists( 'RWMB_Group' ) ) {
	require_once ( plugin_dir_path( __FILE__ ) . 'meta-box-extensions/meta-box-group/meta-box-group.php' );               // tabs
}
