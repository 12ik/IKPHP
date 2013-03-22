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
<!--main-->
<div class="midder">

<div class="mc">
<h1 class="group_tit"><?php echo ($strGroup[groupname]); ?></h1>
<div class="cleft">
<div class="infobox">

<div class="bd">
<img align="left" alt="<?php echo ($strGroup[groupname]); ?>" src="<?php echo attach($strGroup[groupicon], 'group/icon');?>" class="pil mr5 groupicon" valign="top" />
<div>创建于<?php echo date('Y-m-d',$strGroup[addtime]) ?>&nbsp; &nbsp; <?php echo ($strGroup[role_leader]); ?>：<a href="<?php echo U('people/index',array('id'=>$strLeader[doname]));?>"><?php echo ($strLeader[username]); ?></a><br></div>
<?php echo nl2br($strGroup[groupdesc]); ?>
<div class="clearfix" style="margin-top: 10px;">

<?php if($isGroupUser && ($strGroup[userid]!=$visitor[userid])): ?><span class="fleft mr5 color-gray">我是这个小组的<?php echo ($strGroup['role_user']); ?> <a class="j a_confirm_link" href="<?php echo U('group/quit',array('id'=>$strGroup['groupid']));?>" style="margin-left: 6px;">&gt;退出小组</a></span>
<?php elseif($isGroupUser && ($strGroup[userid]==$visitor[userid])): ?>
<span class="fleft mr5 color-gray">我是这个小组的<?php echo ($strGroup['role_leader']); ?></span>

<?php elseif($strGroup[joinway] == 0): ?>
<span class="fright"><a class="button-join" href="<?php echo U('group/join',array('id'=>$strGroup['groupid']));?>">申请加入小组</a></span>
<?php else: ?>
<span class="fright">本小组禁止加入</span><?php endif; ?>


</div>
</div>

</div>

<div class="box">

<div class="box_content">

    <h2 style="margin-top:10px">
                <a class="rr bn-post" href="<?php echo U('group/add',array('id'=>$strGroup[groupid]));?>"><span>发布帖子</span></a>
        最近小组话题  · · · · · ·
    </h2>

<div class="clear"></div>

            <div class="indent">
                <table class="olt">
                    <tbody>
                        <tr>
                            <td>话题</td>
                            <td nowrap="nowrap">作者</td>
                            <td nowrap="nowrap">回应</td>
                            <td align="right" nowrap="nowrap">最后回应</td>
                        </tr>
            <?php if(!empty($arrTopic)): if(is_array($arrTopic)): foreach($arrTopic as $key=>$item): ?><tr class="pl">
                                <td>
                                <a title="<?php echo ($item[title]); ?>" href="<?php echo U('group/topic',array('id'=>$item[topicid]));?>">
                                <?php echo getsubstrutf8(t($item['title']),0,25); ?>
                                </a>
                                <?php if($item[isvideo] == 1): ?><img src="__STATIC__/public/images/lc_cinema.png" align="absmiddle" title="[视频]" alt="[视频]" /><?php endif; ?>                
                                <?php if($item[istop] == 1): ?><img src="__STATIC__/public/images/headtopic_1.gif" title="[置顶]" alt="[置顶]" /><?php endif; ?>
                                <?php if($item[addtime] > (strtotime(date('Y-m-d 00:00:00')))): ?><img src="__STATIC__/public/images/topic_new.gif" align="absmiddle"  title="[新帖]" alt="[新帖]" /><?php endif; ?> 
                                <?php if($item[isphoto] == 1): ?><img src="__STATIC__/public/images/image_s.gif" title="[图片]" alt="[图片]" align="absmiddle" /><?php endif; ?> 
                                <?php if($item[isattach] == 1): ?><img src="__STATIC__/public/images/attach.gif" title="[附件]" alt="[附件]" /><?php endif; ?> 
                                <?php if($item[isdigest] == 1): ?><img src="__STATIC__/public/images/posts.gif" title="[精华]" alt="[精华]" /><?php endif; ?>
            					</td>
                                <td nowrap="nowrap"><a href="<?php echo U('people/index',array('id'=>$item[user][doname]));?>"><?php echo ($item[user][username]); ?></a></td>
                                <td nowrap="nowrap" ><?php if($item[count_comment]): echo ($item[count_comment]); endif; ?></td>
                                <td nowrap="nowrap" class="time" align="right"><?php echo getTime($item[uptime],time()) ?></td>
                            </tr><?php endforeach; endif; endif; ?>         
                </tbody>
              </table>
            </div>

	<div class="clear"></div>
	<div class="page"><?php echo ($pageUrl); ?></div>

</div>
</div>

</div>


<div class="cright">
    <div>
        <h2>最新加入成员</h2>
        <?php if(is_array($arrGroupUser)): foreach($arrGroupUser as $key=>$item): ?><dl class="obu">
            <dt>
            <a href="<?php echo U('people/index',array('id'=>$item[doname]));?>"><img alt="<?php echo ($item[username]); ?>" class="m_sub_img" src="<?php echo ($item[face]); ?>" /></a>
            </dt>
            <dd><?php echo ($item[username]); ?><br>
                <span class="pl">(<a href="<?php echo U('location/area',array(areaid=>$item[area][areaid]));?>"><?php echo ($item[area][areaname]); ?></a>)</span>
            </dd>
     	 </dl><?php endforeach; endif; ?>
    
        <br clear="all">
    
        <?php if($visitor[userid] == $strGroup[userid]): ?><p class="pl2">&gt; <a href="<?php echo U('group/group_user',array(groupid=>$strGroup[groupid]));?>">成员管理 (<?php echo ($strGroup[count_user]); ?>)</a></p>
            
            <p class="pl2">&gt; <a href="<?php echo U('group/edit',array(d=>base,groupid=>$strGroup[groupid]));?>">修改小组设置 </a></p>
            
            <?php else: ?>
            
            <p class="pl2"><a href="<?php echo U('group/group_user',array(groupid=>$strGroup[groupid]));?>">浏览所有成员 (<?php echo ($strGroup[count_user]); ?>)</a></p><?php endif; ?>
        
       <div class="clear"></div>

        
    </div>
    
	<p class="pl">本页永久链接: <a href="<?php echo U('group/show',array(id=>$strGroup[groupid]));?>"><?php echo U('group/show',array(id=>$strGroup[groupid]));?></a></p>
    
    <p class="pl"><span class="feed"><a href="<?php echo U('group/rss',array(groupid=>$strGroup[groupid]));?>">feed: rss 2.0</a></span></p>
    
    <div class="clear"></div>
    
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