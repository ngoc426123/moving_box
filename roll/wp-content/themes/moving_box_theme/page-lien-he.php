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
			<div class="gridContact">
				<div class="col">
					<div class="box_mid">
						<div class="mid-title">
							<div class="titleL"><div class="txt">moving box</div></div>
							<div class="titleR"><h1 class="title">Liên hệ</h1></div>
						</div>
						<div class="mid-content">
							<div class="formContact">
								<div class="txt">Xin Quý khách vui lòng điền thong tin dưới đây để được nhận những dịch vụ hỗ trợ tốt nhất từ chúng tôi.</div>
								<form action="" method="post">
									<div class="form-group">
										<label for="">Họ tên <span>*</span></label>
										<input type="text" placeholder="Full name">
									</div>
									<div class="form-group">
										<label for="">Email <span>*</span></label>
										<input type="text" placeholder="Email address">
									</div>
									<div class="form-group">
										<label for="">Địa chỉ</label>
										<input type="text" placeholder="Address">
									</div>
									<div class="form-group">
										<label for="">Điện thoại <span>*</span></label>
										<input type="text" placeholder="Address">
									</div>
									<div class="form-group">
										<label for="">Nội dung <span>*</span></label>
										<textarea name="" id="" placeholder="Message"></textarea>
									</div>
									<div class="row">
										<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
											<div class="form-group">
												<img src="images/contact/robot.jpg" alt="">
											</div>
										</div>
										<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
											<button><span>Gửi tin nhắn</span></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="titleContact">moving box</div>
					<?php
					$args = array(
						'post_type'      => array('quanly-lienhe'),
						'order'          => 'ASC',
					);
					$res=get_posts($args);
					foreach ($res as $value) {
						$name = get_the_title( $value->ID );
						$diachi = get_post_meta( $value->ID, 'wpcf-dia-chi', $single = true );
						$sodienthoai = get_post_meta( $value->ID, 'wpcf-so-dien-thoai', $single = true );
						$email = get_post_meta( $value->ID, 'wpcf-email', $single = true );
						$website = get_post_meta( $value->ID, 'wpcf-website', $single = true );
					?>
						<div class="infoContact">
							<div class="name"><?php echo __($name); ?></div>
							<div class="wrap">
								<div class="be"><strong>[A]</strong> <?php echo __($diachi); ?></div>
								<div class="be"><strong>[T]</strong> <a href="tel:<?php echo __($sodienthoai); ?>"><?php echo __($sodienthoai); ?></a></div>
								<div class="be"><strong>[E]</strong> <a href="mailto:<?php echo __($email); ?>"><?php echo __($email); ?></a></div>
							</div>
							<div class="df">
								<div class="link"><a href="<?php echo __($website); ?>"><span><?php echo __($website); ?></span></a></div>
								<div class="map"><a href="#"><span>Xem trên Google Maps</span></a></div>
							</div>
						</div>
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