<?php
/*
 * IKPHP 爱客开源社区
* @copyright (c) 2012-3000 IKPHP All Rights Reserved
* @author 小麦
* @Email:160780470@qq.com
*/
class IndexAction extends FrontendAction {
	public function index() {
		$this->_config_seo ();
		$this->display ();
	}
}