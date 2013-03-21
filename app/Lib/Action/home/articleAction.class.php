<?php
// 本类由系统自动生成，仅供测试用途
class articleAction extends frontendAction {
	public function _initialize() {
		parent::_initialize ();
		// 访问者控制
		if (! $this->visitor->is_login && in_array ( ACTION_NAME, array (
				'add',
				'update',
				'edit' 
		) )) {
			$this->redirect ( 'user/login' );
		} else {
			$this->userid = $this->visitor->info ['userid'];
		}
		$this->mod = D ( 'article' );
		$this->cate_mod = D ( 'article_cate' );
		$this->item_mod = D ( 'article_item' );
		$this->channel_mod = D ( 'article_channel' );
		$this->user_mod = D ( 'user' );
	}
	// 文章
	public function index() {
		// 获取分类
		$arrCate = $this->cate_mod->getCateByNameid('news');
		
		$arrArticle = $this->mod->getAllArticle();
		
		$this->assign ( 'arrCate', $arrCate );
		$this->assign ( 'arrArticle', $arrArticle );
		
		$this->_config_seo ( array (
				'title' => '最新美文',
				'subtitle' => '文章' 
		) );
		$this->display ();
	}
	// 发表文章
	public function add() {
		$userid = $this->userid;
		// 获取资讯分类
		$arrChannel = $this->channel_mod->select ();
		$arrCate = ''; // 初始化下拉列表
		$arrCatename = array ();
		foreach ( $arrChannel as $key => $item ) {
			$arrCatename = $this->cate_mod->getCateByNameid ( $item ['nameid'] );
			$arrCate .= '<optgroup label="' . $item ['name'] . '">';
			foreach ( $arrCatename as $key1 => $item1 ) {
				$arrCate .= '<option  value="' . $item1 ['cateid'] . '" >' . $item1 ['catename'] . '</option>';
			}
			$arrCate .= '</optgroup>';
		}
		$this->assign ( 'arrCate', $arrCate );
		$this->_config_seo ( array (
				'title' => '发表新文章',
				'subtitle' => '文章' 
		) );
		$this->display ();
	}
	// 保存更新文章
	public function publish() {
		if (IS_POST) {
			$userid = $this->userid;
			$id = $this->_post ( 'id' );
			
			$item ['userid'] = $userid;
			$item ['cateid'] = $this->_post ( 'cateid', 'intval' );
			$item ['username'] = $this->visitor->get ( 'username' );
			$item ['title'] = $this->_post ( 'title', 'trim' );
			$item ['addtime'] = time ();
			
			$data ['content'] = $this->_post ( 'content' );
			$data ['postip'] = get_client_ip ();
			$data ['newsauthor'] = $this->visitor->get ( 'username' );
			$data ['newsfrom'] = $this->_post ( 'newsfrom', 'trim', '' );
			$data ['newsfromurl'] = $this->_post ( 'newsfromurl', 'trim', '' );
			
			if (empty ( $id )) {
				// 新增
				if (false !== $this->item_mod->create ( $item )) {
					$itemid = $data ['itemid'] = $this->item_mod->add ();
					if ($itemid > 0) {
						// 保存article
						if (false !== $this->mod->create ( $data )) {
							$id = $this->mod->add ();
							// 执行更新图片信息
							$arrSeqid = $this->_post ( 'seqid');
							$arrTitle = $this->_post ( 'photodesc');
							if(is_array($arrSeqid)){
								foreach($arrSeqid as $key=>$item){
									$seqid = $arrSeqid[$key];
									$imgtitle = empty($arrTitle[$key]) ? '' : $arrTitle[$key];
									$layout = $this->_post ( 'layout_'.$seqid);
									$dataimg = array('title'=>$imgtitle, 'align'=> $layout,'typeid'=>$id);
									$where = array('type'=>'article','typeid'=>'0','seqid'=>$seqid);
									D('images')->updateImage($dataimg,$where);
								}
							}
							// 更新 isphoto 暂时不上
						}
					}
				}
			} else {
				// 更新
			}
			
			$this->redirect ( 'article/show', array (
					'id' => $id 
			) );
		} else {
			$this->redirect ( 'article/index' );
		}
	}
	// 文章详情页
	public function show() {
		$user = $this->visitor->get ();
		$id = $this->_get ( 'id', 'intval');
		// 根据id获取内容
		$strArticle = $this->mod->getOneArticle ( $id );
		! $strArticle && $this->error ( '呃...你想要的东西不在这儿' );
		
		// 浏览量加 +1
		if($strArticle ['userid']!=$user['userid']){
			$this->item_mod->where(array('itemid'=>$strArticle['itemid']))->setInc('count_view');
		}

		$this->assign ( 'strArticle', $strArticle );
		$this->assign ( 'strUser', $strArticle ['user'] );
		$this->_config_seo ( array (
				'title' => $strArticle ['title'],
				'subtitle' => '文章' 
		) );
		$this->display ();
	}
	// 文章分类列表
	public function category(){
		$this->error('正在紧张开发中');
	}
}