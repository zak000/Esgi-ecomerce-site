
<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="menu">
			<?php
				wp_nav_menu();
				wp_nav_menu( array( 'theme_location' => 'pastry-menu' ) ); // add pastry's menu
				if (is_active_sidebar('zone_widget_gauche')):
					dynamic_sidebar('zone_widget_gauche');
				endif;
			?>
		</div>
		<div id="content" class="site-content" role="main">
			<div id ="container1">
				<h3>Slideshow</h3>
			</div>

			<div id ="container2">
				<h3>Our last recipies</h3>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
	get_footer();