<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage pastrytheme
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="cont_404" role="main">

			<header class="text-center">
				<h1 class="page-title"><?php _e( 'OOPPS.....' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="text-center">
					<h1><?php _e( 'PAGE INEXISTANTE :('); ?></h1>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>