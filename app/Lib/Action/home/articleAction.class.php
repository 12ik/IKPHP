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
		$this->user_mod = D ( 'user' );
	}	
	// 文章
	public function index() {
		$this->_config_seo (array('title'=>'最新美文','subtitle'=>'文章'));
		$this->display();
	}
	// 文章详情页
	public function show() {
		$id = $this->_get ( 'id' );
		//根据id获取内容
		$strArticle = $this->mod->getOneArticle($id);
		!$strArticle && $this->error ( '呃...你想要的东西不在这儿' );
		
		$this->assign ( 'strArticle', $strArticle );
		$this->assign ( 'strUser', $strArticle['user'] );
		$this->_config_seo (array('title'=>$strArticle['title'],'subtitle'=>'文章'));
		$this->display();
	}
	// 发表文章
	public function add(){
		$userid = $this->userid;
		$arrCate = $this->cate_mod->getAllCate();
		$this->assign ( 'arrCate', $arrCate );
		$this->_config_seo (array('title'=>'发表新文章','subtitle'=>'文章'));
		$this->display();
	}
	// 保存更新文章
	public function publish(){
		if(IS_POST){
			$userid = $this->userid;
			$id = $this->_post ( 'id' );
			
			$data['userid'] =  $userid;
			$data['title'] = $this->_post ( 'title', 'trim' );
			$data['content'] =  $this->_post ( 'content');
			$data['cateid'] =  $this->_post ( 'cateid');
			$data['addtime'] =  time();
			$data['author'] =  $this->visitor->get('username');
			
			if(empty($id)){
				//新增
				if (false !== $this->mod->create ( $data )) {
					
					$id = $this->mod->add ();
				}				
			}else{
				//更新

			}
			
			$this->redirect ( 'article/show',array('id'=>$id));
			
		}else{
			$this->redirect ( 'article/index' );
		}
		
	}	
}