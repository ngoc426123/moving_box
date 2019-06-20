<?php
define(TEMP_DIR, get_template_directory_uri());
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
        wp_enqueue_script('mvbScript-module', TEMP_DIR.'js/main/main.js');
    }
}
add_action('wp_enqueue_scripts', 'movingbox_styles');
function remove_menus() {
    remove_menu_page( 'jetpack' );                    //Jetpack* 
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'upload.php' );                 //Media
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'plugins.php' );                //Plugins
}
add_action('admin_menu','remove_menus');
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////        
///                        MANAGER LOGO                                       /// 
/////////////////                                               /////////////////
$label = array(
    'name' => 'Logo', 
    'singular_name' => 'Logo website', 
    'add_new' => 'Thêm mới', 
    'add_new_item' => 'Thêm mới logo', 
    'edit_item' => 'Sửa', 
    'new_item' => 'Thêm mới', 
    'view_item' => 'Xem logo', 
    'view_items'=>'Xem tất cả logo', 
    'search_items'=>'Tìm kiếm logo', 
    'not_found'=>'Không có logo', 
    'not_found_in_trash'=>'Không có logo nào trong thùng rác', 
    'parent_item_colon'=>'Danh mục cha', 
    'all_items'=>'Tất cả logo', 
    'archives'=>'Danh mục', 
    'attributes'=>'Thuộc tính', 
    'insert_into_item'=>'Thêm phương tiện', 
    'uploaded_to_this_item'=>'Tải lên phương tiện', 
    'featured_image'=>'Ảnh logo', 
    'set_featured_image'=>'Thêm hình ảnh logo', 
    'remove_featured_image'=>'Xóa hình ảnh logo', 
    'use_featured_image'=>'Sử dụng hình ảnh logo', 
    'menu_name'=>'Quản lý logo', 
    'name_admin_bar'=>'logo',
);
$support = array(
    'title',
    'thumbnail',
);
$arr = array( 
    'labels' => $label, 
    'description' => 'Quản lý logo website',
    'supports' => $support, 
    'hierarchical' => false, 
    'public' => true, 
    'show_ui' => true, 
    'show_in_menu' => true,
    'show_in_nav_menus' => true, 
    'show_in_admin_bar' => true, 
    'menu_position' => 5, 
    'can_export' => true, 
    'has_archive' => true, 
    'exclude_from_search' => false, 
    'publicly_queryable' => true, 
);
register_post_type('quanly-logo', $arr);
// ==================
function custom_quanlylogo($column, $post_id){
    return array(
        'title' => __('Tên'),
        'image'  => __('Hình ảnh'),
        'date' => __('Ngày'),
    );
}
add_action('manage_quanly-logo_posts_columns', 'custom_quanlylogo');

function custom_content_quanlylogo($column, $post_id){
    switch ($column) {
        case 'content' : 
            $post = get_post($post_id);
            $content = $post->post_content;
            echo $content;
            break;
        case 'image' :
            $post = get_post($post_id);
            $img=get_the_post_thumbnail($post);
            $res="<div style='background:#000; padding:10px 20px; display:inline-block'>".$img."</div>";
            echo $res;
            break;
        case 'info' :

            $address = get_post_meta($post_id,'contact-address',true);
            $email = get_post_meta($post_id,'contact-email',true);
            $gx = get_post_meta($post_id,'contact-gx',true);
            $info = "<p>Địa chỉ : {$address}</p>";
            $info.= "<p>Email : {$email}</p>";
            $info.= "<p>Giáo xứ : {$gx}</p>";
            echo $info;
            break;
    };
}
add_action( 'manage_quanly-logo_posts_custom_column' , 'custom_content_quanlylogo',10,2);
?>