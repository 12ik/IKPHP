<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="160780470@qq.com" />
<meta name="Copyright" content="<?php echo ($ikphp["ikphp_site_name"]); ?>" />
<title><?php echo ($title); ?> - <?php echo ($site_title); ?></title>
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/style.css" />
<script src="__STATIC__/public/js/jquery.js" type="text/javascript"></script>

</head>
<body>
<!--main-->
<div class="midder">
<h2><?php echo ($title); ?></h2>
<form method="POST" action="index.php?app=system&a=do&ik=options">
<table cellpadding="0" cellspacing="0">

	<tr>
		<td width="100">网站标题：</td>
		<td><input style="width: 300px;" name="setting[site_title]"
			value="<?php echo C('ik_site_title');?>" /></td>
	</tr>
	<tr>
		<td>副标题：</td>
		<td><input style="width: 300px;" name="setting[site_subtitle]"
			value="<?php echo C('ik_site_subtitle');?>" /> (例如：又一个爱客(IKPHP)社区小组)</td>
	</tr>

	<tr>
		<td>关键词：</td>
		<td><input style="width: 300px;" name="setting[site_keywords]"
			value="<?php echo C('ik_site_keywords');?>" /> (关键词有助于SEO)</td>
	</tr>

	<tr>
		<td>网站说明：</td>
		<td><textarea
			style="width: 300px; height: 50px; font-size: 12px;" name="setting[site_desc]"><?php echo C('ik_site_desc');?></textarea>
		(用简洁的文字描述本站点。)</td>
	</tr>

	<tr>
		<td>站点地址（URL）:</td>
		<td><input style="width: 300px;" name="setting[site_url]"
			value="<?php echo C('ik_site_url');?>" />(必须以http://开头，以/结尾)</td>
	</tr>
	<tr>
		<td>网站编码:</td>
		<td><input style="width: 300px;" name="setting[charset]"
			value="<?php echo C('ik_charset');?>" readonly /> （默认UTF-8）请勿更改</td>
	</tr>    
	<tr>
		<td>电子邮件 :</td>
		<td><input style="width: 300px;" name="setting[site_email]"
			value="<?php echo C('ik_site_email');?>" /></td>
	</tr>

	<tr>
		<td>ICP备案号 :</td>
		<td><input style="width: 300px;" name="setting[site_icp]"
			value="<?php echo C('ik_site_icp');?>" /> （京ICP备09050100号）</td>
	</tr>

	<tr>
		<td>是否邀请注册 :</td>
		<td>
		<input type="radio"  <?php if(C('ik_site_icp') == 0): ?>checked="select"<?php endif; ?> name="isinvite" value="0" />开放注册 
		<input type="radio"  <?php if(C('ik_site_icp') == 1): ?>checked="select"<?php endif; ?> name="isinvite" value="1" />邀请注册 
		<input type="radio"  <?php if(C('ik_site_icp') == 2): ?>checked="select"<?php endif; ?> name="isinvite" value="2" />关闭注册
		</td>
	</tr>
	<tr>
		<td>Gzip压缩 :</td>
		<td>
		<input type="radio" <?php if(C('ik_isgzip') == 0): ?>checked="select"<?php endif; ?> name="isgzip" value="0" />关闭 
		<input type="radio" <?php if(C('ik_isgzip') == 1): ?>checked="select"<?php endif; ?> name="isgzip" value="1" />开启</td>
	</tr>

	<tr>
		<td>时区:</td>
		<td><select name="timezone">
			<?php if(is_array($arrTime)): foreach($arrTime as $k=>$vo): ?><option <?php if($k == C('ik_timezone')): ?>selected="selected"<?php endif; ?> value="<?php echo ($k); ?>" ><?php echo ($vo); ?></option><?php endforeach; endif; ?>
		</select></td>
	</tr>
</table>




<div class="page_btn"><input type="submit" value="提 交" class="submit" /></div>

</form>
</div>
</body>
</html>