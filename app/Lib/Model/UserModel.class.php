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
}