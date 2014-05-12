<?php

/**
 * Musicwhore_Track
 *
 * @author Greg Bueno
 */

if (!class_exists('Musicwhore_Track')) {
	require_once(plugin_dir_path(__FILE__). 'musicwhore_model.php');
	
	class Musicwhore_Track extends Musicwhore_Model {
		
		public function __construct() {
			parent::__construct();
			$this->load_relationship( array( 'model' => 'Musicwhore_Release', 'alias' => 'release' ) );
		}
		
		public function get_release_tracks($release_id) {
			$tracks = $this->get_many_by('track_release_id', $release_id, $args);
			return $tracks;
		}
	}
}

