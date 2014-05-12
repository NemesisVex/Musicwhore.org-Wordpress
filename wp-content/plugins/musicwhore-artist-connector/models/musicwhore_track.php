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
			$tracks = $this->mw_db->get_results( $this->mw_db->prepare( 'select * from mw_albums_tracks where track_release_id = %d', $release_id ) );
			return $tracks;
		}
		
		public function get_track($track_id) {
			$track = $this->mw_db->get_row( $this->mw_db->prepare( 'select * from mw_albums_tracks where track_id = %d', $track_id ) );
			return $track;
		}
	}
}

