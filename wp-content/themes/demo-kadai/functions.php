<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' , array('parent-style') );
}

function cptui_register_my_cpts_event() {

	/**
	 * Post Type: イベント情報.
	 */

	$labels = [
		"name" => __( "イベント情報", "custom-post-type-ui" ),
		"singular_name" => __( "イベント情報", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "イベント情報", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "event", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "post_tag" ],
	];

	register_post_type( "event", $args );
}

add_action( 'init', 'cptui_register_my_cpts_event' );
