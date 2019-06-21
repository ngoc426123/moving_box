<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo __(HOME_TITLE); ?></title>
	<?php wp_head(); ?>
</head>
<body>
	<div id="mvb-container">
		<!--===BEGIN : HEADER===-->
		<div id="mvb-header">
			<div class="mainHead">
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
					<div class="logo"><a href="<?php echo __(HOME_URL); ?>"><img src="<?php echo __($logo); ?>" alt=""></a></div>
					<div class="header-tools hidden-sm hidden-xs">
						<div class="row-tools mb">
							<div class="languageTop">
								<div class="icon"><span>Ngôn ngữ</span></div>
								<div class="popup">
									<ul>
										<li><a href=""><img src="<?php echo __(TEMP_DIR) ?>/images/flag-vn.svg" alt=""><span>Tiếng Việt</span></a></li>
										<li><a href=""><img src="<?php echo __(TEMP_DIR) ?>/images/flag-en.svg" alt=""><span>Tiếng Anh</span></a></li>
									</ul>
								</div>
							</div>
							<div class="hotlineTop">
								<div class="txt">Liên hệ</div>
								<a href="tel:0522.927.508"><span>0522.927.508</span></a>
							</div>
						</div>
						<div class="row-tools">
							<div class="menuTop">
								<?php
								wp_nav_menu();
								?>
							</div>
							<div class="searchTop">
                                <div class="icon"><img src="<?php echo __(TEMP_DIR) ?>/images/i-search.svg" alt=""></div>
                                <div class="popup">
                                    <div class="wrapper">
                                        <form name="formSearch" method="post" action="" class="box_search">
                                            <input name="keyword" type="text" class="text_search">
                                            <span class="place">Nhập từ khóa tìm kiếm</span>
                                            <input name="do_search" value="1" type="hidden">
                                        </form>
                                    </div>
                                    <div class="closez"><img src="<?php echo __(TEMP_DIR) ?>/images/i-close.svg" alt=""></div>
                                </div>
                            </div>
						</div>
					</div>
					<div class="header-tools hidden-lg hidden-md">
                        <div class="menu_mobile">
                            <div class="icon"><span class="style_icon"></span></div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<!--===END : HEADER===-->