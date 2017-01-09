<?php
namespace Admin\Controller;

class IndexController extends AdminController {

	public function getCookie(){

		dump($_COOKIE['password']);

	}
}