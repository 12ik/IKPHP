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
             <a href="<?php echo U('article/index');?>">文章</a>
             </li>                                          

        </ul>
    </div>
  	<div class="cl"></div>
    
  </div>
  
</div>
<!--header-->


<div id="header">
    
	<div class="site_nav">
        <div class="<?php echo ($logo[style]); ?>">
            <a href="<?php echo ($logo[url]); ?>"><?php echo ($logo[name]); ?></a>
        </div>
		<div class="appnav">
			    <ul id="nav_bar">
                    <?php if(is_array($arrNav)): foreach($arrNav as $key=>$item): ?><li><a href="<?php echo ($item[url]); ?>"><?php echo ($item[name]); ?></a></li><?php endforeach; endif; ?>
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
<div class="cleft">

<div id="db-usr-profile">
<div class="pic">
<a href="<?php echo U('people/index',array('id'=>$strUser[doname]));?>">
<img alt="<?php echo ($strUser[username]); ?>" src="<?php echo ($strUser[face]); ?>">
</a>
</div>
<div class="info">
<h1>
<?php echo ($strUser[username]); ?>
</h1>

<ul>
    <?php if($strUser[userid] == $visitor[userid]): ?><li><a href="<?php echo U('message/ikmail',array(ik=>inbox));?>">站内信</a></li>
    <li><a href="<?php echo U('user/setbase');?>">设置</a></li><?php endif; ?>
</ul>

</div>
</div>


<div class="clear"></div>

<div id="recs" class="">
    <h2>
        <?php if($strUser[userid] == $visitor[userid]): ?>我的发布的帖子
        <?php else: ?>
          <?php echo ($strUser[username]); ?>发布的帖子<?php endif; ?>
         &nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·
            <!-- <span class="pl">&nbsp;(
                <a href="#">全部</a>
            ) </span> -->
    </h2>

<div class="spacetopic">
    <?php if(!empty($arrMyTopic)): ?><table width="100%">
        <?php if(is_array($arrMyTopic)): foreach($arrMyTopic as $key=>$item): ?><tr>
        <td><img src="__STATIC__/public/images/topic.gif" align="absmiddle"  title="[帖子]" alt="[帖子]" />
        <a href="<?php echo U('group/topic',array('id'=>$item[topicid]));?>"><?php echo ($item[title]); ?></a>&nbsp;&nbsp;</td>
        <td><?php if($item[count_comment]): echo ($item[count_comment]); endif; ?></td>
        <td style="width:120px;text-align:right;color:#999999;"><?php echo date('Y-m-d H:i',$item[addtime]) ?></td>
        </tr><?php endforeach; endif; ?>
    </table>
    <?php else: ?>
    <div style="padding:50 0;color:#999999;">这个人很懒，什么也不愿意留下！</div><?php endif; ?>
</div>

<div class="clear"></div>
</div>

<div id="recs" class="">
    <h2> 
        <?php if($strUser[userid] == $visitor[userid]): ?>我回复的帖子
        <?php else: ?>
        <?php echo ($strUser[username]); ?>回复的帖子<?php endif; ?>
         &nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·
           <!--  <span class="pl">&nbsp;(
                <a href="#">全部</a>
            ) </span> -->
    </h2>

<div class="spacetopic">
    <?php if(!empty($arrMyComment)): ?><table width="100%">
    <?php if(is_array($arrMyComment)): foreach($arrMyComment as $key=>$item): ?><tr>
        <td><img src="__STATIC__/public/images/topic.gif" align="absmiddle"  title="[帖子]" alt="[帖子]" />
        <a href="<?php echo U('group/topic',array('id'=>$item[topicid]));?>"><?php echo ($item[title]); ?></a>&nbsp;&nbsp;</td>
        <td><?php if($item[count_comment]): echo ($item[count_comment]); endif; ?></td>
        <td style="width:120px;text-align:right;color:#999999;"><?php echo date('Y-m-d H:i',$item[addtime]) ?></td>
        </tr><?php endforeach; endif; ?>
    </table>
    <?php else: ?>
    <div style="padding:50 0;color:#999999;">这个人很懒，什么也不愿意留下！</div><?php endif; ?>
</div>

<div class="clear"></div>
</div>

<div id="recs" class="">
    <h2>
        <?php if($strUser[userid] == $visitor[userid]): ?>我喜欢的帖子
        <?php else: ?>
        <?php echo ($strUser[username]); ?>喜欢的帖子<?php endif; ?>
         &nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·
            <!-- <span class="pl">&nbsp;(
                <a href="#">全部</a>
            ) </span> -->
    </h2>

<div class="spacetopic">
    <?php if(!empty($arrMyCollect)): ?><table width="100%">
    <?php if(is_array($arrMyCollect)): foreach($arrMyCollect as $key=>$item): ?><tr>
        <td><img src="__STATIC__/public/images/topic.gif" align="absmiddle"  title="[帖子]" alt="[帖子]" />
        <a href="<?php echo U('group/topic',array('id'=>$item[topicid]));?>"><?php echo ($item[title]); ?></a>&nbsp;&nbsp;</td>
        <td><?php if($item[count_comment]): echo ($item[count_comment]); endif; ?></td>
        <td style="width:120px;text-align:right;color:#999999;"><?php echo date('Y-m-d H:i',$item[addtime]) ?></td>
        </tr><?php endforeach; endif; ?>
    </table>
    <?php else: ?>
    <div style="padding:50 0;color:#999999;">这个人很懒，什么也不愿意留下！</div><?php endif; ?>
</div>

<div class="clear"></div>
</div>



<div class="clear"></div>

</div>

<div class="cright">

<div id="profile">

<div class="infobox">
<div class="ex1"><span></span></div>
<div class="bd">
<img alt="" class="userface" src="<?php echo ($strUser[face_160]); ?>">

<div class="user-info">
常居：&nbsp;<a href="<?php echo U('location/area',array(areaid=>$strUser[area][areaid]));?>"><?php echo ($strUser[area][areaname]); ?></a>
<br />
<div class="pl">UID:<?php echo ($strUser[userid]); ?> <br><?php echo date('Y-m-d',$strUser[addtime]); ?> 加入</div>
<div class="pl">级别:<?php echo ($strUser['rolename']); ?></div>
<div class="pl">积分:<?php echo ($strUser['count_score']); ?></div>

<?php if($strUser[userid] != $visitor[userid]): ?><div class="user-opt">

    <?php if($strUser[isfollow]): ?><div class="user-group" style="display: block;">
        <span class="user-cs">已关注</span>
        <span class="user-rs"><a href="<?php echo U('user/unfollow',array('userid'=>$strUser[userid]));?>">取消关注</a></span>
    </div>
    <?php else: ?>
    <a class="a-btn-add mr10 add_contact" href="<?php echo U('user/userfollow',array('userid'=>$strUser[userid]));?>">关注此人</a><?php endif; ?>
    <a href="<?php echo U('message/write',array('touserid'=>$strUser[userid]));?>" rel="nofollow" class="a-btn mr5">发消息</a>
    <div id="divac"></div>
</div><?php endif; ?>
</div>

<div class="sep-line"></div>
<div class="user-intro">

<div class="j edtext pl" id="edit_intro">
<span id="intro_display">
性别：<?php if($strUser[sex] == 0): ?>保密<?php elseif($strUser[sex] == 1): ?>男<?php else: ?>女<?php endif; ?><br />
<?php if(!empty($strUser[blog])): ?>博客：<?php echo ($strUser[blog]); ?><br /><?php endif; ?>
<?php if(!empty($strUser[about])): ?>关于：<?php echo ($strUser[about]); ?><br /><?php endif; ?>
<?php if(!empty($strUser[signed])): ?>签名：<?php echo ($strUser[signed]); ?><br /><?php endif; ?>

<?php if($strUser[userid] == $visitor[userid]): ?>[<a href="<?php echo U('user/setbase');?>">修改基本信息</a>]<?php endif; ?>
</span>
</div>

</div>

</div>
<div class="ex2"><span></span></div>
</div>


</div>
<div class="clear"></div>

<div id="friend">

<h2>
    <?php if($strUser[userid] == $visitor[userid]): ?>我关注的人
    <?php else: ?>
    <?php echo ($strUser[username]); ?>关注的人<?php endif; ?>
    &nbsp;·&nbsp;·&nbsp;·
    <!--<span class="pl">&nbsp;(
    <a href="{U('user','follow',array(userid=>$strUser[userid]))}">全部<?php echo ($strUser[count_follow]); ?></a>
    ) </span>-->
</h2>

<?php if(is_array($strUser[followUser])): foreach($strUser[followUser] as $key=>$item): ?><dl class="obu"><dt><a class="nbg" href="<?php echo U('people/index',array('id'=>$item[doname]));?>"><img alt="<?php echo ($item[username]); ?>" class="m_sub_img" src="<?php echo ($item[face]); ?>"></a></dt>
<dd><a href="<?php echo U('people/index',array('id'=>$item[doname]));?>"><?php echo ($item[username]); ?></a></dd>
</dl><?php endforeach; endif; ?>

<br clear="all">

<a href="<?php echo U('user/followed',array(userid=>$strUser[userid]));?>">&gt; 被<?php echo ($strUser[count_followed]); ?>人关注</a>

</div>

    <div id="group" class="">
    
        <h2>
            <?php if($strUser[userid] == $visitor[userid]): ?>我参加的小组
            <?php else: ?>
            <?php echo ($strUser[username]); ?>参加的小组<?php endif; ?>
            &nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·
            <!--<span class="pl">&nbsp;(
            <a href="<?php echo U('group/mygroups',array('userid'=>$strUser[userid]));?>">全部</a>
            ) </span>
            -->
        </h2>
    
        <?php if(is_array($arrMyGroup)): foreach($arrMyGroup as $key=>$item): ?><dl class="ob"><dt><a href="<?php echo U('group/show',array('id'=>$item[groupid]));?>"><img alt="<?php echo ($item[groupname]); ?>" class="m_sub_img" src="<?php echo ($item[icon_48]); ?>"></a></dt>
            <dd><a href="<?php echo U('group/show',array('id'=>$item[groupid]));?>"><?php echo ($item[groupname]); ?></a> <span>(<?php echo ($item[count_user]); ?>)</span></dd>
            </dl><?php endforeach; endif; ?>
    
        <div class="clear"></div>
    </div>
	<br/>
	<p class="pl">本页永久链接: <a href="<?php echo U('people/index',array('id'=>$strUser[doname]));?>"><?php echo U('people/index',array('id'=>$strUser[doname]));?></a></p>
	<br>
    <p class="pl">订阅<?php echo ($strUser[username]); ?>的收藏 <br>
        <span class="feed"><a href="#"> feed: rss 2.0</a></span>
    </p>
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