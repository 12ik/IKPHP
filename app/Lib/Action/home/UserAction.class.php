<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends UserbaseAction {
	public function index() {
		$this->display ();
	}
	
	public function setbase() {
		
		if (IS_POST) {
			foreach ( $_POST as $key => $val ) {
				$_POST [$key] = Input::deleteHtmlTags ( $val );
			}
			$data ['username'] = $this->_post ( 'username', 'trim' );
			$data ['sex'] = $this->_post ( 'sex', 'intval' );
			$data ['signed'] = $this->_post ( 'signed', 'trim' );
			$data ['phone'] = $this->_post ( 'phone', 'trim' );
			$data ['blog'] = $this->_post ( 'blog', 'trim' );
			$data ['about'] = $this->_post ( 'about', 'trim' );
			
			if (empty ( $data ['username'] )) {
				$this->error ( L ( 'username_not_null' ) );
			}
			if (mb_strlen ( $data ['username'], 'utf8' ) < 2 || mb_strlen ( $data ['username'], 'utf8' ) > 14) {
				$this->error ( L ( 'username_length_tip' ) );
			}
			$user_mod = D ( 'user' );
			$username = $this->visitor->get ( 'username' );
			// 用户名唯一性
			if ($data ['username'] != $username) {
				if ($user_mod->name_exists ( $data ['username'] ))
					$this->error ( L ( 'username_exists' ) );
			}
			if (false !== $user_mod->where ( array (
					'userid' => $this->visitor->info ['userid'] 
			) )->save ( $data )) {
				$this->success ( L ( 'user_info' ) . L ( 'edit_success' ) );
			} else {
				$this->error ( L ( 'user_info' ) . L ( 'edit_failed' ) );
			}
		} else {
			
			$info = $this->visitor->get ();
			$strarea = D ( 'area' )->getArea ( $info ['areaid'] );
			
			$this->assign ( 'info', $info );
			$this->assign ( 'strarea', $strarea );
			$this->_config_seo ();
			$this->display ();
		}
	
	}
	
	public function setface() {
		if (IS_POST) {
			
			if (! empty ( $_FILES ['picfile'] )) {
				$data_dir = date ( 'Y/md/H/' );
				$file_name = md5 ( $this->visitor->info ['userid'] );
				//会员头像规格
				$avatar_size = explode(',', C('ik_avatar_size'));
	            //会员头像保存文件夹
	            $uid = abs(intval($this->visitor->info['userid']));
	            $suid = sprintf("%09d", $uid);
	            $dir1 = substr($suid, 0, 3);
	            $dir2 = substr($suid, 3, 2);
	            $dir3 = substr($suid, 5, 2);
	            $avatar_dir = $dir1.'/'.$dir2.'/'.$dir3.'/';
	            //上传头像
	            $suffix = '';
	            foreach ($avatar_size as $size) {
	                $suffix .= '_'.$size.',';
	            }
	            $result = $this->_upload($_FILES['picfile'], 'face/'.$avatar_dir, array(
	                'width'=>C('ik_avatar_size'), 
	                'height'=>C('ik_avatar_size'),
	                'remove_origin'=>true, 
	                'suffix'=>trim($suffix, ','),
	                'ext' => 'jpg',
	            ), md5($uid));
				
			    if ($result['error']) {
	                $this->error($result['info']);
	            } else {
					$this->success('头像修改成功！');
	            }	
			}
			
		} 
		$info = $this->visitor->get ();
		$this->assign ( 'info', $info );
		$this->_config_seo ();
		$this->display ();

	}
	public function setdoname() {
		if (IS_POST) {
		
		} else {
			$this->_config_seo ();
			$this->display ();
		}
	}
	public function setcity() {
		if (IS_POST) {
			
			$user_mod = D ( 'user' );
			$oneid = $this->_post ( 'oneid', 'intval' );
			$twoid = $this->_post ( 'twoid', 'intval' );
			$threeid = $this->_post ( 'threeid', 'intval' );
			
			if ($oneid != 0 && $twoid == 0 && $threeid == 0) {
				$areaid = $oneid;
			} elseif ($oneid != 0 && $twoid != 0 && $threeid == 0) {
				$areaid = $twoid;
			} elseif ($oneid != 0 && $twoid != 0 && $threeid != 0) {
				$areaid = $threeid;
			} else {
				$areaid = 0;
			}
			
			if (false !== $user_mod->where ( array (
					'userid' => $this->visitor->info ['userid'] 
			) )->save ( array (
					'areaid' => $areaid 
			) )) {
				$this->success ( L ( 'user_area' ) . L ( 'edit_success' ) );
			} else {
				$this->error ( L ( 'user_area' ) . L ( 'edit_failed' ) );
			}
		
		} else {
			$info = $this->visitor->get ();
			$area_mod = D ( 'area' );
			$strarea = $area_mod->getArea ( $info ['areaid'] );
			// 调出省份数据
			$arrOne = $area_mod->getReferArea ( 0 );
			
			$this->assign ( 'strarea', $strarea );
			$this->assign ( 'arrOne', $arrOne );
			$this->_config_seo ();
			$this->display ();
		}
	}
	public function area() {
		$type = $this->_get ( 'ik' );
		$oneid = $this->_get ( 'oneid' );
		$area_mod = D ( 'area' );
		switch ($type) {
			case 'two' :
				$arrArea = $area_mod->getReferArea ( $oneid );
				if ($arrArea) {
					echo '<select id="twoid" name="twoid" class="txt">';
					echo '<option value="0">请选择</option>';
					foreach ( $arrArea as $item ) {
						echo '<option value="' . $item ['areaid'] . '">' . $item ['areaname'] . '</option>';
					}
					echo "</select>";
				} else {
					echo '';
				}
				break;
			
			case 'three' :
				$twoid = $this->_get ( 'twoid' );
				$arrArea = $area_mod->getReferArea ( $twoid );
				if ($arrArea) {
					echo '<select id="threeid" name="threeid" class="txt">';
					echo '<option value="0">请选择</option>';
					foreach ( $arrArea as $item ) {
						echo '<option value="' . $item ['areaid'] . '">' . $item ['areaname'] . '</option>';
					}
					echo "</select>";
				} else {
					echo '';
				}
				break;
		}
	}
	public function settag() {
		if (IS_POST) {
		
		} else {
			$this->_config_seo ();
			$this->display ();
		}
	}
	public function setpassword() {
		if (IS_POST) {
		
		} else {
			$this->_config_seo ();
			$this->display ();
		}
	}
	
	public function login() {
		$this->visitor->is_login && $this->redirect ( 'people/index', array (
				'userid' => $this->visitor->info ['userid'] 
		) );
		if (IS_POST) {
			$email = $this->_post ( 'email', 'trim' );
			$password = $this->_post ( 'password', 'trim' );
			if (empty ( $email )) {
				$this->error ( L ( 'email_not_null' ) );
			}
			if (empty ( $password )) {
				$this->error ( L ( 'password_not_null' ) );
			}
			// 连接用户中心
			$passport = $this->_user_server ();
			$uid = $passport->auth ( $email, $password );
			if (! $uid) {
				$this->error ( $passport->get_error () );
			}
			// 登陆
			$this->visitor->login ( $uid );
			// 登陆完成钩子
			$tag_arg = array (
					'uid' => $uid,
					'email' => $email,
					'action' => 'login' 
			);
			tag ( 'login_end', $tag_arg );
			// 同步登陆
			$synlogin = $passport->synlogin ( $uid );
			// 跳转到登陆前页面（执行同步操作）
			$ret_url = $this->_post ( 'ret_url', 'trim' );
			$this->redirect ( $ret_url );
		
		} else {
			// 来路
			$ret_url = isset ( $_SERVER ['HTTP_REFERER'] ) ? $_SERVER ['HTTP_REFERER'] : __APP__;
			$this->assign ( 'ret_url', $ret_url );
			
			$this->_config_seo ();
			$this->display ();
		}
	}
	public function register() {
		$this->visitor->is_login && $this->redirect ( 'people/index', array (
				'userid' => $this->visitor->info ['userid'] 
		) );
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
				$this->error ( L ( 'captcha_failed' ) );
			}
			// 连接用户中心
			$passport = $this->_user_server ();
			// 注册
			$uid = $passport->register ( $username, $password, $email );
			// 注册完成钩子 改变积分
			$tag_arg = array (
					'uid' => $uid,
					'email' => $email,
					'action' => 'register' 
			);
			tag ( 'register_end', $tag_arg );
			// 登陆
			$this->visitor->login ( $uid );
			// 登陆完成钩子
			$tag_arg = array (
					'uid' => $uid,
					'email' => $email,
					'action' => 'login' 
			);
			tag ( 'login_end', $tag_arg );
			// 同步登陆
			$synlogin = $passport->synlogin ( $uid );
			$this->redirect ( 'people/index', array (
					'userid' => $uid 
			) );
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
		$this->visitor->logout ();
		// 同步退出
		$passport = $this->_user_server ();
		$synlogout = $passport->synlogout ();
		// 跳转到退出前页面（执行同步操作）
		$this->redirect ( 'user/login' );
	}
}