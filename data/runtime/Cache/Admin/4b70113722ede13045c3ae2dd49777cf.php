<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="160780470@qq.com" />
<meta name="Copyright" content="<?php echo ($ikphp["ikphp_site_name"]); ?>" />
<title><?php echo ($title); ?> - <?php echo ($site_title); ?></title>
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/style.css" />
<script src="__STATIC__/public/js/jquery.js" type="text/javascript"></script>

<style type="text/css">
html {
	height: 100%;
	max-height: 100%;
	padding: 0;
	margin: 0;
	border: 0;
	background: #fff;
	font-size: 12px;
	font-family: Arial;
	/* hide overflow:hidden from IE5/Mac */
	/* \*/
	overflow: hidden;
	/* */
}

body {
	height: 100%;
	max-height: 100%;
	overflow: hidden;
	padding: 0;
	margin: 0;
	border: 0;
}

.midder {
	overflow: hidden;
	position: absolute;
	z-index: 3;
	top: 70px;
	width: 100%;
	bottom: 60px;
}

* html .midder {
	top: 0;
	height: 100%;
	max-height: 100%;
	width: 100%;
	overflow: auto;
	position: absolute;
	z-index: 3;
	border-top: 100px solid #fff;
	border-bottom: 60px solid #fff;
}

.header {
	position: absolute;
	margin: 0;
	top: 0;
	display: block;
	width: 100%;
	height: 60px;
	background: #3A81C0;
	background-position: 0 0;
	background-repeat: no-repeat;
	z-index: 5;
	overflow: hidden;
	border-bottom: 1px #3266A0 solid;
}

.header .logo {
	float: left;
	padding-top: 10px;
}

.header .menu {
	float: right;
	overflow: hidden;
	padding-right: 20px;
	padding-top: 20px;
}

.header .menu ul {
	margin: 0;
	padding: 0;
	overflow: hidden;
}

.header .menu ul li {
	list-style: none;
	float: left;
	padding: 5px;
	color: #FFFFFF;
}

.header .menu ul li a {
	color: #FFFFFF;
}

.footer {
	position: absolute;
	margin: 0;
	bottom: 0;
	display: block;
	width: 100%;
	height: 50px;
	line-height: 50px;
	font-size: 1em;
	z-index: 5;
	overflow: hidden;
	text-align: center;
	background: #F0F0F0;
	color: #999999;
}

a {
	color: #336699;
	text-decoration: none;
}

img {
	border: none;
}
</style>
</head>
<body>
<div class="header">
<div class="logo"><a href="index.php?app=system">
<img src="__STATIC__/admin/images/logo.gif" alt="<?php echo ($ikphp["ikphp_site_name"]); ?>" /></a></div>
<div class="menu">
<ul>
	<li>欢迎您，<?php echo ($admin["username"]); ?></li>
	<li><a href="<?php echo U('main');?>" target="main">首页</a></li>
	<li><a href="<?php echo U('options/index');?>" target="main">系统管理</a></li>
	<li><a href="<?php echo U('apps/list');?>" target="main">APP管理</a></li>
	<li><a href="<?php echo U('plugin/list');?>" target="main">插件管理</a></li>
	<li><a href="./" target="_blank">返回前台</a></li>
	<li><a href="<?php echo U('index/logout');?>">[退出]</a></li>
</ul>
</div>
</div>

<div class="footer">
<p>Copyright (C) <?php echo ($ikphp["ikphp_year"]); ?> <a href="<?php echo ($ikphp["ikphp_site_url"]); ?>"><?php echo ($ikphp["ikphp_site_name"]); ?></a>
 <?php echo ($ikphp["ikphp_version"]); ?></p>
</div>

<div class="midder">
<iframe src="<?php echo U('index/main');?>" id="main" name="main" width="100%" height="100%" 
 frameborder="0" scrolling="yes" style="overflow: visible;margin:0;padding:0;">
 </iframe>
</div>
</body>
</html>