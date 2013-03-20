<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($seo["title"]); ?> - <?php echo ($seo["subtitle"]); ?></title>
<meta name="keywords" content="<?php echo ($seo["keywords"]); ?>" /> 
<meta name="description" content="<?php echo ($seo["description"]); ?>" /> 
<link rel="shortcut icon" href="__STATIC__/public/images/fav.ico" type="image/x-icon">
<style>__SITE_THEME_CSS__</style>
<!--[if gte IE 7]><!-->
    <link href="__STATIC__/public/js/dialog/skins5/idialog.css" rel="stylesheet" />
<!--<![endif]-->
<!--[if lt IE 7]>
    <link href="__STATIC__/public/js/dialog/skins5/idialog.css" rel="stylesheet" />
<![endif]-->
<script>var siteUrl = '__SITE_URL__';</script>
<script src="__STATIC__/public/js/jquery.js" type="text/javascript"></script>
<script src="__STATIC__/public/js/common.js" type="text/javascript"></script>
<script src="__STATIC__/public/js/all.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="__STATIC__/public/js/html5.js"></script>
<![endif]-->
<script src="__STATIC__/public/js/dialog/jquery.artDialog.min5.js" type="text/javascript"></script>
__EXTENDS_JS__
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
        <a href="<?php echo U('people/index', array('id'=>$visitor['doname']));?>">
        	<?php echo ($visitor["username"]); ?>
        </a> | 
        <a href="<?php echo U('user/setbase');?>">设置</a> | 
        <a href="<?php echo U('user/logout');?>">退出</a><?php endif; ?>
    </div>


    <div class="top_items">
        <ul>
             <li>
             <a href="__SITE_URL__">爱客</a>
             </li>             

             <li>
             <a href="<?php echo U('group/index');?>">小组</a>
             </li>
             <li>                                             

        </ul>
    </div>
  	<div class="cl"></div>
    
  </div>
  
</div>
<!--header-->


<div id="header">
    
	<div class="site_nav">
    	<?php if($module_name == 'group'): ?><div class="site_logo nav_logo">
            <a href="<?php echo U('group/index');?>">爱客小组</a>
        </div>
        <?php else: ?>
        <div class="site_logo">
            <a href="__ROOT__/" title="<?php echo ($IK_SITE[base][site_title]); ?>"><?php echo ($IK_SITE[base][site_title]); ?></a>
        </div><?php endif; ?> 
		<div class="appnav">
		    <ul id="nav_bar">
		        <li><a href="<?php echo U('group/index');?>">我的小组</a></li>
		        <li><a href="<?php echo U('group/explore');?>">发现小组</a></li>
		        <li><a href="<?php echo U('group/explore_topic');?>">发现话题</a></li>
		        <li><a href="<?php echo U('group/nearby');?>">北京话题</a></li>
		    </ul>
		   <form onsubmit="return searchForm(this);" method="get" action="http://www.ik.com/index.php">
		   <input type="hidden" value="search" name="app"><input type="hidden" value="q" name="ac">
		    <div id="search_bar">
		        <div class="inp"><input type="text" placeholder="小组、话题、日志、成员、小站" value="小组、话题、日志、成员、小站" class="key" name="kw"></div>
		        <div class="inp-btn"><input type="submit" class="search-button" value="搜索"></div>
		    </div>
		    </form>
		</div>
        
        
		
        <div class="cl"></div>

	</div>
        
</div>
<!--APP NAV-->

</header>

<!--main-->
<div class="midder">

<div class="mc">
<h1><?php echo ($strGroup[groupname]); ?>小组成员</h1>
<div class="cleft">

<h2><?php echo ($strGroup[role_leader]); ?> &nbsp; ·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;</h2>

<div class="obss"><dl class="obu"><dt><a class="nbg" href="{U('hi','',array('id'=>$strLeader[doname]))}"><img alt="mido" class="m_sub_img" src="<?php echo ($strLeader[face]); ?>"></a></dt>
<dd><?php echo ($strLeader[username]); ?><br><span class="pl">(<a href="{U('location','area',array(areaid=>$strLeader[area][areaid]))}"><?php echo ($strLeader[area][areaname]); ?></a>)</span></dd></dl><br clear="all">
</div>

<h2><?php echo ($strGroup[role_admin]); ?> &nbsp; ·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;</h2>

<div class="obss">

<!--{loop $arrAdmin $key $item}-->
<dl class="obu"><dt><a class="nbg" href="{U('hi','',array('id'=>$item[doname]))}"><img alt="<?php echo ($item[username]); ?>" class="imgg" src="<?php echo ($item[face]); ?>"></a>
<!--{if $IK_USER[user][userid] == $strLeader[userid]}-->
<span title="取消管理员" class="gact"><a title="取消<?php echo ($item[username]); ?>的管理员" class="j a_confirm_link" href="{SITE_URL}index.php?app=group&a=group_user_set&ik=isadmin&userid=<?php echo ($item[userid]); ?>&groupid=<?php echo ($strGroup[groupid]); ?>&isadmin=0" rel="nofollow">^</a></span>
<!--{/if}-->
</dt><dd><?php echo ($item[username]); ?><br><span class="pl">(<a href="{U('location','area',array(areaid=>$item[area][areaid]))}"><?php echo ($item[area][areaname]); ?></a>)</span></dd></dl>
<!--{/loop}-->


<br clear="all">
</div>

<h2><?php echo ($strGroup[role_user]); ?> &nbsp; ·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;</h2>

<div class="page"><?php echo ($pageUrl); ?></div>

<div class="obss">

<!--{loop $arrGroupUser $key $item}-->
<dl class="obu">
<dt>
<a class="nbg" href="{U('hi','',array('id'=>$item[doname]))}"><img alt="<?php echo ($item[username]); ?>" class="imgg" src="<?php echo ($item[face]); ?>"></a>

<!--{if $IK_USER[user][userid] == $strLeader[userid]}-->
<!--{if $item[isadmin] != '1'}-->
<span title="提升为管理员" class="gact"><a title="把<?php echo ($item[username]); ?>提升为管理员" class="j a_confirm_link" href="{SITE_URL}index.php?app=group&a=group_user_set&ik=isadmin&userid=<?php echo ($item[userid]); ?>&groupid=<?php echo ($strGroup[groupid]); ?>&isadmin=1" rel="nofollow">^</a></span>
<br />
<!--{/if}-->
<!--{if $item[userid] !=$strGroup[userid]}-->
<span title="踢出小组" class="gact"><a title="把<?php echo ($item[username]); ?>踢出小组" class="j a_confirm_link" href="{SITE_URL}index.php?app=group&a=group_user_set&ik=isuser&userid=<?php echo ($item[userid]); ?>&groupid=<?php echo ($strGroup[groupid]); ?>" rel="nofollow">k</a></span>
<br />
<!--{/if}-->

<!--{/if}-->
</dt>
<dd><?php echo ($item[username]); ?><br><span class="pl">(<a href="{U('location','area',array(areaid=>$item[area][areaid]))}"><?php echo ($item[area][areaname]); ?></a>)</span></dd></dl>
<!--{/loop}-->

<br clear="all">
</div>

<div class="page"><?php echo ($pageUrl); ?></div>

<br />

</div>


<div class="cright">
<p class="pl2">&gt; <a href="{U('group','show',array('id'=>$strGroup[groupid]))}">回<?php echo ($strGroup[groupname]); ?>小组</a></p>

</div>
</div>
</div>



<!--footer-->
<footer>
<div id="footer">
	<div class="f_content">
        <span class="fl gray-link" id="icp">
            &copy; 2012－2015 IKPHP.COM, all rights reserved
        </span>
        
        <span class="fr">
            <a href="<?php echo U('home/about');?>">关于爱客</a>
            · <a href="<?php echo U('home/contact');?>">联系我们</a>
            · <a href="<?php echo U('home/agreement');?>">用户条款</a>
            · <a href="<?php echo U('home/privacy');?>">隐私申明</a>
        </span>
        <div class="cl"></div>
        <p>Powered by <a class="softname" href="<?php echo (IKPHP_SITEURL); ?>"><?php echo (IKPHP_SITENAME); ?></a> <?php echo (IKPHP_VERSION); ?>  <?php echo C('site_icp');?> <span style="color:green">ThinkPHP 版本 <?php echo (THINK_VERSION); ?></span><br /><span style="font-size:0.83em;"></span>
        
        <!--<script src="http://s21.cnzz.com/stat.php?id=2973516&web_id=2973516" language="JavaScript"></script>-->
        </p>   
    </div>
</div>
</footer>
</body>
</html>