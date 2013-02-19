<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends UserbaseAction {
	public function index() {
		$this->display ();
	}
	public function register() {
		
		if (IS_POST) {
			$captcha = $this->_post ( 'authcode', 'trim' );
			$username = $this->_post('username', 'trim');
			$email = $this->_post('email','trim');
			$password = $this->_post('pwd', 'trim');
			$repassword = $this->_post('repwd', 'trim');
			if ($password != $repassword) {
				$this->error(L('inconsistent_password')); //确认密码
			}
			if (session ( 'authcode' ) != $captcha ) {
				$this->error ( L('captcha_failed') );
			}
		} else {
			$this->_config_seo ();
			$this->display ();
		}
	
	}
	/**
	 * 检测用户
	 */
	public function check() {
		$type = $this->_get ( 't' );
		$user_mod = D ( 'User' );
		switch ($type) {
			case 'email' :
				$email = $this->_get ( 'email', 'trim' );
				echo $user_mod->email_exists ( $email ) ? 'false' : 'true';
				break;
			
			case 'username' :
				$username = $this->_get ( 'username', 'trim' );
				echo $user_mod->name_exists ( $username ) ? 'false' : 'true';
				break;
		}
	
	}
}