<?php
/**
 * 前台控制器基类
 *
 * @author andery
 */
class FrontendAction extends BaseAction {

    protected $visitor = null;
    
    public function _initialize() {
        parent::_initialize();
 
       
    }
    /**
     * SEO设置
     */
    protected function _config_seo($seo_info = array(), $data = array()) {
    	$page_seo = array(
    			'title' => C('ik_site_title'),
    			'subtitle' => C('ik_site_subtitle'),
    			'keywords' => C('ik_site_keywords'),
    			'description' => C('ik_site_desc')
    	);
    	$page_seo = array_merge($page_seo, $seo_info);
    	//开始替换
    	$searchs = array('{site_name}', '{site_title}', '{site_keywords}', '{site_desc');
    	$replaces = array(C('ik_site_title'), C('ik_site_subtitle'), C('ik_site_keywords'), C('ik_site_desc'));
    	preg_match_all("/\{([a-z0-9_-]+?)\}/", implode(' ', array_values($page_seo)), $pageparams);
    	if ($pageparams) {
    		foreach ($pageparams[1] as $var) {
    			$searchs[] = '{' . $var . '}';
    			$replaces[] = $data[$var] ? strip_tags($data[$var]) : '';
    		}
    		//符号
    		$searchspace = array('((\s*\-\s*)+)', '((\s*\,\s*)+)', '((\s*\|\s*)+)', '((\s*\t\s*)+)', '((\s*_\s*)+)');
    		$replacespace = array('-', ',', '|', ' ', '_');
    		foreach ($page_seo as $key => $val) {
    			$page_seo[$key] = trim(preg_replace($searchspace, $replacespace, str_replace($searchs, $replaces, $val)), ' ,-|_');
    		}
    	}
    	$this->assign('seo', $page_seo);
    }  
  
}