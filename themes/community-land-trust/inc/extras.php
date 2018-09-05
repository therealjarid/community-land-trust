<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package CLT_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function clt_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'clt_body_classes' );

function clt_login_logo()
{
    echo '<style type="text/css">                                                                   
	body.login div#login h1 a { 
		background-image:url('.get_stylesheet_directory_uri().'/assets/images/logos/logo-horizontal.svg) !important; 
		background-size: 320px 70px !important;
		width: 320px;
		margin: 0;
	} 
	#loginform {
		margin-top: 0;
	}
	</style>';
}
add_action('login_head', 'clt_login_logo');

/**
 * The following changes the logo url 
 */

function clt_login_url( $url )
{
    return get_bloginfo(home_url());
}
add_filter('login_headerurl', 'clt_login_url');

/**
 * Add Favicon to backend of WordPress.
 */
function show_favicon() {
	echo '<link href="'.get_stylesheet_directory_uri().'/assets/images/favicon.ico" rel="icon" type="image/x-icon">';
}
add_action('admin_head', 'show_favicon');
