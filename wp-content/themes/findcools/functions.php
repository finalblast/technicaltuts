<?php
//////////////////////////////////////////////////////////////////
// Set Content Width
//////////////////////////////////////////////////////////////////
if ( ! isset( $content_width ) )
	$content_width = 1080;
	
//////////////////////////////////////////////////////////////////
// Theme set up
//////////////////////////////////////////////////////////////////
add_action( 'after_setup_theme', 'findcools_theme_setup' );

if ( !function_exists('findcools_theme_setup') ) {

	function findcools_theme_setup() {
	
		// Register navigation menu
		register_nav_menus(
			array(
				'main-menu' => 'Primary Menu',
			)
		);
		
		// Localization support
		load_theme_textdomain('findcools', get_template_directory() . '/lang');
		
		// Featured image
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'findcools-full-thumb', 1080, 0, true );
		add_image_size( 'findcools-slider-thumb', 1080, 530, true );
		add_image_size( 'findcools-misc-thumb', 520, 400, true );
		
		// Feed Links
		add_theme_support( 'automatic-feed-links' );
		// Title Tag
		add_theme_support( 'title-tag' );    
	
	}

}

//////////////////////////////////////////////////////////////////
// Register & enqueue styles/scripts
//////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts','findcools_load_scripts' );

function findcools_load_scripts() {

	// Register scripts and styles
	wp_register_style('fcs_style', get_stylesheet_directory_uri() . '/style.css');
	wp_register_style('fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_register_style('bxslider-css', get_template_directory_uri() . '/css/jquery.bxslider.css');
	wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css');
	
	wp_register_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', 'jquery', '', true);
	wp_register_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', 'jquery', '', true);
	wp_register_script('fitvids', get_template_directory_uri() . '/js/fitvids.js', 'jquery', '', true);
	wp_register_script('fcs_scripts', get_template_directory_uri() . '/js/findcools.js', 'jquery', '', true);
	wp_register_script('fcs_sticky', get_template_directory_uri() . '/js/sticky-nav.js', 'jquery', '', true);
	
	// Enqueue scripts and styles
	wp_enqueue_style('fcs_style');
	wp_enqueue_style('fontawesome-css');
	wp_enqueue_style('bxslider-css');
	
	if(!get_theme_mod('fcs_responsive')) {
	wp_enqueue_style('responsive');
	}

	// Fonts
	wp_enqueue_style('default_body_font', '//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin,latin-ext');
	wp_enqueue_style('default_heading_font', '//fonts.googleapis.com/css?family=Montserrat:400,700');
	
	// JS
	wp_enqueue_script('jquery');
	wp_enqueue_script('slicknav');
	wp_enqueue_script('bxslider');
	wp_enqueue_script('fitvids');
	wp_enqueue_script('fcs_scripts');
	wp_enqueue_script('fcs_sticky');
	
	if (is_singular() && get_option('thread_comments'))	wp_enqueue_script('comment-reply');
	
}

//////////////////////////////////////////////////////////////////
// Include files
//////////////////////////////////////////////////////////////////

// Theme Options
include('functions/customizer/fcs_custom_controller.php');
include('functions/customizer/fcs_customizer_settings.php');
include('functions/customizer/fcs_customizer_style.php');

// Widgets

include("inc/widgets/social_widget.php");
include("inc/widgets/post_widget.php");
// Define url
define('fcs_theme_url','http://www.iwebdc.com/findcools/');

//////////////////////////////////////////////////////////////////
// Register widgets
//////////////////////////////////////////////////////////////////
function findcools_widgets_init() {
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
}
add_action( 'widgets_init', 'findcools_widgets_init' );

//////////////////////////////////////////////////////////////////
// COMMENTS LAYOUT
//////////////////////////////////////////////////////////////////

	function findcools_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			
			<div class="thecomment">
						
				<div class="author-img">
					<?php echo get_avatar($comment,$args['avatar_size']); ?>
				</div>
				
				<div class="comment-text">
					<span class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'findcools'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
						<?php edit_comment_link(__('Edit', 'findcools')); ?>
					</span>
					<h6 class="author"><?php echo get_comment_author_link(); ?></h6>
					<span class="date"><?php printf(__('%1$s at %2$s', 'findcools'), get_comment_date(),  get_comment_time()) ?></span>
					<?php if ($comment->comment_approved == '0') : ?>
						<em><i class="icon-info-sign"></i> <?php _e('Comment awaiting approval', 'findcools'); ?></em>
						<br />
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
						
			</div>
			
			
		</li>

		<?php 
	}
	
//////////////////////////////////////////////////////////////////
// PAGINATION
//////////////////////////////////////////////////////////////////
function findcools_pagination() {
	
	?>
	
	<div class="pagination">

		<div class="older"><?php next_posts_link(__( 'Older Posts <i class="fa fa-angle-double-right"></i>', 'findcools')); ?></div>
		<div class="newer"><?php previous_posts_link(__( '<i class="fa fa-angle-double-left"></i> Newer Posts', 'findcools')); ?></div>
		
	</div>
					
	<?php
	
}

//////////////////////////////////////////////////////////////////
// PREVENT SCROLL ON READ MORE LINK
//////////////////////////////////////////////////////////////////
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );


//////////////////////////////////////////////////////////////////
// TITLE TAG
//////////////////////////////////////////////////////////////////
function findcools_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'findcools' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'findcools_wp_title', 10, 2 );

//////////////////////////////////////////////////////////////////
// TWITTER AMPERSAND ENTITY DECODE
//////////////////////////////////////////////////////////////////
function findcools_social_title( $title ) {
    $title = html_entity_decode( $title );
    $title = urlencode( $title );
    return $title;
}

//////////////////////////////////////////////////////////////////
// THE EXCERPT
//////////////////////////////////////////////////////////////////
function custom_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function fcs_string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	
	if(count($words) > $word_limit) {
		array_pop($words);
	}
	
	return implode(' ', $words);
}
