<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
	<div class="post-header">
		
		<?php if(!get_theme_mod('fcs_post_cat')) : ?>
		<span class="cat"><?php the_category(' '); ?></span>
		<?php endif; ?>
		
		<?php if(is_single()) : ?>
			<h1><?php the_title(); ?></h1>
		<?php else : ?>
			<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>

		
	</div>
	
	<?php if(get_theme_mod('fcs_post_comment_link') && get_theme_mod('fcs_post_share') && get_theme_mod('fcs_post_share_author')) : else : ?>	
	<div class="post-share">
	
		<?php if(!get_theme_mod('fcs_post_date')) : ?>
		<div class="post-share-box postdate">
			<?php the_time( get_option('date_format') ); ?>
		</div>
		<?php endif; ?>
		
		<?php if(!get_theme_mod('fcs_post_comment_link')) : ?>
		<div class="post-share-box share-comments">
			<?php comments_popup_link( '<span>0</span> Comments', '<span>1</span> Comment', '<span>%</span> Comments', '', ''); ?>
		</div>
		<?php endif; ?>
		
		<?php if(!get_theme_mod('fcs_post_share')) : ?>
		<div class="post-share-box share-buttons">
			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
			<a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php print findcools_social_title( get_the_title() ); ?>%20-%20<?php echo urlencode(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
			<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
			<a data-pin-do="skipLink" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $pin_image; ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a>
			<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
		</div>
		<?php endif; ?>
		
		<?php if(!get_theme_mod('fcs_post_share_author')) : ?>
		<div class="post-share-box share-author">
			<span><?php _e( 'By', 'findcools' ); ?></span> <?php the_author_posts_link(); ?>
		</div>
		<?php endif; ?>
		
	</div>
	<?php endif; ?>
		
		<?php if(has_post_thumbnail()) : ?>
		<?php if(!get_theme_mod('fcs_post_thumb')) : ?>
		<div class="post-img">
			<?php if(is_single()) : ?>
				<?php the_post_thumbnail('findcools-full-thumb'); ?>
			<?php else : ?>
				<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('findcools-full-thumb'); ?></a>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php endif; ?>

	<div class="post-entry">
		
		<?php if(is_single()) : ?>
		
			<?php the_content(); ?>
			
		<?php else : ?>
		
			<?php if(get_theme_mod('fcs_post_summary') == 'excerpt') : ?>
				
				<p><?php echo fcs_string_limit_words(get_the_excerpt(), 80); ?>&hellip;</p>
				<p><a href="<?php echo get_permalink() ?>" class="more-link"><span class="more-button"><?php _e( 'Continue Reading', 'findcools' ); ?></span></a>
				
			<?php else : ?>
				
				<?php the_content(__('Continue Reading<span class="more-line"></span>', 'findcools')); ?>
				
			<?php endif; ?>
		
		<?php endif; ?>
		
		<?php wp_link_pages(); ?>
		
		<?php if(!get_theme_mod('fcs_post_tags')) : ?>
		<?php if(is_single()) : ?>
		<?php if(has_tag()) : ?>
			<div class="post-tags">
				<?php the_tags("",""); ?>
			</div>
		<?php endif; ?>	
		<?php endif; ?>
		<?php endif; ?>
		
	</div>
	
	<?php if(!get_theme_mod('fcs_post_author')) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/about_author'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(!get_theme_mod('fcs_post_related')) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/related_posts'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php comments_template( '', true );  ?>
	
</article>