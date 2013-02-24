<?php

class BackendAction extends BaseAction
{

    public function _initialize() {
        parent::_initialize();
        
        //网站后台seo
        $this->assign('site_title','IKPHP网站管理');
        $ik_soft_info = array(
        		'ikphp_version' => IKPHP_VERSION,
        		'ikphp_year' => IKPHP_YEAR,
        		'ikphp_site_name' => IKPHP_SITENAME,
        		'ikphp_site_url' => IKPHP_SITEURL,
        		'ikphp_email' => IKPHP_EMAIL,
       		
        );
        $this->assign('ikphp', $ik_soft_info);
    }
    protected function title($title){
    	$this->assign('title', $title);
    }

    
}
