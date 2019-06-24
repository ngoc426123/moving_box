<?php
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////        
///                        MANAGER BANNEE                                     /// 
/////////////////                                               /////////////////
$label = array(
    'name' => 'Tư vấn', 
    'singular_name' => 'tư vấn website', 
    'add_new' => 'Thêm mới', 
    'add_new_item' => 'Thêm mới tư vấn', 
    'edit_item' => 'Sửa', 
    'new_item' => 'Thêm mới', 
    'view_item' => 'Xem tư vấn', 
    'view_items'=>'Xem tất cả tư vấn', 
    'search_items'=>'Tìm kiếm tư vấn', 
    'not_found'=>'Không có tư vấn', 
    'not_found_in_trash'=>'Không có tư vấn nào trong thùng rác', 
    'parent_item_colon'=>'Danh mục cha', 
    'all_items'=>'Tất cả tư vấn', 
    'archives'=>'Danh mục', 
    'attributes'=>'Thuộc tính', 
    'insert_into_item'=>'Thêm phương tiện', 
    'uploaded_to_this_item'=>'Tải lên phương tiện', 
    'featured_image'=>'Ảnh tư vấn', 
    'set_featured_image'=>'Thêm hình ảnh tư vấn', 
    'remove_featured_image'=>'Xóa hình ảnh tư vấn', 
    'use_featured_image'=>'Sử dụng hình ảnh tư vấn', 
    'menu_name'=>'Quản lý tư vấn', 
    'name_admin_bar'=>'tư vấn',
);
$support = array(
    'title',
    'editor',
);
$arr = array( 
    'labels' => $label, 
    'description' => 'Quản lý dịch vụ website',
    'supports' => $support, 
    'hierarchical' => false, 
    'public' => true, 
    'show_ui' => true, 
    'show_in_menu' => true,
    'show_in_nav_menus' => true, 
    'show_in_admin_bar' => true, 
    'menu_position' => 30, 
    'can_export' => true, 
    'has_archive' => true, 
    'exclude_from_search' => false, 
    'publicly_queryable' => true,
    'capabilities' => array(
        'create_posts' => 'do_not_allow',
    ),
);
register_post_type('quanly-tuvan', $arr);
// =====================================
function custom_table_quanlytuvan($column, $post_id){
    return array(
        'title' => __('Tên'),
        'info-man'  => __('Thông tin người gởi'),
        'info-content'  => __('Nôi dung'),
        'date' => __('Ngày'),
    );
}
add_action('manage_quanly-tuvan_posts_columns', 'custom_table_quanlytuvan');

function custom_content_quanlytuvan($column, $post_id){
    switch ($column) {
        case 'info-man' :
            $name = get_the_title($post_id);
            $phone = get_post_meta($post_id,'wpcf-phone',true);
            $email = get_post_meta($post_id,'wpcf-email',true);
            $info = "<p>Họ tên : {$name}</p>";
            $info.= "<p>Điện thoại : <a href='tel:{$phone}'>{$phone}</a></p>";
            $info.= "<p>Email : <a href='mailto:{$email}'>{$email}</a></p>";
            echo $info;
            break;
        case 'info-content' :
            $title = get_post_meta($post_id,'wpcf-title',true);
            $content = get_the_content($post_id);
            $info = "<p><strong>{$title}</strong></p>";
            $info.= "<p>{$content}</p>";
            echo $info;
            break;
    };
}
add_action( 'manage_quanly-tuvan_posts_custom_column' , 'custom_content_quanlytuvan',10,2);
?>