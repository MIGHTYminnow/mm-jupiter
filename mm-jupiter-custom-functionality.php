<?php
/**
 * Plugin Name: Mm Jupiter Custom Functionality
 * Description: Custom functionality for Jupiter Theme.
 * Version: 1.0.0
 * Author: MIGHTYminnow Web Studio
 * Author URI: http://mightyminnow.com
 */

define( 'MMJ_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MMJ_PLUGIN_INCLUDES_PATH', MMJ_PLUGIN_PATH . 'includes/' );
define( 'MMJ_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'MMJ_PLUGIN_VERSION', '1.0.0' );

// Include our helper functions.
require_once MMJ_PLUGIN_PATH . 'functions.php';


add_action( 'wp_enqueue_scripts', 'mmj_enqueue_scripts' );
/**
 * Enqueue our JS on front-end pages.
 */
function mmj_enqueue_scripts() {

	wp_enqueue_style(
		'mmj-style',
		MMJ_PLUGIN_URL . '/css/mmj-custom.css'
	);

	wp_enqueue_script(
		'mmj-custom-js',
		MMJ_PLUGIN_URL . '/js/mmj-custom.js',
		array( 'jquery' ),
		MMJ_PLUGIN_VERSION,
		true
	);
}