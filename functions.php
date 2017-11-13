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
add_theme_support('html5',array('search-form'));
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

/*
        ===========================
          include walker class
        ===========================
*/
 require get_template_directory() . '/inc/walker.php';

 /*
        ===========================
          Head Function
        ===========================
*/

function brocool_remove_version () {
        return '' ;
}
add_filter( 'the_generator', 'brocool_remove_version');

 /*
        ===========================
          Custom Post Type
        ===========================
*/

function brocool_Custom_Post_Type(){

        $support = array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'revisions',
        );

        $labels = array(
                'name' => 'Portfolio',
                'singular_name' => 'Portfolio',
                'add_new' => 'Add Item',
                'all_items' =>'All Items',
                'add_new_item' => 'Add  New Item',
                'edit_item' => 'Edit Item',
                'new_item' => 'New Item',
                'view_item' => 'View Item',
                'search_items' => 'Search Portfolio',
                'not_found_in_trash' => 'No Items Found in trash',
                'parent_item_colon' => 'Parent Item'
        );

        $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => true,
                'publicly_queryable' => true,
                'query_var' => true,
                'rewrite' => true, 
                'capability_type' => 'post',
                'hierarchical' => false,
                'supports' => $support, 
                //'taxonomies' => array('category', 'post_tag' ),
                'meun-position' => 5,
                'exclude_from_search' => false,              
        );

        register_post_type( 'portfolio', $args );
}
add_action( 'init', 'brocool_Custom_Post_Type');

function brocool_Custom_taxonomies() {
        
        // add new taxonomy hierarchical
        $labels = array(
                'name' =>'fields' , 
                'singular_name' => 'field',
                'search_items' => 'Search field',
                'all_items' =>'All field',
                'parent_item' => 'Parent field' ,
                'parent_item_colon' => 'Parent field:',
                'edit_item' => 'Edit field',
                'update_item' => 'Update field',
                'add_new_item' => 'Add New field',
                'new_item_name' => 'New field Name',
                'menu_name' => 'field',
                'not_found' => 'No field Found',
                'not_found_in_trash' => 'No field Found in trash',
        );

        $args = array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array ('slug' =>'field'),
        );
        register_taxonomy( 'field','portfolio', $args );
        
        // add new taxonomy Not hierarchical

        register_taxonomy( 'software','portfolio', array (
                'label' => 'software',
                'rewrite' => array ('slug' =>'software'),
                'hierarchical' => false,
        ) );
}
add_action( 'init', 'brocool_Custom_taxonomies');
 /*
        ===========================
          Custom term Function
        ===========================
*/
function brocool_get_terme($postID, $term) {

        $terms_list = wp_get_post_terms($postID, $term);
        $output ='';

        $i = 0 ;
        foreach ($terms_list as $term ) { $i++;
            if ($i >1) { 
                $output .= ', ';
            }
           $output.= '<a href="'. get_term_link($term) . '">'. $term->name . '</a>';
        }
        return $output;
}