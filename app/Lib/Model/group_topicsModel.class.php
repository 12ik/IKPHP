<?php
class group_topicsModel extends Model {
	// 统计小组下帖子数
	public function countTopic($groupid) {
		$where = array (
				'groupid' => $groupid 
		);
		$result = $this->where ( $where )->count ( '*' );
		return $result;
	}
	// 统计当天发布的帖子数
	public function countTodayTipic($groupid) {
		$today_start = strtotime ( date ( 'Y-m-d 00:00:00' ) );
		$today_end = strtotime ( date ( 'Y-m-d 23:59:59' ) );
		$where = "groupid='" . $groupid . "' AND addtime >'" . $today_start . "'";
		$result = $this->where ( $where )->count ( '*' );
		return $result;
	}
	public function getOneTopic($topic_id) {
		if ($this->isTopic ( $topic_id )) {
			$where = array (
					'topicid' => $topic_id
			);
			$result = $this->where ( $where )->find ();
			return $result;
		}
	}
	// 是否存在帖子
	public function isTopic($topic_id) {
		$where = array (
				'topicid' => $topic_id 
		);
		$result = $this->where ( $where )->count ( '*' );
		if ($result > 0) {
			return true;
		} else {
			return false;
		}
	}
	//最新话题
	public function newTopic($groupid, $limit){
		$where = array (
				'groupid' => $groupid,
				'isshow' =>0,
		);
		$results = $this->where ( $where )->order('addtime')->limit($limit)->select();
		foreach($results as $key=>$item){
			$result[] = $item;
			$result[$key]['user'] = D('user')->getOneUser($item['userid']);
		}
		return $result;	
	}
	// 获取小组话题
	public function getTopics($strgroupid,$limit){
		$where['groupid'] = array('exp',' IN ('.$strgroupid.') ');
		$where['isshow'] = 0;
		$result = $this->where ( $where )->order('uptime')->limit($limit)->select();
		return $result;	
	}
}