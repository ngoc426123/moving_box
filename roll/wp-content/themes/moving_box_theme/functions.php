<?php
require_once("functions/post-type-quanlylogo.php");
require_once("functions/post-type-quanlylienhe.php");
require_once("functions/post-type-quanlybanner.php");
define(TEMP_DIR, get_template_directory_uri());
define(HOME_URL, home_url());
define(HOME_TITLE, get_bloginfo('name'));
add_filter('show_admin_bar', '__return_false');
add_theme_support( 'post-thumbnails' );
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////        
///                        ADD CSS AND JS FOR STYLE                           /// 
/////////////////                                               /////////////////
add_filter('use_block_editor_for_post', '__return_false');
function movingbox_styles(){
    // GLOBAL
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
    remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
	wp_enqueue_style('mvbStyle-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.css','all' );
	wp_enqueue_style('mvbStyle-fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css','all' );
	wp_enqueue_style('mvbStyle-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css','all' );
    wp_enqueue_style('mvbStyle-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css','all' );
    wp_enqueue_style('mvbStyle-menumobile', TEMP_DIR.'/js/menumobile/menumobile.css','all' );
    wp_enqueue_style('mvbStyle-style', get_stylesheet_directory_uri().'/style.css','all' );
    wp_enqueue_script('mvbScript-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js');
    wp_enqueue_script('mvbScript-fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js');
    wp_enqueue_script('mvbScript-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js');
    wp_enqueue_script('mvbScript-nicescroll', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js');
    wp_enqueue_script('mvbScript-menumobile', TEMP_DIR.'/js/menumobile/menumobile.js');
    wp_enqueue_script('mvbScript-style', TEMP_DIR.'/js/style.js');
    // MAIN
    if(is_home()){
        wp_enqueue_style('mvbStyle-module', TEMP_DIR.'/style/main.css','all' );
        wp_enqueue_script('mvbScript-module', TEMP_DIR.'/js/main/main.js');
    }
}
add_action('wp_enqueue_scripts', 'movingbox_styles');
function remove_menus() {
    remove_menu_page( 'jetpack' );                    //Jetpack* 
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'upload.php' );                 //Media
    remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action('admin_menu','remove_menus');

?>