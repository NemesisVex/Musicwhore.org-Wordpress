<?php

if (!empty($filter)):
	$release = get_release($filter);
	$artist = $release->album->artist;
?>

<h2>Artists</h2>

<h3><?php echo musicwhorearchive_display_artist_name($artist); ?></h3>

<?php include(plugin_dir_path(__FILE__) . 'artist-artist-detail-nav.php'); ?>

<h4><?php echo $release->album->album_title; ?></h4>

<ul>
	<li>Catalog no.: <?php echo $release->release_catalog_num; ?></li>
	<li>Label: <?php echo $release->release_label; ?></li>
	<li>Format: <?php echo $release->release_format_alias; ?></li>
	<li>Release date: <?php echo date('Y-m-d', strtotime($release->release_release_date)); ?></li>
</ul>

<?php if (!empty($release->tracks)): ?>
<h5>Tracks</h5>

<ul>
	<?php foreach ($release->tracks as $track): ?>
	<li><?php echo $track->track_song_title; ?></li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php endif; ?>
