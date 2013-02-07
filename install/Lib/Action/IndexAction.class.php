<?php
/*
 * IKPHP爱客网 安装程序
 * @copyright (c) 2012-3000 IKPHP All Rights Reserved
 * @author 小麦
 * @Email:160780470@qq.com
 */
class IndexAction extends Action {

	public function _initialize() {
		L(include LANG_PATH . 'common.php');
	}
	
	public function index() {
		$flag = true;
		//检测文件夹权限
		$check_file = array(
				'./data',
				'./data/static',
				'./data/upload',
				'./data/config/db.php',
				'./data/config/url.php',
				'./data/config/home/config.php',
		);
		$error = array();
		foreach ($check_file as $file) {
			$path_file =  $file;
			if (!file_exists($path_file)) {
				$error[] = $file . L('not_exists');
				$flag = false;
				continue;
			}
			if (!is_writable($path_file)) {
				$error[] = $file . L('not_writable');
				$flag = false;
			}
		}
		if (!$flag) {
			$this->assign('error', $error);
			$this->display();
		} else {
			$this->display();
		}
	}
	
	public function next(){
		if(IS_POST)
		{
			foreach ($_POST as $key => $val) {
				$this->assign($key, $val);
			}
			extract($_POST);
			if (!$dbname || !$dbuser || !$dbhost || !$dbport || !$dbprefix) {
				$this->assign('error_msg', L('please_input_config_info'));
				$this->display();
				exit;
			}
			if (!$this->_is_email($admin_email)) {
				$this->assign('error_msg', L('admin_email_format_incorrect'));
				$this->display();
				exit;
			}
			//试着连接数据库
			$conn = @mysql_connect($dbhost . ':' . $dbport, $dbuser, $dbpwd);
			if ($conn) {
				$this->assign('error_msg', L('connect_mysql_error'));
				$this->display();
				exit;
			}
		}else{
			$this->assign('dbname', 'ikphp');
			$this->assign('dbuser', 'root');
			$this->assign('dbpwd', '');
			$this->assign('dbhost', 'localhost');
			$this->assign('dbport', '3306');
			$this->assign('dbprefix', 'ik_');

			$this->assign('site_title', '爱客网');
			$this->assign('site_subtitle', '又一个爱客开源社区');
			$this->assign('site_url', '');
			
			$this->assign('admin_email', 'admin@admin.com');
			$this->assign('admin_password', '000000');
			$this->assign('admin_username', 'admin');
			$this->display();			
		}
	}
	public function result(){

	}
	private function _is_email($email) {
		$chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,5}\$/i";
		if (strpos($email, '@') !== false && strpos($email, '.') !== false) {
			if (preg_match($chars, $email)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}	

}