<?php
/**
 * 内置用户中心连接接口
 * author: charm
 */
class default_passport
{

    private $_error = 0;

    public function __construct() {
        $this->_user_mod = D('user');
    }
    public function get_error() {
    	return $this->_error;
    }
    /**
     * 注册新用户
     */
    public function register($username, $password, $email) {
    	$expemail = explode('@',$email);
    	//判断是否存在doname
    	$ishaveDoname = $this->check_doname($expemail[0]);
    	if(!$ishaveDoname){
    		$doname = $expemail[0].'_'.$userid;
    	}else{
    		$doname = $expemail[0];
    	}	
    	if (!$this->check_username($username)) {
    		$this->_error = L('username_exists');
    		return false;
    	}
    	if (!$this->check_email($email)) {
    		$this->_error = L('email_exists');
    		return false;
    	}

    	//$salt = md5(rand());
    	return array(
    			'username' => $username,
    			'password' => $password, 
    			'email' => $email,
    			'doname' => $doname,
    	);
    }
    /**
     * 检测用户域名的唯一
     */
    public function check_doname($doname) {
    	if ($this->_user_mod->where(array('doname'=>$doname))->count('userid')) {
    		return false;
    	}
    	return true;
    }
    /**
     * 检测用户邮箱唯一
     */
    public function check_email() {
    	if ($this->_user_mod->where(array('email'=>$email))->count('userid')) {
    		return false;
    	}
    	return true;
    }
    
    /**
     * 检测用户名唯一
     */
    public function check_username() {
    	if ($this->_user_mod->where(array('username'=>$username))->count('userid')) {
    		return false;
    	}
    	return true;
    }
    /**
     * 同步登陆
     */
    public function synlogin() {
    }
    
    /**
     * 同步退出
     */
    public function synlogout() {
    }
}