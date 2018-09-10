<?php

//===Post Type city for barber shops===
function codex_city_init(){
	$labels = array(
		'name'               => __('City',          'barber'),
		'singular_name'      => __('City',          'barber'),
		'menu_name'          => __('City List',     'barber'),
		'name_admin_bar'     => __('City',          'barber'),
		'add_new'            => __('Add New',       'barber'),
		'add_new_item'       => __('Add New City',  'barber'),
		'new_item'           => __('New City',      'barber'),
		'edit_item'          => __('Edit City',     'barber'),
		'view_item'          => __('View City',     'barber'),
		'all_items'          => __('All City',      'barber'),
		'search_items'       => __('Search City',   'barber'),
		'parent_item_colon'  => __('Parent City:',  'barber'),
		'not_found'          => __('No found.',     'barber'),
		'not_found_in_trash' => __('No found in Trash.', 'barber')
	);
	$args = array(
		'labels'             => $labels,
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'city'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('city', $args );
}
add_action('init', 'codex_city_init');


//===Post Type shop for city===
function codex_shop_init(){
	$labels = array(
		'name'               => __('Shop',          'barber'),
		'singular_name'      => __('Shop',          'barber'),
		'menu_name'          => __('Shop List',     'barber'),
		'name_admin_bar'     => __('Shop',          'barber'),
		'add_new'            => __('Add New',       'barber'),
		'add_new_item'       => __('Add New Shop',  'barber'),
		'new_item'           => __('New Shop',      'barber'),
		'edit_item'          => __('Edit Shop',     'barber'),
		'view_item'          => __('View Shop',     'barber'),
		'all_items'          => __('All Shop',      'barber'),
		'search_items'       => __('Search Shop',   'barber'),
		'parent_item_colon'  => __('Parent Shop:',  'barber'),
		'not_found'          => __('No found.',     'barber'),
		'not_found_in_trash' => __('No found in Trash.', 'barber')
	);
	$args = array(
		'labels'             => $labels,
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'netshop'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('netshop', $args );
}
add_action('init', 'codex_shop_init');




