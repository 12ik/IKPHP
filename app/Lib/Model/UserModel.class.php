<?php

class UserModel extends Model
{
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
		$user_info = D('user_info');
		$where = "username='" . $name . "' AND userid<>'" . $id . "'";
		$result = $user_info->where($where)->count('userid');
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
}