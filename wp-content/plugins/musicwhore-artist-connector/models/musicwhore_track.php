<?php

/**
 * Musicwhore_Track
 *
 * @author Greg Bueno
 */

if (!class_exists('Musicwhore_Track')) {
	require_once(plugin_dir_path(__FILE__). 'musicwhore_model.php');
	
	class Musicwhore_Track extends Musicwhore_Model {
		
		public $_table = 'mw_albums_tracks';
		public $_primary_key = 'track_id';
		
		public function __construct() {
			parent::__construct();
			$this->load_relationship( array( 'model' => 'Musicwhore_Release', 'alias' => 'release' ) );
		}
		
		public function get_release_tracks($release_id, $args = null) {
			if (empty($args['order_by'])) {
				$args['order_by'] = 'track_disc_num, track_track_num';
			}
			$tracks = $this->get_many_by('track_release_id', $release_id, $args);
			return $tracks;
		}
	}
}

