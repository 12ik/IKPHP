<?php
class groupModel extends Model {
	public function email_exists($name) {
		$where = "groupname='" . $name . "'";
		$result = $this->where ( $where )->count ( 'groupid' );
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	public function getOneGroup($groupid) {
		if ($this->isGroup ( $groupid )) {
			$where = array (
					'groupid' => $groupid 
			);
			$result = $this->where ( $where )->find ();
			return $result;
		
		}
	}
	// 某用户加入的小组
	public function getGroupUser($userid){
		$where = array (
				'userid' => $userid,
		);
		$result = D('group_users')->where ( $where )->select();
		return $result;		
	}
	// 是否加入
	public function isGroupUser($userid, $groupid) {
		$where = array (
				'groupid' => $groupid,
				'userid' => $userid 
		);
		$result = M('group_users')->where ( $where )->count ( 'userid' );
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	// 判断是否存在小组
	public function isGroup($groupid) {
		$where = array (
				'groupid' => $groupid 
		);
		$result = $this->where ( $where )->count ( '*' );
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	// 更新当天帖子数
	public function updateTodayTopic($groupid, $count_topic, $count_topic_today) {
		$data = array (
				'count_topic' => $count_topic,
				'count_topic_today' => $count_topic_today,
				'uptime' => time ()
		);
		$where = array (
				'groupid' => $groupid
		);
		$result = $this->where ( $where )->save ( $data );
		return true;
	}
	// 小组内最新加入的会员
	public function getNewGroupUser($groupid,$limit){
		$where = array (
				'groupid' => $groupid,
		);
		$results = D('group_users')->where ( $where )->order('addtime desc')->limit($limit)->select();
		foreach($results as $key=>$item){
			$result[] = D('user')->getOneUser($item['userid']);
		}
		return $result;
	}
}