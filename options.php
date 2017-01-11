<?php

// create custom plugin settings menu
add_action('admin_menu', 'mmj_add_settings_page');
add_action( 'admin_init', 'register_mmjsettings' );

/**
 * Create the plugin settings page.
 *
 * @since  1.0.0
 */
function mmj_add_settings_page() {
	add_options_page(
		'MIGHTYminnow Jupiter',
		'MIGHTYminnow Jupiter',
		'manage_options',
		'mmj_settings',
		'mmj_create_admin_page'
	);
}

function register_mmjsettings() {
	register_setting( 'mmjPluginPage', 'link_styling' );
	register_setting( 'mmjPluginPage', 'disable_tab' );
	register_setting( 'mmjPluginPage', 'external_links' );

	add_settings_section(
		'mmj_pluginPage',
		__( 'MIGHTYminnow Jupiter Settings' ),
		'mmj_options_section_callback',
		'mmjPluginPage'
	);
	add_settings_field(
		'link_styling_field',
		__( 'Add Icons to External Links?', 'mmj' ),
		'mmj_disable_link_styling_field_render',
		'mmjPluginPage',
		'mmj_pluginPage'
	);
	add_settings_field(
		'disable_keyboard_field',
		__( 'Disable Keyboard Accessible Menu?' ),
		'mmj_disable_keyboard_field_render',
		'mmjPluginPage',
		'mmj_pluginPage'
	);
	add_settings_field(
		'external_links_field',
		__( 'Open External Links In Same Tab?' ),
		'mmj_external_links_field_render',
		'mmjPluginPage',
		'mmj_pluginPage'
	);
}

function mmj_disable_link_styling_field_render() {
	$options = get_option( 'link_styling' );
	?>
	<input type="checkbox" name="link_styling" value="1" <?php checked( 1, $options['link_styling'] ); ?>/>
	<?php
}

function mmj_disable_keyboard_field_render() {
	$options = get_option( 'disable_tab' );
	?>
	<input type="checkbox" name="disable_tab" value="1" <?php checked( 1, $options['disable_tab'] ); ?>/>
	<?php
}

function mmj_external_links_field_render() {
	$options = get_option( 'external_links' );
	?>
	<input type="checkbox" name="external_links" value="1" <?php checked( 1, $options['external_links'] ); ?>/>
	<?php
}

/**
 * Output the plugin settings page contents.
 *
 * @since  1.0.0
 */
function mmj_create_admin_page() {
?>
	<div class="wrap">
		<h2><?php echo 'MIGHTYminnow Jupiter' ?></h2>
		<br>
		<p>
			<form id="pagination-number-form" method="post" action="options.php">
				<?php settings_fields( 'mmjPluginPage' ); ?>
				<?php do_settings_sections( 'mmjPluginPage' ); ?>
				<?php submit_button('Save Options' ); ?>
			</form>
		</p>
	</div>
<?php
}