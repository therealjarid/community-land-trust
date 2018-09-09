<?php
/**
 * TAXONOMIES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

// Register Custom 'Product Type' Taxonomy
function clt_register_taxonomies() {

	$tax_types = array( "Portfolio Type" => "portfolio", 
						"Portfolio Location" => "portfolio" 
				);

	foreach ( $tax_types as $tax_type => $post_type ) {

		$labels  = array(
			'name'                       => $tax_type . "s",
			'singular_name'              => $tax_type,
			'menu_name'                  => $tax_type,
			'all_items'                  => 'All' . $tax_type,
			'parent_item'                => 'Parent ' . $tax_type,
			'parent_item_colon'          => 'Parent ' . $tax_type . ':',
			'new_item_name'              => 'New ' . $tax_type . ' Name',
			'add_new_item'               => 'Add New ' . $tax_type,
			'edit_item'                  => 'Edit ' . $tax_type,
			'update_item'                => 'Update ' . $tax_type,
			'view_item'                  => 'View ' . $tax_type,
			'separate_items_with_commas' => 'Separate ' . strtolower( $tax_type ) . ' with commas',
			'add_or_remove_items'        => 'Add or remove ' . strtolower( $tax_type ) . 's',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular ' . $tax_type . 's',
			'search_items'               => 'Search ' . $tax_type . 's',
			'not_found'                  => 'Not Found',
			'no_terms'                   => 'No ' . strtolower( $tax_type ) . 's',
			'items_list'                 => $tax_type . 's list',
			'items_list_navigation'      => $tax_type . 's list navigation',
		);
		$rewrite = array(
			'slug'         => str_replace( ' ', '-', strtolower( $tax_type ) ),
			'with_front'   => true,
			'hierarchical' => true,
		);
		$args    = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'rewrite'           => $rewrite,
			'show_in_rest'      => true,
			'rest_base'         => str_replace( ' ', '_', strtolower( $tax_type ) )
		);

		register_taxonomy( $tax_type, array( $post_type ), $args );
	}
}

add_action( 'init', 'clt_register_taxonomies', 0 );
