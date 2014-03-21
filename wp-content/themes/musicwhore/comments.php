						<section id="comments" class="comments">
							<?php if ( have_comments() ) : ?>
							<h4 class="comment-headline">Comments</h4>
							
							<ul class="comment-list">
								<?php wp_list_comments(); ?>
							</ul>
							<?php endif; ?>
							<?php comment_form(); ?>
						</section>
