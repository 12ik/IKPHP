<?php
// 本类由系统自动生成，仅供测试用途
class PeopleAction extends FrontendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->group_mod = D ( 'group' );
		$this->user_mod = D ( 'user' );
		$this->group_users_mod = D ( 'group_users' );
		$this->group_topics_mod = D ( 'group_topics' );
		$this->group_topics_collects = D ( 'group_topics_collects' );
	}	
	public function index() {
		$doname = $this->_get('id');
		$userid = $this->user_mod->where(array('doname'=>$doname))->getField('userid');
		if(empty($userid)) {
			$this->error('呃...你想要的东西不在这儿');
		}

		$strUser = $this->user_mod->getOneUser($userid);
		//发布的帖子
		$arrMyTopic = $this->group_topics_mod->getUserTopic($userid, 10); 
		// 用户喜欢的帖子
		$MyCollects = $this->group_topics_collects->getUserCollectTopic($userid, 10);
		if(is_array($MyCollects)){
			foreach($MyCollects as $key => $item){
				$arrMyCollect [$key] = $this->group_topics_mod->getOneTopic($item['topicid']);
			}
		} 	
		$this->assign ( 'strUser', $strUser );
		$this->assign ( 'arrMyTopic', $arrMyTopic );
		$this->assign ( 'arrMyCollect', $arrMyCollect );
		$this->_config_seo (array('title'=>$strUser['username'],'subtitle'=>'个人主页'));
		$this->display ();
	}
}