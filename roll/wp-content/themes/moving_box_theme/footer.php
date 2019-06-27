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
							<li><a href=""><?php echo pll__("menu-rules"); ?></a></li>
							<li><a href=""><?php echo pll__("menu-policy"); ?></a></li>
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
					<ul class="mmMenu">
						<li><a href="<?php echo __(HOME_URL); ?>"><?php echo pll__("menu-home"); ?></a></li>
						<li><a href="<?php echo __(get_permalink(get_page_by_path('page-gioi-thieu'))); ?>"><?php echo pll__("menu-about"); ?></a></li>
						<li><a href="<?php echo __(get_post_type_archive_link("quanly-dichvu")); ?>"><?php echo pll__("menu-service"); ?></a></li>
						<li><a href="<?php echo __(get_post_type_archive_link("quanly-doitac")); ?>"><?php echo pll__("menu-partner"); ?></a></li>
						<li><a href="<?php echo __(get_permalink(get_page_by_path('page-lien-he'))); ?>"><?php echo pll__("menu-contact"); ?></a></li>
					</ul>
                    <div class="mmSearch">
                        <form name="formSearch" method="post" action="">
                            <input name="keyword" type="text" value="" placeholder="Nhập từ khóa tìm kiếm...">
                            <button name="btn-search" type="submit" value=""><img src="<?php echo __(TEMP_DIR); ?>/images/i-search.svg" alt="" /></button>
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