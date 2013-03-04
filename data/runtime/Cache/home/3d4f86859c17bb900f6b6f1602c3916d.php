<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($seo["title"]); ?> - <?php echo ($seo["subtitle"]); ?></title>
<meta name="keywords" content="<?php echo ($seo["keywords"]); ?>" /> 
<meta name="description" content="<?php echo ($seo["description"]); ?>" /> 
<link rel="shortcut icon" href="__STATIC__/public/images/fav.ico" type="image/x-icon">
<style>__SITE_THEME_CSS__</style>
<link href="http://localhost/ikphp/static/theme/blue/group/images/style.css" rel="stylesheet" />
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
        <a href="<?php echo U('people/index', array('userid'=>$visitor['userid']));?>">
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
		        <li><a href="http://www.ik.com/index.php?app=group&amp;a=explore">发现小组</a></li>
		        <li><a href="http://www.ik.com/index.php?app=group&amp;a=explore_topic">发现话题</a></li>
		        <li><a href="http://www.ik.com/index.php?app=group&amp;a=nearby&amp;ik=beijing">北京话题</a></li>
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
<img align="left" alt="<?php echo ($strGroup[groupname]); ?>" src="<?php echo ($strGroup[icon_48]); ?>" class="pil mr5 groupicon" valign="top" />
<div>创建于{php echo date('Y-m-d',$strGroup[addtime])}&nbsp; &nbsp; <?php echo ($strGroup[role_leader]); ?>：<a href="{U('hi','',array('id'=>$strLeader[doname]))}"><?php echo ($strLeader[username]); ?></a><br></div>
<!--{php echo nl2br($strGroup[groupdesc])}-->
<div class="clearfix" style="margin-top: 10px;">

<!--{if $isGroupUser > 0 && $IK_USER[user][userid] != $strGroup[userid]}-->
<span class="fleft mr5 color-gray">我是这个小组的<?php echo ($strGroup[role_user]); ?> <a class="j a_confirm_link" href="{U('group','do',array('ik'=>'exit','groupid'=>$strGroup['groupid']))}" style="margin-left: 6px;">&gt;退出小组</a></span>
<!--{elseif $isGroupUser > 0 && $IK_USER[user][userid] == $strGroup[userid]}-->
<span class="fleft mr5 color-gray">我是这个小组的<?php echo ($strGroup[role_leader]); ?></span>
<!--{elseif $strGroup[joinway] == '0'}-->
<span class="fright">
<a class="button-join" href="{U('group','do',array('ik'=>'join','groupid'=>$strGroup['groupid']))}">申请加入小组</a></span>

<!--{else}-->
<span class="fright">本小组禁止加入</span>
<!--{/if}-->


</div>
</div>

</div>

<div class="box">

<div class="box_content">

    <h2 style="margin-top:10px">
                <a class="rr bn-post" href="{U('group','add',array('groupid'=>$strGroup[groupid]))}"><span>发布帖子</span></a>
        最近小组话题  · · · · · ·
    </h2>

<div class="clear"></div>

<!--{if $arrTopic}-->
            <div class="indent">
                <table class="olt">
                    <tbody>
                        <tr>
                            <td>话题</td>
                            <td nowrap="nowrap">作者</td>
                            <td nowrap="nowrap">回应</td>
                            <td align="right" nowrap="nowrap">最后回应</td>
                        </tr>
            <!--{if $arrTopic}-->
            <!--{loop $arrTopic $key $item}-->
                            <tr class="pl">
                                <td>
             <a title="<?php echo ($item[title]); ?>" href="{U('group','topic',array('id'=>$item[topicid]))}"><?php echo ($item[title]); ?></a>
            <!--{if $item[isvideo] == '1'}-->
            <img src="{SITE_URL}public/images/lc_cinema.png" align="absmiddle" title="[视频]" alt="[视频]" />
            <!--{/if}-->             
            <!--{if $item[istop]=='1'}-->
            <img src="{SITE_URL}app/<?php echo ($app); ?>/skins/<?php echo ($skin); ?>/headtopic_1.gif" align="absmiddle" title="[置顶]" alt="[置顶]" />
            <!--{/if}-->
            <!--{if $item[addtime]>strtotime(date('Y-m-d 00:00:00'))}-->
            <img src="{SITE_URL}app/<?php echo ($app); ?>/skins/<?php echo ($skin); ?>/topic_new.gif" align="absmiddle"  title="[新帖]" alt="[新帖]" />
            <!--{/if}--> 
            <!--{if $item[isposts] == '1'}-->
            <img src="{SITE_URL}public/images/posts.gif" align="absmiddle" title="[精华]" alt="[精华]" />
            <!--{/if}-->
            </td>

                                <td nowrap="nowrap"><a href="{U('hi','',array('id'=>$item[user][doname]))}"><?php echo ($item[user][username]); ?></a></td>
                                <td nowrap="nowrap" ><!--{if $item[count_comment]>0}--><?php echo ($item[count_comment]); ?><!--{/if}--></td>
                                <td nowrap="nowrap" class="time" align="right">{php echo getTime($item[uptime],time())}</td>
                            </tr>
             <!--{/loop}-->
            <!--{/if}-->         
                </tbody>
              </table>
            </div>
<!--{/if}-->
	<div class="clear"></div>
	<div class="page"><?php echo ($pageUrl); ?></div>

</div>
</div>

</div>


<div class="cright">
    <div>
        <h2>最新加入成员</h2>
        <!--{loop $arrGroupUser $key $item}-->
        <dl class="obu">
            <dt>
            <a href="{U('hi','',array('id'=>$item[doname]))}"><img alt="<?php echo ($item[username]); ?>" class="m_sub_img" src="<?php echo ($item[face]); ?>" /></a>
            </dt>
            <dd><?php echo ($item[username]); ?><br>
                <span class="pl">(<a href="{U('location','area',array(areaid=>$item[area][areaid]))}"><?php echo ($item[area][areaname]); ?></a>)</span>
            </dd>
     	 </dl>
        <!--{/loop}-->
    
        <br clear="all">
    
        <!--{if $IK_USER[user][userid] == $strGroup[userid]}-->
        <p class="pl2">&gt; <a href="{U('group','group_user',array(groupid=>$strGroup[groupid]))}">成员管理 (<?php echo ($strGroup[count_user]); ?>)</a></p>
        
        <p class="pl2">&gt; <a href="{U('group','edit',array(ik=>base,groupid=>$strGroup[groupid]))}">修改小组设置 </a></p>
        <p class="pl2">&gt; <a href="{U('group','recovery',array(groupid=>$strGroup[groupid]))}">回收站 (<?php echo ($strGroup[recoverynum]); ?>)</a></p>
        
        <!--{else}-->
        <p class="pl2"><a href="{U('group','group_user',array(groupid=>$strGroup[groupid]))}">浏览所有成员 (<?php echo ($strGroup[count_user]); ?>)</a></p>
        <!--{/if}-->
        
       <div class="clear"></div>

        
    </div>
    
	<p class="pl">本页永久链接: <a href="{U('group','show',array(id=>$strGroup[groupid]))}">{U('group','show',array(id=>$strGroup[groupid]))}</a></p>
    
    <p class="pl"><span class="feed"><a href="{U('group','rss',array(groupid=>$strGroup[groupid]))}">feed: rss 2.0</a></span></p>
    
    <div class="clear"></div>
	{php doAction('group_group_right_footer',$strTopic)}

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