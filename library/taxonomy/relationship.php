<?php
// call the function on WP init
add_action( 'init', 'register_places_taxonomies', 0 );

// define custom taxonomy
function register_places_taxonomies() {

	$place_labels = array(

		'name'                       => _x( 'Place Relationships', 'Taxonomy General Name', 'cvmbsPress' ),
		'singular_name'              => _x( 'Place Relationship', 'Taxonomy Singular Name', 'cvmbsPress' ),
		'menu_name'                  => __( 'Place Relationships', 'cvmbsPress' ),
		'all_items'                  => __( 'All Items', 'cvmbsPress' ),
		'parent_item'                => __( 'Parent Item', 'cvmbsPress' ),
		'parent_item_colon'          => __( 'Parent Item:', 'cvmbsPress' ),
		'new_item_name'              => __( 'New Item Name', 'cvmbsPress' ),
		'add_new_item'               => __( 'Add New Item', 'cvmbsPress' ),
		'edit_item'                  => __( 'Edit Item', 'cvmbsPress' ),
		'update_item'                => __( 'Update Item', 'cvmbsPress' ),
		'view_item'                  => __( 'View Item', 'cvmbsPress' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'cvmbsPress' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'cvmbsPress' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'cvmbsPress' ),
		'popular_items'              => __( 'Popular Items', 'cvmbsPress' ),
		'search_items'               => __( 'Search Items', 'cvmbsPress' ),
		'not_found'                  => __( 'Not Found', 'cvmbsPress' ),
		'no_terms'                   => __( 'No items', 'cvmbsPress' ),
		'items_list'                 => __( 'Items list', 'cvmbsPress' ),
		'items_list_navigation'      => __( 'Items list navigation', 'cvmbsPress' ),

	);

	$places = array(

		'labels'                     => $place_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true

	);

	// register taxonomy
	register_taxonomy( 'place_relationships', array( 'places' ), $places );

}
