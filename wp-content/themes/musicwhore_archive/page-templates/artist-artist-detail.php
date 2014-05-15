<?php
$artist_image = null;
if (!empty($artist->artist_file_system)):
	$artist_image = musicwhorearchive_parse_artist_image($artist);
endif;
?>

<h3><?php echo musicwhorearchive_display_artist_name($artist); ?></h3>

<?php include(plugin_dir_path(__FILE__) . 'artist-artist-detail-nav.php'); ?>

<?php
if (!empty($artist->artist_biography)):
?>
<h4>Biography</h4>

	<?php if (!empty($artist_image['url'])): ?>
	<img src="<?php echo $artist_image['url']; ?>" align="right" alt="[<?php echo musicwhorearchive_display_artist_name($artist) ; ?>]" title="[<?php echo musicwhorearchive_display_artist_name($artist); ?>]" />
	<?php endif; ?>

	<?php echo wpautop($artist->artist_biography); ?>

	<?php if (!empty($artist->artist_biography_more)): ?>
<p><a href="/artist/bio/<?php echo $artist->artist_id; ?>/">More &raquo;</a></p>
	<?php endif; ?>
<?php endif; ?>

<?php
$artist_entries = new WP_Query('post_type=post&meta_key=_mw_artist_id&meta_value=' . $filter . '&order=DESC');

if (!empty($artist_entries->posts)):
?>
<h4>Posts</h4>

<ul>
	<?php foreach ($artist_entries->posts as $post): ?>
	<li>
		<div class="post-list-headline">
			<a href="<?php echo get_permalink($post->ID);?>"><?php echo $post->post_title; ?></a>
		</div>
		<div class="post-list-meta">
			&#8212; Posted on <?php echo $post->post_date; ?>
			<?php
			$post_categories = get_the_category($post->ID);
			if (!empty($post_categories)):
				$post_categories_output = array();
				foreach ($post_categories as $post_category):
					$post_categories_output[] = '<a href="/category/' . $post_category->slug  . '/">' . $post_category->cat_name . '</a>';
				endforeach;
				$post_categories_list = implode(", ", $post_categories_output);
			?>
			| File under: <?php echo $post_categories_list; ?>
			<?php
			endif;
			?>
		</div>
	</li>
	<?php endforeach; ?>
</ul>

<?php endif; ?>
