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
		<td><input style="width: 300px;" name="site_title"
			value="<?php echo ($strOption[site_title]); ?>" /></td>
	</tr>
	<tr>
		<td>副标题：</td>
		<td><input style="width: 300px;" name="site_subtitle"
			value="<?php echo ($strOption[site_subtitle]); ?>" /> (例如：又一个爱客(12IK)社区小组)</td>
	</tr>

	<tr>
		<td>关键词：</td>
		<td><input style="width: 300px;" name="site_key"
			value="<?php echo ($strOption[site_key]); ?>" /> (关键词有助于SEO)</td>
	</tr>

	<tr>
		<td>网站说明：</td>
		<td><textarea
			style="width: 300px; height: 50px; font-size: 12px;" name="site_desc"><?php echo ($strOption[site_desc]); ?></textarea>
		(用简洁的文字描述本站点。)</td>
	</tr>

	<tr>
		<td>站点地址（URL）:</td>
		<td><input style="width: 300px;" name="site_url"
			value="<?php echo ($strOption[site_url]); ?>" />(必须以http://开头，以/结尾)</td>
	</tr>
	<tr>
		<td>网站编码:</td>
		<td><input style="width: 300px;" name="charset"
			value="<?php echo ($strOption[charset]); ?>" readonly /> （默认UTF-8）请勿更改</td>
	</tr>    
	<tr>
		<td>电子邮件 :</td>
		<td><input style="width: 300px;" name="site_email"
			value="<?php echo ($strOption[site_email]); ?>" /></td>
	</tr>

	<tr>
		<td>ICP备案号 :</td>
		<td><input style="width: 300px;" name="site_icp"
			value="<?php echo ($strOption[site_icp]); ?>" /> （京ICP备09050100号）</td>
	</tr>

	<tr>
		<td>是否邀请注册 :</td>
		<td><input type="radio" {if $strOption[isinvite]==
			'0'} checked="select" {/if}  name="isinvite" value="0" />开放注册 <input
			type="radio" {if $strOption[isinvite]== '1'} checked="select"
			{/if}  name="isinvite" value="1" />邀请注册 <input type="radio" {if $strOption[isinvite]==
			'2'} checked="select" {/if}  name="isinvite" value="2" />关闭注册</td>
	</tr>
	<tr>
		<td>Gzip压缩 :</td>
		<td><input type="radio" {if $strOption[isgzip]==
			'0'} checked="select" {/if} name="isgzip" value="0" />关闭 <input
			type="radio" {if $strOption[isgzip]== '1'} checked="select"
			{/if}  name="isgzip" value="1" />开启</td>
	</tr>

	<tr>
		<td>时区:</td>
		<td><select name="timezone">
			<!--{loop $arrTime $key $item}-->
			<option {if $key==$strOption[timezone]} selected="selected" {/if}  value="<?php echo ($key); ?>"><?php echo ($item); ?></option>
			<!--{/loop}-->
		</select></td>
	</tr>
</table>

<h2>缩略图设置</h2>
<table cellpadding="0" cellspacing="0">

	<tr>
		<td>缩略图宽:</td>
		<td><input style="width: 300px;" name="thumbwidth"
			value="<?php echo ($strOption[thumbwidth]); ?>" /> （默认规格400）</td>
	</tr>
	<tr>
		<td>缩略图高:</td>
		<td><input style="width: 300px;" name="thumbheight"
			value="<?php echo ($strOption[thumbheight]); ?>" /> （默认规格300）</td>
	</tr>
</table>

<h2>本地路径设置</h2>
<table cellpadding="0" cellspacing="0">

	<tr>
		<td>站点附件目录:</td>
		<td><input style="width: 300px;" name="attachmentdir"
			value="<?php echo ($strOption[attachmentdir]); ?>" /> （默认：uploadfile/attachments <font color="red">注意：开头不加/ 末尾必须加 / </font>）</td>
	</tr>
     <tr>
		<td>站点附件归类方式:</td>
		<td>
        
        <select name="attachmentdirtype">
            <option value="all" {if $strOption[attachmentdirtype]== all} selected{/if}>不归类</option>
            <option value="year" {if $strOption[attachmentdirtype]== year} selected{/if}>按年归类</option>
            <option value="month" {if $strOption[attachmentdirtype]== month} selected{/if}>按月归类</option>
            <option value="day" {if $strOption[attachmentdirtype]== day} selected{/if}>按天归类</option>
            <option value="md5" {if $strOption[attachmentdirtype]== md5} selected{/if}>随机归类</option>
        </select>
         （如：2012/12/11/1_a.jpg）
       </td>
	</tr>
    
</table>

<div class="page_btn"><input type="submit" value="提 交" class="submit" /></div>

</form>
</div>
</body>
</html>