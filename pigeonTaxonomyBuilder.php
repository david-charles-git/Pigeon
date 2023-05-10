<?php
    register_taxonomy (
        'profileTypes',
        array (
            'profiles'
        ),
        array(
            'hierarchical' => true,
            
            'labels' => array(
                'name' => _x( 'Profile Types', 'taxonomy general name' ),
                'singular_name' => _x( 'Profile Type', 'taxonomy singular name' ),
                'search_items' =>  __( 'Search Profile Types' ),
                'all_items' => __( 'All Profile Types' ),
                'parent_item' => __( 'Parent Profile Type' ),
                'parent_item_colon' => __( 'Profile Type:' ),
                'edit_item' => __( 'Edit Profile Type' ),
                'update_item' => __( 'Update Profile Type' ),
                'add_new_item' => __( 'Add New Profile Type' ),
                'new_item_name' => __( 'New Profile Type Name' ),
                'menu_name' => __( 'Profile Types' ),
            ),
            // Control the slugs used for this taxonomy
            'rewrite' => array(
            'slug' => 'profileTypes', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
            ),
        )
    );
?>