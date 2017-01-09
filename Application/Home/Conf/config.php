<?php
return array(
	//'配置项'=>'配置值'
	//'DEFAULT_V_LAYER' => 'Template', // 设置默认的视图层名称
	//'TMPL_TEMPLATE_SUFFIX'=>'.tpl',	//设置默认的视图层后缀名
	//'TMPL_FILE_DEPR'=>'_',			//简化模版层级
	//'DEFAULT_THEME' => 'default',		//设置模版主题
	//'TMPL_ENGINE_TYPE' =>'Smarty',			//设置模版引擎  PHP  Smarty
	//定义模版引擎替换路径
	'TMPL_PARSE_STRING' =>array(
		'__UPLOADS__' => __ROOT__.'/Public/Uploads', // 增加新的上传路径替换规则
	),
);