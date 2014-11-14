<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area">

		<div id="menu">

			<?php
				wp_nav_menu();
				if ( is_active_sidebar('zone_widget_gauche') ):
					dynamic_sidebar('zone_widget_gauche');
				endif;
			?>
		</div>

		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				if ( have_posts() ):
					while ( have_posts() ) :
						// Iterate the post index in The Loop
						the_post();

						// Print the title
						the_title("<h2>" , "</h2>");

						// Print the content
						echo '<div id="the_post">';
						the_content();
						echo '</div>';

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

					endwhile;
				else:
					echo '<p>no content</p>';
				endif;
			?>
		</div>
		<!-- #content -->
	</div>
	<!-- #primary -->
</div><!-- #main-content -->




<?php get_footer(); ?>
