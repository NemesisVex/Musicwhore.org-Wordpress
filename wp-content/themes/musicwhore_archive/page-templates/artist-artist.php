<?php

if (!empty($filter)):
	$artist = get_artist($filter);
	$artist_entries = new WP_Query('post_type=post&meta_key=_mw_artist_id&meta_value=' . $filter . '&order=DESC');
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
	include(plugin_dir_path(__FILE__) . 'artist-artist-detail.php');
elseif (!empty($artists)):
	include(plugin_dir_path(__FILE__) . 'artist-artist-list.php');
endif;
?>
