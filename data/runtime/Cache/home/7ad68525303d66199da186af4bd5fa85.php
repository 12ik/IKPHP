<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($seo["title"]); ?> - <?php echo ($seo["subtitle"]); ?></title>
<meta name="keywords" content="<?php echo ($seo["keywords"]); ?>" /> 
<meta name="description" content="<?php echo ($seo["description"]); ?>" /> 
<link rel="shortcut icon" href="__STATIC__/public/images/fav.ico" type="image/x-icon">
<style>
@import url(__BASE_THEME_PATH__);
@import url(__APP_THEME_PATH__);
</style>
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
    	<h1>我的收件箱(<?php echo ($unreadnum); ?>封未拆)</h1>
    	<div class="cleft">
        	<div class="tabnav">
    <ul>
<!--
<li {if $ik=="notification"} class="select" {/if} >
<a href="{SITE_URL}{ikUrl('message','ikmail',array(ik=>notification))}">提醒</a>
</li>
-->
<li <!--{if $ik=="outbox"}-->class="select"<!--{/if}--> ><a href="{SITE_URL}{ikUrl('message','ikmail',array(ik=>outbox))}">发件箱</a></li>
<li <!--{if $ik=="inbox" || $ik=="spam" || $ik=="unread"}-->class="select"<!--{/if}--> ><a href="{SITE_URL}{ikUrl('message','ikmail',array(ik=>inbox))}">收件箱</a></li>
    </ul>
</div>
            <div class="clear"></div>
            <div id="db-timeline-hd">
                <ul class="menu-list">
                    <li <!--{if $ik=="inbox"}--> class="on" <!--{/if}-->>
                        <a href="{SITE_URL}{ikUrl('message','ikmail',array('ik'=>'inbox'))}">
                            所有消息
                        </a>
                    </li>
                    <li <!--{if $ik=="unread"}--> class="on" <!--{/if}--> >
                        <a href="{SITE_URL}{ikUrl('message','ikmail',array('ik'=>'unread'))}">
                            未读消息(<?php echo ($unreadnum); ?>)
                        </a>
                    </li>
                    <li <!--{if $ik=="spam"}--> class="on" <!--{/if}--> >
                        <a href="{SITE_URL}{ikUrl('message','ikmail',array('ik'=>'spam'))}">
                            垃圾消息(<?php echo ($spamnum); ?>)
                        </a>
                    </li>
                </ul>
            </div>  
		 <form  method="post" onSubmit="return isConfirmed" action="{SITE_URL}{ikUrl('message','do',array('ik'=>'all'))}">            
            <table class="olt">
              <tbody>
                <tr>
                  <td class="pl" style="width:112px;"><span class="doumail_from">来自</span></td>
                  <td width="20"></td>
                  <td class="pl">话题</td>
                  <td class="pl" style="width:110px;">时间</td>
                  <td class="pl" style="width:40px;" align="center">选择</td>
                  <td class="pl" style="width:120px;visibility:hidden;border-bottom:none" align="center">mail_options</td>
                </tr>
                 <!--{loop $arrMessage $key $item}-->    
                <tr>
                  <td>{if $item[userid]==0}<span class="sys_doumail">系统邮件</span>{else} <span class="doumail_from"><?php echo ($item[user][username]); ?></span> {/if}</td>
                  <td class="m" align="center">&gt;</td>
                  <td><a href="{SITE_URL}{ikUrl('message','show',array('messageid'=>$item[messageid]))}"><?php echo ($item[title]); ?></a></td>
                  <td><?php echo ($item[addtime]); ?></td>
                  <td align="center"><input name="messageid[]" value="<?php echo ($item[messageid]); ?>" type="checkbox"></td>
                  <td style="display: none;" class="mail_options">
                  {if $ik!="spam"}<a rel="direct" class="post_link" href="{SITE_URL}{ikUrl('message','do',array('ik'=>'spam','messageid'=>$item[messageid]))}">垃圾消息</a>{/if}
                  <a onClick="return confirm('真的要删除消息吗？')" class="post_link" href="{SITE_URL}{ikUrl('message','do',array('ik'=>'del','type'=>'inbox','messageid'=>$item[messageid]))}">删除</a>
                  </td>
                </tr>
                <!--{/loop}-->
                <tr>
                  <td colspan="4" align="right">
                    <input name="type" value="inbox" type="hidden">
                   {if $ik=="spam"}
                    <input name="mc_submit" value="删除" data-confirm="真的要删除短消息吗?" type="submit">
				   {/if} 
                   {if $ik=="inbox" || $ik=="unread"}
                    <input name="mc_submit" value="删除" data-confirm="真的要删除短消息吗?" type="submit">
                    <input name="mc_submit" value="垃圾消息" 	type="submit">
                    <input name="mc_submit" value="标记为已读"  type="submit">
				   {/if}                                                         
                  </td>
                  <td align="center"><input name="checkAll" value="checkAll" onclick="ToggleCheck(this);" type="checkbox"></td>
                </tr>
              </tbody>
            </table>
        </form>    
        </div>
        <div class="cright">
			{template rightmenu}     
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