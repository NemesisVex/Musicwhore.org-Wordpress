<?php

/**
 * Musicwhore_Artist
 *
 * @author Greg Bueno
 */

if (!class_exists('Musicwhore_Artist')) {
	require_once(plugin_dir_path(__FILE__) . 'musicwhore_model.php');
	
	class Musicwhore_Artist extends Musicwhore_Model {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function get_artist($artist_id) {
			$artist = $this->mw_db->get_row( $this->mw_db->prepare( 'select * from mw_artists where artist_id = %d', $artist_id ) );
			$artist->artist_display_name = $this->format_artist_name($artist);
			return $artist;
		}
		
		public function get_artists($filter = null) {
			$query = 'select * from mw_artists';
			if (!empty($filter)) {
				$query = $this->mw_db->prepare( $query . " where artist_last_name like %s order by artist_last_name", like_escape($filter) . '%' );
			} else {
				$query .= ' order by artist_last_name';
			}
			
			$artists = $this->mw_db->get_results($query);
			$_this = $this;
			array_walk($artists, function ($artist) use ($_this) {
				$artist->artist_display_name = $_this->format_artist_name($artist);
			});
			
			return $artists;
		}
		
		public function get_artists_nav() {
			$nav = $this->mw_db->get_results( 'select upper(substring(artist_last_name from 1 for 1)) as nav from mw_artists group by nav order By nav' );
			return $nav;
		}
		
		private function format_artist_name($artist) {
			$artist_display_name = null;
			if (empty($artist->artist_first_name)) {
				$artist_display_name = $artist->artist_last_name;
			} else {
				$artist_display_name = (($artist->artist_settings_mask & 2) == 2) ? $artist->artist_last_name . ' '  .$artist->artist_first_name : $artist->artist_first_name . ' ' . $artist->artist_last_name;
			}
			
			return $artist_display_name;
		}
		
	}
}

