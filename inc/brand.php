<?php
// hook into the init action and call create_book_taxonomies when it fires


    add_action( 'init', 'create_Brand_taxonomies', 0 );

// create two taxonomies, genres and Brands for the post type "book"
function create_Brand_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Brands', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Brands', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Brands', 'textdomain' ),
		'all_items'         => __( 'All Brands', 'textdomain' ),
		'parent_item'       => __( 'Parent Brands', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Brands:', 'textdomain' ),
		'edit_item'         => __( 'Edit Brands', 'textdomain' ),
		'update_item'       => __( 'Update Brands', 'textdomain' ),
		'add_new_item'      => __( 'Add New Brands', 'textdomain' ),
		'new_item_name'     => __( 'New Brands Name', 'textdomain' ),
		'menu_name'         => __( 'Brands', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'brand' ),
	);

	

	register_taxonomy( 'brand', 'product', $args );
}
?>