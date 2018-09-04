<?php
 /**
 *
 * @package   CLT Functionality
 * @author    Vannessa Bertoletti <vanessabertoletti@gmail.com>
 *			  Jarid Warren <jaridwarren@gmail.com>
 *			  Einer Lim <einer.lim322@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2018 Community Land Trust
 *
 * @wordpress-plugin
 * Plugin Name: CLT Functionality
 * Description: This very important plugin contains all of the core functionality for this website so that it remains theme-independent.
 * Version:     1.0.0
 * Author:      Vannessa Bertoletti <vanessabertoletti@gmail.com>
 *				Jarid Warren <jaridwarren@gmail.com>
 *				Einer Lim <einer.lim322@gmail.com>
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define plugin directory
 *
 * @since 1.0.0
 */
define( 'CLT_DIR', dirname( __FILE__ ) );

/**
 * General housekeeping and plugin activation tasks
 *
 * @since 1.0.0
 */
include_once( CLT_DIR . '/lib/functions/general.php' );
register_activation_hook( __FILE__, array( 'CLT_General', 'plugin_activation' ) );

/**
 * Post types
 *
 * @since 1.0.0
 */
include_once( CLT_DIR . '/lib/functions/post-types.php' );

/**
 * Taxonomies
 *
 * @since 1.0.0
 */
include_once( CLT_DIR . '/lib/functions/taxonomies.php' );
