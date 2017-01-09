<?php 
namespace Home\Controller;
use Think\Controller;

class MemberController extends Controller{

	//验证注册方法
	public function doRegister(){
		$model = D('member');
		if($model->create()){
			if($model->add()){
				$this->success('注册成功！',U('Index/index'));
			}else{
				$this->error('注册失败！');
			}
		}else{
			$this->error($model->getError());
		}

	}

	//输出验证码
	public function verify(){
		$config = array(
			'fontSize' => 15, // 验证码字体大小
			'length' => 4, // 验证码位数
			'useNoise' => false, // 关闭验证码杂点
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

	public function bind(){
		$model = M('student');

		//绑定占位符 :param 不支持 ?
		$where = array();
		$where['name'] = array('like',":name");
		$where['age'] = ":age";

		//绑定变量
		$bind = array();
		$bind[':name'] = 'jack';
		$bind[':age'] = '10';

		$data = $model->where($where)->bind($bind)->select();
		echo $model->getLastSql();
		dump($data);
	}

}