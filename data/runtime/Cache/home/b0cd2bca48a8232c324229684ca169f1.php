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
    	<?php if($module_name == 'group'): ?><div class="site_logo nav_logo">
            <a href="<?php echo U('group/index');?>">爱客小组</a>
        </div>
        <?php else: ?>
        <div class="site_logo">
            <a href="__ROOT__/" title="<?php echo ($IK_SITE[base][site_title]); ?>"><?php echo ($IK_SITE[base][site_title]); ?></a>
        </div><?php endif; ?> 
		<div class="appnav">
		   <?php if($module_name == group): ?><ul id="nav_bar">
	           		<?php if($visitor[userid]): ?><li><a href="<?php echo U('group/index');?>">我的小组</a></li><?php endif; ?>    
			        <li><a href="<?php echo U('group/explore');?>">发现小组</a></li>
			        <li><a href="<?php echo U('group/explore_topic');?>">发现话题</a></li>
			        <li><a href="<?php echo U('group/nearby');?>">北京话题</a></li>
			    </ul><?php endif; ?>
		   <?php if($module_name == article): ?><ul id="nav_bar">
			    <li><a href="<?php echo U('article/index');?>">文章</a></li>
			    <li><a href="<?php echo U('group/index');?>">小组</a></li>
			   </ul><?php endif; ?>
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
		<aside class="w190 fl">
			<section class="categories">
				<div class="hd">
					<h3>全部分类</h3>
				</div>
				<ul class="list categories-list">
                    <?php if(is_array($arrCate)): foreach($arrCate as $key=>$item): ?><li><a href="<?php echo U('article/category',array('cateid'=>$item[cateid]));?>"><?php echo ($item[catename]); ?></a></li><?php endforeach; endif; ?>
				</ul>
			</section>
			<section class="personal-publish">
				<div class="hd">
					<h3>作品投稿</h3>
				</div>
				<div class="bd">
					<p>个人作者可以在爱客上直接发布作品。 内容领域不限，唯一要求是保证质量优秀。 发表后，作者可直接从中获得分成。</p>
					<p class="entrance">
						<a href="<?php echo U('article/add');?>" class="btn btn-large">去投稿<i class="arrow-right"></i></a>
					</p>
				</div>
			</section>
		</aside>
		<article class="w770 fr">
			<section>
				<div class="hd tag-heading">
					<h3 class="the-tag-name"><?php echo ($seo["title"]); ?></h3>
				</div>

				<div class="bd">
					<ul class="list-lined article-list">
						<?php if(is_array($arrArticle)): foreach($arrArticle as $key=>$item): ?><li class="item" id="article-407582">
							<div class="title">
								<a href="<?php echo U('article/show',array('id'=>$item[aid]));?>"><?php echo ($item[subject]); ?> 
                                <?php if($item[isphoto]): ?>[图文]<?php endif; ?>
                                </a>
							</div>
                           <?php if($item[isphoto]): ?><div class="cover">
                                <a class="pic" href="<?php echo U('article/show',array('id'=>$item[aid]));?>">
									<img src="<?php echo ($item[attach]); ?>" />
								</a> 
							</div><?php endif; ?>                           
							<div class="info">
								<div class="article-desc-brief">
									<?php echo getsubstrutf8(t($item[content]),0,150); ?>...<a
										href="<?php echo U('article/show',array('id'=>$item[aid]));?>">（更多）</a>
								</div>
							</div>
							<span class="time"> <?php echo date('Y-m-d H:i',$item[addtime]) ?></span> 
						</li><?php endforeach; endif; ?>

					</ul>
				</div>


			</section>
            
             <div class="page"><?php echo ($pageUrl); ?></div>   
             
		</article>
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