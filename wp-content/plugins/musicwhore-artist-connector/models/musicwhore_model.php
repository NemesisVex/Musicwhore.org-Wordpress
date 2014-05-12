<?php

/**
 * Musicwhore_Model
 *
 * @author Greg Bueno
 */



if (!class_exists('Musicwhore_Model')) {
	
	class Musicwhore_Model {
		protected $mw_db;
		
		public function __construct() {
			require_once(plugin_dir_path(__FILE__) . '../musicwhore_artist_connector_db_driver.php');
			$driver = new Musicwhore_Artist_Connector_Db_Driver();
			$this->mw_db = $driver->get_driver();
		}
		
		public function load_relationship($args) {
			
			$model = null;
			if (is_array($args)) {
				$model = $args['model'];
				$alias = $args['alias'];
			} else {
				$model = $alias = $args;
			}
			
			include(plugin_dir_path(__FILE__) . strtolower($model) . '.php');
			$this->{$alias} = new $model();
		}
	}
	
}

