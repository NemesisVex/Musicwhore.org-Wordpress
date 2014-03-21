				<article>
					<div class="entry-meta">
						<time pubdate="pubdate"><?php the_time( 'M d, Y' ); ?></time><br/>
						<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
							<?php comments_popup_link( __( 'Leave a comment', 'musicwhore' ), __( '1 Comment', 'musicwhore' ), __( '% Comments', 'musicwhore' ) ); ?><br/>
						<?php endif; ?>
						<?php if ( is_single() && ! is_page() ) : ?>
						By <a href="<?php echo esc_html(get_author_posts_url( get_the_author_meta( 'ID' ))); ?>"><?php echo esc_html(get_the_author()); ?></a><br/>
						<?php endif; ?>
						<?php the_category( ', ', 'multiple' ); ?><br/>
					</div>

					<div class="entry-content">

						<header>
							<h3 class="headline"><?php if ( is_single() || is_page() ) : ?>
					<?php the_title(); ?>
				<?php else : ?>
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'musicwhore' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				<?php endif; ?></h3>
						</header>

						<section class="entry-text">
							<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'musicwhore' ) . '</span>', 'after' => '</p>' ) ); ?>
							<?php the_content( __( 'More <span class="meta-nav">&raquo;</span>', 'chunk' ) ); ?>
							<?php comments_template( '', true ); ?>
						</section>

					</div>

				</article>
