<?php
/**
 * Bootstap Essentials functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bootstrap_Essentials
 */

if ( ! function_exists( 'bse_wordpress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bse_wordpress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bootstap Essentials, use a find and replace
	 * to change 'bootstrap-essentials' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bootstrap-essentials', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Navbar' => esc_html__( 'navbar', 'bootstrap-essentials' ),
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( '.navbar-brand' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'bse_wordpress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bse_wordpress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bse_wordpress_content_width', 640 );
}
add_action( 'after_setup_theme', 'bse_wordpress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bse_wordpress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bootstrap-essentials' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bootstrap-essentials' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'bse_wordpress_widgets_init' );

/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

/**
 * Enqueue scripts and styles.
 */
function bse_wordpress_scripts() {
	wp_enqueue_style( 'bootstrap-essentials-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap-essentials-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bootstrap-essentials-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bse_wordpress_scripts' );

/**
 * The Excert filter.
 */
 function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Sidebar Class.
 */
 function sidebar_class($class_name) {
	 if(is_active_sidebar('sidebar-1')) {
		 return $class_name;
	 }
 }
 function not_sidebar_class($class_name) {
	 if(!is_active_sidebar('sidebar-1')) {
		 return $class_name;
	 }
 }

// Card class - designed for blogs only- pages excluded

 function cards_class($class_name, $else_class = '') {
	 if ( is_home() && get_option( 'blog_panel')=='1' ) {
		return $class_name;
	 }

	 else if((is_single() || is_category() || is_archive()) && get_option( 'blog_panel')=='1') {
		 return $class_name;
	 }
	 else {
		 return $else_class;
	 }
 }

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

// Register Custom Navigation Walker
require_once('walkers/wp-bootstrap-navwalker.php');

// Register Custom Media Object Walker
require_once('walkers/wp-bootstrap-mediawalker.php');

// Register Comment form Walker
require_once('walkers/wp-bootstrap-commentformwalker.php');

// Register Paginination 
require_once('walkers/wp-bootstrap-pagination.php');

// Bootstrap Dashboard
require_once('bootstrapmenu.php');

function remove_p_on_pages() {
    if ( is_page() ) {
        remove_filter( 'the_content', 'wpautop' );
    }
}
add_action( 'wp_head', 'remove_p_on_pages' );

function theme_styles() {
	wp_enqueue_style( 'bs', 'http://themes.bootstrapessentials.com/dist/themes/'. get_option('style_option') . '/css/'. get_option('style_option') .'-bootstrap.min.css');
	wp_enqueue_style( 'bse', 'http://themes.bootstrapessentials.com/dist/themes/'. get_option('style_option') .'/css/'. get_option('style_option') .'-bootstrap-essentials.min.css');
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );

