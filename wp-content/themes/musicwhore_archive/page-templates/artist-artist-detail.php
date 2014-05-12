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
	<li><a href="/album/<?php echo $album->album_id; ?>/"><?php echo $album->album_title; ?></a></li>
	<?php endforeach; ?>
</ul>

<?php endif; ?>