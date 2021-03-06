<?php
	get_header(); ?>

	<div id="main-content" class="main-content">
		<?php
			if (is_active_sidebar('zone_widget_gauche'))
				dynamic_sidebar('zone_widget_gauche');
		?>
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					endwhile;
				?>

			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- #main-content -->

<?php
	get_footer();
