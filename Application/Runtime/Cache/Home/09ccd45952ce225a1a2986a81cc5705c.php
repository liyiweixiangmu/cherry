<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>关于我们</title>
	<script src="/S56/ThinkPHP04/app/Public/Js/jquery-2.1.4.min.js"></script>
	<script>
		$(function(){
			$('button').click(function(){
				$.get('<?php echo U('doAjax');?>',function(data){
					//alert(data[0].name);
					alert(data);
				})

			})
		})
	</script>
	<style>
		#box{
			width:200px;
			height:200px;
			border:1px solid #999;
			padding:20px;
		}
	</style>
</head>
<body>
	<h1>关于我们</h1>
	<?php echo W('Cate/nav');?>
	<hr>
	<div id="box">
	</div>
	<button>加载</button>
</body>
</html>