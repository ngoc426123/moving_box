<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body>
	<div id="mvb-popup">
		<div class="title">Gởi câu hỏi tư vấn</div>
		<div class="formPopup">
			<form action="<?php echo __(admin_url('admin-post.php')); ?>" method="post">
				<input type="hidden" name="action" value="post_tuvan">
				<div class="txtErr"><?php echo __(isset($err)?$err:'') ?></div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<label for="">Họ tên</label>
							<input type="text" name="name">
						</div>
						<div class="form-group">
							<label for="">Điện thoại</label>
							<input type="text" name="phone">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email">
						</div>
						<div class="form-group">
							<label for="">Mã bảo vệ</label>
							<div class="df">
								<input name="ser" type="text" placeholder="Mã bảo vệ...">
								<img src="<?php echo __(TEMP_DIR); ?>/captcha.php" alt="">
								<small class="text-danger"><?php echo (isset($error))?$error:"";?></small>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<label for="">Tiêu đề</label>
							<input type="text" name="title">
						</div>
						<div class="form-group">
							<label for="">Nội dung</label>
							<textarea name="content" id="" placeholder="Nhập nội dung..." ></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="text-right designButton"><button name="ok_conde" value="SUBMIT">Gởi</button></div>
				</div>
			</form>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>