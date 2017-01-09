<?php 
namespace Home\Model;
use Think\Model;

class MemberModel extends Model{
	//自动完成
	protected $_auto = array(
		array('is_used','getStatus',1,'callback'),
		array('password','md5',1,'function'),
		array('addtime','time',1,'function')
		);

	//自动验证
	protected $_validate = array(
		array('verify','checkVerify','验证码错误',1,'callback'),
		array('name','require','用户名不能为空'),
		array('name','','用户名必须唯一',0,'unique',1),
		array('password','require','密码不能为空'),
		array('password','6,12','密码长度不正确',0,'length',1),
		array('repassword','require','确认密码不能为空'),
		array('repassword','password','确认密码不一致',1,'confirm'),
		array('email','require','邮箱不能为空'),
		array('email','email','邮箱格式不正确'),
		array('email','','邮箱已经注册过了',1,'unique'),
		);
	protected function getStatus(){
		return 1;
	}

	protected function checkVerify($code){
		//验证码验证
		$Verify = new \Think\Verify();
		return $Verify->check($code);	
	}
		
}