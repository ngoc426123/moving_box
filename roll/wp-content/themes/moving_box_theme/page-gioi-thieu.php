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
			<div class="the-content desc">
				<?php 
				echo __($post->post_content);
				?>
			</div>
		</div>
	</div>
</div>
<!--===END : CONTENT===-->
<?php get_footer(); ?>