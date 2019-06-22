<?php
function breadcrumb(){
    // $breadcrumb =  "<div class='breadcrumb hidden-sm hidden-xs'><div class='wrapper'><ul itemscope itemtype='http://schema.org/BreadcrumbList'>";
    // // HOME
    // $breadcrumb.="<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'><a itemscope itemtype='http://schema.org/Thing' itemprop='item' href='https://example.com/books' href='".home_url()."'><span itemprop='name'>Trang chủ</span></a></li>";
    // // ARCHIVE
    // if(is_archive()){
    //     $breadcrumb.="<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'><a itemscope itemtype='http://schema.org/Thing' itemprop='item' href='https://example.com/books' href='".get_post_type_archive_link('bai-hat')."'><span itemprop='name'>Bài hát</span></a></li>";
    // }
    // // TAXONOMY
    // if(is_tax('tac-gia')){
    //     $taxo=get_query_var('taxonomy');
    //     $term=get_term_by('slug',get_query_var('term'),get_query_var('taxonomy'));
    //     $link = get_term_link($term->term_id);
    //     $breadcrumb.="<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'><a itemscope itemtype='http://schema.org/Thing' itemprop='item' href='https://example.com/books' href='".$link."'><span itemprop='name'>Tác giả ".$term->name."</span></a></li>";
    // }
    // if(is_tax('bang-chu-cai')){
    //     $taxo=get_query_var('taxonomy');
    //     $term=get_term_by('slug',get_query_var('term'),get_query_var('taxonomy'));
    //     $link = get_term_link($term->term_id);
    //     $breadcrumb.="<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'><a itemscope itemtype='http://schema.org/Thing' itemprop='item' href='https://example.com/books' href='".$link."'><span itemprop='name'>Chữ ".$term->name."</span></a></li>";
    // }
    // if(is_tax('chuyen-muc')){
    //     $taxo=get_query_var('taxonomy');
    //     $term=get_term_by('slug',get_query_var('term'),get_query_var('taxonomy'));
    //     $link = get_term_link($term->term_id);
    //     $breadcrumb.="<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'><a itemscope itemtype='http://schema.org/Thing' itemprop='item' href='https://example.com/books' href='".$link."'><span itemprop='name'>".$term->name."</span></a></li>";
    // }
    // // SINGLE
    // if(is_single()){
    //     global $post;
    //     $breadcrumb.="<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'><a itemscope itemtype='http://schema.org/Thing' itemprop='item' href='https://example.com/books' href='".get_post_type_archive_link('bai-hat')."'><span itemprop='name'>Bài hát</span></a></li>";
    //     $breadcrumb.="<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'><a itemscope itemtype='http://schema.org/Thing' itemprop='item' href='https://example.com/books' href='".get_permalink($post->ID)."'><span itemprop='name'>".$post->post_title."</span></a></li>";
    // }
    // // PAGE
    
    // $breadcrumb.="</ul></div></div>";
    // echo $breadcrumb;

    $arr = array(
    	array(
    		name=> "Trang chủ",
    		link=> HOME_URL,
    	),
    );
    if(is_page()){
        global $post;
        array_push($arr, array(
        	name=> $post->post_title,
    		link=> get_permalink($post->ID),
        ));
    }
    if(is_post_type_archive()){
        $query_var = get_query_var('post_type');
        array_push($arr, array(
        	name=> get_post_type_object($query_var)->labels->name,
    		link=> get_post_type_archive_link($query_var),
        ));
    }
    if(is_singular()){
    	global $post;
    	$query_var = get_query_var('post_type');
        array_push($arr, array(
        	name=> get_post_type_object($query_var)->labels->name,
    		link=> get_post_type_archive_link($query_var),
        ));
        array_push($arr, array(
        	name=> $post->post_title,
    		link=> get_permalink($post->ID),
        ));
    }
    return $arr;
}
$arr_breadcrumb = breadcrumb();
?>
<div class="breadcrumb hidden-sm hidden-xs">
    <div class="wrapper">
        <div class="navation">
            <ul>
            <?php
            foreach ($arr_breadcrumb as $value) {
            ?>
				<li><a href="<?php echo __($value["link"]); ?>"><span><?php echo __($value["name"]); ?></span></a></li>
            <?php
            }
            ?>
            </ul>
        </div>
    </div>
</div>
