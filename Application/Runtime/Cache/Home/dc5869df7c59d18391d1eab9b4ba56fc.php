<?php if (!defined('THINK_PATH')) exit();?><a href="<?php echo U('Index/index');?>">首页</a>|
<a href="<?php echo U('Index/index');?>">首页</a>|
<?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href=""><?php echo ($vo["name"]); ?></a>|<?php endforeach; endif; else: echo "" ;endif; ?>