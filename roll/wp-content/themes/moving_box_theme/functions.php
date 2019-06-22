<?php
require_once("functions/post-type-quanlylogo.php");
require_once("functions/post-type-quanlylienhe.php");
require_once("functions/post-type-quanlybanner.php");
require_once("functions/post-type-quanlydichvu.php");
require_once("functions/post-type-quanlydoitac.php");
define(TEMP_DIR, get_template_directory_uri());
define(HOME_URL, home_url());
define(HOME_TITLE, get_bloginfo('name'));
add_filter('show_admin_bar', '__return_false');
add_theme_support( 'post-thumbnails' );
function register_my_menu() {
  register_nav_menu('new-menu',__( 'New Menu' ));
}
add_action( 'init', 'register_my_menu' );
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
        wp_enqueue_style('mvbStyle-module-service', TEMP_DIR.'/style/service.css','all' );
        wp_enqueue_style('mvbStyle-module-main', TEMP_DIR.'/style/main.css','all' );
        wp_enqueue_script('mvbScript-module', TEMP_DIR.'/js/main/main.js');
    }
    elseif (is_page('gioi-thieu')) {
        wp_enqueue_style('mvbStyle-module-about', TEMP_DIR.'/style/about.css','all' );
    }
    elseif(is_post_type_archive('quanly-dichvu') OR is_singular('quanly-dichvu')){
        wp_enqueue_style('mvbStyle-module-service', TEMP_DIR.'/style/service.css','all' );
        wp_enqueue_script('mvbScript-module-service', TEMP_DIR.'/js/service/service.js');
    }
}
add_action('wp_enqueue_scripts', 'movingbox_styles');
function remove_menus() {
    remove_menu_page( 'jetpack' );                    //Jetpack* 
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'tools.php' );                  //Tools
}
add_action('admin_menu','remove_menus');

function _p($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
?>