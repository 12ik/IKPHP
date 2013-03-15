<?php
/*
 * IKPHP 爱客开源社区 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
 * @Email:160780470@qq.com
 */
class indexAction extends frontendAction {
	public function _initialize() {
		parent::_initialize ();
		$this->group_mod = D ( 'group' );
		$this->user_mod = D ( 'user' );
		$this->group_topic_mod = D ( 'group_topics' );
	}
	public function index() {
		// 最新10个小组
		$arrNewGroup = $this->group_mod->getNewGroup ( 10 );
		$arrHotTopic = $this->group_topic_mod->getHotTopic(15);
		//活跃会员
		$arrHotUser = $this->user_mod->getHotUser(12);
		
		$this->assign ( 'arrNewGroup', $arrNewGroup );
		$this->assign ( 'arrHotUser', $arrHotUser );
		$this->assign ( 'arrHotTopic', $arrHotTopic );
		$this->_config_seo ();
		$this->display ();
	}
}