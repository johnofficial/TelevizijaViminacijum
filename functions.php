<?php

/*		Adding assets files		*/	
function add_assets_files(){
	//adding css file
	wp_enqueue_style( 'customstyle', get_template_directory_uri().'/css/main.css', array(), '1.0.0', 'all' );
	//adding jquery file
	wp_enqueue_script( 'customjquery', get_template_directory_uri().'/js/jquery-3.1.1.min.js', array(), '1.0.0', 'true' );
	//adding javascript file
	wp_enqueue_script( 'customjavascript', get_template_directory_uri().'/js/main.js', array(), '1.0.0', 'true' );
}
add_action('wp_enqueue_scripts', 'add_assets_files');


function viminacijum_theme_setup(){	
	//Allows to customise menu
	add_theme_support('menus');
	register_nav_menu( 'primary', 'Primary Header Navigation' );
}
add_action('init', 'viminacijum_theme_setup');



/*		THEME SUPORT 		*/

add_theme_support('html5', array('comment-list','comment-form', 'search-form'));
add_theme_support( 'post-thumbnails' );

//add_theme_support( 'post-formats', array('video') );


















/*		REMOVING TRASH CODE THAT WP ADD 		*/

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
//WEBLOG CLIENT LINK
remove_action ('wp_head', 'rsd_link');
//Windows Live Writer Manifest Link
remove_action( 'wp_head', 'wlwmanifest_link');
//WordPress Generator (with version information)
remove_action('wp_head', 'wp_generator');

/*		END REMOVING TRASH CODE THAT WP ADD			*/