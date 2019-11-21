<?php
//add custom post type
require_once ('post_type/bookstore.php');

add_action( 'init', array(new MyBooks(), 'init') ,0);

add_theme_support( 'post-thumbnails' );

// Define constant
abstract class MyActions {	 
}

class MyManagers {

	function __construct() {
		$this->init();
	}

	function init() {
        // Manage Resources
        add_action('wp_enqueue_scripts', array($this, 'manage_resources') ); 
        // Deregister Stylesheet
        add_action('wp_print_styles', array($this, 'deregister_plugin_styles')); 
        add_action('pre_get_posts', array($this, 'custom_post_author_archive')); 
    }
    
    function custom_post_author_archive($query) {
        if ($query->is_author)
            $query->set( 'post_type', array('books', 'post') );
        remove_action( 'pre_get_posts', 'custom_post_author_archive' );
    }    

    function manage_resources() {
        wp_enqueue_style( 'allcss', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), false, false); 
        wp_enqueue_style( 'maincss', get_template_directory_uri() . '/css/slick-theme.css', array(), false, false );
        wp_enqueue_script( 'alljs', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), false, true );           
        wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true );        
    }

}

$objManager = new MyManagers();