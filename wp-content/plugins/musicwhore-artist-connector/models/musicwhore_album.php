<?php

/**
 * Musicwhore_Album
 *
 * @author Greg Bueno
 */

if (!class_exists('Musicwhore_Album')) {
	require_once(plugin_dir_path(__FILE__) . 'musicwhore_model.php');
	
	class Musicwhore_Album extends Musicwhore_Model {
		
		public function __construct() {
			parent::__construct();
			$this->load_relationship( array( 'model' => 'Musicwhore_Artist', 'alias' => 'artist') );
		}
		
		public function get_artist_albums($artist_id) {
			$albums = $this->mw_db->get_results( $this->mw_db->prepare( 'select * from mw_albums where album_artist_id = %d', $artist_id ) );
			return $albums;
		}
		
		public function get_album($album_id) {
			$album = $this->mw_db->get_row( $this->mw_db->prepare( 'select * from mw_albums where album_id = %d', $album_id ) );
			return $album;
		}
		
	}
}

