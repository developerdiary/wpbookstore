<?php

class MyBooks {

    function init() {
        $labels = array(
            'name'                  => _x( 'Books', 'Post Type General Name', 'My' ),
            'singular_name'         => _x( 'Book', 'Post Type Singular Name', 'My' ),
            'menu_name'             => __( 'Books', 'My' ),
            'name_admin_bar'        => __( 'Post Type', 'My' ),
            'archives'              => __( 'Item Archives', 'My' ),
            'attributes'            => __( 'Item Attributes', 'My' ),
            'parent_item_colon'     => __( 'Parent Item:', 'My' ),
            'all_items'             => __( 'All Items', 'My' ),
            'add_new_item'          => __( 'Add New Item', 'My' ),
            'add_new'               => __( 'Add New', 'My' ),
            'new_item'              => __( 'New Item', 'My' ),
            'edit_item'             => __( 'Edit Item', 'My' ),
            'update_item'           => __( 'Update Item', 'My' ),
            'view_item'             => __( 'View Item', 'My' ),
            'view_items'            => __( 'View Items', 'My' ),
            'search_items'          => __( 'Search Item', 'My' ),
            'not_found'             => __( 'Not found', 'My' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'My' ),
            'featured_image'        => __( 'Featured Image', 'My' ),
            'set_featured_image'    => __( 'Set featured image', 'My' ),
            'remove_featured_image' => __( 'Remove featured image', 'My' ),
            'use_featured_image'    => __( 'Use as featured image', 'My' ),
            'insert_into_item'      => __( 'Insert into item', 'My' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'My' ),
            'items_list'            => __( 'Items list', 'My' ),
            'items_list_navigation' => __( 'Items list navigation', 'My' ),
            'filter_items_list'     => __( 'Filter items list', 'My' ),
        );
        $args = array(
            'label'                 => __( 'Books', 'My' ),
            'description'           => __( 'books', 'My' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'page-attributes' ),            
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            "rewrite"               => array( 'slug' => 'books', 'with_front' => true, ),
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
        );
        register_post_type( 'books', $args ); 

        $labelsTaxonomy = array(
            'name' => _x( 'Types', 'taxonomy general name' ),
            'singular_name' => _x( 'Type', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Types' ),
            'all_items' => __( 'All Types' ),
            'parent_item' => __( 'Parent Type' ),
            'parent_item_colon' => __( 'Parent Type:' ),
            'edit_item' => __( 'Edit Type' ), 
            'update_item' => __( 'Update Type' ),
            'add_new_item' => __( 'Add New Type' ),
            'new_item_name' => __( 'New Type Name' ),
            'menu_name' => __( 'Types' ),
        );    

        register_taxonomy('types', array('books'), array(
            'hierarchical' => true,
            'labels' => $labelsTaxonomy,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'type' ),
        ));  

        // Default books showing on index query
        // function add_my_post_types_to_query( $query ) {
        //     if ( is_home() && $query->is_main_query() )
        //         $query->set( 'post_type', array( 'post', 'books' ) );
        //     return $query;
        // }  
        // add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

   }

}