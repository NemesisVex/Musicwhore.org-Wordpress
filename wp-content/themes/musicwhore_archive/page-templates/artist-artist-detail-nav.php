<?php if (!empty($artist->artist_navigation_mask)): ?>

<ul class="list-inline">
	<li><a href="/artist/<?php echo $artist->artist_id; ?>/">Profile</a></li>
	<?php if (($artist->artist_navigation_mask & 2) == 2):?><li><a href="/artist/bio/<?php echo $artist->artist_id; ?>/">Biography</a></li><?php endif; ?>
	<?php if (($artist->artist_navigation_mask & 4) == 4):?><li><a href="/artist/albums/<?php echo $artist->artist_id; ?>/">Albums</a></li><?php endif; ?>
	<?php if (($artist->artist_navigation_mask & 32) == 32):?><li><a href="/artist/posts/<?php echo $artist->artist_id; ?>/">Posts</a></li><?php endif; ?>
	<?php /* if (($artist->artist_navigation_mask & 64) == 64):?><li><a href="/artist/posts/<?php echo $artist->artist_id; ?>/">Lyrics</a></li><?php endif; */ ?>
	<?php /* if (($artist->artist_navigation_mask & 128) == 128):?><li><a href="/artist/shop/<?php echo $artist->artist_id; ?>/">Shop</a></li><?php endif; */ ?>
</ul>
<?php endif; ?>
