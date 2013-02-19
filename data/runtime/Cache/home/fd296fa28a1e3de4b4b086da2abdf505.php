<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($seo["title"]); ?> - <?php echo ($seo["subtitle"]); ?></title>
<meta name="keywords" content="<?php echo ($seo["keywords"]); ?>" /> 
<meta name="description" content="<?php echo ($seo["description"]); ?>" /> 
<link rel="shortcut icon" href="__STATIC__/public/images/fav.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="__STATIC__/theme/blue/base.css" />
<script src="__STATIC__/public/js/jquery.js"></script>
</head>

<body>
<!--头部开始-->
<header>
<div class="top_nav">
  <div class="top_bd">
    
    <div class="top_info">
        <!--{if $IK_USER[user] == ''}-->
		<a href="{SITE_URL}{ikUrl('user','login')}">登录</a> | <a href="{SITE_URL}{ikUrl('user','register')}">注册</a>       
        <!--{else}-->
        <a id="newmsg" href="{SITE_URL}{ikUrl('message','ikmail',array(ik=>inbox))}"></a> | 
        {php $globalUser = aac('user')->getOneUser($IK_USER[user][userid]);}
        <a href="{SITE_URL}{ikUrl('hi','',array('id'=>$globalUser[doname]))}">
        <?php echo ($globalUser[username]); ?>
        </a> | 
        <a href="{SITE_URL}{ikUrl('user','set',array(ik=>base))}">设置</a> | 
        <a href="{SITE_URL}{ikUrl('user','login',array(ik=>out))}">退出</a>
        <!--{/if}-->
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
    	<!--{if $app == 'group' }-->
        <div class="site_logo nav_logo">
            <a href="{SITE_URL}{ikUrl('group','')}">爱客小组</a>
        </div>
        <!--{else}-->
        <div class="site_logo">
            <a href="{SITE_URL}" title="<?php echo ($IK_SITE[base][site_title]); ?>"><?php echo ($IK_SITE[base][site_title]); ?></a>
        </div>        
        <!--{/if}--> 
         
         
        <!--{if $IK_USER[user] == ''}-->
         
        <!--{if is_array($IK_SITE[appnav]) && $IK_SITE[appnav][$app] !=''}-->
        <div class="appnav">
            <ul id="nav_bar">
                <!--{loop $IK_SITE[appnav] $key $item}-->
                <li  {if $app==$key} class="select" {/if} ><a href="{SITE_URL}{ikUrl($key)}"><?php echo ($item); ?></a></li>
                <!--{/loop}-->
                <li><a href="{SITE_URL}{ikUrl('home','down')}">源码下载</a></li>
            </ul>
           <form action="{SITE_URL}index.php"  method="get" onsubmit="return searchForm(this);">
           <input type="hidden" name="app" value="search" /><input type="hidden" name="ac" value="q" />
            <div id="search_bar">
            	<div class="inp"><input type="text" name="kw"  class="key" value="小组、话题、日志、成员、小站" placeholder="小组、话题、日志、成员、小站"/></div>
                <div class="inp-btn"><input type="submit"  value="搜索" class="search-button"/></div>
            </div>
            </form>
        </div>
        <!--{/if}-->
        <!--{else}-->
        	<!--{if $app == 'group' }-->
            <div class="appnav">
                <ul id="nav_bar">
                    <li><a href="{SITE_URL}{ikUrl('group','')}">我的小组</a></li>
                    <li><a href="{SITE_URL}{ikUrl('group','explore')}">发现小组</a></li>
                    <li><a href="{SITE_URL}{ikUrl('group','explore_topic')}">发现话题</a></li>
                    <li><a href="{SITE_URL}{ikUrl('group','nearby',array('ik'=>'beijing'))}">北京话题</a></li>
                </ul>
               <form action="{SITE_URL}index.php"  method="get" onsubmit="return searchForm(this);">
               <input type="hidden" name="app" value="search" /><input type="hidden" name="ac" value="q" />
                <div id="search_bar">
                    <div class="inp"><input type="text" name="kw"  class="key" value="小组、话题、日志、成员、小站" placeholder="小组、话题、日志、成员、小站"/></div>
                    <div class="inp-btn"><input type="submit"  value="搜索" class="search-button"/></div>
                </div>
                </form>
            </div>
            <!--{else}-->
            <div class="appnav">
                <ul id="nav_bar">
                    <li><a href="{SITE_URL}">首页</a></li>
                    <li><a href="{SITE_URL}{ikUrl('feed')}">友邻广播</a></li>
                    <li><a href="{SITE_URL}{ikUrl('hi','',array('id'=>$globalUser[doname]))}">我的爱客</a></li>
                    <li><a href="{SITE_URL}{ikUrl('group')}">我的小组</a></li>
                    <li><a href="{SITE_URL}{ikUrl('site')}">我的小站</a></li>
                    <li><a href="{SITE_URL}{ikUrl('article')}">文章</a></li>
                    <li><a href="{SITE_URL}{ikUrl('tribe')}">部落</a></li>
                    
                </ul>
               <form action="{SITE_URL}index.php"  method="get" onsubmit="return searchForm(this);">
               <input type="hidden" name="app" value="search" /><input type="hidden" name="ac" value="q" />
                <div id="search_bar">
                    <div class="inp"><input type="text" name="kw"  class="key" value="小组、话题、日志、成员、小站" placeholder="小组、话题、日志、成员、小站"/></div>
                    <div class="inp-btn"><input type="submit"  value="搜索" class="search-button"/></div>
                </div>
                </form>
            </div>            
            <!--{/if}-->
                    	
        <!--{/if}-->
        
        
		
        <div class="cl"></div>

	</div>
        
</div>
<!--APP NAV-->

</header>
                    <a href="<?php echo U('user/register');?>">注册</a>
                    <a href="<?php echo U('user/login');?>">登录</a>
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