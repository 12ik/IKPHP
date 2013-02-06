<?php
// 安装IKPHP
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
			//$this->redirect('setconf');
		}
	}

}