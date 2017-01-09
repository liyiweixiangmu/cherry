<?php 
namespace Home\Model;
use Think\Model;

class StudentModel extends Model{
	//protected $tableName = 'student';
	//提前声明主键和字段名
	protected $pk = 'id';
	protected $fields = array('id','name','age','sex','grade');
	public function demo(){
		echo "这是StudentModel的demo<br>";
	}

}