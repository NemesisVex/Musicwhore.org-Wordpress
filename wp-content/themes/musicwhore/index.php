<?php
	musicwhore_remap_mt();
	get_header();
?>

	<?php if ( is_archive() ) : ?>
<header>
	<h2>
		Archive: 
		<?php if ( is_date() ) : ?>
			<?php echo get_the_date('F Y'); ?>
		<?php elseif( is_author() ) : ?>
			<?php echo get_the_author(); ?>
		<?php elseif ( is_category() ) : ?>
			<?php echo single_cat_title( '', false ); ?>
		<?php elseif ( is_tag() ) : ?>
			<?php echo single_tag_title( '', false ); ?>
		<?php endif; ?>
	</h2>
</header>
	<?php endif; ?>
<?php if ( is_search()) : ?>
<header>
	<h2>
	Search results for: <?php echo get_search_query(); ?>
	</h2>
</header>
<?php endif; ?>

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
