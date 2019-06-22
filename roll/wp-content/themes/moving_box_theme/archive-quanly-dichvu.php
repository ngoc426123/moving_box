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
					<div class="titleR"><h1 class="title">Dịch vụ của chúng tôi</h1></div>
				</div>
				<div class="mid-content">
					<div class="mvb-service">
						<div class="grid">
						<?php
						$args = array(
							'post_type'      => array('quanly-dichvu'),
							'order'          => 'DESC',
							'orderby'        => 'date',
							'posts_per_page' => 6,
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