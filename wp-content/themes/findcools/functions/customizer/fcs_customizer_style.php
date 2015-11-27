<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
function findcools_customizer_css() {
    ?>
    <style type="text/css">
	
		#logo { padding-top:<?php echo get_theme_mod( 'fcs_header_padding_top' ); ?>px; padding-bottom:<?php echo get_theme_mod( 'fcs_header_padding_bottom' ); ?>px; }
		
		
		<?php if(get_theme_mod( 'fcs_topbar_bg' )) : ?>#top-bar, .slicknav_menu { background:<?php echo esc_html (get_theme_mod( 'fcs_topbar_bg' )); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'fcs_topbar_nav_color' )) : ?>#nav-wrapper .menu li a{ color:<?php echo esc_html (get_theme_mod( 'fcs_topbar_nav_color' )); ?>; }<?php endif; ?>
		#nav-wrapper .menu li a:hover {  color:<?php echo esc_html (get_theme_mod( 'fcs_topbar_nav_color_hover' )); ?>; }
		
		#nav-wrapper .menu .sub-menu, #nav-wrapper .menu .children { background: <?php echo esc_html (get_theme_mod( 'fcs_drop_bg' )); ?>; }
		#nav-wrapper ul.menu ul a, #nav-wrapper .menu ul ul a { <?php if(get_theme_mod( 'fcs_drop_border' )) : ?>border-top: 1px solid <?php echo esc_html (get_theme_mod( 'fcs_drop_border' )); ?>;<?php endif; ?> color:<?php echo esc_html (get_theme_mod( 'fcs_drop_text_color' )); ?>; }
		#nav-wrapper ul.menu ul a:hover, #nav-wrapper .menu ul ul a:hover { color: <?php echo esc_html (get_theme_mod( 'fcs_drop_text_hover_color' )); ?>; background:<?php echo esc_html (get_theme_mod( 'fcs_drop_text_hover_bg' )); ?>; }
		
		.slicknav_nav { background:<?php echo esc_html (get_theme_mod( 'fcs_mobile_bg' )); ?>; }
		.slicknav_nav a { color:<?php echo esc_html (get_theme_mod( 'fcs_mobile_text' )); ?>; }
		.slicknav_menu .slicknav_icon-bar { background-color:<?php echo esc_html (get_theme_mod( 'fcs_mobile_icon' )); ?>; }
		
		#top-social a { color:<?php echo esc_html (get_theme_mod( 'fcs_topbar_social_color' )); ?>; }
		#top-social a:hover { color:<?php echo esc_html (get_theme_mod( 'fcs_topbar_social_color_hover' )); ?>; }
		#top-search i { color:<?php echo esc_html (get_theme_mod( 'fcs_topbar_search_magnify' )); ?>; }
		
		.widget-title { background: <?php echo esc_html (get_theme_mod( 'fcs_sidebar_title_bg' )); ?>; color: <?php echo esc_html (get_theme_mod( 'fcs_sidebar_title_text' )); ?>;}
		.widget-title:after { border-top-color:<?php echo esc_html (get_theme_mod( 'fcs_sidebar_title_bg' )); ?>; }
		.social-widget a { color:<?php echo esc_html (get_theme_mod( 'fcs_sidebar_social_icon' )); ?>; }
		.social-widget a:hover { color:<?php echo esc_html (get_theme_mod( 'fcs_sidebar_social_icon_hover' )); ?>; }
		
		#footer { background:<?php echo esc_html (get_theme_mod( 'fcs_footer_bg' )); ?>; }
		#footer-social a { color:<?php echo esc_html (get_theme_mod( 'fcs_footer_social' )); ?>; }
		#footer-social a:hover { color:<?php echo esc_html (get_theme_mod( 'fcs_footer_social_hover' )); ?>; }
		#footer-social { border-color:<?php echo esc_html (get_theme_mod( 'fcs_footer_social_line' )); ?>; }
		.copyright { color:<?php echo esc_html (get_theme_mod( 'fcs_footer_copyright_color' )); ?>; }
		.copyright a { color:<?php echo esc_html (get_theme_mod( 'fcs_footer_copyright_link' )); ?>; }
		
		.post-header h2 a, .post-header h1 { color:<?php echo esc_html (get_theme_mod( 'fcs_post_title' )); ?>; }
		.post-entry p { color:<?php echo esc_html (get_theme_mod( 'fcs_post_text' )); ?>; }
		.post-entry h1, .post-entry h2, .post-entry h3, .post-entry h4, .post-entry h5, .post-entry h6 { color:<?php echo esc_html (get_theme_mod( 'fcs_post_h' )); ?>; }
		.more-link { color:<?php echo esc_html (get_theme_mod( 'fcs_post_readmore_text' )); ?>; }
		a.more-link:hover { color:<?php echo esc_html (get_theme_mod( 'fcs_post_readmore_text_hover' )); ?>; }
		.more-line { color:<?php echo esc_html (get_theme_mod( 'fcs_post_readmore_line' )); ?>; }
		.more-link:hover > .more-line { color:<?php echo esc_html (get_theme_mod( 'fcs_post_readmore_line_hover' )); ?>; }
		.post-share-box.share-buttons a { color:<?php echo esc_html (get_theme_mod( 'fcs_post_share_color' )); ?>; }
		.post-share-box.share-buttons a:hover { color:<?php echo esc_html (get_theme_mod( 'fcs_post_share_color_hover' )); ?>; }
		
		.mc4wp-form { background:<?php echo esc_html (get_theme_mod( 'fcs_sidebar_newsletter_bg' )); ?>; }
		.mc4wp-form label { color:<?php echo esc_html (get_theme_mod( 'fcs_sidebar_newsletter_text' )); ?>; }
		.mc4wp-form button, .mc4wp-form input[type=button], .mc4wp-form input[type=submit] { background:<?php echo esc_html (get_theme_mod( 'fcs_sidebar_newsletter_button_bg' )); ?>; color:<?php echo esc_html (get_theme_mod( 'fcs_sidebar_newsletter_button_text' )); ?>; }
		.mc4wp-form button:hover, .mc4wp-form input[type=button]:hover, .mc4wp-form input[type=submit]:hover { background:<?php echo esc_html (get_theme_mod( 'fcs_sidebar_newsletter_button_bg_hover' )); ?>; color:<?php echo esc_html (get_theme_mod( 'fcs_sidebar_newsletter_button_text_hover' )); ?>; }
		
		a, .post-header .cat a { color:<?php echo esc_html (get_theme_mod( 'fcs_accent_color' )); ?>; }
		.post-header .cat a { border-color:<?php echo esc_html (get_theme_mod( 'fcs_accent_color' )); ?>; }
		
		<?php if(get_theme_mod( 'fcs_custom_css' )) : ?>
		<?php echo get_theme_mod( 'fcs_custom_css' ); ?>
		<?php endif; ?>
		
    </style>
    <?php
}
add_action( 'wp_head', 'findcools_customizer_css' );

?>