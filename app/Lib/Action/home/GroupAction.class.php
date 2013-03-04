<?php
/*
 * IKPHP 爱客开源社区
* @copyright (c) 2012-3000 IKPHP All Rights Reserved
* @author 小麦
* @Email:160780470@qq.com
*/
class GroupAction extends FrontendAction {

	public function _initialize() {
		parent::_initialize ();
		$this->_mod = D('group');
		$this->group_users_mod = D('group_users');
	}	
	public function index() {
		if($this->visitor->is_login){
			$this->redirect('group/my_group_topics');
		}
		$this->_config_seo ();
		$this->display ();
	}
	public function my_group_topics() {
		$this->_config_seo ();
		$this->display ();
	}
	public function create() {
		if(IS_POST){
			foreach ( $_POST as $key => $val ) {
				$_POST [$key] = Input::deleteHtmlTags ( $val );
			}
			if($_POST['grp_agreement'] != 1) $this->error('不同意社区指导原则是不允许创建小组的！');
			$data ['groupname'] = $this->_post ( 'groupname', 'trim' );
			$data ['groupdesc'] = $this->_post ( 'groupdesc', 'trim' );
			//$data ['tag'] = $this->_post ( 'tag', 'trim' );
			$tags = str_replace(' ',' ',$data ['tag']);
			$arrtag = explode(' ',$tags);
			$data ['groupname'] = $this->_post ( 'groupname', 'trim' );
			$data ['addtime'] = time();
			//小组名唯一性判断
			if($this->iscreate($data ['groupname'])) $this->error('小组名称已经存在，请更换其他小组名称！');
			if(false !== $this->_mod->create($data)){
				$groupid = $this->_mod->add();
				if($groupid){
					//绑定成员
					$group_user_data['userid'] = $this->visitor->info ['userid'];
					$group_user_data['groupid'] = $groupid;
					$group_user_data['addtime'] = time();
					$this->group_users_mod->add($group_user_data);	
					//更新小组人数
					$this->_mod->where('groupid='.$groupid)->setField('count_user',1);
					$this->redirect('group/show',array('id'=>$groupid));
				}
			}
		}
		$this->_config_seo ();
		$this->display ();
	}
	public function iscreate($groupname){
		if ($groupname){
			return $this->_mod->isGroup($groupname);
		}else{
			$this->error('小组名不能为空！');
		}
	}
	public function show(){
		$id = $this->_get('id','intval');
		$group = $this->_mod->where(array('groupid'=>$id))->find();
		$this->assign ( 'strGroup', $group );
		$this->_config_seo ();
		$this->display ();
	}
}