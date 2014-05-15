<?php
/**
 * Template Name: Artist Page
 *
 * @package WordPress
 * @subpackage MusicwhoreArchive
 * @since MusicwhoreArchive 1.0
 */

$module = get_query_var('module');

get_header(); ?>

<div id="main-content" class="main-content col-md-8">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
			if (!empty($module)):
				include(plugin_dir_path(__FILE__) . '/artist-' . $module . '.php');
			else:
				include(plugin_dir_path(__FILE__) . '/artist-artist.php');
			endif;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar( 'content'); ?>
</div><!-- #main-content -->

<?php
get_sidebar( 'musicwhorearchive' );
get_footer();
