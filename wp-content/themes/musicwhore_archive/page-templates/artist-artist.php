<?php

if (!empty($filter)):
	$artist = get_artist($filter);
elseif (!empty($browse)):
	$browse_filter = $browse == 'all' ? null : $browse;
	$artists = get_all_artists($browse_filter);
else:
	$browse_filter = 'a';
	$artists = get_all_artists($browse_filter);
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
