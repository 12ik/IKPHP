<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($site_title); ?></title>
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/style.css" />
<style>
body {
	margin: 0;
	padding: 0;
	font-family: Arial, Helvetica, sans-serif;
}

.login {
	width: 500px;
	margin: 0 auto;
	background: #3a81c0;
	overflow: hidden;
	margin-top: 100px;
	border-radius:10px;
}

.login .logo {
	float: left;
	margin-top: 100px;
	font-size: 14px;
	color: #FFFFFF;
	width: 230px;
	text-align: center;
}

.login .logo a {
	color: #FFFFFF;
	border: none;
	text-decoration: none;
}

.login .logo img {
	border: none;
}

.login .info {
	float: left;
	margin: 50px 0;
}

.login .info a {
	color: #FFFFFF;
	text-decoration: none;
	font-size: 12px;
}

.login .info h1 {
	font-size: 16px;
	color: #FFFFFF;
}

.login .info p {
	font-size: 14px;
	color: #FFFFFF;
}
</style>
</head>

<body>
<div class="login">

<div class="logo">
<a href="__APP__" target="_blank">
<img src="__STATIC__/admin/images/logo_login.gif" alt="爱客(IKPHP)社区管理" /><br />
www.ikphp.com </a>
</div>

<div class="info">
<h1>登录管理后台</h1>
	<div>
		<form method="post"action="<?php echo U('index/login');?>">
			<p>管理员Email<br />
			<input style="width: 200px;" name="admin_email" /></p>
			<p>密码<br />
			<input style="width: 200px;" type="password" name="admin_password" class="uinput" /></p>
			<input class="submit" type="submit" value="登录后台" />
			<a href="__APP__">返回首页</a>
		</form>
	</div>
</div>

</div>
</body>
</html>