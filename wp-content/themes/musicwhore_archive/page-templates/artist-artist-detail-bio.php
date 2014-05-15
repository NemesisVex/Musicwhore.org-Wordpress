<?php
$artist_image = null;
if (!empty($artist->artist_file_system)):
	$artist_image = musicwhorearchive_parse_artist_image($artist);
endif;
?>

<h3><?php echo musicwhorearchive_display_artist_name($artist); ?></h3>

<?php include(plugin_dir_path(__FILE__) . 'artist-artist-detail-nav.php'); ?>

<h4>Biography</h4>

<?php if (!empty($artist_image['url'])): ?>
<img src="<?php echo $artist_image['url']; ?>" align="right" alt="[<?php echo musicwhorearchive_display_artist_name($artist) ; ?>]" title="[<?php echo musicwhorearchive_display_artist_name($artist); ?>]" />
<?php endif; ?>

<?php echo wpautop($artist->artist_biography); ?>
<?php echo wpautop($artist->artist_biography_more); ?>

<?php if (!empty($artist->artist_members)): ?>
<h5>Members</h5>

<ul>
	<?php foreach ($artist->artist_members as $member): ?>
	<li><?php echo $member->member_name; ?>: <?php echo $member->member_instruments; ?></li>
	<?php endforeach; ?>
</ul>

<?php endif; ?>
