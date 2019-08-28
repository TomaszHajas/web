<?php 

function futura_theme_customizer( $wp_customize ) {

	/*====================================================
    	general settings section
    ====================================================*/
	$wp_customize->add_section(
        'general_settings',
        array(
            'title' => __( 'General Settings', 'futura' ),
            'description' => 'Some common settings for entire site.',
            'priority' => 30,
        )
    );
    // logo
    $wp_customize->add_setting(
    	'futura_logo'
    );
    $wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'futura_logo',
	        array(
	            'label' => __( 'Upload Logo', 'futura' ),
	            'section' => 'general_settings',
	            'settings' => 'futura_logo'
	        )
	    )
	);
    // theme color
    $wp_customize->add_setting(
    	'theme_color',
    	array(
	        'default' => '#00ada7',
	        'transport' => 'postMessage',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
	        'theme_color',
	        array(
	            'label' => __('Theme Color', 'futura'),
	            'section' => 'general_settings',
	            'settings' => 'theme_color',
	        )
	    )
    );
    // favicon
	$wp_customize->add_setting(
    	'futura_favicon'
    );
    $wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'futura_favicon',
	        array(
	            'label' => __( 'Upload Favicon ( Recommend .ico or .png format )', 'futura' ),
	            'section' => 'general_settings',
	            'settings' => 'futura_favicon'
	        )
	    )
	);
    /*====================================================
    	sidebar setting section
    ====================================================*/
    $wp_customize->add_section(
        'sidebar_settings',
        array(
            'title' => __( 'Sidebar Settings', 'futura' ),
            'description' => 'Settings for sidebar.',
            'priority' => 30,
        )
    );
    // sidebar position
    $wp_customize->add_setting(
    	'sidebar_position',
    	array(
	        'default' => 'right',
	        'transport' => 'postMessage'
	    )
    );
    $wp_customize->add_control(
	    'sidebar_position',
	    array(
	        'label' => __( 'Sidebar Position', 'futura' ),
	        'section' => 'sidebar_settings',
	        'type' => 'radio',
	        'choices' => array(
	        	'left' => 'Left',
	        	'right' => 'Right'
	        )
	    )
	);

	$wp_customize->add_section(
        'header_settings',
        array(
            'title' => __( 'Header Settings', 'futura' ),
            'description' => 'Header setting section.',
            'priority' => 30,
        )
    );
    /*====================================================
    	footer settings section
    ====================================================*/
    $wp_customize->add_section(
        'footer_settings',
        array(
            'title' => __( 'Footer Settings', 'futura' ),
            'description' => 'Footer setting section.',
            'priority' => 30,
        )
    );
    // show hide footer widget
    $wp_customize->add_setting(
	    'hide_footer_widgets',
	    array(
	    	'transport' => 'postMessage'
	    )
	);
	$wp_customize->add_control(
	    'hide_footer_widgets',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Hide Footer Widget Area', 'futura' ),
	        'section' => 'footer_settings',
	    )
	);
	// custom copyright
     $wp_customize->add_setting(
	    'copyright_textbox',
	    array(
	        'default' => 'Default copyright text',
	        'transport' => 'postMessage'
	    )
	);
	$wp_customize->add_control(
	    'copyright_textbox',
	    array(
	        'label' => __( 'Copyright text', 'futura' ),
	        'section' => 'footer_settings',
	        'type' => 'text',
	    )
	);
	/*====================================================
		custome code
	====================================================*/
	$wp_customize->add_section(
        'Custom_code',
        array(
            'title' => __( 'Custom Code', 'futura' ),
            'description' => 'Use this section to add custom codes in your site.',
            'priority' => 200,
        )
    );
    // Custome css
    $wp_customize->add_setting(
	    'Custom_css',
	    array(
	        'transport' => 'postMessage'
	    )
	);
	$wp_customize->add_control(
	    'Custom_css',
	    array(
	        'label' => __( 'Custom CSS', 'futura' ),
	        'description' => __('Enter your custom CSS code. It will be included in the head section of the site.', 'futura'),
	        'section' => 'Custom_code',
	        'type' => 'textarea',
	    )
	);
	// Custome header js
    $wp_customize->add_setting(
	    'Custom_header_js',
	    array(
	        'transport' => 'postMessage'
	    )
	);
	$wp_customize->add_control(
	    'Custom_header_js',
	    array(
	        'label' => __( 'Custom Header JS', 'futura' ),
	        'description' => __('Enter your custom Javascript code. It will be included in the head section of the site.', 'futura'),
	        'section' => 'Custom_code',
	        'type' => 'textarea',
	    )
	);
}
add_action( 'customize_register', 'futura_theme_customizer' );

// Function to convert hex to rgb from http://weblizar.com/
function hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else { 
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	return $rgb;
}

// Output the customized style at the head of the site
function custom_style_output() {
	$chosen_theme_color = get_theme_mod('theme_color');
	if ($chosen_theme_color != null) {
		$chosen_theme_color_rgb = hex2rgb($chosen_theme_color);
		$chosen_theme_color_rgb_final = implode(", ", $chosen_theme_color_rgb);
		echo '<style type="text/css">';
			echo 'a, a:hover{color: '.$chosen_theme_color.';}';
			echo '.btn-default, input[type="submit"] {border: 1px solid '.$chosen_theme_color.'; background:'.$chosen_theme_color.';}';
			echo 'textarea:focus {border: 1px solid '.$chosen_theme_color.';}';
			echo 'input[type="search"]:focus, input[type="text"]:focus, input[type="url"]:focus, input[type="email"]:focus, input[type="password"]:focus, textarea:focus, .form-control:focus {border: 1px solid '.$chosen_theme_color.';}';
			echo 'blockquote {border-left: 4px solid '.$chosen_theme_color.';}';
			echo '::-moz-selection{background: '.$chosen_theme_color.';}';
			echo '::selection{background: '.$chosen_theme_color.';}';
			echo '.main-navigation .menu li:hover > a, .main-navigation .menu li:focus > a {color: '.$chosen_theme_color.';}';
			echo '.main-navigation .menu li.current-menu-item > a {color: '.$chosen_theme_color.';}';
			echo '.main-navigation .menu li ul > li.current-menu-ancestor > a {color: '.$chosen_theme_color.';}';
			echo '.main-navigation .menu li ul:hover > a {color: '.$chosen_theme_color.';}';
			echo '.post .featured {background: '.$chosen_theme_color.';}';
			echo '.post .featured-media.no-image {background: '.$chosen_theme_color.';}';
			echo '.post .tag-list a:hover {color: '.$chosen_theme_color.';}';
			echo '.post .post-footer .category-list a:hover {color: '.$chosen_theme_color.';}';
			echo '.post .post-footer .share .share-icons li a:hover i {background: '.$chosen_theme_color.'; border: 1px solid '.$chosen_theme_color.';}';
			echo '.featured-media {background: '.$chosen_theme_color.';}';
			echo '.pagination a {background: '.$chosen_theme_color.';}';
			echo '.pagination .page-number {background: '.$chosen_theme_color.';}';
			echo '.comment-wrap ol li header .comment-details .commenter-name a:hover {color: '.$chosen_theme_color.';}';
			echo '.comment-wrap ol li header .comment-reply-link {background: '.$chosen_theme_color.';}';
			echo '.widget a:hover, .widget a:focus {color: '.$chosen_theme_color.';}';
			echo '.widget ul > li:hover .post-count {background: '.$chosen_theme_color.';  border: 1px solid '.$chosen_theme_color.';}';
			echo '.widget .title:after {background: '.$chosen_theme_color.';}';
			echo '.widget .social li a:hover i {background: '.$chosen_theme_color.'; border: 1px solid '.$chosen_theme_color.';}';
			echo '.widget .tagcloud a:hover {background: '.$chosen_theme_color.'; border: 1px solid '.$chosen_theme_color.';}';
			echo '.widget.widget_calendar caption {background: '.$chosen_theme_color.';}';
			echo '.widget.widget_calendar table tbody a:hover, .widget.widget_calendar table tbody a:focus {background: '.$chosen_theme_color.';}';
			echo '.widget.widget_recent_entries ul li a:hover {color: '.$chosen_theme_color.';}';
			echo '.main-footer .widget .tagcloud a:hover {border: 1px solid '.$chosen_theme_color.';}';
			echo '.main-footer .widget.widget_recent_entries ul li a:hover {color: '.$chosen_theme_color.';}';
			echo '#back-to-top {background: rgba( '. $chosen_theme_color_rgb_final .', 0.6);}';
			echo '#back-to-top:hover {background: '.$chosen_theme_color.';}';
			echo '.mejs-controls .mejs-time-rail .mejs-time-current {background: '.$chosen_theme_color.' !important;}';
			echo '@media (max-width: 767px) {.main-navigation .menu li:hover > a {color: '.$chosen_theme_color.';}';
		echo '</style>';
	}
}

add_action('wp_head', 'custom_style_output');


// live preview the changes
function futura_customizer_live_preview() {
	wp_enqueue_script('customizer-js', THEMEROOT.'/js/futura-customizer.js', array('jquery', 'customize-preview'), NULL, true );
}

add_action( 'customize_preview_init', 'futura_customizer_live_preview' );

?>