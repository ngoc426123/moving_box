<?php get_header(); ?>
<!--===BEGIN : CONTENT===-->
<div id="mvb-content">
	<!--===MAIN TOP===-->
	<div class="mvb-main-top">
		<!--===slide page===-->
		<?php get_template_part("content/content-slidepage"); ?>
		<!--===BREADCRUMB===-->
		<?php get_template_part("content/content-breadcrumb"); ?>
	</div>
	<!--===MAIN CONTENT===-->
	<div class="wrapCont">
		<div class="wrapper">
			<div class="box_mid">
				<div class="mid-title">
					<div class="titleL"><div class="txt">moving box</div></div>
					<div class="titleR"><h1 class="title">Đối tác của chúng tôi</h1></div>
				</div>
				<div class="mid-content">
					<div class="mvb-partner">
						<div class="grid" id="resPartner">
						<?php
						$args = array(
							'post_type'      => array('quanly-doitac'),
							'order'          => 'DESC',
							'orderby'        => 'date',
							'posts_per_page' => 10,
						);
						$res=get_posts($args);
						foreach ($res as $value) {
							$img = get_the_post_thumbnail_url($value->ID);
							$link = get_post_meta( $value->ID,'wpcf-link', true );
						?>
							<div class="col"><a href="<?php echo __($link); ?>"><img src="<?php echo __($img); ?>" alt=""></a></div>
						<?php
						}
						?>
						</div>
					</div>
					<div class="linkAll"><a href=""><span>xem thêm</span></a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--===END : CONTENT===-->
<?php get_footer(); ?>