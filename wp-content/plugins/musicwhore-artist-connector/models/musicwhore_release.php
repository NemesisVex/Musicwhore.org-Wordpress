<?php

/**
 * Musicwhore_Release
 *
 * @author Greg Bueno
 */

if (!class_exists('Musicwhore_Release')) {
	require_once(plugin_dir_path(__FILE__) . 'musicwhore_model.php');
	
	class Musicwhore_Release extends Musicwhore_Model {
		
		public function __construct() {
			parent::__construct();
			$this->load_relationship( array( 'model' => 'Musicwhore_Album', 'alias' => 'album') );
		}
		
		public function get_album_releases($album_id) {
			$releases = $this->mw_db->get_results( $this->mw_db->prepare( 'select * from mw_albums_releases where release_album_id = %d', $album_id ) );
			return $releases;
		}
		
		public function get_release($release_id) {
			$release = $this->mw_db->get_row( $this->mw_db->prepare( 'select * from mw_albums_releases where release_id = %d', $release_id ) );
			return $release;
		}
	}
}

