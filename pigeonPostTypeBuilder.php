<?php
if (!defined('ABSPATH')) {
		exit; // Exit if accessed directly.
	}

    //Testimonials
    $labels = [
        "name" => __( "Testimonials", "custom-post-type-ui" ),
        "singular_name" => __( "Testimonial", "custom-post-type-ui" ),
    ];
    $args = [
        "label" => __( "Testimonials", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "testimonials", "with_front" => true ],
        "query_var" => true,
        "menu_position" => 100,
        "menu_icon" => "dashicons-format-quote",
        "supports" => [ "title", "thumbnail" ],
        "taxonomies" => [],
        "show_in_graphql" => false,
    ];

    register_post_type( "testimonials", $args );

     //Profiles
     $labels = [
        "name" => __( "Profiles", "custom-post-type-ui" ),
        "singular_name" => __( "Profile", "custom-post-type-ui" ),
    ];
    $args = [
        "label" => __( "Profiles", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "profiles", "with_front" => true ],
        "query_var" => true,
        "menu_position" => 100,
        "menu_icon" => "dashicons-id",
        "supports" => [ "title", "thumbnail" ],
        "taxonomies" => ["profileType"],
        "show_in_graphql" => false,
    ];

    register_post_type( "profiles", $args );
?>