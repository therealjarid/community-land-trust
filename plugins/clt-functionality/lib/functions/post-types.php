<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Register Custom Post Type
function clt_register_post_types() {

	$post_types = array(
		'FAQ'       => 'dashicons-editor-help',
		'Partner'   => 'dashicons-groups',
		'Portfolio' => 'dashicons-admin-multisite'
	);

	foreach ( $post_types as $post_type => $dashicon ) {

		$labels = array(
			'name'                  => $post_type . 's',
			'singular_name'         => $post_type,
			'menu_name'             => $post_type . 's',
			'name_admin_bar'        => $post_type,
			'archives'              => $post_type . ' Archives',
			'attributes'            => $post_type . ' Attributes',
			'parent_item_colon'     => 'Parent ' . $post_type . ':',
			'all_items'             => 'All ' . $post_type . 's',
			'add_new_item'          => 'Add New ' . $post_type,
			'add_new'               => 'Add New',
			'new_item'              => 'New ' . $post_type,
			'edit_item'             => 'Edit ' . $post_type,
			'update_item'           => 'Update ' . $post_type,
			'view_item'             => 'View ' . $post_type,
			'view_items'            => 'View ' . $post_type . 's',
			'search_items'          => 'Search ' . $post_type,
			'not_found'             => 'Not found',
			'not_found_in_trash'    => 'Not found in Trash',
			'featured_image'        => 'Featured Image',
			'set_featured_image'    => 'Set featured image',
			'remove_featured_image' => 'Remove featured image',
			'use_featured_image'    => 'Use as featured image',
			'insert_into_item'      => 'Insert into ' . strtolower( $post_type ),
			'uploaded_to_this_item' => 'Uploaded to this ' . strtolower( $post_type ),
			'items_list'            => $post_type . 's' . ' list',
			'items_list_navigation' => $post_type . 's' . ' list navigation',
			'filter_items_list'     => 'Filter ' . strtolower( $post_type ) . ' list',
		);
		$args   = array(
			'label'               => $post_type,
			'description'         => 'A custom post type for ' . $post_type,
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => $dashicon,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => strtolower( $post_type ) . 's',
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
			// 'template_lock'       => 'all',
			'template'            => array(
				array(
					'core/paragraph',
					array(
						'placeholder' => 'Add the ' . strtolower( $post_type ) . ' description here.'
					)
				)
			)
		);
		register_post_type( strtolower( $post_type ), $args );
	}
}

add_action( 'init', 'clt_register_post_types', 0 );

