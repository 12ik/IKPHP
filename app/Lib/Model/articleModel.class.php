<?php
class articleModel extends Model {
	
	public function getOneArticle($id, $userid){
		$where['id'] = $id;
		empty($userid) ? '': $where['userid'] = $userid;
		$result = $this->where($where)->find();
		if(!empty($result)){
			$result['user'] = D('user')->getOneUser($result['userid']);
			return $result;
		}
		
		return false;
	}
}