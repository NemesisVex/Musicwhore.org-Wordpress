<?php
/**
 * Template Name: Artist Page
 *
 * @package WordPress
 * @subpackage MusicwhoreArchive
 * @since Musicwhore2014 1.0
 */

$module = get_query_var('module');
$filter = get_query_var('filter');
$browse = get_query_var('browse');

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
get_sidebar();
get_footer();
