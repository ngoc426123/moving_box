<div id="slidePage" class="slick-init">
	<?php
	$args = array(
		'post_type'      => array('quanly-banner'),
		'order'          => 'DESC',
		'orderby'        => 'date',
		'posts_per_page' => 10,
		'meta_key'       => 'wpcf-bannerhome',
		'meta_compare'   => 'NOT EXISTS',
	);
	$res=get_posts($args);
	foreach ($res as $value) {
		$img = get_the_post_thumbnail_url($value->ID);
		echo get_post_meta( $value->ID, 'wpcf-bannerhome', true)
	?>
		<div class="item"><div class="img" style="background-image: url(<?php echo __($img); ?>);"></div></div>
	<?php
	}
	?>
</div>