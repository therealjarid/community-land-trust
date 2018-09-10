<?php
/**
 * CLT Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CLT_Theme
 */

if ( ! function_exists( 'clt_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function clt_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // clt_setup
add_action( 'after_setup_theme', 'clt_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function clt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'clt_content_width', 640 );
}
add_action( 'after_setup_theme', 'clt_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function clt_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html( 'Footer' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'clt_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function clt_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'clt_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function clt_scripts() {

	wp_enqueue_style( 'clt-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'clt-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );
	
	//adding flickity styles via CDN
	wp_enqueue_style( 'clt-flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css');

	//adding Google Fonts
	wp_enqueue_style('clt-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,500,700');

	// add font awesome via CDN 
	wp_enqueue_style( 'clt-font-awesome-icons', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css');

	// adding flickity config 
	wp_enqueue_script('flickity-config', get_template_directory_uri() . '/build/js/flickity-config.min.js', array( 'jquery' ), true);

	// adding counter-up scripts
	wp_enqueue_script('counter-up', get_template_directory_uri() . '/build/js/counter-up.min.js', array( 'jquery' ), true);

	// adding flickity scripts via CDN
	wp_enqueue_script( 'flickity', '//cdnjs.cloudflare.com/ajax/libs/flickity/1.1.1/flickity.pkgd.min.js', array( 'jquery' ), null, true  );
	
	// adding header functionality 
	wp_enqueue_script('header-toggle', get_template_directory_uri() . '/build/js/header-toggle.min.js', array( 'jquery' ), null, true);

	// adding FAQ functionality 
	wp_enqueue_script('faq-page', get_template_directory_uri() . '/build/js/faq-page.min.js', array( 'jquery' ), null, true);

	// adding Google Map script via CDN
	if ( is_page( 'find' ) ) {
		
		wp_enqueue_script( 'google-map-cdn', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDhvBO_mzcQWohzRiHKmgdfzPrOw3Bu6mE', array(), null, false );

		wp_enqueue_script( 'google-js', get_template_directory_uri() . '/build/js/google-map.min.js', array( 'jquery', 'google-map-cdn' ), null,false );

		wp_localize_script( 'google-js', 'apiVars', array(
			'restUrl' => esc_url_raw( rest_url() ),
			'nonce'   => wp_create_nonce( 'wp_rest' ),
			'failure' => "There was a problem getting your locations, please refresh and try again."
		) );
	}

	// adding Counterup plugin script

	if ( is_front_page() ) {
		wp_enqueue_script( 'counter-up-plugin', '//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js', array( 'jquery' ), null, true );

		wp_enqueue_script( 'counter-up-plugin', 'jquery.counterup.min.js', array( 'jquery' ), null, true );
	}
}
add_action( 'wp_enqueue_scripts', 'clt_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * The following makes CFS data available to the REST API
 */
add_action( 'rest_api_init', 'slug_register_zipcode' );
function slug_register_zipcode() {
    register_rest_field( 'portfolio',
        'portfolio_zip',
        array(
            'get_callback'    => 'slug_get_zipcode',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

/**
 * Get the value of the "portfolio_zip" field
 *
 * @param array $object Details of current post.
 * @param string $field_name Name of field.
 * @param WP_REST_Request $request Current request
 *
 * @return string
 */
function slug_get_zipcode( $object, $field_name, $request ) {
    return CFS()->get( $field_name, $object[ 'id' ] );
}