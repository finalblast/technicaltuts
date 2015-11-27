<?php
/**
 * Findcools Customizer functionality
 *
 * @package findcools
 * @since findcools 1.0
 */
//////////////////////////////////////////////////////////////////
// Customizer - Add Custom Styling
//////////////////////////////////////////////////////////////////

function findcools_customizer_style()
{
	wp_enqueue_style('customizer-css', get_stylesheet_directory_uri() . '/functions/customizer/css/customizer.css');
}
add_action('customize_controls_print_styles', 'findcools_customizer_style');

function findcools_custom_customize_enqueue() {
	wp_enqueue_script( 'findcools-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'findcools_custom_customize_enqueue' );
//////////////////////////////////////////////////////////////////
// Customizer - Add Settings
//////////////////////////////////////////////////////////////////
function findcools_register_theme_customizer( $wp_customize ) {
 	
	// Add Sections
	
	$wp_customize->add_section( 'findcools_new_section_custom_css' , array(
   		'title'      => __('Custom CSS', 'findcools'),
   		'description'=> __('Add your custom CSS which will overwrite the theme CSS', 'findcools'),
   		'priority'   => 106,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_color_accent' , array(
   		'title'      => __('Colors: Accent', 'findcools'),
   		'description'=> '',
   		'priority'   => 105,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_color_post_color' , array(
   		'title'      => __('Colors: Posts', 'findcools'),
   		'description'=> '',
   		'priority'   => 104,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_color_footer' , array(
   		'title'      => __('Colors: Footer', 'findcools'),
   		'description'=> '',
   		'priority'   => 103,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_color_sidebar' , array(
   		'title'      => __('Colors: Sidebar', 'findcools'),
   		'description'=> '',
   		'priority'   => 102,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_mobile' , array(
		'title'      => __('Colors: Mobile Menu', 'findcools'),
		'description'=> '',
		'priority'   => 101,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_color_topbar' , array(
   		'title'      => __('Colors: Top Bar', 'findcools'),
   		'description'=> '',
   		'priority'   => 100,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_footer' , array(
   		'title'      => __('Footer Settings', 'findcools'),
   		'description'=> '',
   		'priority'   => 99,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_social' , array(
   		'title'      => __('Social Media Settings', 'findcools'),
   		'description'=> __('Enter your social media usernames. Icons will not show if left blank.', 'findcools'),
   		'priority'   => 98,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_page' , array(
   		'title'      => __('Page Settings', 'findcools'),
   		'description'=> '',
   		'priority'   => 97,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_post' , array(
   		'title'      => __('Post Settings', 'findcools'),
   		'description'=> '',
   		'priority'   => 96,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_featured' , array(
		'title'      => __('Featured Area Settings', 'findcools'),
		'description'=> '',
		'priority'   => 94,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_topbar' , array(
		'title'      => __('Top Bar Settings', 'findcools'),
		'description'=> '',
		'priority'   => 92,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_logo_header' , array(
   		'title'      => __('Logo and Header Settings', 'findcools'),
   		'description'=> '',
   		'priority'   => 91,
	) );
	
	$wp_customize->add_section( 'findcools_new_section_general' , array(
   		'title'      => __('General Settings', 'findcools'),
   		'description'=> '',
   		'priority'   => 90,
	) );
	
/////////////////////////////////////////////////
// Add Setting
/////////////////////////////////////////////////
	
		// General
		$wp_customize->add_setting(
			'fcs_responsive',
			array(
				'default' => '',
				'sanitize_callback' => 'findcools_sanitize_checkbox'
			)
		);
		
		$wp_customize->add_setting(
	        'fcs_home_layout',
	        array(
	            'default'     => 'full',
				'sanitize_callback' => 'findcools_sanitize_home'
	        )
	    );
		
		$wp_customize->add_setting(
	        'fcs_archive_layout',
	        array(
	            'default'     => 'full',
				'sanitize_callback' => 'findcools_sanitize_archive'
	        )
	    );
		
		$wp_customize->add_setting(
	        'fcs_sidebar_homepage',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		
		$wp_customize->add_setting(
	        'fcs_sidebar_post',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_sidebar_archive',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_post_summary',
	        array(
	            'default'     => 'fullt',
				'sanitize_callback' => 'findcools_sanitize_summery'
	        )
	    );
		
		// Header & Logo
		$wp_customize->add_setting(
	        'fcs_logo',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'esc_url_raw',
				'transport'   => 'postMessage'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_header_padding_top',
	        array(
	            'default'     => '20',
				'sanitize_callback' => 'findcools_sanitize_number'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_header_padding_bottom',
	        array(
	            'default'     => '20',
				'sanitize_callback' => 'findcools_sanitize_number'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_tagline_check',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		
		// Top Bar
		$wp_customize->add_setting(
	        'fcs_topbar_social_check',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_topbar_search_check',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		
		// Featured area
		$wp_customize->add_setting(
	        'fcs_featured_slider',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_featured_cat',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'absint'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_featured_id',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_featured_slider_slides',
	        array(
	            'default'     => '5',
				'sanitize_callback' => 'findcools_sanitize_number'
	        )
	    );
		
		
		// Post Settings
		$wp_customize->add_setting(
	        'fcs_post_tags',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_post_author',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_post_related',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_post_share',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_post_share_author',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_post_comment_link',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_post_thumb',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_post_date',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_post_cat',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		
		// Page
		$wp_customize->add_setting(
	        'fcs_page_share',
	        array(
	            'default'     => false,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		
		// Social Media
		
		$wp_customize->add_setting(
	        'fcs_facebook',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_twitter',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_instagram',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_pinterest',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_tumblr',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_bloglovin',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_tumblr',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_google',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_youtube',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
	    $wp_customize->add_setting(
	        'fcs_dribbble',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
	    $wp_customize->add_setting(
	        'fcs_soundcloud',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
	    $wp_customize->add_setting(
	        'fcs_vimeo',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_linkedin',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_rss',
	        array(
	            'default'     => '',
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		
		// Footer
		$fcs_footertext = '&copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '. ';
		$wp_customize->add_setting(
	        'fcs_footer_copyright',
	        array(
	            'default'     => $fcs_footertext,
				'sanitize_callback' => 'findcools_sanitize_text'
	        )
	    );
		$wp_customize->add_setting(
	        'fcs_footer_share',
	        array(
	            'default'     => true,
				'sanitize_callback' => 'findcools_sanitize_checkbox'
	        )
	    );
		
		// Colors
		
			// Top bar
			$wp_customize->add_setting(
				'fcs_topbar_bg',
				array(
					'default'     => '#326ada',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);

			$wp_customize->add_setting(
				'fcs_topbar_nav_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_topbar_nav_color_hover',
				array(
					'default'     => '#d2d2d2',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			
			$wp_customize->add_setting(
				'fcs_drop_bg',
				array(
					'default'     => '#326ada',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_drop_border',
				array(
					'default'     => '#433e90',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_drop_text_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_drop_text_hover_bg',
				array(
					'default'     => '#433e90',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_drop_text_hover_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			
			$wp_customize->add_setting(
				'fcs_topbar_social_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_topbar_social_color_hover',
				array(
					'default'     => '#d2d2d2',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			
			$wp_customize->add_setting(
				'fcs_topbar_search_magnify',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			
			// Mobile Menu colors
			$wp_customize->add_setting(
				'fcs_mobile_bg',
				array(
					'default'     => '#326ada',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_mobile_text',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_mobile_icon',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			
			// Sidebar
			$wp_customize->add_setting(
				'fcs_sidebar_title_bg',
				array(
					'default'     => '#326ada',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_sidebar_title_text',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_sidebar_social_icon',
				array(
					'default'     => '#326ada',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_sidebar_social_icon_hover',
				array(
					'default'     => '#433e90',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_sidebar_newsletter_bg',
				array(
					'default'     => '#f1f1f1',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_sidebar_newsletter_text',
				array(
					'default'     => '#444444',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_sidebar_newsletter_button_bg',
				array(
					'default'     => '#326ada',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_sidebar_newsletter_button_text',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_sidebar_newsletter_button_bg_hover',
				array(
					'default'     => '#433e90',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_sidebar_newsletter_button_text_hover',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			
			// Footer
			$wp_customize->add_setting(
				'fcs_footer_bg',
				array(
					'default'     => '#433e90',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_footer_social',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_footer_social_hover',
				array(
					'default'     => '#d2d2d2',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_footer_social_line',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_footer_copyright_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_footer_copyright_link',
				array(
					'default'     => '#7c7c7c',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			
			// Posts
			$wp_customize->add_setting(
				'fcs_post_title',
				array(
					'default'     => '#292929',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_post_text',
				array(
					'default'     => '#242424',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_post_h',
				array(
					'default'     => '#242424',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_post_readmore_text',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_post_readmore_text_hover',
				array(
					'default'     => '#433e90',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_post_readmore_line',
				array(
					'default'     => '#433e90',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_post_readmore_line_hover',
				array(
					'default'     => '#326ada',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_post_share_color',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			$wp_customize->add_setting(
				'fcs_post_share_color_hover',
				array(
					'default'     => '#326ada',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			
			// accent
			$wp_customize->add_setting(
				'fcs_accent_color',
				array(
					'default'     => '#433e90',
					'sanitize_callback' => 'sanitize_hex_color'
				)
			);
			
			// Custom CSS
			$wp_customize->add_setting(
				'fcs_custom_css',
				array(
					'default'     => '',
					'sanitize_callback' => 'findcools_sanitize_text'
				)
			);
		
//////////////////////////////////////////////////////////////////
// Sanitize
//////////////////////////////////////////////////////////////////

/* Sanitize texts */
	function findcools_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}

/* Sanitize number */

	function findcools_sanitize_number( $int ) {
		return absint( $int );
	}
	

/* Sanitize checkbox */

	function findcools_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

/* Sanitize radio buttons and select lists */
	
	function findcools_sanitize_select( $input, $setting ) {
		global $wp_customize;
	 
		$control = $wp_customize->get_control( $setting->id );
	 
		if ( array_key_exists( $input, $control->choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
/////////////////////////////////////////////////
/* Sanitize radio buttons */
/////////////////////////////////////////////////

/* Homepage Layout */
function findcools_sanitize_home( $input ) {
    $valid = array(
        'full' => 'Full Post Layout',
        'grid' => 'Grid Post Layout',
        'full_grid' => '1 Full Post then Grid Layout',
        'list' => 'List Post Layout', 'findcools',
        'full_list' => '1 Full Post then List Layout',
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
 /* Archive Layout */
function findcools_sanitize_archive( $input ) {
    $valid = array(
        'full' => 'Full Post Layout',
        'grid' => 'Grid Post Layout',
        'full_grid' => '1 Full Post then Grid Layout',
        'list' => 'List Post Layout', 'findcools',
        'full_list' => '1 Full Post then List Layout',
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/* Post Summery Type */
function findcools_sanitize_summery( $input ) {
    $valid = array(
			'full'   => 'Use Read More Tag',
			'excerpt'  => 'Use Excerpt',
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/////////////////////////////////////////////////
// Add Control
/////////////////////////////////////////////////
	
 /* General */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'responsive',
				array(
					'label'      => __('Disable Responsive', 'findcools'),
					'section'    => 'findcools_new_section_general',
					'settings'   => 'fcs_responsive',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_layout',
				array(
					'label'          => __('Homepage Layout', 'findcools'),
					'section'        => 'findcools_new_section_general',
					'settings'       => 'fcs_home_layout',
					'type'           => 'radio',
					'priority'	 => 3,
					'choices'        => array(
						'full'   => 'Full Post Layout',
						'grid'  => 'Grid Post Layout',
						'full_grid'  => '1 Full Post then Grid Layout',
						'list'  => 'List Post Layout',
						'full_list'  => '1 Full Post then List Layout',
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'archive_layout',
				array(
					'label'          => __('Archive Layout', 'findcools'),
					'section'        => 'findcools_new_section_general',
					'settings'       => 'fcs_archive_layout',
					'type'           => 'radio',
					'priority'	 => 3,
					'choices'        => array(
						'full'   => 'Full Post Layout',
						'grid'  => 'Grid Post Layout',
						'full_grid'  => '1 Full Post then Grid Layout',
						'list'  => 'List Post Layout',
						'full_list'  => '1 Full Post then List Layout',
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_homepage',
				array(
					'label'      => __('Disable Sidebar on Homepage', 'findcools'),
					'section'    => 'findcools_new_section_general',
					'settings'   => 'fcs_sidebar_homepage',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_post',
				array(
					'label'      => __('Disable Sidebar on Posts', 'findcools'),
					'section'    => 'findcools_new_section_general',
					'settings'   => 'fcs_sidebar_post',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_archive',
				array(
					'label'      => __('Disable Sidebar on Archives', 'findcools'),
					'section'    => 'findcools_new_section_general',
					'settings'   => 'fcs_sidebar_archive',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_summary',
				array(
					'label'          => __('Homepage/Archive Post Summary Type', 'findcools'),
					'section'        => 'findcools_new_section_general',
					'settings'       => 'fcs_post_summary',
					'type'           => 'radio',
					'priority'	 => 8,
					'choices'        => array(
						'fullt'   => 'Use Read More Tag',
						'excerpt'  => 'Use Excerpt',
					)
				)
			)
		);
		
 /* Header and Logo */
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'upload_logo',
				array(
					'label'      => __('Upload Logo', 'findcools'),
					'section'    => 'findcools_new_section_logo_header',
					'settings'   => 'fcs_logo',
					'priority'	 => 20
				)
			)
		);
		
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_padding_top',
				array(
					'label'      => __('Top Header Padding', 'findcools'),
					'section'    => 'findcools_new_section_logo_header',
					'settings'   => 'fcs_header_padding_top',
					'type'		 => 'number',
					'priority'	 => 22
				)
			)
		);
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_padding_bottom',
				array(
					'label'      => __('Bottom Header Padding', 'findcools'),
					'section'    => 'findcools_new_section_logo_header',
					'settings'   => 'fcs_header_padding_bottom',
					'type'		 => 'number',
					'priority'	 => 23
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'tagline_check',
				array(
					'label'      => __('Enable Site Tagline Under Logo', 'findcools'),
					'section'    => 'findcools_new_section_logo_header',
					'settings'   => 'fcs_tagline_check',
					'type'		 => 'checkbox',
					'priority'	 => 24
				)
			)
		);
		
 /* Top Bar */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'topbar_social_check',
				array(
					'label'      => __('Disable Top Bar Social Icons', 'findcools'),
					'section'    => 'findcools_new_section_topbar',
					'settings'   => 'fcs_topbar_social_check',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'topbar_search_check',
				array(
					'label'      => __('Disable Top Bar Search', 'findcools'),
					'section'    => 'findcools_new_section_topbar',
					'settings'   => 'fcs_topbar_search_check',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		
 /* Featured area */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_slider',
				array(
					'label'      => __('Enable Featured Slider', 'findcools'),
					'section'    => 'findcools_new_section_featured',
					'settings'   => 'fcs_featured_slider',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Category_Control(
				$wp_customize,
				'featured_cat',
				array(
					'label'    => __('Select Featured Category', 'findcools'),
					'settings' => 'fcs_featured_cat',
					'section'  => 'findcools_new_section_featured',
					'priority'	 => 3
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_id',
				array(
					'label'      => __('Select featured post/page IDs', 'findcools'),
					'section'    => 'findcools_new_section_featured',
					'settings'   => 'fcs_featured_id',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'featured_slider_slides',
				array(
					'label'      => __('Amount of Slides', 'findcools'),
					'section'    => 'findcools_new_section_featured',
					'settings'   => 'fcs_featured_slider_slides',
					'type'		 => 'number',
					'priority'	 => 5
				)
			)
		);
		
		
/* Post Settings */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_thumb',
				array(
					'label'      => __('Hide Featured Image from top of Post', 'findcools'),
					'section'    => 'findcools_new_section_post',
					'settings'   => 'fcs_post_thumb',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_cat',
				array(
					'label'      => __('Hide Category', 'findcools'),
					'section'    => 'findcools_new_section_post',
					'settings'   => 'fcs_post_cat',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_date',
				array(
					'label'      => __('Hide Date', 'findcools'),
					'section'    => 'findcools_new_section_post',
					'settings'   => 'fcs_post_date',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_tags',
				array(
					'label'      => __('Hide Tags', 'findcools'),
					'section'    => 'findcools_new_section_post',
					'settings'   => 'fcs_post_tags',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_share',
				array(
					'label'      => __('Hide Share Buttons', 'findcools'),
					'section'    => 'findcools_new_section_post',
					'settings'   => 'fcs_post_share',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_share_author',
				array(
					'label'      => __('Hide Author Name', 'findcools'),
					'section'    => 'findcools_new_section_post',
					'settings'   => 'fcs_post_share_author',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_comment_link',
				array(
					'label'      => __('Hide Comment Link', 'findcools'),
					'section'    => 'findcools_new_section_post',
					'settings'   => 'fcs_post_comment_link',
					'type'		 => 'checkbox',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_author',
				array(
					'label'      => __('Hide Author Box', 'findcools'),
					'section'    => 'findcools_new_section_post',
					'settings'   => 'fcs_post_author',
					'type'		 => 'checkbox',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_related',
				array(
					'label'      => __('Hide Related Posts Box', 'findcools'),
					'section'    => 'findcools_new_section_post',
					'settings'   => 'fcs_post_related',
					'type'		 => 'checkbox',
					'priority'	 => 9
				)
			)
		);
		
 /* Page */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_share',
				array(
					'label'      => __('Hide Share Buttons', 'findcools'),
					'section'    => 'findcools_new_section_page',
					'settings'   => 'fcs_page_share',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		
/* Social Media */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'facebook',
				array(
					'label'      => __('Facebook', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_facebook',
					'type'		 => 'text',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'twitter',
				array(
					'label'      => __('Twitter', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_twitter',
					'type'		 => 'text',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'instagram',
				array(
					'label'      => __('Instagram', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_instagram',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pinterest',
				array(
					'label'      => __('Pinterest', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_pinterest',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'bloglovin',
				array(
					'label'      => __('Bloglovin', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_bloglovin',
					'type'		 => 'text',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'google',
				array(
					'label'      => __('Google Plus', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_google',
					'type'		 => 'text',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'tumblr',
				array(
					'label'      => __('Tumblr', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_tumblr',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'youtube',
				array(
					'label'      => __('Youtube', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_youtube',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'dribbble',
				array(
					'label'      => __('Dribbble', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_dribbble',
					'type'		 => 'text',
					'priority'	 => 9
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'soundcloud',
				array(
					'label'      => __('Soundcloud', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_soundcloud',
					'type'		 => 'text',
					'priority'	 => 10
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'vimeo',
				array(
					'label'      => __('Vimeo', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_vimeo',
					'type'		 => 'text',
					'priority'	 => 11
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'linkedin',
				array(
					'label'      => __('Linkedin (Use full URL to your Linkedin profile)', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_linkedin',
					'type'		 => 'text',
					'priority'	 => 12
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'rss',
				array(
					'label'      => __('RSS Link', 'findcools'),
					'section'    => 'findcools_new_section_social',
					'settings'   => 'fcs_rss',
					'type'		 => 'text',
					'priority'	 => 13
				)
			)
		);
		
 /* Footer */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_copyright',
				array(
					'label'      => __('Footer Copyright Text', 'findcools'),
					'section'    => 'findcools_new_section_footer',
					'settings'   => 'fcs_footer_copyright',
					'type'		 => 'text',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_share',
				array(
					'label'      => __('Hide Footer Share Links', 'findcools'),
					'section'    => 'findcools_new_section_footer',
					'settings'   => 'fcs_footer_share',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		
 /* Colors */
			
/* Top bar Colors */
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_bg',
					array(
						'label'      => __('Top Bar BG', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_topbar_bg',
						'priority'	 => 1
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_nav_color',
					array(
						'label'      => __('Top Bar Menu Text Color', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_topbar_nav_color',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_nav_color_hover',
					array(
						'label'      => __('Top Bar Menu Text Hover Color', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_topbar_nav_color_hover',
						'priority'	 => 3
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_bg',
					array(
						'label'      => __('Dropdown BG', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_drop_bg',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_border',
					array(
						'label'      => __('Dropdown Border Color', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_drop_border',
						'priority'	 => 5
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_color',
					array(
						'label'      => __('Dropdown Text Color', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_drop_text_color',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_hover_bg',
					array(
						'label'      => __('Dropdown Text Hover BG', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_drop_text_hover_bg',
						'priority'	 => 7
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_hover_color',
					array(
						'label'      => __('Dropdown Text Hover Color', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_drop_text_hover_color',
						'priority'	 => 8
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_social_color',
					array(
						'label'      => __('Top Bar Social Icons', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_topbar_social_color',
						'priority'	 => 9
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_social_color_hover',
					array(
						'label'      => __('Top Bar Social Icons Hover', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_topbar_social_color_hover',
						'priority'	 => 11
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'topbar_search_magnify',
					array(
						'label'      => __('Top Bar Search Magnify Color', 'findcools'),
						'section'    => 'findcools_new_section_color_topbar',
						'settings'   => 'fcs_topbar_search_magnify',
						'priority'	 => 13
					)
				)
			);
			
 /* Mobile menu */
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_bg',
					array(
						'label'      => __('Mobile Menu BG Color', 'findcools'),
						'section'    => 'findcools_new_section_mobile',
						'settings'   => 'fcs_mobile_bg',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_text',
					array(
						'label'      => __('Mobile Menu Link Color', 'findcools'),
						'section'    => 'findcools_new_section_mobile',
						'settings'   => 'fcs_mobile_text',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_icon',
					array(
						'label'      => __('Mobile Menu Toggle Icon Color', 'findcools'),
						'section'    => 'findcools_new_section_mobile',
						'settings'   => 'fcs_mobile_icon',
						'priority'	 => 3
					)
				)
			);
			
 /* Sidebar */
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_title_bg',
					array(
						'label'      => __('Sidebar Widget Title BG', 'findcools'),
						'section'    => 'findcools_new_section_color_sidebar',
						'settings'   => 'fcs_sidebar_title_bg',
						'priority'	 => 1
					)
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_title_text',
					array(
						'label'      => __('Sidebar Widget Title Text Color', 'findcools'),
						'section'    => 'findcools_new_section_color_sidebar',
						'settings'   => 'fcs_sidebar_title_text',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_social_icon',
					array(
						'label'      => __('Sidebar Social Icon Color', 'findcools'),
						'section'    => 'findcools_new_section_color_sidebar',
						'settings'   => 'fcs_sidebar_social_icon',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_social_icon_hover',
					array(
						'label'      => __('Sidebar Social Icon Hover Color', 'findcools'),
						'section'    => 'findcools_new_section_color_sidebar',
						'settings'   => 'fcs_sidebar_social_icon_hover',
						'priority'	 => 5
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_newsletter_bg',
					array(
						'label'      => __('Mailchimp Widget BG Color', 'findcools'),
						'section'    => 'findcools_new_section_color_sidebar',
						'settings'   => 'fcs_sidebar_newsletter_bg',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_newsletter_text',
					array(
						'label'      => __('Mailchimp Widget Text Color', 'findcools'),
						'section'    => 'findcools_new_section_color_sidebar',
						'settings'   => 'fcs_sidebar_newsletter_text',
						'priority'	 => 7
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_newsletter_button_bg',
					array(
						'label'      => __('Mailchimp Widget Button BG Color', 'findcools'),
						'section'    => 'findcools_new_section_color_sidebar',
						'settings'   => 'fcs_sidebar_newsletter_button_bg',
						'priority'	 => 8
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_newsletter_button_text',
					array(
						'label'      => __('Mailchimp Widget Button Text Color', 'findcools'),
						'section'    => 'findcools_new_section_color_sidebar',
						'settings'   => 'fcs_sidebar_newsletter_button_text',
						'priority'	 => 9
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_newsletter_button_bg_hover',
					array(
						'label'      => __('Mailchimp Widget Button BG Hover Color', 'findcools'),
						'section'    => 'findcools_new_section_color_sidebar',
						'settings'   => 'fcs_sidebar_newsletter_button_bg_hover',
						'priority'	 => 10
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_newsletter_button_text_hover',
					array(
						'label'      => __('Mailchimp Widget Button Text Hover Color', 'findcools'),
						'section'    => 'findcools_new_section_color_sidebar',
						'settings'   => 'fcs_sidebar_newsletter_button_text_hover',
						'priority'	 => 11
					)
				)
			);
			
 /* Footer */
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_bg',
					array(
						'label'      => __('Footer BG Color', 'findcools'),
						'section'    => 'findcools_new_section_color_footer',
						'settings'   => 'fcs_footer_bg',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_social',
					array(
						'label'      => __('Footer Social Icon Color', 'findcools'),
						'section'    => 'findcools_new_section_color_footer',
						'settings'   => 'fcs_footer_social',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_social_hover',
					array(
						'label'      => __('Footer Social Icon Hover Color', 'findcools'),
						'section'    => 'findcools_new_section_color_footer',
						'settings'   => 'fcs_footer_social_hover',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_social_line',
					array(
						'label'      => __('Footer Social Separator Line', 'findcools'),
						'section'    => 'findcools_new_section_color_footer',
						'settings'   => 'fcs_footer_social_line',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_copyright_color',
					array(
						'label'      => __('Footer Copyright Text Color', 'findcools'),
						'section'    => 'findcools_new_section_color_footer',
						'settings'   => 'fcs_footer_copyright_color',
						'priority'	 => 5
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_copyright_link',
					array(
						'label'      => __('Footer Copyright Link Color', 'findcools'),
						'section'    => 'findcools_new_section_color_footer',
						'settings'   => 'fcs_footer_copyright_link',
						'priority'	 => 6
					)
				)
			);
			
 /* Posts */
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_title',
					array(
						'label'      => __('Post Title Color', 'findcools'),
						'section'    => 'findcools_new_section_color_post_color',
						'settings'   => 'fcs_post_title',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_text',
					array(
						'label'      => __('Post Text Color', 'findcools'),
						'section'    => 'findcools_new_section_color_post_color',
						'settings'   => 'fcs_post_text',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_h',
					array(
						'label'      => __('Post H1-H6 Color', 'findcools'),
						'section'    => 'findcools_new_section_color_post_color',
						'settings'   => 'fcs_post_h',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_readmore_text',
					array(
						'label'      => __('Read More Text Color', 'findcools'),
						'section'    => 'findcools_new_section_color_post_color',
						'settings'   => 'fcs_post_readmore_text',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_readmore_text_hover',
					array(
						'label'      => __('Read More Text Hover Color', 'findcools'),
						'section'    => 'findcools_new_section_color_post_color',
						'settings'   => 'fcs_post_readmore_text_hover',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_readmore_line',
					array(
						'label'      => __('Read More Underline Color', 'findcools'),
						'section'    => 'findcools_new_section_color_post_color',
						'settings'   => 'fcs_post_readmore_line',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_readmore_line_hover',
					array(
						'label'      => __('Read More Underline Hover Color', 'findcools'),
						'section'    => 'findcools_new_section_color_post_color',
						'settings'   => 'fcs_post_readmore_line_hover',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_share_color',
					array(
						'label'      => __('Post Share Link Color', 'findcools'),
						'section'    => 'findcools_new_section_color_post_color',
						'settings'   => 'fcs_post_share_color',
						'priority'	 => 8
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_share_color_hover',
					array(
						'label'      => __('Post Share Link Hover Color', 'findcools'),
						'section'    => 'findcools_new_section_color_post_color',
						'settings'   => 'fcs_post_share_color_hover',
						'priority'	 => 9
					)
				)
			);
			
 /* Accent */
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'accent_color',
					array(
						'label'      => __('Accent Color', 'findcools'),
						'section'    => 'findcools_new_section_color_accent',
						'settings'   => 'fcs_accent_color',
						'priority'	 => 1
					)
				)
			);
			
 /* Custom CSS */
			$wp_customize->add_control(
				new Customize_CustomCss_Control(
					$wp_customize,
					'custom_css',
					array(
						'label'      => __('Custom CSS', 'findcools'),
						'section'    => 'findcools_new_section_custom_css',
						'settings'   => 'fcs_custom_css',
						'type'		 => 'custom_css',
						'priority'	 => 1
					)
				)
			);

			
/* Findcools Info			 */
	$wp_customize->add_section( 'findcools_new_section_info' , array(
   		'title'      => 'Support and Documentation',
   		'description'=> '<strong>Findcools is free WordPress theme developed by iwebdc. You can obtain other professional For documentation and support check this link : <a href="'.esc_url(fcs_theme_url).'" target="_blank">Support and Documentation</a>.</strong>',
   		'priority'   => 111,
	) );

	$wp_customize->add_setting(
		'fcs_info',
		array(
			'default'     => '',
			'sanitize_callback' => 'findcools_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
		new Customize_Findcools_Info(
			$wp_customize,
			'fcs_info',
			array(
				'section'    => 'findcools_new_section_info',
				'settings'   => 'fcs_info',
				'type'		 => 'info',
				'priority'	 => 5,
				'content' => __( 'Content to output. Use <a href="#">HTML</a> if you like.', 'findcools' ) . '</p>',
			)
		)
	);

 
}
add_action( 'customize_register', 'findcools_register_theme_customizer' );
?>