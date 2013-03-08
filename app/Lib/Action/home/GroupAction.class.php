<?php
/*
 * IKPHP 爱客开源社区 @copyright (c) 2012-3000 IKPHP All Rights Reserved @author 小麦
 * @Email:160780470@qq.com
 */
class GroupAction extends FrontendAction {
	
	public function _initialize() {
		parent::_initialize ();
		// 访问者控制
		if (! $this->visitor->is_login && in_array ( ACTION_NAME, array (
				'add',
				'join',
				'my_group_topics',
				'my_collect_topics',
				'mine',
				'my_replied_topics',
				'create',
				
		) )) {
			$this->redirect ( 'user/login' );
		} else {
			$this->userid = $this->visitor->info ['userid'];
		}
		$this->_mod = D ( 'group' );
		$this->user_mod = D ( 'user' );
		$this->group_users_mod = D ( 'group_users' );
		$this->group_topics_mod = D ( 'group_topics' );
		$this->group_topics_collects = D ( 'group_topics_collects' );
	}
	public function index() {
		if ($this->visitor->is_login) {
			$this->redirect ( 'group/my_group_topics' );
		}
		$this->_config_seo ();
		$this->display ();
	}
	//我管理的小组
	public function mine(){
		$userid = $this->userid;
		// 用户信息
		$strUser = $this->user_mod->getOneUser ( $userid );
		$myGroup = $this->_mod->getUserJoinGroup($userid);
		//我加入的小组
		if(is_array($myGroup)){
			$count_mygroup = 0;
			foreach($myGroup as $key=>$item){
				$arrMyGroup[] = $this->_mod->getOneGroup($item['groupid']);
				$count_mygroup ++;
			}
		}
		$myCreateGroup = $this->_mod->getUserGroup($userid);
		//我管理的小组
		if(is_array($myCreateGroup)){
			$count_Admingroup = 0;
			foreach($myCreateGroup as $key=>$item){
		
				$arrMyAdminGroup[] = $this->_mod->getOneGroup($item['groupid']);
				$count_Admingroup ++;
		
			}
		}		
		
		$this->assign ( 'strUser', $strUser );
		$this->assign ( 'arrMyGroup', $arrMyGroup );
		$this->assign ( 'count_mygroup', $count_mygroup );
		$this->assign ( 'arrMyAdminGroup', $arrMyAdminGroup );
		$this->assign ( 'count_Admingroup', $count_Admingroup );

		$this->_config_seo (array('title'=>'我管理/加入的小组','subtitle'=>'小组'));
		$this->display ();
	}
	//我收藏喜欢的帖子
	public function my_collect_topics(){
		$userid = $this->userid;
		// 用户信息
		$strUser = $this->user_mod->getOneUser ( $userid );
		// 我的小组
		$arrCollect = $this->group_topics_collects->getUserCollectTopic($userid,80);
		foreach($arrCollect as $item){
			$strTopic = $this->group_topics_mod->getOneTopic($item['topicid']);
			$arrTopics[] = $strTopic;
		}
		foreach($arrTopics as $key=>$item){
			$arrTopic[] = $item;
			$arrTopic[$key]['user'] = $this->user_mod->getOneUser($item['userid']);
			$arrTopic[$key]['group'] = $this->_mod->getOneGroup($item['groupid']);
		}
		$this->assign ( 'strUser', $strUser );
		$this->assign ( 'arrTopic', $arrTopic );
		$this->_config_seo (array('title'=>'我喜欢的话题','subtitle'=>'小组'));
		$this->display ();
	}
	// 我发起的话题
	public function my_topics(){
		$userid = $this->userid;
		// 用户信息
		$strUser = $this->user_mod->getOneUser ( $userid );
		//发布的帖子
		$arrMyTopics = $this->group_topics_mod->getUserTopic($userid,80);
		foreach($arrMyTopics as $key=>$item){
			$arrTopic[] = $item;
			$arrTopic[$key]['user'] = $this->user_mod->getOneUser($item['userid']);
			$arrTopic[$key]['group'] = $this->_mod->getOneGroup($item['groupid']);
		}		
		$this->assign ( 'strUser', $strUser );
		$this->assign ( 'arrTopic', $arrTopic );
		$this->_config_seo (array('title'=>'我发起的话题','subtitle'=>'小组'));
		$this->display ();
	}
	// 我的小组话题
	public function my_group_topics() {
		$userid = $this->userid;
		// 用户信息
		$strUser = $this->user_mod->getOneUser ( $userid );
		// 我的小组话题
		$myGroup = $this->_mod->getGroupUser ( $userid );
		
		//我加入的所有小组的话题
		if(is_array($myGroup)){
			foreach($myGroup as $item){
				$arrGroup[] = $item['groupid'];
			}
		}
		$strGroup = implode(',',$arrGroup);
		
		if($strGroup){
			$arrTopics = $this->group_topics_mod->getTopics($strGroup,80);
			foreach($arrTopics as $key=>$item){
				$arrTopic[] = $item;
				$arrTopic[$key]['user'] = $this->user_mod->getOneUser($item['userid']);
				$arrTopic[$key]['group'] = $this->_mod->getOneGroup($item['groupid']);
			}
		}
		
		
		$this->assign ( 'strUser', $strUser );
		$this->assign ( 'arrTopic', $arrTopic );
		$this->_config_seo (array('title'=>'我的小组话题','subtitle'=>'小组'));
		$this->display ();
	
	}
	public function create() {
		if (IS_POST) {
			foreach ( $_POST as $key => $val ) {
				$_POST [$key] = Input::deleteHtmlTags ( $val );
			}
			if ($_POST ['grp_agreement'] != 1)
				$this->error ( '不同意社区指导原则是不允许创建小组的！' );
			$data ['userid'] = $this->visitor->info ['userid'];
			$data ['groupname'] = $this->_post ( 'groupname', 'trim' );
			$data ['groupdesc'] = $this->_post ( 'groupdesc', 'trim' );
			// $data ['tag'] = $this->_post ( 'tag', 'trim' );
			$tags = str_replace ( ' ', ' ', $data ['tag'] );
			$arrtag = explode ( ' ', $tags );
			$data ['groupname'] = $this->_post ( 'groupname', 'trim' );
			$data ['addtime'] = time ();
			// 小组名唯一性判断
			if ($this->iscreate ( $data ['groupname'] ))
				$this->error ( '小组名称已经存在，请更换其他小组名称！' );
				// 小组图标
			$groupicon = $_FILES ['picfile'];
			// 上传
			if (! empty ( $groupicon )) {
				$data_dir = date ( 'Y/md/H' );
				$result = $this->_upload ( $groupicon, 'group/icon/' . $data_dir, array (
						'width' => '48',
						'height' => '48',
						'remove_origin' => true 
				) );
				if ($result ['error']) {
					$this->error ( $result ['info'] );
				} else {
					$ext = array_pop ( explode ( '.', $result ['info'] [0] ['savename'] ) );
					$data ['groupicon'] = $data_dir . '/' . str_replace ( '.' . $ext, '_thumb.' . $ext, $result ['info'] [0] ['savename'] );
				}
			}
			if (false !== $this->_mod->create ( $data )) {
				$groupid = $this->_mod->add ();
				if ($groupid) {
					// 绑定成员
					$group_user_data ['userid'] = $this->visitor->info ['userid'];
					$group_user_data ['groupid'] = $groupid;
					$group_user_data ['addtime'] = time ();
					$this->group_users_mod->add ( $group_user_data );
					// 更新小组人数
					$this->_mod->where ( 'groupid=' . $groupid )->setField ( 'count_user', 1 );
					$this->redirect ( 'group/show', array (
							'id' => $groupid 
					) );
				}
			}
		}
		$this->_config_seo ();
		$this->display ();
	}
	public function iscreate($groupname) {
		if ($groupname) {
			return $this->_mod->email_exists ( $groupname );
		} else {
			$this->error ( '小组名不能为空！' );
		}
	}
	public function show() {
		$id = $this->_get ( 'id', 'intval' );
		$group = $this->_mod->getOneGroup ( $id );
		// 存在性检查
		! $group && $this->error ( '呃...你想要的东西不在这儿' );
		$strLeader = $this->user_mod->getOneUser ( $group ['userid'] );
		// 是否加入
		$isGroupUser = $this->_mod->isGroupUser ( $this->userid, $id );
		// 获取最新加入会员
		$arrGroupUser = $this->_mod->getNewGroupUser ( $id, 8 );
		// 获取最近小组话题 20 条
		$arrTopics = $this->group_topics_mod->newTopic($id, 20);
		if( is_array($arrTopics)){
			foreach($arrTopics as $key=>$item){
				$arrTopic[] = $item;
				$arrTopic[$key]['user'] = $this->user_mod->getOneUser($item['userid']);
			}
		}
		
		$this->assign ( 'arrTopic', $arrTopic );
		$this->assign ( 'isGroupUser', $isGroupUser );
		$this->assign ( 'strGroup', $group );
		$this->assign ( 'strLeader', $strLeader );
		$this->assign ( 'arrGroupUser', $arrGroupUser );
		$this->_config_seo ();
		$this->display ();
	}
	// 发布新帖
	public function add() {
		$userid = $this->userid;
		$groupid = $this->_get ( 'id' );
		// 是否加入
		$isGroupUser = $this->_mod->isGroupUser ( $this->userid, $groupid );
		// 获取小组信息
		$group = $this->_mod->getOneGroup ( $groupid );
		// 预先执行添加一条记录
		$strLastTipic = $this->group_topics_mod->where ( array (
				'userid' => $userid,
				'groupid' => 0 
		) )->find ();
		if ($strLastTipic ['topicid'] > 0) {
			$topic_id = $strLastTipic ['topicid'];
		
		} else {
			$data = array (
					'userid' => $userid,
					'groupid' => 0,
					'title' => '0',
					'content' => '0' 
			);
			if (false !== $this->group_topics_mod->create ( $data )) {
				$topic_id = $this->group_topics_mod->add ();
			}
		
		}
		$this->assign ( 'topic_id', $topic_id );
		$this->assign ( 'strGroup', $group );
		$this->assign ( 'isGroupUser', $isGroupUser );
		$this->_config_seo ();
		$this->display ();
	}
	// 执行发布
	public function publish() {
		
		if (IS_POST) {
			$userid = $this->userid;
			$topic_id = $this->_post ( 'topic_id' );
			$groupid = $this->_post ( 'groupid' );
			
			$title = Input::deleteHtmlTags ( $this->_post ( 'title', 'trim' ) );
			$content =  $this->_post ( 'content');
			$iscomment = $this->_post ( 'iscomment'); // 是否允许评论
			
			if ($title == '') {
				$this->error ( '不要这么偷懒嘛，多少请写一点内容哦^_^' );
			} else if ($content == '') {
				$this->error ( '没有任何内容是不允许你通过滴^_^' );
			} elseif (mb_strlen ( $content, 'utf8' ) > 20000) {
				$this->error ( '发这么多内容干啥^_^' );
			}
			$uptime = time ();
			// 查看是否有视频
			$seqnum = D ( 'videos' )->countViedeos ( 'topic', $topic_id );
			$seqnum > 0 ? $isvideo = 1 : $isvideo = 0;
			$arrData = array (
					'groupid' => $groupid,
					'userid' => $userid,
					'title' => $title,
					'content' => $content,
					'isvideo' => $isvideo,
					'iscomment' => $iscomment,
					'addtime' => time (),
					'uptime' => $uptime 
			);
			// 执行更新帖子
			$this->group_topics_mod->where ( array (
					'userid' => $userid,
					'topicid' => $topic_id 
			) )->save ( $arrData );
			// 统计小组下帖子数并更新
			$count_topic = $this->group_topics_mod->countTopic ( $groupid );
			// 统计今天发布帖子数
			$count_topic_today = $this->group_topics_mod->countTodayTipic ( $groupid );
			// 更新帖子数
			$this->_mod->updateTodayTopic ( $groupid, $count_topic, $count_topic_today );
			// 积分记录
			$this->redirect ( 'group/topic', array (
					'id' => $topic_id 
			) );
		
		} else {
			$this->redirect ( 'group/index' );
		}
	
	}
	public function topic() {
		$type = $this->_get ( 'd', 'trim' );
		if (! empty ( $type )) {
			switch ($type) {
				// 加入该小组
				case "topic_collect" :
					$topicid = $this->_post ( 'tid' );
					$groupid = $this->_post ( 'tkind' );
					if (empty ( $topicid )) {
						$this->error ( "非法操作！" );
					}
					$arrJson = $this->group_topics_collects->collectTopic ( $this->userid, $topicid );
					header ( "Content-Type: application/json", true );
					echo json_encode ( $arrJson );
					break;
			}
		
		} else {
			$user = $this->visitor->get ();
			$topic_id = $this->_get ( 'id' );
			$strTopic = $this->group_topics_mod->getOneTopic ( $topic_id );
			! $strTopic && $this->error ( '呃...你想要的东西不在这儿' );
			$strTopic ['user'] = $this->user_mod->getOneUser ( $strTopic ['userid'] );
			$strTopic ['user'] ['signed'] = hview ( $strTopic ['user'] ['signed'] );
			$strTopic ['content'] = nl2br ( $strTopic [content] );
			// 小组信息
			$strGroup = $this->_mod->getOneGroup ( $strTopic ['groupid'] );
			// 是否已经加入
			$isGroupUser = $this->_mod->isGroupUser ( $this->userid, $strTopic ['groupid'] );
			// 最新话题
			$newTopic = $this->group_topics_mod->newTopic ( $strTopic ['groupid'], 6 );
			// 喜欢收藏的人数
			$likenum = $this->group_topics_collects->countLike ( $topic_id );
			$is_Like = $this->group_topics_collects->isLike ( $user ['userid'], $topic_id );
			$strTopic ['islike'] = $is_Like;
			$strTopic ['likenum'] = $likenum;
			
			// 操作
			$action ['istop'] = $strTopic ['istop'] == 0 ? '置顶' : '取消置顶';
			$action ['isposts'] = $strTopic ['isposts'] == 0 ? '精华' : '取消精华';
			$action ['isshow'] = $strTopic ['isshow'] == 0 ? '隐藏' : '显示';
			$action ['move'] = '移动';
			
			// 喜欢该帖子的用户
			$arrCollectUser = $this->group_topics_collects->likeTopicUser ( $topic_id );
			
			$this->assign ( 'user', $user );
			$this->assign ( 'strTopic', $strTopic );
			$this->assign ( 'newTopic', $newTopic );
			$this->assign ( 'strGroup', $strGroup );
			$this->assign ( 'action', $action );
			$this->assign ( 'isGroupUser', $isGroupUser );
			$this->assign ( 'arrCollectUser', $arrCollectUser );
			$this->_config_seo ();
			$this->display ();
		}
	
	}
	// 加入小组
	public function join() {
		$groupid = $this->_get ( 'id' );
		// 先统计用户有多少个小组了，20个封顶
		$userGroupNum = $this->group_users_mod->where ( array (
				'userid' => $this->userid 
		) )->count ( '*' );
		
		if ($userGroupNum >= 20)
			$this->error ( '你加入的小组总数已经到达20个，不能再加入小组！' );
		
		$groupUserNum = $this->group_users_mod->where ( array (
				'userid' => $this->userid,
				'groupid' => $groupid 
		) )->count ( '*' );
		
		if ($groupUserNum > 0)
			$this->error ( '你已经加入小组！' );
			// 执行加入
		$data = array (
				'userid' => $this->userid,
				'groupid' => $groupid,
				'addtime' => time () 
		);
		if (false !== $this->group_users_mod->create ( $data )) {
			$group_users_id = $this->group_users_mod->add ();
			if ($group_users_id) {
				// 更新会员数
				$this->_mod->where ( array (
						'groupid' => $groupid 
				) )->setInc ( 'count_user', 1 );
				$this->redirect ( 'group/show', array (
						'id' => $groupid 
				) );
			}
		}
	
	}
	// 退出小组
	public function quit() {
	
	}
	// 发现小组
	public function explore(){
		$tag = $this->_get('tagid', 'trim,urldecode','');
		if(!empty($tag)){
			
		}else{
			//查询开放
			$map = array('isopen'=>0);
			//显示列表
			$pagesize = 8;
			$count = $this->_mod->where($map)->order('isrecommend DESC')->count('groupid');
			$pager = $this->_pager($count, $pagesize);
			$arrGroups =  $this->_mod->where($map)->order('isrecommend DESC')->limit($pager->firstRow.','.$pager->listRows)->select();
			
			foreach($arrGroups as $key=>$item){
				$arrData[] = $this->_mod->getOneGroup($item['groupid']);
			}
			foreach($arrData as $key=>$item){
				$exploreGroup[] =  $item;
				$exploreGroup[$key]['groupname'] = getsubstrutf8(t($item[groupname]),0,14);
				$exploreGroup[$key]['groupdesc'] = getsubstrutf8(t($item['groupdesc']),0,45);
			}
			
			$this->assign('pageUrl', $pager->fshow());
			$this->assign('list', $exploreGroup);
			$this->_config_seo (array('title'=>'发现小组','subtitle'=>'小组'));
			$this->display ();
		}

	}
	// 发现话题
	public function explore_topic(){
		//查询是否显示
		$map = array('ishow'=>0);
		//显示列表
		$pagesize = 3;
		$count = $this->group_topics_mod->where($map)->order('addtime DESC')->count('topicid');
		$pager = $this->_pager($count, $pagesize);
		$arrTopics =  $this->group_topics_mod->where($map)->order('addtime DESC')->limit($pager->firstRow.','.$pager->listRows)->select();
			
		foreach($arrTopics as $key=>$item){
			$list[] = $item;
			$list[$key]['group'] = $this->_mod->getOneGroup($item['groupid']);
		}
			
		$this->assign('pageUrl', $pager->fshow());
		$this->assign('list', $list);
		$this->_config_seo (array('title'=>'发现话题','subtitle'=>'小组'));
		$this->display ();		
	}
	
}