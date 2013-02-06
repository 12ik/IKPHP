<?php
/*
 * 爱客网单入口
* @copyright (c) 2012-3000 12IK All Rights Reserved
* @author 小麦
* @Email:160780470@qq.com
*/

//定义网站根目录,APP目录,DATA目录，核心目录
define ( 'IN_IK', true );
if (!is_file('./data/install.lock')) {
	header('Location: ./install.php');
	exit;
}
/* 当前IKPHP程序版本 */
define('IK_VERSION', '1.0');
/* 当前PinPHP程序Release */
define('IK_RELEASE', '20130201');
/* 应用名称*/
define('APP_NAME', 'app');
/* 应用目录*/
define('APP_PATH', './app/');
/* 数据目录*/
define('IK_DATA_PATH', './data/');
/* 扩展目录*/
define('EXTEND_PATH', APP_PATH . 'Extend/');
/* 配置文件目录*/
define('CONF_PATH', IK_DATA_PATH . 'config/');
/* 数据目录*/
define('RUNTIME_PATH', IK_DATA_PATH . 'runtime/');
/* HTML静态文件目录*/
define('HTML_PATH', IK_DATA_PATH . 'html/');
/* DEBUG开关*/
define('APP_DEBUG', true);
//载入核心文件
require("./core/setup.php");
