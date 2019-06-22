<div id="slidePage" class="slick-init">
	<?php
	$args = array(
		'post_type'      => array('quanly-banner'),
		'order'          => 'DESC',
		'orderby'        => 'date',
		'posts_per_page' => 5,
	);
	$res=get_posts($args);
	foreach ($res as $value) {
		$img = get_the_post_thumbnail_url($value->ID);
	?>
		<div class="item"><div class="img" style="background-image: url(<?php echo __($img); ?>);"></div></div>
	<?php
	}
	?>
</div>