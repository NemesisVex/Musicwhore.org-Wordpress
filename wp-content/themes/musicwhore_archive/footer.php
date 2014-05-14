<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage MusicwhoreArchive
 * @since MusicwhoreArchive 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer col-md-12" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
				<?php do_action( 'musicwhorearchive_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'musicwhorearchive' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'musicwhorearchive' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>