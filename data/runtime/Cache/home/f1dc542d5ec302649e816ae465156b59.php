<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($seo["title"]); ?> - <?php echo ($seo["subtitle"]); ?></title>
<meta name="keywords" content="<?php echo ($seo["keywords"]); ?>" /> 
<meta name="description" content="<?php echo ($seo["description"]); ?>" /> 
<link rel="shortcut icon" href="__STATIC__/public/images/fav.ico" type="image/x-icon">
<style>__SITE_THEME_CSS__</style>
<script src="__STATIC__/public/js/jquery.js"></script>
<script>var siteUrl = '__SITE_URL__';</script>
</head>

<body>
<!--头部开始-->
<header>
<div class="top_nav">
  <div class="top_bd">
    
    <div class="top_info">
        <?php if(empty($visitor)): ?><a href="<?php echo U('user/login');?>">登录</a> | <a href="<?php echo U('user/register');?>">注册</a>       
        <?php else: ?>
        <a id="newmsg" href="<?php echo U('message/inbox');?>">123</a> | 
        <a href="<?php echo U('people/index', array('userid'=>$visitor['userid']));?>">
        	<?php echo ($visitor["username"]); ?>
        </a> | 
        <a href="<?php echo U('user/setbase');?>">设置</a> | 
        <a href="<?php echo U('user/logout');?>">退出</a><?php endif; ?>
    </div>


    <div class="top_items">
        <ul>
                <li>
                <a href="{SITE_URL}">爱客</a>
                </li>             
                <li>
                <a href="{SITE_URL}{ikUrl('location')}">同城</a>
                </li>
                <li>
                <a href="{SITE_URL}{ikUrl('group')}">小组</a>
                </li>
                <li>
                <a href="{SITE_URL}{ikUrl('haomiwo')}" target="_blank">好米窝</a>
                </li> 
                <li><a href="{SITE_URL}{ikUrl('article')}">文章</a></li>
<!--                 <li><a href="{SITE_URL}{ikUrl('tribe')}">部落</a></li> -->
                <li><a href="{SITE_URL}{ikUrl('home','down')}">源码下载</a></li>                                              

        </ul>
    </div>
  
  	<div class="cl"></div>
    
  </div>
  
</div>
<!--header-->


<div id="header">
    
	<div class="site_nav">
    	<?php if('<?php echo MODULE_NAME;?>' == 'User'): ?><div class="site_logo nav_logo">
            <a href="<?php echo U('group');?>">爱客小组</a>
        </div>
        <?php else: ?>
        <div class="site_logo">
            <a href="__ROOT__/" title="<?php echo ($IK_SITE[base][site_title]); ?>"><?php echo ($IK_SITE[base][site_title]); ?></a>
        </div><?php endif; ?> 
         
         
        <?php if(empty($visitor)): else: endif; ?>
        
        
		
        <div class="cl"></div>

	</div>
        
</div>
<!--APP NAV-->

</header>
<!--main-->
<div class="midder">
<div class="mc">

<h1 class="set_tit">用户信息管理</h1>
<div class="tabnav">
<ul>
<?php if(is_array($user_menu_list)): $i = 0; $__LIST__ = $user_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li <?php if($user_menu_curr == $key): ?>class="select"<?php endif; ?>><a href="<?php echo ($menu["url"]); ?>"><?php echo ($menu["text"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>

<div class="utable">
<form method="POST" action="<?php echo U('user/setbase');?>">
<table cellpadding="0" cellspacing="0" width="100%" class="table_1">
<tr>
<th>登陆Email：</th><td><input class="txt" value="<?php echo ($info["email"]); ?>" disabled="true" /></td>
</tr>
<tr><th>名 号：</th><td><input class="txt" name="username" value="<?php echo ($info["username"]); ?>"  /></td></tr>

<tr><th>性 别：</th><td>

<input <?php if($info["sex"] == '0'): ?>checked="select"<?php endif; ?> name="sex" type="radio" value="0" />保密 
<input <?php if($info["sex"] == '1'): ?>checked="select"<?php endif; ?> name="sex" type="radio" value="1" />男 
<input <?php if($info["sex"] == '2'): ?>checked="select"<?php endif; ?> name="sex" type="radio" value="2" />女

</td></tr>

<tr><th>常居地：</th>
<td>
<?php if(!empty($strarea)): echo ($strarea[one][areaname]); ?> 
<?php echo ($strarea[two][areaname]); ?> 
<?php echo ($strarea[three][areaname]); endif; ?>
</td>
</tr>

<tr><th>当前所在地：</th><td><input class="txt" name="address" value="<?php echo ($info["address"]); ?>" /></td></tr>

<tr><th>登陆IP：</th><td><input class="txt" name="ip" value="<?php echo ($info["ip"]); ?>" disabled="true" /></td></tr>

<tr><th>手 机：</th><td><input class="txt" name="phone" value="<?php echo ($info["phone"]); ?>"  /></td></tr>

<tr><th>Blog地址：</th><td><input class="txt" name="blog" value="<?php echo ($info["blog"]); ?>"  /></td></tr>

<tr><th>自我介绍：</th><td><textarea class="utext" name="about" style="height:70px; width:480px"><?php echo ($info["about"]); ?></textarea></td></tr>

<tr><th>签 名：</th><td>
<textarea class="utext" name="signed" style="height:70px; width:480px"><?php echo t($info['signed']); ?></textarea>
(支持url链接，只需要输入http://www.******.com即可)
</td></tr>

<tr><th></th><td><input class="submit" type="submit" value="更新个人资料"  /></td></tr>

</table>
</div>
</div>
</div>
<!--footer-->
<footer>
<div id="footer">
	<div class="f_content">
        <span class="fl gray-link" id="icp">
            &copy; 2012－2015 12ik.com, all rights reserved
        </span>
        
        <span class="fr">
            <a href="{SITE_URL}{ikUrl('home','about')}">关于12IK</a>
            · <a href="{SITE_URL}{ikUrl('home','contact')}">联系我们</a>
            · <a href="{SITE_URL}{ikUrl('home','agreement')}">用户条款</a>
            · <a href="{SITE_URL}{ikUrl('home','privacy')}">隐私申明</a>
        </span>
        <div class="cl"></div>
        <p>Powered by <a class="softname" href="<?php echo ($IK_SOFT[info][url]); ?>"><?php echo ($IK_SOFT[info][name]); ?></a> <?php echo ($IK_SOFT[info][version]); ?> <?php echo ($IK_SOFT[info][year]); ?> <?php echo ($IK_SITE[base][site_icp]); ?><br /><span style="font-size:0.83em;">Processed in <?php echo ($runTime); ?> second(s)</span>
        <!--<script src="http://s21.cnzz.com/stat.php?id=2973516&web_id=2973516" language="JavaScript"></script>-->
        </p>   
    </div>
</div>
</footer>
</body>
</html>