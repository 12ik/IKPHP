<?php
class groupModel extends Model
{
	public function isGroup($name) {
		$where = "groupname='" . $name ."'";
		$result = $this->where($where)->count('groupid');
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
}