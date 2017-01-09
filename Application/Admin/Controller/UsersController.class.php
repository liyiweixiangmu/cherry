<?php
namespace Admin\Controller;

class UsersController extends AdminController{

	public function index(){

		//搜索条件
		$where = "";
		if(!empty($_GET['name'])){
			$name = urldecode(I('get.name'));
			$where['name'] = array('like','%'.$name.'%');
			$map['name'] = $name;
		}
		//获取数据并输出到模版
		$model = M('student');
		//获取数据总条数
		$count = $model->where($where)->count();
		//引入分页类
		$page = new \Think\Page($count,10);

		//定制分页样式
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('first','首页');
		$page->setConfig('last','尾页');
		//开启尾页显示，关闭总页数显示
		$page->lastSuffix = false;

		$page->setConfig('theme','<nav><ul class="pagination"><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul></nav>');
		//带条件的分页输出，并且url编码
		foreach($map as $key=>$val) {
			$page->parameter[$key] = urlencode($val);
		}

		$show = $page->show();
		//按指定页的limit显示
		$data = $model->order('id desc')->limit($page->firstRow.','.$page->listRows)->where($where)->select();

		//echo $model->getLastSql();
		$this->assign('data',$data);
		$this->assign('page',$show);
		$this->assign('name',$name);
		$this->display('Users/index');
	}	

	//添加页面
	public function add(){
		$this->display();
	}

	//添加行为
	public function insert(){

		$model = M('student');
		//创建数据
		if($model->create()){
			//添加数据
			if($model->add()){
				$this->success('添加成功',U('index'));
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->error('数据格式错误');
		}
	}

	public function edit(){
		$id = I('get.id/d');

		$data = M('student')->find($id);

		$this->assign('data',$data);
		$this->display();

	}

	public function save(){

		$model = M('student');
		//创建数据
		if($model->create()){
			//添加数据
			if($model->save()){
				$this->success('修改成功',U('index'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->error('数据格式错误');
		}
	}

	//删除方法 获取参数
	public function del(){
		if(IS_AJAX){
			if(empty($_GET['id'])){
				$this->error('请输出参数');
			}

			//过滤请求参数 转为数字
			$id = I('get.id/d');

			$model = M('student');
			if($model->delete($id)){

				// $this->success('删除成功！',U('Users/index'));
				echo 1;
			}else{
				//$this->error('删除失败');
				echo 0;
			}			
		}
	}
}