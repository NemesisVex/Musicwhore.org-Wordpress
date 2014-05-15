<?php

$filter = get_query_var('filter');
$browse = get_query_var('browse');
$section = get_query_var('section');

$artist = null;
$artists = null;
if (!empty($filter)):
	if (function_exists('get_artist')):
		$artist = get_artist($filter);
	endif;
elseif (!empty($browse)):
	$browse_filter = $browse == 'all' ? null : $browse;
	if (function_exists('get_all_artists')):
		$artists = get_all_artists($browse_filter);
	endif;
else:
	$browse_filter = 'a';
	if (function_exists('get_all_artists')):
		$artists = get_all_artists($browse_filter);
	endif;
endif;
?>

<h2>Artists</h2>

<?php
if (!empty($artist)):
	$section_path = plugin_dir_path(__FILE__) . 'artist-artist-detail';
	if (!empty($section)) { $section_path .= '-' . $section; }
	$section_path .= '.php';
	include($section_path);
elseif (!empty($artists)):
	include(plugin_dir_path(__FILE__) . 'artist-artist-list.php');
endif;
?>
