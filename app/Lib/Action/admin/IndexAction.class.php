<?php
class IndexAction extends BackendAction {

    public function _initialize() {
        parent::_initialize();
       
    }

    public function index() {

        $this->display();
    }

}