<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Musicwhore2014
 * @since Musicwhore2014 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php musicwhore2014_post_thumbnail(); ?>

	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && musicwhore2014_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'musicwhore2014' ) ); ?></span>
		</div>
		<?php
			endif;

			if ( is_single() ) :
				the_title( '<h3 class="entry-title">', '</h1>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<ul class="list-inline">
			<?php
				if ( 'post' == get_post_type() )
					musicwhore2014_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
				<li><span class="glyphicon glyphicon-comment"></span> <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'musicwhore2014' ), __( '1 Comment', 'musicwhore2014' ), __( '% Comments', 'musicwhore2014' ) ); ?></span></li>
			<?php
				endif;

				edit_post_link( __( 'Edit', 'musicwhore2014' ), '<li><span class="glyphicon glyphicon-pencil"></span> <span class="edit-link">', '</span></li>' );
			?>
			</ul>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'musicwhore2014' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'musicwhore2014' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
