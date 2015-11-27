<?php

	/* Template Name: Full Width Page with Slider */

?>
<?php get_header(); ?>
	
	<div class="container">
		
		<div id="content">
		
			<?php get_template_part('inc/featured/featured'); ?>
			
			
		
			<div id="main" class="fullwidth">
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php get_template_part('content', 'page'); ?>
						
				<?php endwhile; ?>
				
				<?php endif; ?>
				
			</div>

<?php get_footer(); ?>