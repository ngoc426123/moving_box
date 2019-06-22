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
			<div class="box">
				<div class="box-title"><h1 class="fTitle"><?php echo __($post->post_title); ?></h1></div>
				<div class="box-content">
					<div class="the-content desc">
						<?php echo __($post->post_content); ?>
						<div class="boxRegis">
							<div class="t1">Bạn muốn chúng tôi tư vấn giúp bạn</div>
							<div class="linkPopup"><a href="popup.html"><span>Click vào để gởi câu hỏi</span></a></div>
							<div class="t2">hoặc gọi cho chúng tôi qua số <span>0909 919293</span></div>
						</div>
					</div>
					<div class="myTags">
                        <p>Tags :</p>
                        <ul class="list-inline text-left">
                            <li><a href="#">Inspiration</a></li>
                            <li><a href="#">Workspace</a></li>
                            <li><a href="#">Minimal</a></li>
                            <li><a href="#">Decoation</a></li>
                        </ul>
                    </div>
                    <div class="myTools">
                        <div class="share">
                            <ul>
                                <li><a href="#"><img src="images/like_face.png" alt=""></a></li>
                                <li><a href="#"><img src="images/share_fac.png" alt=""></a></li>
                                <li><a href="#"><img src="images/share_goo.png" alt=""></a></li>
                                <li><a href="#"><img src="images/share_twi.png" alt=""></a></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <div class="print hidden-sm hidden-xs">
                            <ul>
                                <li><a href="" class="fa-print">In bài viết</a></li>
                                <li><a href="" class="fa-mail-reply-all">Quay lại</a></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--===END : CONTENT===-->
<?php get_footer(); ?>