<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util\QRcode;

class IndexController extends Controller {
    public function index(){
        $this->assign('title','首页标题');
        $this->display();
        //$this->theme('theme1')->display();
    }

    public function code(){
    	$q = new QRcode();
		$value="http://www.baidu.com";
		$errorCorrectionLevel = "H";
		$matrixPointSize = "8";
		QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize);
    }
}