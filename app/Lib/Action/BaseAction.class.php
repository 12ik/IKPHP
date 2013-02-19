<?php
/**
 * 控制器基类
 *
 * @author andery
 */
class BaseAction extends Action
{
    protected function _initialize() {
        //消除所有的magic_quotes_gpc转义
        Input::noGPC();
        //初始化网站配置
        if (false === $setting = F('setting')) {
            $setting = D('Setting')->setting_cache();
        }
        C($setting);
        //发送邮件
       // $this->assign('async_sendmail', session('async_sendmail'));
    }
   
}