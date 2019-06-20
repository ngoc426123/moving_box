		<!--===BEGIN : FOOTER===-->
		<div id="mvb-footer">
			<div class="mainFoot">
				<div class="wrapper">
					<?php
					$args = array(
						'post_type'      => 'quanly-logo',
						'order'          => 'DESC',
						'orderby'        => 'date',
						'posts_per_page' => 1,
					);
					$res=get_posts($args);
					$logo=get_the_post_thumbnail_url($res[0]->ID,'full');
					?>
					<div class="logoFoot hidden-lg hidden-md hidden-sm"><a href=""><img src="<?php echo __($logo); ?>" alt=""></a></div>
					<div class="addressFoot">
						<?php
						$args = array(
							'post_type'      => array('quanly-lienhe'),
							'order'          => 'DESC',
							'posts_per_page' => 1,
						);
						$res=get_posts($args);
						$diachi = get_post_meta( $res[0]->ID, 'wpcf-dia-chi', $single = true );
						$sodienthoai = get_post_meta( $res[0]->ID, 'wpcf-so-dien-thoai', $single = true );
						$email = get_post_meta( $res[0]->ID, 'wpcf-email', $single = true );
						$website = get_post_meta( $res[0]->ID, 'wpcf-website', $single = true );
						?>
						<div class="name"><?php echo __($res[0]->post_title); ?></div>
						<div class="be"><strong>[A]</strong>: <?php echo __($diachi); ?></div>
						<div class="be"><strong>[T]</strong>: <?php echo __($sodienthoai); ?></div>
						<div class="be"><strong>[E]</strong>: <?php echo __($email); ?></div>
						<div class="be"><strong>[W]</strong>: <?php echo __($website); ?></div>
					</div>
					<div class="right">
						<div class="logoFoot hidden-xs"><a href=""><img src="<?php echo __($logo); ?>" alt=""></a></div>
						<div class="socialFoot">
							<ul>
								<li><a href=""><img src="<?php echo __(TEMP_DIR); ?>/images/i-facebook.png" alt=""></a></li>
								<li><a href=""><img src="<?php echo __(TEMP_DIR); ?>/images/i-twitter.png" alt=""></a></li>
								<li><a href=""><img src="<?php echo __(TEMP_DIR); ?>/images/i-instagram.png" alt=""></a></li>
								<li><a href=""><img src="<?php echo __(TEMP_DIR); ?>/images/i-pinterest.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="botFoot">
				<div class="wrapper">
					<div class="congthuongImg"><a href="<?php echo __(HOME_URL); ?>"><img src="<?php echo __(TEMP_DIR); ?>/images/congthuong.png" alt=""></a></div>
					<div class="menuCp">
						<ul>
							<li><a href="">Điều khoản</a></li>
							<li><a href="">Chính sách bảo mật</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--===END : FOOTER===-->
	</div>
	<!--==BEGIN: MENU_MOBILE_NAV==-->
    <div class="menu_mobile">
        <div class="divmm">
            <div class="mmContent">
                <div class="mmMenu">
                    <ul class="mmMain">
                        <li><a href="index.html">TRANG CHỦ</a></li>
						<li><a href="2_gioi_thieu_1.html">GIỚI THIỆU</a>
							<ul>
	                    	    <li><a href="">Về chúng tôi</a></li>
	                    	    <li><a href="">Lịch sử hình thành</a></li>
	                    	    <li><a href="">Hồ sơ năng lực</a></li>
	                    	    <li><a href="">Sơ đồ tổ chức</a></li>
	                    	</ul>
						</li>
						<li><a href="3_dich_vu_1.html">DỊCH VỤ</a></li>
						<li><a href="7_doi_tac_1.html">ĐỐI TÁC</a></li>
						<li><a href="8_lien_he_1.html">LIÊN HỆ</a></li>
                    </ul>
                    <div class="mmSearch">
                        <form name="formSearch" method="post" action="">
                            <input name="keyword" type="text" value="" placeholder="Nhập từ khóa tìm kiếm...">
                            <button name="btn-search" type="submit" value=""><img src="images/i-search.png" alt="" /></button>
                            <input name="do_search" value="1" type="hidden">
                        </form>
                    </div>
                    <div class="mmLanguage">
                        <ul>
                            <li><a href="">en</a></li>
                            <li><a href="">vn</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="divmmbg"></div>
        </div>
    </div>
    <!--==END: MENU_MOBILE_NAV==-->
    <?php wp_footer(); ?>
</body>
</html>