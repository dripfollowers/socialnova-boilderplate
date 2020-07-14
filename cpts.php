<?php 

function cptui_register_my_cpts() {

	/**
	 * Post Type: Auto Followers Packs.
	 */

	$labels = array(
		"name" => __( "Auto Followers Packs", "custom-post-type-ui" ),
		"singular_name" => __( "Auto Followers pack", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Auto Followers Packs", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "buy-automatic-instagram-followers", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"supports" => array( "title" ),
	);

	register_post_type( "automatic-followers", $args );

	/**
	 * Post Type: Auto Followers Packs.
	 */

	$labels = array(
		"name" => __( "Auto likes Packs", "custom-post-type-ui" ),
		"singular_name" => __( "Auto likes pack", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Auto likes Packs", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "buy-automatic-instagram-likes", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"supports" => array( "title" ),
	);

	register_post_type( "automatic-likes", $args );

	/**
	 * Post Type: Followers Packs.
	 */

	$labels = array(
		"name" => __( "Instant Followers Packs", "custom-post-type-ui" ),
		"singular_name" => __( "Instant Followers pack", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Instant Followers Packs", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "buy-instagram-followers-cheap", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"supports" => array( "title" ),
	);

	register_post_type( "instant-followers", $args );

	/**
	 * Post Type: Likes Packs.
	 */

	$labels = array(
		"name" => __( "Instant Likes Packs", "custom-post-type-ui" ),
		"singular_name" => __( "Instant Likes pack", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Instant Likes Packs", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "buy-instagram-likes-cheap", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"supports" => array( "title" ),
	);

	register_post_type( "instant-likes", $args );

	/**
	 * Post Type: Help & FAQ.
	 */

	$labels = array(
		"name" => __( "Help & FAQ", "custom-post-type-ui" ),
		"singular_name" => __( "Help & FAQ", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Help & FAQ", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "faq", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 6,
		"supports" => array( "title", "editor" ),
	);

	register_post_type( "faq", $args );

	/**
	 * Post Type: Reviews.
	 */

	$labels = array(
		"name" => __( "Reviews", "custom-post-type-ui" ),
		"singular_name" => __( "Review", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Reviews", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "reviews", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 6,
		"supports" => array( "title" ),
	);

	register_post_type( "reviews", $args );

	/**
	 * Post Type: Views Packs.
	 */

	$labels = array(
		"name" => __( "Views Packs", "custom-post-type-ui" ),
		"singular_name" => __( "Views Pack", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Views Packs", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "buy-instagram-views-cheap", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 6,
		"supports" => array( "title" ),
	);

	register_post_type( "instant-views", $args );

	
}

add_action( 'init', 'cptui_register_my_cpts' );
