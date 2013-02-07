<?php
/*
 * 爱客网安装入口程序
* @copyright (c) 2012-3000 12IK All Rights Reserved
* @author 小麦
* @Email:160780470@qq.com
*/
if (is_file('./data/install.lock')) {
    header('Location: ./');
    exit;
}
/* 当前IKPHP程序版本 */
define('IKPHP_VERSION', '1.5');
define('IKPHP_YEAR', '2012-2050');
define('IKPHP_SITENAME', 'IKPHP');
define('IKPHP_SITEURL', 'http://www.ikphp.com');

/* 应用名称*/
define('APP_NAME', 'install');
/* 应用目录*/
define('APP_PATH', './install/');
/* DEBUG开关*/
define('APP_DEBUG', false);
require("./core/setup.php");
