<?php
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////        
///                        MANAGER LIEN HE                                    /// 
/////////////////                                               /////////////////
$label = array(
    'name' => 'Quản lý liên hệ', 
    'singular_name' => 'Liên hệ website', 
    'add_new' => 'Thêm mới', 
    'add_new_item' => 'Thêm mới liên hệ', 
    'edit_item' => 'Sửa', 
    'new_item' => 'Thêm mới', 
    'view_item' => 'Xem liên hệ', 
    'view_items'=>'Xem tất cả liên hệ', 
    'search_items'=>'Tìm kiếm liên hệ', 
    'not_found'=>'Không có liên hệ', 
    'not_found_in_trash'=>'Không có liên hệ nào trong thùng rác', 
    'parent_item_colon'=>'Danh mục cha', 
    'all_items'=>'Tất cả liên hệ', 
    'archives'=>'Danh mục', 
    'attributes'=>'Thuộc tính', 
    'insert_into_item'=>'Thêm phương tiện', 
    'uploaded_to_this_item'=>'Tải lên phương tiện', 
    'featured_image'=>'Ảnh liên hệ', 
    'set_featured_image'=>'Thêm hình ảnh liên hệ', 
    'remove_featured_image'=>'Xóa hình ảnh liên hệ', 
    'use_featured_image'=>'Sử dụng hình ảnh liên hệ', 
    'menu_name'=>'Quản lý liên hệ', 
    'name_admin_bar'=>'contact',
);
$support = array(
    'title',
);
$arr = array( 
    'labels' => $label, 
    'description' => 'Quản lý Liên hệ website',
    'supports' => $support, 
    'hierarchical' => false, 
    'public' => true, 
    'show_ui' => true, 
    'show_in_menu' => true,
    'show_in_nav_menus' => true, 
    'show_in_admin_bar' => true, 
    'menu_position' => 28, 
    'can_export' => true, 
    'has_archive' => true, 
    'exclude_from_search' => false, 
    'publicly_queryable' => true, 
);
register_post_type('quanly-lienhe', $arr);
// ===========================================================
function callback_function_lienhe($post){
?>
    <div class="form-group">
        <p class="post-attributes-label-wrapper">
            <label for="dia-chi">Địa chỉ</label>
        </p>
        <?php
        $value=get_post_meta( $post->ID, 'wpcf-dia-chi', true );
        ?>
        <input style='width:100%' class='form-control' type='text' name='wpcf-dia-chi' id='dia-chi' value="<?php echo $value ?>">
    </div>
    <div class="form-group">
        <p class="post-attributes-label-wrapper">
            <label for="so-dien-thoai">Số điện thoại</label>
        </p>
        <?php
        $value=get_post_meta( $post->ID, 'wpcf-so-dien-thoai', true );
        ?>
        <input style="width:100%" class="form-control" type="text" name="wpcf-so-dien-thoai" id="so-dien-thoai" value="<?php echo $value ?>">
    </div>
    <div class="form-group">
        <p class="post-attributes-label-wrapper">
            <label class="post-attributes-label-wrapper" for="email">Email</label>
        </p>
        <?php
        $value=get_post_meta( $post->ID, 'wpcf-email', true );
        ?>
        <input style="width:100%" class="form-control" type="text" name="wpcf-email" id="email" value='<?php echo $value ?>'>
    </div>
    <div class="form-group">
        <p class="post-attributes-label-wrapper">
            <label for="website">Website</label>
        </p>
        <?php
        $value=get_post_meta( $post->ID, 'wpcf-website', true );
        ?>
        <input style="width:100%" class="form-control" type="text" name="wpcf-website" id="website" value='<?php echo $value ?>'>
    </div>
<?php
}
function meta_box_lienhe(){
    add_meta_box( 'metabox-lienhe', 'Thông tin liên hệ', 'callback_function_lienhe', 'quanly-lienhe' );
}
add_action( 'add_meta_boxes', 'meta_box_lienhe' );
function callback_update_lienhe( $post_id ){
    if($_POST["wpcf-dia-chi"]){
        update_post_meta( $post_id, 'wpcf-dia-chi', $_POST["wpcf-dia-chi"] );
    }
    if($_POST["wpcf-so-dien-thoai"]){
        update_post_meta( $post_id, 'wpcf-so-dien-thoai', $_POST["wpcf-so-dien-thoai"] );
    }
    if($_POST["wpcf-email"]){
        update_post_meta( $post_id, 'wpcf-email', $_POST["wpcf-email"] );
    }
    if($_POST["wpcf-website"]){
        update_post_meta( $post_id, 'wpcf-website', $_POST["wpcf-website"] );
    }
}
add_action( 'save_post', 'callback_update_lienhe' );
add_action( 'edit_post', 'callback_update_lienhe' );
// ===========================================================
function custom_lienhe($column, $post_id){
    return array(
        'title' => __('Tên'),
        'info'  => __('Thông tin'),
        'date' => __('Ngày'),
    );
}
add_action('manage_quanly-lienhe_posts_columns', 'custom_lienhe');

function custom_content_lienhe($column, $post_id){
    switch ($column) {
        case 'info' :
            $diachi = get_post_meta($post_id,'wpcf-dia-chi',true);
            $sodienthoai = get_post_meta($post_id,'wpcf-so-dien-thoai',true);
            $email = get_post_meta($post_id,'wpcf-email',true);
            $website = get_post_meta($post_id,'wpcf-website',true);
            $info = "<p>Địa chỉ : {$diachi}</p>";
            $info.= "<p>Số điện thoại : {$sodienthoai}</p>";
            $info.= "<p>Email : {$email}</p>";
            $info.= "<p>Website : {$website}</p>";
            echo $info;
            break;
    };
}
add_action( 'manage_quanly-lienhe_posts_custom_column' , 'custom_content_lienhe',10,2);
?>