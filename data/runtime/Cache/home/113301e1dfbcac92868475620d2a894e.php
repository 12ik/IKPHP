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
<div style="margin:150px auto; width:350px;">
  <img src="__STATIC__/public/images/ik_error.gif" style="float:left;">
  <ul style="margin-left:10px; list-style-type:none; list-style-image: none; list-style-position:outside;">
    <li style="font-size:14px; line-height: 32px; padding-left:30px"><?php echo ($message); ?></li>
    <li style="color:#666;line-height: 10px;">&nbsp;</li>

    <li style="color:#666;"> 
        &gt; <span id="f3s">3</span>秒后 <a href="<?php echo ($jumpUrl); ?>">点击返回</a>
        <script type="text/javascript">
            (function(){
                var secs=5,si=setInterval(function(){
                    if(--secs){
                        document.getElementById('f3s').innerHTML = secs;
                    }
                    else{
                        location.href="<?php echo ($jumpUrl); ?>";clearInterval(si);
                    }
            }, 1000)})();
        </script>
 	</li>

  </ul>
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