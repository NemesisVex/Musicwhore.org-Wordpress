<h3><?php echo musicwhorearchive_display_artist_name($artist); ?></h3>

<?php include(plugin_dir_path(__FILE__) . 'artist-artist-detail-nav.php'); ?>

<h4>Biography</h4>

<?php echo wpautop($artist->artist_biography); ?>
<?php echo wpautop($artist->artist_biography_more); ?>
