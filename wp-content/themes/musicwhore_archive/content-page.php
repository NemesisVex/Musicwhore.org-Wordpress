<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage MusicwhoreArchive
 * @since MusicwhoreArchive 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Page thumbnail and title.
		musicwhorearchive_post_thumbnail();
		the_title( '<header class="entry-header"><h2 class="entry-title">', '</h2></header><!-- .entry-header -->' );
	?>

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'musicwhorearchive' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'musicwhorearchive' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
