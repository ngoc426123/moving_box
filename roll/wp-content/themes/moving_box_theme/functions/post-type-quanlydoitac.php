<?php
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////        
///                        MANAGER LOGO                                       /// 
/////////////////                                               /////////////////
$label = array(
    'name' => 'Quản lý đối tác', 
    'singular_name' => 'đối tác website', 
    'add_new' => 'Thêm mới', 
    'add_new_item' => 'Thêm mới đối tác', 
    'edit_item' => 'Sửa', 
    'new_item' => 'Thêm mới', 
    'view_item' => 'Xem đối tác', 
    'view_items'=>'Xem tất cả đối tác', 
    'search_items'=>'Tìm kiếm đối tác', 
    'not_found'=>'Không có đối tác', 
    'not_found_in_trash'=>'Không có đối tác nào trong thùng rác', 
    'parent_item_colon'=>'Danh mục cha', 
    'all_items'=>'Tất cả đối tác', 
    'archives'=>'Danh mục', 
    'attributes'=>'Thuộc tính', 
    'insert_into_item'=>'Thêm phương tiện', 
    'uploaded_to_this_item'=>'Tải lên phương tiện', 
    'featured_image'=>'Ảnh đối tác', 
    'set_featured_image'=>'Thêm hình ảnh đối tác', 
    'remove_featured_image'=>'Xóa hình ảnh đối tác', 
    'use_featured_image'=>'Sử dụng hình ảnh đối tác', 
    'menu_name'=>'Quản lý đối tác', 
    'name_admin_bar'=>'đối tác',
);
$support = array(
    'title',
    'thumbnail',
);
$arr = array( 
    'labels' => $label, 
    'description' => 'Quản lý đối tác website',
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
    'rewrite'            => array( 'slug' => 'doitac' ),
);
register_post_type('quanly-doitac', $arr);
// =============================================
function callback_function_doitac($post){
?>
    <div class="form-group">
        <p class="post-attributes-label-wrapper">
            <label class="post-attributes-label-wrapper" for="email">Link</label>
        </p>
        <?php
        $value=get_post_meta( $post->ID, 'wpcf-link', true );
        ?>
        <input style="width:100%" class="form-control" type="text" name="wpcf-link" id="link" value='<?php echo $value ?>'>
    </div>
<?php
}
function meta_box_doitac(){
    add_meta_box( 'metabox-doitac', 'Điển link đối tác', 'callback_function_doitac', 'quanly-doitac' );
}
add_action( 'add_meta_boxes', 'meta_box_doitac' );
// =============================================
function custom_quanlydoitac($column, $post_id){
    return array(
        'title' => __('Tên'),
        'image'  => __('Hình ảnh'),
        'date' => __('Ngày'),
    );
}
add_action('manage_quanly-doitac_posts_columns', 'custom_quanlydoitac');

function custom_content_quanlydoitac($column, $post_id){
    switch ($column) {
        case 'image' :
            $post = get_post($post_id);
            $img=get_the_post_thumbnail($post);
            $res="<div style=''>".$img."</div>";
            echo $res;
            break;
    };
}
add_action( 'manage_quanly-doitac_posts_custom_column' , 'custom_content_quanlydoitac',10,2);
?>