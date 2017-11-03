<?php
/*
        ===========================
        Include scripts
        ===========================
*/
function brocool_script_enqueue() {
    
                //css//
    wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css' , array(),'3.3.4' , 'all' );
    wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/Brocool.css' , array(),'0.0.1' , 'all' );
    
                //Js//   
    wp_enqueue_script( 'customscript', get_template_directory_uri() . '/js/brocool.js' , array(),'0.0.1', true ); 
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js' , array(),'3.3.4', true );
    wp_enqueue_script( 'jquery');
}
add_action( 'wp_enqueue_scripts', 'brocool_script_enqueue');
/*
        ===========================
        Activete Menus
        ===========================
*/
function brocool_theme_setup(){
    add_theme_support( 'menus' );
    register_nav_menu( 'primary', 'Primary Header Navigation' );
    register_nav_menu( 'secondery', 'secondery Header Navigation' );
}
add_action('init','brocool_theme_setup' );
/*
        ===========================
        Activete Theme Support
        ===========================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support( 'post-formats',array('video','aside','image') );
/*
        ===========================
          Sidebar function
        ===========================
*/
function brocool_widget_setup() {
  register_sidebar( array(
                        'name' => 'Sidebar',
                        'id' => 'sidebar-1',
                        'after_widget' => '<aside id="%$s" class="widget %2$s">',
                        'before_wiget' =>'</aside>',
                        'before_title' => '<h1 class="widget-title">',
                        'after_title' => '</h1>',
                        ) 
  );       

}

add_action( 'widgets_init', 'brocool_widget_setup' );
