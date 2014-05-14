<?php
if (!empty($filter)):
	$album = get_album($filter);
	$artist = $album->artist;
?>

<h2>Artists</h2>

<h3><?php echo musicwhorearchive_display_artist_name($artist); ?></h3>

<?php include(plugin_dir_path(__FILE__) . 'artist-artist-detail-nav.php'); ?>

<h4><?php echo $album->album_title; ?></h4>

<ul>
	<li>Format: <?php echo ucfirst($album->album_format); ?></li>
	<li>Label: <?php echo $album->album_label; ?></li>
	<li>Original release date: <?php echo date("Y-m-d", strtotime($album->album_release_date)); ?></li>
</ul>

<?php if (!empty($album->releases)): ?>
<h5>Releases</h5>

<ul>
<?php foreach($album->releases as $release): ?>
	<li>
		<div class="release-list-title">
			Catalog num: <a href="/release/<?php echo $release->release_id; ?>/"><?php echo !empty($release->release_catalog_num) ? $release->release_catalog_num : 'N/A'; ?></a>
		</div>
		<div class="release-list-meta">
		<ul class="list-inline">
			<li>Release date: <?php echo date('Y-m-d', strtotime($release->release_release_date)); ?></li>
			<li>Media: <?php echo $release->release_format_alias; ?></li>
		</ul>
		</div>
	</li>
<?php endforeach; ?>
</ul>
<?php endif;?>

<?php
$album_entries = new WP_Query('post_type=post&meta_key=_mw_album_id&meta_value=' . $filter . '&order=DESC');
if ($album_entries->have_posts()):
?>
<h5>Posts</h5>

<ul>
<?php
	while ($album_entries->have_posts()):
		$album_entries->the_post();
?>
	<li>
		<div class="entry-list-title">
			<a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
		</div>
		<div class="entry-list-meta">
			&#8212; Posted on <?php echo get_the_date(); ?>
		</div>
	</li>
<?php 
	endwhile;
endif;
?>
</ul>

<?php endif; ?>