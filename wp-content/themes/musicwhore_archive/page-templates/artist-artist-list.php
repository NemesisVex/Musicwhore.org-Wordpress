<h3>Browse<?php if (!empty($browse_filter)): ?>: <?php echo strtoupper($browse_filter); ?><?php endif;?></h3>

<?php if (!empty($artists)): ?>
<ul>
	<?php foreach ($artists as $a => $an_artist): ?>
	<li><a href="/artist/<?php echo $an_artist->artist_id; ?>/"><?php echo (!empty($an_artist->artist_asian_name_utf8)) ? $an_artist->artist_asian_name_utf8 . ' (' . $an_artist->artist_display_name  . ')' : $an_artist->artist_display_name; ?></a></li>
	<?php endforeach; ?>
</ul>
<?php else: ?>
<p>No artists are available to browse.</p>
<?php endif; ?>
