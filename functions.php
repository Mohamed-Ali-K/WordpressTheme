<?php
function brocool_script_enqueue() {

    wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/Brocool.css' , array(),'0.0.1' , 'all' );
    wp_enqueue_script( 'customscript', get_template_directory_uri() . '/js/brocool.js' , array(),'0.0.1', true );
}
add_action( 'wp_enqueue_scripts', 'brocool_script_enqueue');
function brocool_theme_setup(){
    add_theme_support( 'menus' );
    register_nav_menu( 'primary', 'Primary Header Navigation' );
    register_nav_menu( 'secondery', 'secondery Header Navigation' );
}
add_action('init','brocool_theme_setup' );
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support( 'post-formats',array('video','aside','image') );