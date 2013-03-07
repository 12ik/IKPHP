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
<div class="midder">


    <div class="mc">
    
   	    <h1><?php echo ($title); ?></h1>
       
        <div class="cleft w700">


            <div class="group_topics">
                <table class="olt">
                    <tbody>
            <?php if(!empty($arrTopic)): if(is_array($arrTopic)): foreach($arrTopic as $key=>$item): ?><tr class="pl">
           <td class="td-subject"><a title="<?php echo ($item[title]); ?>" href="{U('group','topic',array('id'=>$item[topicid]))}"><?php echo getsubstrutf8(t($item['title']),0,25); ?></a>
            <!--{if $item[isvideo] == '1'}-->
            <img src="{SITE_URL}public/images/lc_cinema.png" align="absmiddle" title="[视频]" alt="[视频]" />
            <!--{/if}-->                
            <!--{if $item[istop]=='1'}-->
            <img src="{SITE_URL}app/<?php echo ($app); ?>/skins/<?php echo ($skin); ?>/headtopic_1.gif" title="[置顶]" alt="[置顶]" />
            <!--{/if}-->
            <!--{if $item[addtime]>strtotime(date('Y-m-d 00:00:00'))}-->
            <img src="{SITE_URL}app/<?php echo ($app); ?>/skins/<?php echo ($skin); ?>/topic_new.gif" align="absmiddle"  title="[新帖]" alt="[新帖]" />
            <!--{/if}--> 
            <!--{if $item[isphoto]=='1'}-->
            <img src="{SITE_URL}app/<?php echo ($app); ?>/skins/<?php echo ($skin); ?>/image_s.gif" title="[图片]" alt="[图片]" align="absmiddle" />
            <!--{/if}--> 
            <!--{if $item[isattach] == '1'}-->
            <img src="{SITE_URL}app/<?php echo ($app); ?>/skins/<?php echo ($skin); ?>/attach.gif" title="[附件]" alt="[附件]" />
            <!--{/if}-->
            <!--{if $item[isposts] == '1'}-->
            <img src="{SITE_URL}public/images/posts.gif" title="[精华]" alt="[精华]" />
            <!--{/if}--></td>
                                <td class="td-reply" nowrap="nowrap"><!--{if $item[count_comment]>0}--><?php echo ($item[count_comment]); ?> 回应<!--{/if}--></td>
                                <td class="td-time" nowrap="nowrap"><?php echo getTime($item[uptime],time()); ?></td>
                                <td align="right"><a href="{U('group','show',array('id'=>$item[groupid]))}"><?php echo getsubstrutf8(t($item[group][groupname]),0,10); ?></a></td>
                            </tr><?php endforeach; endif; endif; ?>         
                </tbody>
              </table>
            </div>
            
             
            
            <div class="clear"></div>
    
    
    	</div>
    
        <div class="cright w250" id="cright">   
              
			<div class="mod" id="g-user-profile">

    <div class="usercard">
      <div class="pic">
            <a href="{U('hi','',array('id'=>$strUser[doname]))}"><img alt="<?php echo ($strUser[username]); ?>" src="<?php echo ($strUser[face]); ?>"></a>
      </div>
      <div class="info">
           <div class="name">
               <a href="{U('hi','',array('id'=>$strUser[doname]))}"><?php echo ($strUser[username]); ?></a>
           </div>
                <?php if($strUser[area] != ''): echo ($strUser[area][areaname]); else: ?>火星<?php endif; ?>                        
                 <br>
       </div>
    </div>
               
    <div class="group-nav">
     <ul>
		<?php if($action_name == 'my_group_topics'): ?><li class="on"><a href="<?php echo U('group/my_group_topics');?>">我的小组话题</a></li>
		<?php else: ?>
		<li class=""><a href="<?php echo U('group/my_group_topics');?>">我的小组话题</a></li><?php endif; ?>
		
		<?php if($action_name == 'my_replied_topics'): ?><li class="on"><a href="<?php echo U('group/my_replied_topics');?>">我回应的话题</a></li>
		<?php else: ?>
		<li class=""><a href="<?php echo U('group/my_replied_topics');?>">我回应的话题</a></li><?php endif; ?>
		
		<?php if($action_name == 'my_collect_topics'): ?><li class="on"><a href="<?php echo U('group/my_collect_topics');?>">我喜欢的话题</a></li>
		<?php else: ?>
		<li class=""><a href="<?php echo U('group/my_collect_topics');?>">我喜欢的话题</a></li><?php endif; ?>
		
		<?php if($action_name == 'mine'): ?><li class="on"><a href="<?php echo U('group/mine');?>">我管理/加入的小组</a></li>
		<?php else: ?>
		<li class=""><a href="<?php echo U('group/mine');?>">我管理/加入的小组</a></li><?php endif; ?>
     </ul>
    </div>
             
</div> 
         
<div class="mod">
<?php if($visitor): ?><div class="create-group">
<a href="<?php echo U('group/create');?>"><i>+</i>申请创建小组</a>
</div><?php endif; ?>
</div>                 
        
        </div>
    
    </div><!--//mc-->


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
        <p>Powered by <a class="softname" href="<?php echo ($IK_SOFT[info][url]); ?>"><?php echo ($IK_SOFT[info][name]); ?></a> <?php echo ($IK_SOFT[info][version]); ?> <?php echo ($IK_SOFT[info][year]); ?> <?php echo ($IK_SITE[base][site_icp]); ?> <span style="color:green">ThinkPHP 版本 <?php echo (THINK_VERSION); ?></span><br /><span style="font-size:0.83em;">Processed in <?php echo ($runTime); ?> second(s)</span>
        
        <!--<script src="http://s21.cnzz.com/stat.php?id=2973516&web_id=2973516" language="JavaScript"></script>-->
        </p>   
    </div>
</div>
</footer>
</body>
</html>