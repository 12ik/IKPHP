<?php
class userModel extends Model
{

	protected $_auto = array(
		    array('password','md5',1,'function')
	);
	
	public function email_exists($email, $id = 0) {
		$where = "email='" . $email . "' AND userid<>'" . $id . "'";
		$result = $this->where($where)->count('userid');
		
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	public function name_exists($name, $id = 0) {
		$where = "username='" . $name . "' AND userid<>'" . $id . "'";
		$result = $this->where($where)->count('userid');
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	//获取一个用户的信息
	function getOneUser($userid){
	
		$strUser = $this->where(array(
			'userid'=>$userid,
		))->find();
		
		$strUser['face'] = avatar($userid, 48);
		
		//地区
		if($strUser['areaid'] > 0){
			
			$strUser['area'] = D('area')->getOneArea($strUser['areaid']);
		
		}else{
			$strUser['area'] = array(
				'areaid'	=> '0',
				'areaname' => '火星',
			);
		}

		//签名
		$pattern='/(http:\/\/|https:\/\/|ftp:\/\/)([\w:\/\.\?=&-_]+)/is';

		$strUser['signed'] = hview(preg_replace($pattern, '<a rel="nofollow" target="_blank" href="\1\2">\1\2</a>', $strUser['signed']));
		
		return $strUser;
	}
}