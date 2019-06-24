<?php
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////        
///                        MANAGER LOGO                                       /// 
/////////////////                                               /////////////////
$label = array(
    'name' => 'Quản lý logo', 
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
    'menu_position' => 25, 
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
        case 'image' :
            $post = get_post($post_id);
            $img=get_the_post_thumbnail($post);
            $res="<div style='background:#000; padding:10px 20px; display:inline-block'>".$img."</div>";
            echo $res;
            break;
    };
}
add_action( 'manage_quanly-logo_posts_custom_column' , 'custom_content_quanlylogo',10,2);
?>