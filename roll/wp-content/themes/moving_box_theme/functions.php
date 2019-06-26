<?php
require_once("functions/post-type-quanlylogo.php");
require_once("functions/post-type-quanlylienhe.php");
require_once("functions/post-type-quanlybanner.php");
require_once("functions/post-type-quanlydichvu.php");
require_once("functions/post-type-quanlydoitac.php");
require_once("functions/post-type-quanlytuvan.php");
function _p($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
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
function movingbox_regis_styles(){
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
    elseif (is_page('popup-tu-van') || is_page('popup-tu-van-thanh-cong')) {
        wp_enqueue_style('mvbStyle-module-service', TEMP_DIR.'/style/service.css','all' );
    }
    elseif (is_page('lien-he')) {
        wp_enqueue_style('mvbStyle-module-lienhe', TEMP_DIR.'/style/contact.css','all' );
    }
    elseif(is_post_type_archive('quanly-dichvu') OR is_singular('quanly-dichvu')){
        wp_enqueue_style('mvbStyle-module-service', TEMP_DIR.'/style/service.css','all' );
        wp_enqueue_script('mvbScript-module-service', TEMP_DIR.'/js/service/service.js');
    }
    elseif(is_post_type_archive('quanly-doitac')){
        wp_enqueue_style('mvbStyle-module-partner', TEMP_DIR.'/style/partner.css','all' );
        wp_enqueue_script('mvbScript-module-partner', TEMP_DIR.'/js/partner/partner.js');
    }
}
add_action('wp_enqueue_scripts', 'movingbox_regis_styles');
function movingbox_regis_ajax(){
    wp_register_script('ajax',get_template_directory_uri()."/js/ajax_more.js");
    $args=array(
        'url'   =>  admin_url('admin-ajax.php'),
        'url_share' => get_permalink(),
    );
    wp_localize_script('ajax','ajax_url',$args);
    wp_enqueue_script('ajax');
}
add_action('wp_footer', 'movingbox_regis_ajax');
function remove_menus() {
    remove_menu_page( 'jetpack' );                    //Jetpack* 
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'tools.php' );                  //Tools
}
add_action('admin_menu','remove_menus');
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////        
///                        LOAD AJAX SERVICE                                  /// 
/////////////////                                               /////////////////
function service_readmore() {
    $offset=$_POST["offset"];
    $args = array(
        'post_type'      => array('quanly-dichvu'),
        'order'          => 'DESC',
        'orderby'        => 'date',
        'posts_per_page' => 6,
        'offset'         => $offset,
    );
    $res=get_posts($args);
    foreach ($res as $value) {
        $img = get_the_post_thumbnail_url($value->ID);
        $link = get_permalink($value->ID)
    ?>
        <div class="col">
            <div class="service">
                <div class="img"><a href="<?php echo __($link); ?>"><img src="<?php echo __($img); ?>" alt=""></a></div>
                <div class="caption">
                    <div class="tend"><h3><a href="<?php echo __($link); ?>"><?php echo __($value->post_title) ?></a></h3></div>
                </div>
            </div>
        </div>
    <?php
    }
    die();
}
add_action('wp_ajax_service_readmore', 'service_readmore');
add_action('wp_ajax_nopriv_service_readmore', 'service_readmore');
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////
///                        LOAD AJAX PARTNER                                  /// 
/////////////////                                               /////////////////
function partner_readmore() {
    $offset=$_POST["offset"];
    $args = array(
        'post_type'      => array('quanly-doitac'),
        'order'          => 'DESC',
        'orderby'        => 'date',
        'posts_per_page' => 10,
        'offset'         => $offset,
    );
    $res=get_posts($args);
    foreach ($res as $value) {
        $img = get_the_post_thumbnail_url($value->ID);
        $link = get_post_meta( $value->ID,'wpcf-link', true );
    ?>
        <div class="col"><a href="<?php echo __($link); ?>"><img src="<?php echo __($img); ?>" alt=""></a></div>
    <?php
    }
    die();
}
add_action('wp_ajax_partner_readmore', 'partner_readmore');
add_action('wp_ajax_nopriv_partner_readmore', 'partner_readmore');
/////////////////////////////////////////////////////////////////////////////////
/////////////////                                               /////////////////
///                        REGIS SHORTCODE                                    /// 
/////////////////                                               /////////////////
function movingbox_shortcode_boxregis(){
    $link = get_permalink(get_page_by_path('popup-tu-van'));
    return "<div class='boxRegis'>
                <div class='t1'>Bạn muốn chúng tôi tư vấn giúp bạn</div>
                <div class='linkPopup'><a href='".$link."'><span>Click vào để gởi câu hỏi</span></a></div>
                <div class='t2'>hoặc gọi cho chúng tôi qua số <span>0909 919293</span></div>
            </div>";
}
add_shortcode('movingbox_boxregis','movingbox_shortcode_boxregis');
/////////////////                                               /////////////////
///                        EVENT FORM TU VAN                                  /// 
/////////////////                                               /////////////////
add_action( 'admin_post_nopriv_post_tuvan', 'form_post_tuvan' );
add_action( 'admin_post_post_tuvan', 'form_post_tuvan' );
function form_post_tuvan() {
    session_start();
    if(isset($_POST["ok_conde"]) && $_POST["ser"] == $_SESSION["ttcapt"]){
        $null_val = "Không có thông tin";
        $args = array(
            'post_title'   =>wp_strip_all_tags($_POST["name"]),
            'post_content' => $_POST["content"],
            'post_type'    => 'quanly-tuvan',
            'post_status'  => 'private',
        );
        $id = wp_insert_post($args);
        $phone = empty($_POST["phone"])?$null_val:$_POST["phone"];
        $email = empty($_POST["email"])?$null_val:$_POST["email"];
        $title = empty($_POST["title"])?$null_val:$_POST["title"];
        add_post_meta($id, 'wpcf-phone', $phone);
        add_post_meta($id, 'wpcf-email', $email);
        add_post_meta($id, 'wpcf-title', $title);
        wp_redirect(get_permalink(get_page_by_path('popup-tu-van-thanh-cong')));
    }
    else{
        $err = "Có lỗi Xẩy ra !!!";
        wp_redirect(get_permalink(get_page_by_path('popup-tu-van')));
    }
    
    die();
}
?>