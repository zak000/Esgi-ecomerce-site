
<?php get_header(); ?>


<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		
		
		<div id="menu">
			
			<?php
				wp_nav_menu();
				if (is_active_sidebar('zone_widget_gauche')):
					dynamic_sidebar('zone_widget_gauche');
				endif;
			?>
		</div>
		
		
		<div id="content" class="site-content" role="main">
			<div id ="container3">
				
				<div id = "article-image">
					<?php the_post_thumbnail();?>
				</div>
				
			
				
				<div id="article-text">
						
				<?php
				
					if(have_posts()):
					
					    while (have_posts()): the_post();
					    ?>
					    <!--pour le sub menu-->
					  
					
					   
					   
					    <h2><a href="<?php the_permalink();?>">
						<?php the_title();?></a>
					    </h2>
					    
					    
				   <p><?php the_content();?></p>
 
					       
						<?php endwhile;
					       
						else:
						echo '<p>no contente</p>';
					    endif;
		
				?>
					
				</div>
				
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

	


<?php  get_footer(); ?>
