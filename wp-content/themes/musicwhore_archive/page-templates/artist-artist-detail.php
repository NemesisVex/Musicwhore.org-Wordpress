<?php

usort($artist->albums, function ($a, $b) {
	return $a->album_format == $b->album_format ?
			($a->album_release_date == $b->album_release_date ? 0 : ($a->album_release_date > $b->album_release_date ? -1 : 1)  )
		: ($a->album_format < $b->album_format ? -1 : 1);
});

?>

<h3><?php echo !empty($artist->artist_asian_name_utf8) ? $artist->artist_asian_name_utf8 : $artist->artist_display_name; ?></h3>

<?php
if (!empty($artist->artist_biography)):
?>
<h4>Biography</h4>

<?php
	echo wpautop($artist->artist_biography);
	echo wpautop($artist->artist_biography_more);
endif;
?>

<?php if (!empty($artist->albums)): ?>
<h4>Discography</h4>

<ul>
	<?php foreach ($artist->albums as $album): ?>
	<li>
		<a href="/album/<?php echo $album->album_id; ?>/"><?php echo $album->album_title; ?></a>
	</li>
	<?php endforeach; ?>
</ul>

<?php endif; ?>

<?php if (!empty($artist_entries->posts)): ?>
<h4>Posts</h4>

<ul>
	<?php foreach ($artist_entries->posts as $post): ?>
	<li><a href="<?php echo get_permalink($post->ID);?>"><?php echo $post->post_title; ?></a></li>
	<?php endforeach; ?>
</ul>

<?php endif; ?>
