<?php

/**
 * Musicwhore_Artist_Connector_Template_Functions
 *
 * @author Greg Bueno
 */

require_once(plugin_dir_path(__FILE__) . '/models/musicwhore_artist.php');
require_once(plugin_dir_path(__FILE__) . '/models/musicwhore_album.php');
require_once(plugin_dir_path(__FILE__) . '/models/musicwhore_release.php');
require_once(plugin_dir_path(__FILE__) . '/models/musicwhore_track.php');

if (!function_exists('get_all_artists')) {
	function get_all_artists($filter = null) {
		$model = new Musicwhore_Artist();
		$artists = $model->get_artists($filter);
		return $artists;
	}
}

if (!function_exists('get_artist')) {
	function get_artist($artist_id) {
		$model = new Musicwhore_Artist();
		$artist = $model->get_artist($artist_id);
		$artist->albums = get_artist_albums($artist_id);
		return $artist;
	}
}

if (!function_exists('get_artists_nav')) {
	function get_artists_nav() {
		$model = new Musicwhore_Artist();
		return $model->get_artists_nav();
	}
}

if (!function_exists('get_artist_albums')) {
	function get_artist_albums($artist_id) {
		$model = new Musicwhore_Album();
		$albums = $model->get_artist_albums($artist_id);
		return $albums;
	}
}

if (!function_exists('get_album')) {
	function get_album($album_id) {
		$model = new Musicwhore_Album();
		$album = $model->get_album($album_id);
		$album->artist = $model->artist->get_artist($album->album_artist_id);
		$album->releases = get_album_releases($album_id);
		return $album;
	}
}

if (!function_exists('get_album_releases')) {
	function get_album_releases($album_id) {
		$release = new Musicwhore_Release();
		return $release->get_album_releases($album_id);
	}
}

if (!function_exists('get_release')) {
	function get_release($release_id) {
		$model = new Musicwhore_Release();
		$release = $model->get_release($release_id);
		$release->album = $model->album->get_album($release->release_album_id);
		$release->album->artist = $model->album->artist->get_artist($release->album->album_artist_id);
		$release->tracks = get_release_tracks($release_id);
		return $release;
	}
}

if (!function_exists('get_release_tracks')) {
	function get_release_tracks($release_id) {
		$model = new Musicwhore_Track();
		$tracks = $model->get_release_tracks($release_id);
		return $tracks;
	}
}

if (!function_exists('get_track')) {
	function get_track($track_id) {
		$model = new Musicwhore_Track();
		$track = $model->get_track($track_id);
		$track->release = $model->release->get_release($track->track_release_id);
		$track->release->album = $model->release->album->get_album($track->release->release_album_id);
		$track->release->album->artist = $model->release->album->artist->get_artist($track->release->album->album_artist_id);
		return $track;
	}
}
