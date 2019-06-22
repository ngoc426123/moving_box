<?php
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////        
///                        MANAGER BANNEE                                     /// 
/////////////////                                               /////////////////
$label = array(
    'name' => 'Dịch vụ', 
    'singular_name' => 'dịch vụ website', 
    'add_new' => 'Thêm mới', 
    'add_new_item' => 'Thêm mới dịch vụ', 
    'edit_item' => 'Sửa', 
    'new_item' => 'Thêm mới', 
    'view_item' => 'Xem dịch vụ', 
    'view_items'=>'Xem tất cả dịch vụ', 
    'search_items'=>'Tìm kiếm dịch vụ', 
    'not_found'=>'Không có dịch vụ', 
    'not_found_in_trash'=>'Không có dịch vụ nào trong thùng rác', 
    'parent_item_colon'=>'Danh mục cha', 
    'all_items'=>'Tất cả dịch vụ', 
    'archives'=>'Danh mục', 
    'attributes'=>'Thuộc tính', 
    'insert_into_item'=>'Thêm phương tiện', 
    'uploaded_to_this_item'=>'Tải lên phương tiện', 
    'featured_image'=>'Ảnh dịch vụ', 
    'set_featured_image'=>'Thêm hình ảnh dịch vụ', 
    'remove_featured_image'=>'Xóa hình ảnh dịch vụ', 
    'use_featured_image'=>'Sử dụng hình ảnh dịch vụ', 
    'menu_name'=>'Quản lý dịch vụ', 
    'name_admin_bar'=>'dịch vụ',
);
$support = array(
    'title',
    'editor',
    'thumbnail',
    'excerpt',
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
    'menu_position' => 5, 
    'can_export' => true, 
    'has_archive' => true, 
    'exclude_from_search' => false, 
    'publicly_queryable' => true,
    'rewrite'            => array( 'slug' => 'dichvu' ),
);
register_post_type('quanly-dichvu', $arr);
// =====================================
function custom_table_quanlydichvu($column, $post_id){
    return array(
        'title' => __('Tên'),
        'image'  => __('Hình ảnh'),
        'excerpt'  => __('Tóm tắt'),
        'date' => __('Ngày'),
    );
}
add_action('manage_quanly-dichvu_posts_columns', 'custom_table_quanlydichvu');

function custom_content_quanlydichvu($column, $post_id){
    switch ($column) {
        case 'image' :
            $post = get_post($post_id);
            $img=get_the_post_thumbnail_url($post_id);
            $res="<div style='max-width:200px; display:inline-block'><img style='max-width:100%;' src='".$img."'/></div>";
            echo $res;
            break;
        case 'excerpt' :
            $post = get_post($post_id);
            $res=get_the_excerpt($post_id);
            echo $res;
            break;
    };
}
add_action( 'manage_quanly-dichvu_posts_custom_column' , 'custom_content_quanlydichvu',10,2);
?>