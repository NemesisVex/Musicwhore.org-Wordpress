<?php

/**
 * Musicwhore_Release
 *
 * @author Greg Bueno
 */

if (!class_exists('Musicwhore_Release')) {
	require_once(plugin_dir_path(__FILE__) . 'musicwhore_model.php');
	
	class Musicwhore_Release extends Musicwhore_Model {
		
		public $_table = 'mw_albums_releases';
		public $_primary_key = 'release_id';
		
		public function __construct() {
			parent::__construct();
			$this->load_relationship( array( 'model' => 'Musicwhore_Album', 'alias' => 'album') );
			$this->load_relationship( array( 'model' => 'Musicwhore_Release_Format', 'alias' => 'format' ) );
		}
		
		public function get($id, $args = null) {
			$release = parent::get($id, $args);
			if (!empty($release)) {
				$format = $this->format->get($release->release_format_id);
				$release->release_format_name = $format->format_name;
				$release->release_format_alias = $format->format_alias;
			}
			return $release;
		}
		
		public function get_album_releases($album_id) {
			$releases = $this->get_many_by('release_album_id', $album_id, $args);
			
			if (!empty($releases)) {
				$formats = $this->format->get_all();
				array_walk($releases, function ($release) use ($formats) {
					foreach ($formats as $format) {
						if ($format->format_id == $release->release_format_id) {
							$release->release_format_name = $format->format_name;
							$release->release_format_alias = $format->format_alias;
						}
					}
				});
			}
			
			return $releases;
		}
	}
}

