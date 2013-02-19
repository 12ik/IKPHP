<?php
class IndexAction extends FrontendAction {
	public function index() {
		$this->_config_seo ();
		$this->display ();
	}
}