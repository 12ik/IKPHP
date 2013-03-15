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
<h1 class="group_tit">
<?php echo ($seo["title"]); ?>
</h1>

<?php if(!$isGroupUser): ?><div style="font-size:14px;padding-top:50px;text-align:center;">不好意思，你不是本组成员不能发表帖子，请加入后再发帖</div>
<?php else: ?>
<form method="POST" action="<?php echo U('group/publish');?>" onsubmit="return newTopicFrom(this)"  enctype="multipart/form-data" id="form_tipic">
<table width="100%" cellpadding="0" cellspacing="0" class="table_1">

	<tr>
    	<th>标题：</th>
		<td><input style="width:400px;" type="text" value="<?php echo ($strTopic[title]); ?>" maxlength="100" size="50" name="title" gtbfieldid="2" class="txt"   placeholder="请填写标题"></td>
    </tr>	
    <tr><th>&nbsp;</th>
        <td align="left" style="padding:0px 10px">
        <a href="javascript:;" id="addImg">添加图片</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="javascript:;" id="addVideo">添加视频</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="javascript:;" id="addLink">添加链接</a>
        </td>
    </tr>
    <tr>
        <th>内容：</th><td><textarea style="width:99.5%;height:300px;" id="editor_full" cols="55" rows="20" name="content" class="txt"   placeholder="请填写内容"><?php echo ($strTopic[content]); ?></textarea></td>
    </tr>
    <tr>
        <th>评论：</th>
        <td><input type="radio" checked="select" name="iscomment" value="0" />允许 <input type="radio" name="iscomment" value="1" />不允许</td>
    </tr>	
    <tr>
    	<th>&nbsp;</th><td>
        <input type="hidden" name="groupid" value="<?php echo ($strGroup[groupid]); ?>" />
        <input type="hidden" name="topic_id" value="<?php echo ($topic_id); ?>" id="topic_id" />
        <input class="submit" type="submit" value="好啦，发布"> <a href="<?php echo U('group/show',array('id'=>$strGroup[groupid]));?>">返回</a>
        </td>
    </tr>
</table>
<div id="thumblst" class="item item-thumb-list">
	{loop $arrPhotos $item}
    <div class="thumblst">
      <div class="details">
        <p>图片描述（30字以内）</p>
        <textarea name="p_<?php echo ($item[seqid]); ?>_title" maxlength="30"><?php echo ($item[photodesc]); ?></textarea>
        <input type="hidden" name="p_<?php echo ($item[seqid]); ?>_seqid" value="<?php echo ($item[seqid]); ?>" >
        <br>
        <br>
        图片位置<br>
        <a onclick="javascript:removePhoto(this, '<?php echo ($item[seqid]); ?>');return false;" class="minisubmit rr j a_remove_pic" name="rm_p_<?php echo ($item[seqid]); ?>">删除</a>
        <label>
          <input type="radio" name="p_<?php echo ($item[seqid]); ?>_layout" {if $item[align]==L} checked {/if} value="L" >
          <span class="alignleft">居左</span></label>
        <label>
          <input type="radio" name="p_<?php echo ($item[seqid]); ?>_layout" {if $item[align]==C} checked {/if} value="C" >
          <span class="aligncenter">居中</span></label>
        <label>
          <input type="radio" name="p_<?php echo ($item[seqid]); ?>_layout" {if $item[align]==R} checked {/if} value="R" >
          <span class="alignright">居右</span></label>
      </div>
      <div class="thumb">
        <div class="pl">[图片<?php echo ($item[seqid]); ?>]</div>
        <img src="<?php echo ($item[photo_140]); ?>">
      </div>
      	<div class="clear"></div>
    </div>
    {/loop}

</div>
<div id="videosbar"  class="item item-thumb-list">
	{loop $arrVideos $item}
   <div class="thumblst">
  <div class="details">
    <p>视频标题（30字以内）</p>
    <textarea name="video_<?php echo ($item[seqid]); ?>_title" maxlength="30">人在囧途</textarea>
    <input type="hidden" value="<?php echo ($item[seqid]); ?>" name="video_<?php echo ($item[seqid]); ?>">
    <br>
    <br>
    视频网址：<br>
    <a onclick="javascript:removeVideo(this, '<?php echo ($item[seqid]); ?>');return false;" class="minisubmit rr j a_remove_pic" name="rm_p_1">删除</a>
    <p><?php echo ($item[url]); ?></p>
  </div>
  <div class="thumb">
    <div class="pl">[视频<?php echo ($item[seqid]); ?>]</div>
    <img src="<?php echo ($item[imgurl]); ?>"> </div>
  <div class="clear"></div>
</div>

    {/loop}
</div>
<!--加载编辑器-->
<script type="text/javascript" src="__STATIC__/public/js/lib/ajaxfileupload.js"></script>
<script type="text/javascript" src="__STATIC__/public/js/lib/IKEditor.js"></script>
<script language="javascript">
$(function(){
	$('#addImg').bind('click',function(){
		var ajaxurl = "<?php echo U('group/topic',array('d'=>'add_photo'));?>";
		var data = "{'type':'topic','typeid':'{$itemid}'}";		
		addPhoto(ajaxurl, data);
	})
});
</script>
</form><?php endif; ?>


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
        <p>Powered by <a class="softname" href="<?php echo ($IK_SOFT[info][url]); ?>"><?php echo ($IK_SOFT[info][name]); ?></a> <?php echo ($IK_SOFT[info][version]); ?> <?php echo ($IK_SOFT[info][year]); ?> <?php echo ($IK_SITE[base][site_icp]); ?> <span style="color:green">ThinkPHP 版本 <?php echo (THINK_VERSION); ?></span><br /><span style="font-size:0.83em;">Processed in <?php echo ($runTime); ?> second(s)</span>
        
        <!--<script src="http://s21.cnzz.com/stat.php?id=2973516&web_id=2973516" language="JavaScript"></script>-->
        </p>   
    </div>
</div>
</footer>
</body>
</html>