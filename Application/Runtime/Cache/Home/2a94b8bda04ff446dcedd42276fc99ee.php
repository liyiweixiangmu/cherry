<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($title); ?></title>
</head>
<body>
	<h1><?php echo ($title); ?></h1>
	<?php echo W('Cate/nav');?>
	<hr>
	<p><?php echo U('index');?></p>
	<p>
		<?php
 echo U('index'); ?>
	</p>
	<p><?php echo C('DB_TYPE');?></p>
	<p><?php echo C('URL_MODEL');?></p>
	<p><?php echo C('URL_MODEL',2);?></p>
	<p><?php echo C('URL_MODEL');?></p>
	<hr>
	<img src="/cherry/Public/Images/Meinv001.jpg" width=200 alt="">
	<hr>
	<img src="<?php echo U('code');?>" alt="">
</body>
</html>