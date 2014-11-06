<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">
						<span class="page-links-title">' . __( 'Pages:', 'pastrytheme' ) . '</span>',
					'after' => '</div>',
					'link_before' => '<span>',
					'link_after' => '</span>'
				)
			);
			edit_post_link( __( 'Edit', 'pastrytheme' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
