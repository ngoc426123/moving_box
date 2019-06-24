<?php
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////        
///                        MANAGER BANNEE                                     /// 
/////////////////                                               /////////////////
$label = array(
    'name' => 'Quản lý banner', 
    'singular_name' => 'Banner website', 
    'add_new' => 'Thêm mới', 
    'add_new_item' => 'Thêm mới banner', 
    'edit_item' => 'Sửa', 
    'new_item' => 'Thêm mới', 
    'view_item' => 'Xem banner', 
    'view_items'=>'Xem tất cả banner', 
    'search_items'=>'Tìm kiếm banner', 
    'not_found'=>'Không có banner', 
    'not_found_in_trash'=>'Không có banner nào trong thùng rác', 
    'parent_item_colon'=>'Danh mục cha', 
    'all_items'=>'Tất cả banner', 
    'archives'=>'Danh mục', 
    'attributes'=>'Thuộc tính', 
    'insert_into_item'=>'Thêm phương tiện', 
    'uploaded_to_this_item'=>'Tải lên phương tiện', 
    'featured_image'=>'Ảnh banner', 
    'set_featured_image'=>'Thêm hình ảnh banner', 
    'remove_featured_image'=>'Xóa hình ảnh banner', 
    'use_featured_image'=>'Sử dụng hình ảnh banner', 
    'menu_name'=>'Quản lý banner', 
    'name_admin_bar'=>'banner',
);
$support = array(
    'title',
    'thumbnail',
);
$arr = array( 
    'labels' => $label, 
    'description' => 'Quản lý banner website',
    'supports' => $support, 
    'hierarchical' => false, 
    'public' => true, 
    'show_ui' => true, 
    'show_in_menu' => true,
    'show_in_nav_menus' => true, 
    'show_in_admin_bar' => true, 
    'menu_position' => 26, 
    'can_export' => true, 
    'has_archive' => true, 
    'exclude_from_search' => false, 
    'publicly_queryable' => true, 
);
register_post_type('quanly-banner', $arr);
// =====================================
function callback_function_banner_info($post){
?>
    <div class="form-group">
        <div stye="font-size:12px;line-height:20px; color:#666666; font-style:italic">Khi chọn là banner trang chủ thì các text bên dưới mới hoạt động</div>
    </div>
    <div class="form-group">
        <p class="post-attributes-label-wrapper">
            <label for="text1">Text 1</label>
        </p>
        <?php
        $value=get_post_meta( $post->ID, 'wpcf-text1', true );
        ?>
        <input style='width:100%' class='form-control' type='text' name='wpcf-text1' id='text1' value="<?php echo $value ?>">
    </div>
    <div class="form-group">
        <p class="post-attributes-label-wrapper">
            <label for="so-dien-thoai">Text 2</label>
        </p>
        <?php
        $value=get_post_meta( $post->ID, 'wpcf-text2', true );
        ?>
        <input style="width:100%" class="form-control" type="text" name="wpcf-text2" id="text2" value="<?php echo $value ?>">
    </div>
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
function callback_function_banner_check($post){
?>
    <div class="form-group">
        <label for="bannerhome">
        <?php
        if(get_post_meta( $post->ID, 'wpcf-bannerhome', true )){
        ?>
            <input type="checkbox" name="wpcf-bannerhome" id="bannerhome" checked>
        <?php
        }
        else{
        ?>
            <input type="checkbox" name="wpcf-bannerhome" id="bannerhome">
        <?php
        }
        ?>
            Chọn khi đây là banner trang chủ
        </label>
    </div>
<?php
}
function meta_box_banner(){
    add_meta_box( 'metabox-banner1', 'Chọn banner trang chủ', 'callback_function_banner_check', 'quanly-banner' );
    add_meta_box( 'metabox-banner2', 'Thông tin text banner', 'callback_function_banner_info', 'quanly-banner' );
}
add_action( 'add_meta_boxes', 'meta_box_banner' );
function callback_update_banner( $post_id ){
    if($_POST["wpcf-bannerhome"]){
        update_post_meta( $post_id, 'wpcf-bannerhome', 'bannerhome' );
    }
    else{
        delete_post_meta($post_id,'wpcf-bannerhome');
    }
    if($_POST["wpcf-text1"]){
        update_post_meta( $post_id, 'wpcf-text1', $_POST["wpcf-text1"] );
    }
    if($_POST["wpcf-text2"]){
        update_post_meta( $post_id, 'wpcf-text2', $_POST["wpcf-text2"] );
    }
    if($_POST["wpcf-link"]){
        update_post_meta( $post_id, 'wpcf-link', $_POST["wpcf-link"] );
    }
}
add_action( 'save_post', 'callback_update_banner' );
add_action( 'edit_post', 'callback_update_banner' );
// =====================================
function custom_table_quanlybanner($column, $post_id){
    return array(
        'title' => __('Tên'),
        'image'  => __('Hình ảnh'),
        'content'  => __('Nôi dung hình'),
        'date' => __('Ngày'),
    );
}
add_action('manage_quanly-banner_posts_columns', 'custom_table_quanlybanner');

function custom_content_quanlybanner($column, $post_id){
    switch ($column) {
        case 'image' :
            $post = get_post($post_id);
            $img=get_the_post_thumbnail_url($post_id);
            $res="<div style='max-width:200px; display:inline-block'><img style='max-width:100%;' src='".$img."'/></div>";
            echo $res;
            break;
        case 'content' :
            $text1 = get_post_meta($post_id,'wpcf-text1',true);
            $text2 = get_post_meta($post_id,'wpcf-text2',true);
            $link = get_post_meta($post_id,'wpcf-link',true);
            $info = "<p>Text 1 : {$text1}</p>";
            $info.= "<p>Text 2 : {$text2}</p>";
            $info.= "<p>Link : {$link}</p>";
            echo $info;
            break;
    };
}
add_action( 'manage_quanly-banner_posts_custom_column' , 'custom_content_quanlybanner',10,2);
?>