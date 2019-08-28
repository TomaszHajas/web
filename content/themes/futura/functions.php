<?php 
/*====================================================
	Define constant
====================================================*/
define('THEMEROOT', get_template_directory_uri());

/*====================================================
	Theme Support
====================================================*/
if (! function_exists('futura_theme_setup')) {
	function futura_theme_setup() {
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ));
		add_theme_support('post-thumbnails');
		add_theme_support('custom-background');
		add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	}
	add_action('after_setup_theme', 'futura_theme_setup' );
}

// content width in this design
if (! isset( $content_width) ) {
	$content_width = 680;
}

/*====================================================
	Various image size required for this theme
====================================================*/
set_post_thumbnail_size( 680, 450, true);
add_image_size( 'small_tile', 170, 170, true );

/*====================================================
	scripts
====================================================*/
if (! function_exists('futura_styles_scripts')) {
	function futura_styles_scripts() {
		// stylesheets

		$protocol = is_ssl() ? 'https' : 'http';
    	wp_enqueue_style( 'futura-fonts', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400%7CRoboto+Slab" );

		wp_register_style('futura-bootstrap-style', THEMEROOT.'/css/bootstrap.min.css', array(), null );
		wp_register_style('futura-font-awesome', THEMEROOT.'/css/font-awesome.min.css', array(), null );
		wp_enqueue_style('futura-theme-style', get_stylesheet_uri(), array(), null);
		wp_enqueue_style('main-style', THEMEROOT.'/css/screen.css', array('futura-bootstrap-style', 'futura-font-awesome'), null);

		// scripts
		wp_enqueue_script('futura-fitvid', THEMEROOT.'/js/jquery.fitvids.js', array('jquery'), '', true );
		wp_enqueue_script('futura-bootstrap-script', THEMEROOT.'/js/bootstrap.min.js', array('jquery'), '', true );
		wp_enqueue_script('flex-slider', THEMEROOT.'/js/jquery.flexslider-min.js', array(), '', true );
		wp_enqueue_script('magnific-popup', THEMEROOT.'/js/jquery.magnific-popup.min.js', array('jquery'), '', true );
		wp_enqueue_script('highlight-js', THEMEROOT.'/js/highlight.pack.js', '', true );
		wp_enqueue_script('twitter-wjs', '//platform.twitter.com/widgets.js', array(), '', true );
	    wp_enqueue_script('main-js', THEMEROOT.'/js/main.js', array('jquery'), '', true );
	}

	add_action('wp_enqueue_scripts', 'futura_styles_scripts' );
}

/*====================================================
	Admin scrpts
====================================================*/
if (! function_exists('futura_admin_scripts')) {
	function futura_admin_scripts() {
		wp_register_script('admin-script', THEMEROOT. '/js/admin-script.js', array('jquery'), '', true );
    	wp_enqueue_script('admin-script');
	}

	add_action('admin_enqueue_scripts', 'futura_admin_scripts');
}

/*====================================================
	register menu
====================================================*/
function futura_register_nav_menu() {
	register_nav_menus(array(
		'main-menu' => __('Main Menu', 'futura')
	));
}

add_action('init', 'futura_register_nav_menu');

/*====================================================
	register sidebar
====================================================*/
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
		'name'          => __( 'Main Sidebar', 'futura' ),
		'id'            => 'main-sidebar',
		'description'   => __('Add widget here to show in main sidebar', 'futira'),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
    ));

    register_sidebar(array(
		'name'          => __( 'Footer Widget Area left', 'futura' ),
		'id'            => 'footer-sidebar-left',
		'description'   => __('Add widget here to show in footer left', 'futira'),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
    ));
    register_sidebar(array(
		'name'          => __( 'Footer Widget Area Center', 'futura' ),
		'id'            => 'footer-sidebar-center',
		'description'   => __('Add widget here to show in footer center', 'futira'),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
    ));
    register_sidebar(array(
		'name'          => __( 'Footer Widget Area Right', 'futura' ),
		'id'            => 'footer-sidebar-right',
		'description'   => __('Add widget here to show in footer right', 'futira'),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
    ));
}
/*====================================================
	load theme text domain
====================================================*/
$language_dir = get_template_directory() . '/languages';
load_theme_textdomain( 'futura', $language_dir );
/*====================================================
	Meta box for diffrent post format
====================================================*/
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/inc/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_stylesheet_directory() . '/inc/meta-box' ) );
require_once(get_template_directory() . '/inc/meta-box/meta-box.php');
require_once(get_template_directory() . '/inc/meta-box/meta-box-setup.php');

/*====================================================
	custom excerpt
====================================================*/
function futura_excerpt_length($length) {
    return 50;
}
add_filter('excerpt_length', 'futura_excerpt_length');
 
/* Add a link  to the end of our excerpt contained in a div for styling purposes and to break to a new line on the page.*/
 
function futura_excerpt_more($more) {
    global $post;
    return '<div class="post-permalink">
						<a href="'. get_permalink($post->ID) . '" class="btn btn-default">' . __('Continue Reading', 'futura') . '</a></div>';
}
add_filter('excerpt_more', 'futura_excerpt_more');

/*====================================================
	comment call back
====================================================*/
function futura_comments ($comment, $args, $depth) {
	$GLOBAL['comment'] = $comment;

	 ?>
		<li id="comment-<?php comment_ID(); ?>" >
			<article <?php comment_class(); ?>>
				<header>
					<a href="<?php comment_author_url(); ?>" class="author-avater-link"><?php echo get_avatar( $comment, 65); ?></a> 
					<div class="comment-details">
						<h4 class="commenter-name"><?php comment_author_link(); ?></h4>
						<span class="commenter-meta"><?php comment_date();?>&nbsp;-&nbsp;<?php comment_time(); ?></span>
					</div>
					<?php comment_reply_link( array_merge(array('reply_text' => __('Reply', 'gbj-framework')), array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
				</header>
				<div class="comment-body">
					<?php comment_text() ?>
				</div>
			</article>
		</li>
	<?php 
}
/*====================================================
	modification category widget post count		
====================================================*/
function futura_modify_categories_postcount ($var) {
	$new_string = str_replace('(', '<span class="post-count">', $var);
	$new_string = str_replace(')', '</span>', $new_string);
	return $new_string;
}
add_filter('wp_list_categories','futura_modify_categories_postcount');
/*====================================================
	Customizing next and previous post link
====================================================*/
function posts_link_next_class($format){
     $format = str_replace('href=', 'class="btn btn-default" href=', $format);
     return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
     $format = str_replace('href=', 'class="btn btn-default" href=', $format);
     return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');


/*====================================================
	Theme Customizer
====================================================*/
require_once(get_template_directory(). '/inc/widgets.php');
require_once(get_template_directory(). '/inc/futura-customizer.php');

/*====================================================
	custome css and js code from customizer option
====================================================*/
function futura_include_custom_css_code() {
	$css_code = get_theme_mod('Custom_css');
	if (!empty($css_code)) {
		echo '<style type="text/css">' . $css_code . '</style>';
	}
}

add_action('wp_head', 'futura_include_custom_css_code' );

function futura_include_custom_header_js_code() {
	$header_js_code = get_theme_mod('Custom_header_js');
	if (!empty($header_js_code)) {
		echo $header_js_code;
	}
}

add_action('wp_head', 'futura_include_custom_header_js_code' );