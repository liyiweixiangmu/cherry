<?php
namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller {

	//判断是否存在cookie
	public function login(){
		//判断是否存在cookie 是否存在
		if(empty(I('cookie.name')) || empty(I('cookie.password'))){
			$this->display('Public/login');
		}else{
			$adminInfo = $this->getAdminInfo(I('cookie.name'),I('cookie.password'));			
			//判断是否有效
			if($adminInfo){
				$_SESSION['admin'] = $adminInfo;
				$this->redirect('Index/index','',2,'正在跳转后台....');
			}else{
				$this->display('Public/login');
			}
		}
		
	}

	//登录操作
	public function doLogin(){
		//判断表单提交方式
		if(!IS_POST){
			$this->error('请使用正确姿势登录');
		}

		//采集登录表单信息 建议使用自动完成和自动验证
		$name = I('post.name');
		$password = I('post.password');
		// $password = md5(I('post.password'));
		$remember = I('post.remember');

		//根据表单数据搜索数据库匹配
		$adminInfo =  $this->getAdminInfo($name,$password);

		//登录信息不正确
		if(!$adminInfo){
			$this->error('登录信息不正确');
		}

		$_SESSION['admin'] = $adminInfo;
		
		//记住功能 将信息放置本地cookie 并 在此控制器路径下访问
		if($remember == 'on'){
			setcookie('name',$name,time()+3600*365,null,null,null,true);
			setcookie('password',$password,time()+3600*365,null,null,null,true);
		}

		//跳转后台首页
		$this->redirect('Index/index','',2,'正在跳转后台....');
	}

	public function doLogout(){
		//销毁session并跳转至登陆页
		unset($_SESSION['admin']);
		if(!empty(I('cookie.'))){
			setcookie('name','',time()-1);
			setcookie('password','',time()-1);
		}
		$this->redirect('Public/login','',2,'正在退出...');
	}

	//根据用户名和密码查找对应数据并返回
	protected function getAdminInfo($name,$password){
		$model = M('admin');
		$where = array();
		$where['name'] = $name;
		$where['password'] = $password;

		return $model->where($where)->find();
		// $model->where($where)->find();
		// echo $model->getLastSql();
		// exit;
	}



	public function getCookie(){
		dump(I('cookie.'));
	}
}