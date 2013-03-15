<?php
/**
 * 控制器基类
 *
 * @author 小麦
 */
class baseAction extends Action
{
    protected function _initialize() {
        //消除所有的magic_quotes_gpc转义
        Input::noGPC();
        //初始化网站配置
        if (false === $setting = F('setting')) {
            $setting = D('setting')->setting_cache();
        }
        C($setting);
        //当前app名称
        $this->assign('module_name',strtolower(MODULE_NAME));
        //当前action名称
        $this->assign('action_name',strtolower(ACTION_NAME));     
        //发送邮件
       // $this->assign('async_sendmail', session('async_sendmail'));
    }
    /**
     * 上传文件默认规则定义
     */
    protected function _upload_init($upload) {
        $allow_max = C('ik_attr_allow_size'); //读取配置
        $allow_exts = explode(',', C('ik_attr_allow_exts')); //读取配置
        $allow_max && $upload->maxSize = $allow_max * 1024;   //文件大小限制
        $allow_exts && $upload->allowExts = $allow_exts;  //文件类型限制
        $upload->saveRule = 'uniqid';
        return $upload;
    }  
    /**
     * 上传文件
     */
    protected function _upload($file, $dir = '', $thumb = array(), $save_rule='uniqid') {
    	$upload = new UploadFile();
    	if ($dir) {
    		$upload_path = C('ik_attach_path') . $dir . '/';
    		$upload->savePath = $upload_path;
    	}
    	if ($thumb) {
    		$upload->thumb = true;
    		$upload->thumbMaxWidth = $thumb['width'];
    		$upload->thumbMaxHeight = $thumb['height'];
    		$upload->thumbPrefix = '';
    		$upload->thumbSuffix = isset($thumb['suffix']) ? $thumb['suffix'] : '_thumb';
    		$upload->thumbExt = isset($thumb['ext']) ? $thumb['ext'] : '';
    		$upload->thumbRemoveOrigin = isset($thumb['remove_origin']) ? true : false;
    	}
    	//自定义上传规则
    	$upload = $this->_upload_init($upload);
    	if( $save_rule!='uniqid' ){
    		$upload->saveRule = $save_rule;
    	}
    
    	if ($result = $upload->uploadOne($file)) {
    		return array('error'=>0, 'info'=>$result);
    	} else {
    		return array('error'=>1, 'info'=>$upload->getErrorMsg());
    	}
    }
 
   
}