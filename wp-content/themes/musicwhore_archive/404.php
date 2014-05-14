<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage MusicwhoreArchive
 * @since MusicwhoreArchive 1.0
 */

get_header(); ?>


	<div id="primary" class="content-area col-md-8">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h2 class="page-title"><?php _e( 'Not Found', 'musicwhorearchive' ); ?></h2>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'musicwhorearchive' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
