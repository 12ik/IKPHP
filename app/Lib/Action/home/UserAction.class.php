<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends Action {
    public function index(){
		$this->display();
    }
    public function register(){
    	$this->assign('user', time());
    	$this->display();
    }
}