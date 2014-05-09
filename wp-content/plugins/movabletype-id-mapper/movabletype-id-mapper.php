<?php
/*
Plugin Name: Movable Type ID Mapper
Plugin URI: http://vigilantmedia.com/index.php/projects/
Description: Movable Type ID Mapper looks up an entry from mt_entry by entry_id, then queries Wordpress for a corresponding entry by entry_basename.
Author: Greg Bueno
Version: 0.01
Author URI: http://vigilantmedia.com/
*/


if (!class_exists('Movabletype_Id_Mapper')) {
	class Movabletype_Id_Mapper {
		
		private $patterns;
		
		public function __construct() {
			global $_mt_id_mapper_patterns;
			
			$this->patterns = $_mt_id_mapper_patterns;
			
			// Initialize settings in the admin menu.
            add_action('admin_init', array(&$this, 'admin_init'));
        	add_action('admin_menu', array(&$this, 'add_menu'));
			
			add_action('init', array(&$this, 'remap_mt'));
		}
		
		public function remap_mt () {
			// Don't remap unless we encounter a path that doesn't exist.
			if (is_404() === true) {
				// Exit if no patterns are registered.
				
				// Extract the ID from the pattern.
				
				// Query Wordpress for the post name.
				
				// Redirect if there is a match.
			}
		}
		
		public function register_pattern($pattern) {
			Movabletype_Id_Mapper::$patterns[] = $pattern;
		}
		
		public function admin_init() {
			register_setting('mt_id_mapper-group', 'mt_db_host');
			
			add_settings_section('mt_id_mapper-db_section', 'Database Connection', array(&$this, 'settings_section'), 'mt_id_mapper');
			add_settings_field('mt_id_mapper-db_host', 'Database host', array(&$this, 'settings_input_text'), 'mt_id_mapper', 'mt_id_mapper-db_section', array( 'field' => 'mt_db_host' ));
			add_settings_field('mt_id_mapper-db_name', 'Database name', array(&$this, 'settings_input_text'), 'mt_id_mapper', 'mt_id_mapper-db_section', array( 'field' => 'mt_db_name' ));
			add_settings_field('mt_id_mapper-db_user', 'Database user', array(&$this, 'settings_input_text'), 'mt_id_mapper', 'mt_id_mapper-db_section', array( 'field' => 'mt_db_user' ));
			add_settings_field('mt_id_mapper-db_password', 'Database password', array(&$this, 'settings_input_password'), 'mt_id_mapper', 'mt_id_mapper-db_section', array( 'field' => 'mt_db_password' ));
		}
		
		public function settings_section() {
			echo "Configure how Wordpress connects to Movable Type.";
		}
		
		public function settings_input_text($args) {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
		}
		
		public function settings_input_password($args) {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<input type="password" name="%s" id="%s" value="%s" />', $field, $field, $value);
		}
		
		public function settings_page() {
        	if(!current_user_can('manage_options'))
        	{
        		wp_die(__('You do not have sufficient permissions to access this page.'));
        	}
	
        	// Render the settings template
        	include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
		}
		
		public function add_menu() {
            // Add a page to manage this plugin's settings
        	add_options_page(
        	    'Movable Type ID Mapper Settings', 
				'Movable Type ID Mapper', 
        	    'manage_options', 
        	    'mt_id_mapper', 
        	    array(&$this, 'settings_page')
        	);
		}
		
		public static function activate() {
			
		}
		
		public static function deactivate() {
			
		}
	}
}

if (class_exists('Movabletype_Id_Mapper')) {
	register_activation_hook(__FILE__, array('Movabletype_Id_Mapper', 'activate'));
	register_activation_hook(__FILE__, array('Movabletype_Id_Mapper', 'deactivate'));
	
	$mt_id_mapper = new Movabletype_Id_Mapper();
}

if (!function_exists('mt_id_mapper_register_pattern')) {
	$_mt_id_mapper_patterns = array();
	
	function mt_id_mapper_register_pattern($pattern) {
		global $_mt_id_mapper_patterns;
		
		if (is_array($pattern)) {
			foreach ($pattern as $one_pattern) {
				$_mt_id_mapper_patterns[] = $pattern;
			}
		} else {
			$_mt_id_mapper_patterns[] = $pattern;
		}
	}
}