<div id="musicwhorearchive" class="col-md-3 col-md-offset-1">
	
	<?php
	$artists_nav = null;
	if (function_exists('get_artists_nav')):
		$artists_nav = get_artists_nav();
	endif;
	if (!empty($artists_nav)):
	?>
	<h3>Artist directory</h3>
	
	<ul class="list-inline">
		<?php foreach ($artists_nav as $artist_nav): ?>
		<li><a href="/artist/browse/<?php echo strtolower($artist_nav->nav); ?>/"><?php echo $artist_nav->nav; ?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php
	endif;
	?>

	<h3>Calendar</h3>

	<ul>
		<?php wp_get_archives(array('type' => 'yearly')); ?>
	</ul>

	<?php the_widget('WP_Widget_Categories', array('title' => __('Categories')), array('before_title' => '<h3>', 'after_title' => '</h3>')); ?>

	<?php the_widget('WP_Widget_Meta', array('title' => __('Meta')), array('before_title' => '<h3>', 'after_title' => '</h3>')); ?>
</div>