<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends UserbaseAction {
	public function index() {
		$this->display ();
	}
	public function login() {
		$this->display ();
	}
	public function register() {
		$this->visitor->is_login && $this->redirect('hi/name');
		if (IS_POST) {
			$captcha = $this->_post ( 'authcode', 'trim' );
			$username = $this->_post ( 'username', 'trim' );
			$email = $this->_post ( 'email', 'trim' );
			$password = $this->_post ( 'password', 'trim' );
			$repassword = $this->_post ( 'repassword', 'trim' );
			if ($password != $repassword) {
				$this->error ( L ( 'inconsistent_password' ) ); // 确认密码
			}
			if (session ( 'authcode' ) != strtoupper ( $captcha )) {
				 $this->error ( L('captcha_failed') );
			}
			// 连接用户中心
			$passport = $this->_user_server ();
            //注册
            $uid = $passport->register($username, $password, $email);
            //注册完成钩子 改变积分
            $tag_arg = array('uid'=>$uid, 'uname'=>$username, 'action'=>'register');
            tag('register_end', $tag_arg);
            //登陆
            $this->visitor->login($uid);
            //登陆完成钩子
            $tag_arg = array('uid'=>$uid, 'uname'=>$username, 'action'=>'login');
            tag('login_end', $tag_arg);
            //同步登陆
            $synlogin = $passport->synlogin($uid);           
            $this->redirect ('hi/name');
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
		$user_mod = D ( 'user' );
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
	/**
	 * 用户退出
	 */
	public function logout() {
		$this->visitor->logout();
		//同步退出
		$passport = $this->_user_server();
		$synlogout = $passport->synlogout();
		//跳转到退出前页面（执行同步操作）
		$this->redirect ('user/login');
	}	
}