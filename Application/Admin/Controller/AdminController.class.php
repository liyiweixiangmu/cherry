<?php
namespace Admin\Controller;
use Think\Controller;

//Admin模块的控制器基类
class AdminController extends Controller {
	//判断session是否存在，如果不存在跳转到登陆页
	public function _initialize(){
		if(empty(I('session.admin'))){
			$this->redirect('Public/login','',2,'请先登录');
			return;
		}
	}
}