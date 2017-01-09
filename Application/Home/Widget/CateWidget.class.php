<?php
namespace Home\Widget;
use Think\Controller;

class CateWidget extends Controller{
	public function nav(){
		$model = M('student');
        $links = $model->limit('5')->field('name')->select(); 
        $this->assign('links',$links);
        $this->display('Public/nav');
	}	    
}