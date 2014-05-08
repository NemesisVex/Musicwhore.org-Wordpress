<?php

/**
 * Plugin Name: Musicwhore.org Artist Connector
 * Plugin URI: http://archive.musicwhore.org
 * Description: This custom plugin connects the Musicwhore.org artist directory with content imported from Movable Type
 * Version: 0.01
 * Author: Greg Bueno
 * Author URI: http://vigilantmedia.com
 * License: MIT
 */
if (!class_exists('Musicwhore_Artist_Connector')) {

	class Musicwhore_Artist_Connector {

		public function __construct() {
			add_action('admin_init', array(&$this, 'admin_init'));
			add_action('admin_menu', array(&$this, 'add_menu'));

			$plugin = plugin_basename(__FILE__);
			add_filter("plugin_action_links_$plugin", array($this, 'plugin_settings_link'));
		}

		public function admin_init() {
			register_setting('musicwhore_artist_connector-group', 'musicwhore_db_host');
			register_setting('musicwhore_artist_connector-group', 'musicwhore_db_name');
			register_setting('musicwhore_artist_connector-group', 'musicwhore_db_user');
			register_setting('musicwhore_artist_connector-group', 'musicwhore_db_password');

			add_settings_section('musicwhore_artist_connector-section', 'Musicwhore Artist Connector', array(&$this, 'settings_section'), 'musicwhore-artist-connector');

			add_settings_field('musicwhore_artist_connector-db_host', 'Database host', array(&$this, 'settings_input_text_field'), 'musicwhore-artist-connector', 'musicwhore_artist_connector-section', array('field' => 'musicwhore_db_host'));
			add_settings_field('musicwhore_artist_connector-db_name', 'Database name', array(&$this, 'settings_input_text_field'), 'musicwhore-artist-connector', 'musicwhore_artist_connector-section', array('field' => 'musicwhore_db_name'));
			add_settings_field('musicwhore_artist_connector-db_user', 'Database user', array(&$this, 'settings_input_text_field'), 'musicwhore-artist-connector', 'musicwhore_artist_connector-section', array('field' => 'musicwhore_db_user'));
			add_settings_field('musicwhore_artist_connector-db_password', 'Database password', array(&$this, 'settings_input_password_field'), 'musicwhore-artist-connector', 'musicwhore_artist_connector-section', array('field' => 'musicwhore_db_password'));
		}

		public function settings_section() {
			echo "Connection settings for the Musicwhore.org artist database";
		}

		public function settings_input_text_field($args) {
			$field = $args['field'];
			$value = get_option($field);
			echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
		}

		public function settings_input_password_field($args) {
			$field = $args['field'];
			$value = get_option($field);
			echo sprintf('<input type="password" name="%s" id="%s" value="%s" />', $field, $field, $value);
		}

		public function add_menu() {
			add_options_page('Musicwhore Artist Connector Settings', 'Musicwhore Artist Connector', 'manage_options', 'musicwhore_artist_connector', array(&$this, 'connector_settings_page'));
		}

		public function connector_settings_page() {
			if (!current_user_can('manage_options')) {
				wp_die('You do not have sufficient permissions to access this page.');
			}

			include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
		}

		public function plugin_settings_link($links) {
			$settings_link = '<a href="options-general.php?page=musicwhore_artist_connector">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}

		public static function activate() {
			
		}

		public static function deactivate() {
			
		}
		
		public static function install() {
		}
	}

}

if (class_exists('Musicwhore_Artist_Connector')) {
	register_activation_hook(__FILE__, array('Musicwhore_Artist_Connector', 'activate'));
	register_deactivation_hook(__FILE__, array('Musicwhore_Artist_Connector', 'deactivate'));

	$mw_artist_connector = new Musicwhore_Artist_Connector();
	
	$mw_db_version = '0.01';
}
