<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>

	<header id="header" <?php if(!get_theme_mod('fcs_featured_slider')) : ?>class="noslider"<?php endif; ?>>
		
		<div class="container">
			
			<div id="logo">
				
				<?php if(!get_theme_mod('fcs_logo')) : ?>
					
					<?php if(is_front_page()) : ?>
						<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
					<?php else : ?>
						<h2><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></h2>
					<?php endif; ?>
					
				<?php else : ?>
					
					<?php if(is_front_page()) : ?>
						<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url(get_theme_mod('fcs_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
					<?php else : ?>
						<h2><a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url(get_theme_mod('fcs_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></h2>
					<?php endif; ?>
					
				<?php endif; ?>
				<?php if(get_theme_mod('fcs_tagline_check')) : ?>
					<p class="logo_tagline"><?php bloginfo('description'); ?></p>
				<?php endif; ?>
				
			</div>
			
		</div>
		
	</header>

	<div id="top-bar">
		
		<div class="container">
			
			<div id="nav-wrapper">
				<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'main-menu', 'menu_class' => 'menu' ) ); ?>
			</div>
			
			<div class="menu-mobile"></div>
			
			<?php if(!get_theme_mod('fcs_topbar_search_check')) : ?>
			<div id="top-search">
				<a href="#" class="search"><i class="fa fa-search"></i></a>
				<div class="show-search">
					<?php get_search_form(); ?>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if(!get_theme_mod('fcs_topbar_social_check')) : ?>
			<div id="top-social" <?php if(get_theme_mod('fcs_topbar_search_check')) : ?>class="nosearch"<?php endif; ?>>
			
				<?php if(get_theme_mod('fcs_facebook')) : ?><a href="http://facebook.com/<?php echo esc_html(get_theme_mod('fcs_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_twitter')) : ?><a href="http://twitter.com/<?php echo esc_html(get_theme_mod('fcs_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_instagram')) : ?><a href="http://instagram.com/<?php echo esc_html(get_theme_mod('fcs_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_pinterest')) : ?><a href="http://pinterest.com/<?php echo esc_html(get_theme_mod('fcs_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_bloglovin')) : ?><a href="http://bloglovin.com/<?php echo esc_html(get_theme_mod('fcs_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_google')) : ?><a href="http://plus.google.com/<?php echo esc_html(get_theme_mod('fcs_google')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_tumblr')) : ?><a href="http://<?php echo esc_html(get_theme_mod('fcs_tumblr')); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_youtube')) : ?><a href="http://youtube.com/<?php echo esc_html(get_theme_mod('fcs_youtube')); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_dribbble')) : ?><a href="http://dribbble.com/<?php echo esc_html(get_theme_mod('fcs_dribbble')); ?>" target="_blank"><i class="fa fa-dribbble"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_soundcloud')) : ?><a href="http://soundcloud.com/<?php echo esc_html(get_theme_mod('fcs_soundcloud')); ?>" target="_blank"><i class="fa fa-soundcloud"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_vimeo')) : ?><a href="http://vimeo.com/<?php echo esc_html(get_theme_mod('fcs_vimeo')); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_linkedin')) : ?><a href="<?php echo esc_html(get_theme_mod('fcs_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
				<?php if(get_theme_mod('fcs_rss')) : ?><a href="<?php echo esc_url(get_theme_mod('fcs_rss')); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php endif; ?>
				
			</div>
			<?php endif ;?>
			
		</div>
		
	</div>