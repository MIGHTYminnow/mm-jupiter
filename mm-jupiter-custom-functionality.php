<?php
/**
 * Plugin Name: Mm Jupiter Custom Functionality
 * Description: Custom functionality for Jupiter Theme.
 * Version: 1.0.3
 * Author: MIGHTYminnow Web Studio
 * Author URI: http://mightyminnow.com
 */

define( 'MMJ_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MMJ_PLUGIN_INCLUDES_PATH', MMJ_PLUGIN_PATH . 'includes/' );
define( 'MMJ_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'MMJ_PLUGIN_VERSION', '1.0.3' );

// Include our helper functions.
require_once MMJ_PLUGIN_PATH . 'functions.php';
require_once MMJ_PLUGIN_PATH . 'options.php';

add_action( 'wp_enqueue_scripts', 'mmj_enqueue_scripts' );
/**
 * Enqueue our JS on front-end pages.
 */
function mmj_enqueue_scripts() {

	$disable_tab = get_option( 'disable_tab' );
	$link_option = get_option( 'link_styling' );
	$external_links = get_option( 'external_links' );

	wp_enqueue_script(
		'mmj-custom-js',
		MMJ_PLUGIN_URL . '/js/mmj-custom.js',
		array( 'jquery' ),
		MMJ_PLUGIN_VERSION,
		true
	);

	wp_enqueue_style(
		'mmj-style',
		MMJ_PLUGIN_URL . '/css/mmj-custom.css'
	);

	// Enqueue superfish if option if set in options.
	if( empty( $disable_tab ) ) {
		// Register the Superfish CSS and JavaScript.
		wp_enqueue_style(
			'superfish-style',
			MMJ_PLUGIN_URL . '/css/superfish.css'
		);

		wp_enqueue_script(
			'hoverintent',
			MMJ_PLUGIN_URL . '/js/hoverIntent.js',
			array(),
			MMJ_PLUGIN_VERSION,
			true
		);

		wp_enqueue_script(
			'supersubs',
			MMJ_PLUGIN_URL . '/js/supersubs.js',
			array(),
			MMJ_PLUGIN_VERSION,
			true
		);

		wp_enqueue_script(
			'superfish',
			MMJ_PLUGIN_URL . '/js/superfish.js',
			array(),
			MMJ_PLUGIN_VERSION,
			true
		);

		wp_enqueue_script(
			'superfish-config',
			MMJ_PLUGIN_URL . '/js/superfishconfig.js',
			array(),
			MMJ_PLUGIN_VERSION,
			true
		);
	}

	// Enqueue custom link icons if set in options.
	if( ! empty( $link_option ) ) {
		wp_enqueue_script(
			'mmj-custom-link-icons',
			MMJ_PLUGIN_URL . '/js/linkIcons.js',
			array(),
			MMJ_PLUGIN_VERSION,
			true
		);
	}

	// Open links in new tab if set in options.
	if( empty( $external_links ) ) {
		wp_enqueue_script(
			'mmj-external-links',
			MMJ_PLUGIN_URL . '/js/externalLinks.js',
			array(),
			MMJ_PLUGIN_VERSION,
			true
		);
	}
}

//Activation Hook - Confirm site is using Jupiter.
register_activation_hook( __FILE__, 'mmj_activation_hook' );
function mmj_activation_hook() {

	if ( 'jupiter' != basename( TEMPLATEPATH ) ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		wp_die( 'Sorry, you can&rsquo;t activate unless you have installed Jupiter' );
	}
}

//Disables plugin if another theme is activated.
add_action('after_switch_theme','mmj_disable_plugins');
function mmj_disable_plugins() {
	$theme = wp_get_theme();
	if ('jupiter' !== $theme->name || 'jupiter' !== $theme->parent_theme) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
	}
}

// Make WCSSC compatible with Jupiter 
add_action( 'wp_loaded', 'mmj_widget_css_classes_frontend_hook' );

function mmj_widget_css_classes_frontend_hook() {
	if ( ! is_admin() && class_exists( 'WCSSC' ) ) {
		remove_filter( 'dynamic_sidebar_params', array( 'WCSSC', 'add_widget_classes' ) );
		add_filter( 'dynamic_sidebar_params', array( 'WCSSC', 'add_widget_classes' ), 8 );
	}
}
