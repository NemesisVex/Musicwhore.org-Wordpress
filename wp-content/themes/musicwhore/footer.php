				<nav id="page-nav">
					<div id="page-nav-spacer">&nbsp;</div>
					<div id="page-nav-content">
				<?php echo previous_posts_link(); ?>
				<?php echo next_posts_link(); ?>
					</div>
				</nav>

				<footer>
					<div id="footer-spacer">&nbsp;</div>
					<div id="footer-content">
					&#169; <?php echo gmdate('Y'); ?> Greg Bueno
					</div>
				</footer>

			</div>

			<?php get_sidebar('footer');?>

		</div>

<?php wp_footer(); ?>

	</body>
</html>
