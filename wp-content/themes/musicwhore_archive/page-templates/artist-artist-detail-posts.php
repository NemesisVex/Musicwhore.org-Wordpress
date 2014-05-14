<h3><?php echo musicwhorearchive_display_artist_name($artist); ?></h3>

<?php include(plugin_dir_path(__FILE__) . 'artist-artist-detail-nav.php'); ?>

<h4>Posts</h4>

<?php
$artist_entries = new WP_Query('post_type=post&meta_key=_mw_artist_id&meta_value=' . $filter . '&order=DESC');
if ($artist_entries->have_posts()):
	while ($artist_entries->have_posts()):
		$artist_entries->the_post();
		get_template_part('content');
	endwhile;
endif;
?>
