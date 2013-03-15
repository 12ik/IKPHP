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

<div class="midder">
<div class="mc">
    <h1><?php echo ($seo["title"]); ?></h1>
    <div class="cleft w700">
		
        <div class="group-list">
        	<?php if(is_array($list)): foreach($list as $key=>$item): ?><div class="result">
                <div class="pic">
                <a title="<?php echo ($item[groupname]); ?>" href="<?php echo U('group/show',array('id'=>$item[groupid]));?>" class="nbg">
                	<img src="<?php echo ($item[icon_48]); ?>" alt="<?php echo ($item[groupname]); ?>" width="48" height="48">
                </a>
                </div>
                <div class="content">
                    <div class="title">
                        <h3><a href="<?php echo U('group/show',array('id'=>$item[groupid]));?>"><?php echo ($item[groupname]); ?></a></h3>
                    </div>
                    <div class="info"><?php echo ($item[count_user]); ?> 个成员 在此聚集 </div>
                    <div><p><?php echo ($item[groupdesc]); ?></p></div>
                </div>
            </div><?php endforeach; endif; ?>
                        
        </div>
        
        <div class="clear"></div>
        <div class="page"><?php echo ($pageUrl); ?></div>

    </div>



    <div class="cright w250">
		     <h2>
        按分类浏览    
    </h2>

   <div class="group-cate-bd">
   <div class="group-cate">
       <ul>
           <li class="cate-label"><a href="<?php echo U('group/explore',array('tagid'=>'兴趣'));?>"><b>•</b>兴趣</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'旅行'));?>">旅行</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'摄影'));?>">摄影</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'影视'));?>">影视</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'音乐'));?>">音乐</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'文学'));?>">文学</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'游戏'));?>">游戏</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'动漫'));?>">动漫</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'运动'));?>">运动</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'戏曲'));?>">戏曲</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'桌游'));?>">桌游</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'怪癖'));?>">怪癖</a></li>
       </ul>
    </div>
   <div class="group-cate odd">
       <ul>
           <li class="cate-label"><a href="<?php echo U('group/explore',array('tagid'=>'生活'));?>"><b>•</b>生活</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'健康'));?>">健康</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'美食'));?>">美食</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'宠物'));?>">宠物</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'美容'));?>">美容</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'化妆'));?>">化妆</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'护肤'));?>">护肤</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'服饰'));?>">服饰</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'公益'));?>">公益</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'家庭'));?>">家庭</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'育儿'));?>">育儿</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'汽车'));?>">汽车</a></li>
       </ul>
    </div>
   <div class="group-cate">
       <ul>
           <li class="cate-label"><a href="<?php echo U('group/explore',array('tagid'=>'购物'));?>"><b>•</b>购物</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'淘宝'));?>">淘宝</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'二手'));?>">二手</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'团购'));?>">团购</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'数码'));?>">数码</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'品牌'));?>">品牌</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'文具'));?>">文具</a></li>
       </ul>
    </div>
   <div class="group-cate odd">
       <ul>
           <li class="cate-label"><a href="<?php echo U('group/explore',array('tagid'=>'社会'));?>"><b>•</b>社会</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'求职'));?>">求职</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'租房'));?>">租房</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'励志'));?>">励志</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'留学'));?>">留学</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'出国'));?>">出国</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'理财'));?>">理财</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'传媒'));?>">传媒</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'创业'));?>">创业</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'考试'));?>">考试</a></li>
       </ul>
    </div>
   <div class="group-cate">
       <ul>
           <li class="cate-label"><a href="<?php echo U('group/explore',array('tagid'=>'艺术'));?>"><b>•</b>艺术</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'设计'));?>">设计</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'手工'));?>">手工</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'展览'));?>">展览</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'曲艺'));?>">曲艺</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'舞蹈'));?>">舞蹈</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'雕塑'));?>">雕塑</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'纹身'));?>">纹身</a></li>
       </ul>
    </div>
   <div class="group-cate odd">
       <ul>
           <li class="cate-label"><a href="<?php echo U('group/explore',array('tagid'=>'学术'));?>"><b>•</b>学术</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'人文'));?>">人文</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'社科'));?>">社科</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'自然'));?>">自然</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'建筑'));?>">建筑</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'国学'));?>">国学</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'语言'));?>">语言</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'宗教'));?>">宗教</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'哲学'));?>">哲学</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'软件'));?>">软件</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'硬件'));?>">硬件</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'互联网'));?>">互联网</a></li>
       </ul>
    </div>
   <div class="group-cate">
       <ul>
           <li class="cate-label"><a href="<?php echo U('group/explore',array('tagid'=>'情感'));?>"><b>•</b>情感</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'恋爱'));?>">恋爱</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'心情'));?>">心情</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'心理学'));?>">心理学</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'星座'));?>">星座</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'塔罗'));?>">塔罗</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'LES'));?>">LES</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'GAY'));?>">GAY</a></li>
       </ul>
    </div>
   <div class="group-cate odd">
       <ul>
           <li class="cate-label"><a href="<?php echo U('group/explore',array('tagid'=>'闲聊'));?>"><b>•</b>闲聊</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'吐槽'));?>">吐槽</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'笑话'));?>">笑话</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'直播'));?>">直播</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'八卦'));?>">八卦</a></li>
       <li><a href="<?php echo U('group/explore',array('tagid'=>'发泄'));?>">发泄</a></li>
       </ul>
    </div>
   </div>
  	
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