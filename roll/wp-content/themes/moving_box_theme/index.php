<?php get_header(); ?>

<!--===BEGIN : CONTENT===-->
<div id="mvb-content">
	<!---===SLIDE HOME===-->
	<div id="slideHome" class="slick-init">
		<?php
		$args = array(
			'post_type'      => array('quanly-banner'),
			'order'          => 'DESC',
			'orderby'        => 'date',
			'posts_per_page' => 5,
			'meta_key'       => 'wpcf-bannerhome',
			'meta_value'     => 'bannerhome',
		);
		$res=get_posts($args);
		foreach ($res as $value) {
			$img = get_the_post_thumbnail_url($value->ID);
			$text1 = get_post_meta( $value->ID, 'wpcf-text1', $single = true );
			$text2 = get_post_meta( $value->ID, 'wpcf-text2', $single = true );
			$link = get_post_meta( $value->ID, 'wpcf-link', $single = true );
		?>
			<div class="item">
				<div class="img" style="background-image: url(<?php echo __($img); ?>);"></div>
				<div class="caption">
					<div class="t1"><?php echo __($text1); ?></div>
					<div class="t2"><?php echo __($text2); ?></div>
					<div class="link"><a href="<?php echo __($link); ?>"><span>Xem thêm</span></a></div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<!--===ABOUT HOME===-->
	<div class="aboutHome">
		<div class="wrapper">
			<div class="title">Moving Box</div>
			<?php
			$res=get_post(18);
			echo $res->post_content;
			?>
			<div class="linkAll text-center"><a href=""><span>xem thêm</span></a></div>
		</div>		
	</div>
	<!--===SERVICE HOME===-->
	<div class="serviceHome">
		<div class="wrapper">
			<div class="title"><h2>Hơn <span>15</span> Dịch vụ cung ứng</h2></div>
			<div class="dess">Dịch vụ đa dạng cùng đội ngũ hỗ trợ chuyên nghiệp sẽ là giá trị của chúng tôi dành cho các bạn, sự phục vụ ân cần và trách nghiệm luôn là kim chỉ nam cho dịch vụ vận chuyển của công ty duy trì và phát triển.</div>
		</div>
		<div id="slideService" class="slick-init">
			<?php
			$args = array(
				'post_type'      => array('quanly-dichvu'),
				'order'          => 'DESC',
				'orderby'        => 'date',
				'posts_per_page' => 5,
			);
			$res=get_posts($args);
			foreach ($res as $value) {
				$img = get_the_post_thumbnail_url($value->ID);
				$link = get_permalink($value->ID)
			?>
				<div class="item">
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
	<!--===PARTNER HOME===-->
	<div class="partnerHome">
		<div class="wrapper">
			<div class="title"><h2>Đối tác</h2></div>
			<div class="content">
				<div id="slidePartner" class="slick-init">
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
						$link = get_post_meta( $value->ID, 'wpcf-link', $single = true );
					?>
						<div class="item"><a href="<?php echo __($link); ?>"><img src="<?php echo __($img); ?>" alt=""></a></div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--===END : CONTENT===-->
<?php get_footer(); ?>