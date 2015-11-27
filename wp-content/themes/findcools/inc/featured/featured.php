<div class="featured-area">
			
	<div class="sideslides">
	
		<div class="bxslider">
		
			<?php
				
				$featured_cat = get_theme_mod( 'fcs_featured_cat' );
				$get_featured_posts = get_theme_mod('fcs_featured_id');
				$number = get_theme_mod( 'fcs_featured_slider_slides' );
				
				if($get_featured_posts) {
					$featured_posts = explode(',', $get_featured_posts);
					$args = array( 'showposts' => $number, 'post_type' => array('post', 'page'), 'post__in' => $featured_posts, 'orderby' => 'post__in' );
				} else {
					$args = array( 'cat' => $featured_cat, 'showposts' => $number );
				}
				
			?>
			
			<?php wp_reset_postdata(); ?>
			
			<?php $feat_query = new WP_Query( $args ); ?>
		
			<?php if ($feat_query->have_posts()) : while ($feat_query->have_posts()) : $feat_query->the_post(); ?>
			
			<div class="feat-item" style="background-image:url(<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'findcools-slider-thumb' ); if(!$image) { echo get_template_directory_uri() . '/img/slider-default.png'; } else { echo $image[0]; } ?>);">
				
				<div class="feat-overlay">
					<div class="feat-inner">
						<span class="cat"><?php the_category(' '); ?></span>
						<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
						<span class="feat-title-divider"></span>
						<a href="<?php echo get_permalink(); ?>" class="feat-more"><?php _e( 'Read More', 'findcools' ); ?></a>
					</div>
				</div>
				
			</div>
			
			<?php endwhile; endif; ?>
			
		</div>
	
	</div>
	
</div>