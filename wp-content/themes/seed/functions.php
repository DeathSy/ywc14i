<?php
/**
 * seed functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package seed
 */



/**
 * Seed Configurations
 *
 * SEED_LAYOUT -> full-width, boxed
 * SEED_HEADER -> fixed, standard, (auto-show)
 * SEED_MENU -> off-canvas, (dropdown), (push)
 * SEED_BLOG_LAYOUT -> full-width, leftbar, rightbar
 * SEED_BLOG_COLUMNS -> 1, 2, 3, 4, 5, 6
 * SEED_SHOP_LAYOUT -> full-width, leftbar, rightbar
 * SEED_SHOP_MAINPAGE -> default, page-builder
 * SEED_ADMIN_BAR -> hidden, bottom, top
 */

if(!defined('SEED_LAYOUT')) 				define('SEED_LAYOUT', 'full-width');
if(!defined('SEED_HEADER')) 				define('SEED_HEADER', 'fixed');
if(!defined('SEED_MENU')) 					define('SEED_MENU', 'off-canvas');
if(!defined('SEED_BLOG_LAYOUT')) 		define('SEED_BLOG_LAYOUT', 'full-width');
if(!defined('SEED_BLOG_COLUMNS')) 	define('SEED_BLOG_COLUMNS', '1');
if(!defined('SEED_SHOP_LAYOUT')) 		define('SEED_SHOP_LAYOUT', 'leftbar');
if(!defined('SEED_SHOP_MAINPAGE')) 	define('SEED_SHOP_MAINPAGE', 'default');
if(!defined('SEED_ADMIN_BAR')) 			define('SEED_ADMIN_BAR', 'hidden');




if ( ! function_exists( 'seed_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function seed_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on seed, use a find and replace
	 * to change 'seed' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'seed', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


	add_theme_support( 'custom-logo', array(
		'width'       => 200,
		'height'      => 100,
		'flex-width' => true,
		) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 370, 277, TRUE );
	/* add_image_size( 'featured', 840, 400, true ); */

	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'seed' ),
		'mobile' => esc_html__( 'Mobile Menu', 'seed' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	/*
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
	*/

	// Set up the WordPress core custom background feature.
	if (SEED_LAYOUT === 'boxed' ) {
		add_theme_support( 'custom-background', apply_filters( 'seed_custom_background_args', array(
			'default-color' => 'eeeeee',
			'default-image' => '',
			) ) );
	}
}
endif; // seed_setup
add_action( 'after_setup_theme', 'seed_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function seed_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'seed_content_width', 840 );
}
add_action( 'after_setup_theme', 'seed_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function seed_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'seed' ),
		'id'            => 'rightbar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'seed' ),
		'id'            => 'leftbar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'seed' ),
		'id'            => 'shopbar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Banner', 'seed' ),
		'id'            => 'banner',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Right', 'seed' ),
		'id'            => 'top-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<!--',
		'after_title'   => '-->',
		) );
	register_sidebar( array(
		'name'          => esc_html__( 'Headbar', 'seed' ),
		'id'            => 'headbar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="head-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<!--',
		'after_title'   => '-->',
		) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footbar', 'seed' ),
		'id'            => 'footbar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
	
}
add_action( 'widgets_init', 'seed_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function seed_scripts() {
	/* CSS */
	wp_enqueue_style( 'seed-bootstrap3', get_template_directory_uri() . '/vendor/bootstrap3/css/bootstrap.min.css' );
	// wp_enqueue_style( 'seed-font-awesome', get_stylesheet_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'seed-start', get_template_directory_uri() . '/vendor/seedthemes/seed.css' );
	wp_enqueue_style( 'seed-style', get_stylesheet_uri() );
	wp_enqueue_style( 'seed-begin', get_template_directory_uri() . '/css/begin.css' );
	wp_enqueue_style( 'seed-head', get_template_directory_uri() . '/css/head.css' );
	wp_enqueue_style( 'seed-body', get_template_directory_uri() . '/css/body.css' );
	wp_enqueue_style( 'seed-side', get_template_directory_uri() . '/css/side.css' );
	wp_enqueue_style( 'seed-etc', get_template_directory_uri() . '/css/etc.css' );
	wp_enqueue_style( 'seed-foot', get_template_directory_uri() . '/css/foot.css' );
	wp_enqueue_style( 'seed-foot', get_template_directory_uri() . '/css/james.css' );

	/* JS */
	/* <-- Move jQuery to footer for good Page Speed */
	// wp_deregister_script( 'jquery' );
	// wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	/* --> */

	wp_enqueue_script( 'jquery' );
	// wp_enqueue_script( 'seed-bootstrap3', get_stylesheet_directory_uri() . '/vendor/bootstrap3/js/bootstrap.min.js', array( 'jquery' ), array(), true );
	wp_enqueue_script( 'seed-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'seed-slidebars-script', get_template_directory_uri() . '/vendor/slidebars/slidebars.min.js', array(), '0.10.3', true );
	wp_enqueue_script( 'seed-main', get_template_directory_uri() . '/js/main.js', array(), '2016-1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'seed_scripts' );

/**
 * Registers an editor stylesheet for the theme.
 */
function seed_add_editor_styles() {
	add_editor_style( get_stylesheet_directory_uri() . '/css/wp-editor-style.css' );
}
add_action( 'admin_init', 'seed_add_editor_styles' );








/*======= Some great snippet =======*/

/**
 * WooCommerce
 */
add_theme_support( 'woocommerce' );
// remove_action( 'admin_notices', 'woothemes_updater_notice' );

/* Display 12 products per page */
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

/* Change Thumbnails Columns in Single Product Page */
add_filter ( 'woocommerce_product_thumbnails_columns', 'seed_thumb_cols' );
function seed_thumb_cols() {
	return 5;
}

add_filter( 'woocommerce_breadcrumb_defaults', 'seed_change_breadcrumb_delimiter' );
function seed_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = '<i class="si-angle-right"></i>';
	return $defaults;
}

/* Custome Thai Province order */
if (get_locale() == 'th') {
	add_filter( 'woocommerce_states', 'seed_woocommerce_states' );
}
function seed_woocommerce_states( $states ) {
	$states['TH'] = array(
		'TH-81' => 'กระบี่',
		'TH-10' => 'กรุงเทพมหานคร',
		'TH-71' => 'กาญจนบุรี',
		'TH-46' => 'กาฬสินธุ์',
		'TH-62' => 'กำแพงเพชร',
		'TH-40' => 'ขอนแก่น',
		'TH-22' => 'จันทบุรี',
		'TH-24' => 'ฉะเชิงเทรา',
		'TH-20' => 'ชลบุรี',
		'TH-18' => 'ชัยนาท',
		'TH-36' => 'ชัยภูมิ',
		'TH-86' => 'ชุมพร',
		'TH-57' => 'เชียงราย',
		'TH-50' => 'เชียงใหม่',
		'TH-92' => 'ตรัง',
		'TH-23' => 'ตราด',
		'TH-63' => 'ตาก',
		'TH-26' => 'นครนายก',
		'TH-73' => 'นครปฐม',
		'TH-48' => 'นครพนม',
		'TH-30' => 'นครราชสีมา',
		'TH-80' => 'นครศรีธรรมราช',
		'TH-60' => 'นครสวรรค์',
		'TH-12' => 'นนทบุรี',
		'TH-96' => 'นราธิวาส',
		'TH-55' => 'น่าน',
		'TH-38' => 'บึงกาฬ',
		'TH-31' => 'บุรีรัมย์',
		'TH-13' => 'ปทุมธานี',
		'TH-77' => 'ประจวบคีรีขันธ์',
		'TH-25' => 'ปราจีนบุรี',
		'TH-94' => 'ปัตตานี',
		'TH-14' => 'พระนครศรีอยุธยา',
		'TH-56' => 'พะเยา',
		'TH-82' => 'พังงา',
		'TH-93' => 'พัทลุง',
		'TH-66' => 'พิจิตร',
		'TH-65' => 'พิษณุโลก',
		'TH-76' => 'เพชรบุรี',
		'TH-67' => 'เพชรบูรณ์',
		'TH-54' => 'แพร่',
		'TH-83' => 'ภูเก็ต',
		'TH-44' => 'มหาสารคาม',
		'TH-49' => 'มุกดาหาร',
		'TH-58' => 'แม่ฮ่องสอน',
		'TH-35' => 'ยโสธร',
		'TH-95' => 'ยะลา',
		'TH-45' => 'ร้อยเอ็ด',
		'TH-85' => 'ระนอง',
		'TH-21' => 'ระยอง',
		'TH-70' => 'ราชบุรี',
		'TH-16' => 'ลพบุรี',
		'TH-52' => 'ลำปาง',
		'TH-51' => 'ลำพูน',
		'TH-42' => 'เลย',
		'TH-33' => 'ศรีสะเกษ',
		'TH-47' => 'สกลนคร',
		'TH-90' => 'สงขลา',
		'TH-91' => 'สตูล',
		'TH-11' => 'สมุทรปราการ',
		'TH-75' => 'สมุทรสงคราม',
		'TH-74' => 'สมุทรสาคร',
		'TH-27' => 'สระแก้ว',
		'TH-19' => 'สระบุรี',
		'TH-17' => 'สิงห์บุรี',
		'TH-64' => 'สุโขทัย',
		'TH-72' => 'สุพรรณบุรี',
		'TH-84' => 'สุราษฎร์ธานี',
		'TH-32' => 'สุรินทร์',
		'TH-43' => 'หนองคาย',
		'TH-39' => 'หนองบัวลำภู',
		'TH-15' => 'อ่างทอง',
		'TH-37' => 'อำนาจเจริญ',
		'TH-41' => 'อุดรธานี',
		'TH-53' => 'อุตรดิตถ์',
		'TH-61' => 'อุทัยธานี',
		'TH-34' => 'อุบลราชธานี'
		);
	return $states;
}




/**
 * Admin CSS
 */
function seed_admin_style() {
	wp_enqueue_style('seed-admin-style', get_template_directory_uri() . '/css/wp-admin.css');
}
add_action('admin_enqueue_scripts', 'seed_admin_style');




/**
 * Remove references to SiteOrigin Premium
 */
add_filter( 'siteorigin_premium_upgrade_teaser', '__return_false' );


/**
 * Show/hide admin bar
 */
function seed_bottom_admin_bar() {
	echo '
	<style type="text/css">
		html.sb-init {margin-top: 0 !important;}
		body.admin-bar .site-canvas {margin-bottom: 28px !important;}
		@media screen and (max-width: 782px) {body.admin-bar .site-canvas {margin-bottom: 0 !important;}}
	  #wpadminbar {top: auto !important;bottom: 0;}
	  #wpadminbar .quicklinks .ab-sub-wrapper {bottom: 28px;}
	  #wpadminbar .menupop .ab-sub-wrapper, 
	  #wpadminbar .shortlink-input {border-width: 1px 1px 0 1px;box-shadow:0 -2px 4px rgba(0,0,0,0.2);}
		body.wp-admin div#wpwrap div#footer {bottom: 28px !important;}
	</style>';
}
function seed_top_admin_bar() {
	echo '
	<style type="text/css">
		html.sb-init #wpadminbar {position:fixed;}
		.site.-header-fixed .site-header {top: 32px;}
		@media screen and (max-width: 782px) {.site.-header-fixed .site-header {top: 46px;}}
	</style>';
}
switch (SEED_ADMIN_BAR) {
	case 'hidden':
		add_filter('show_admin_bar', '__return_false');
	break;
	case 'bottom':
		if ( is_admin_bar_showing() ) {add_action( 'wp_head', 'seed_bottom_admin_bar' );}
	break;
	case 'top':
		if ( is_admin_bar_showing() ) {add_action( 'wp_head', 'seed_top_admin_bar' );}
	break;
	default:
	break;
}



/**
 * Using More Tag instead of Excerpt
 */
/*
add_filter('the_excerpt','seed_use_more_tag');
function seed_use_more_tag(){
	$content = get_post_field( 'post_content', get_the_ID() );
	$content_parts = get_extended( $content );
	echo $content_parts['main'];
}
*/


/**
 * Force WordPress Gallery to Use Media File Link instead of Attachment Link.
 */
/*
add_shortcode( 'gallery', 'my_gallery_shortcode' );
function my_gallery_shortcode( $atts )
{
    $atts['link'] = 'file';
    return gallery_shortcode( $atts );
}
*/


/**
 * Remove "Category: ", "Tag: ", "Taxonomy: " from archive title
 */
/*
add_filter( 'get_the_archive_title', 'seed_get_the_archive_title');
function seed_get_the_archive_title($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false ) ;
	}
	return $title;
}
*/
add_filter( 'get_the_archive_title', 'seed_get_the_archive_title');
function seed_get_the_archive_title($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	}
	return $title;
}






/**
 * Seed Theme Updater 
 */
function seed_theme_updater() {
	require( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'seed_theme_updater' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

