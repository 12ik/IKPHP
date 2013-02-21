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
<link rel="stylesheet" type="text/css" href="__STATIC__/theme/<?php echo C('ik_site_theme');?>/user/validate.css" />
<script src="__STATIC__/public/js/validate/jquery.validateid.js"></script>

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


<script type="text/javascript">
$(document).ready(function() {
	
	var validator = $("#signupform").validate({
		onkeyup: false,
		rules:{
			<?php if(C('ik_isinvite') == 1): ?>invitecode:{
				required:true,
				remote:"<?php echo U('check',array('t'=>'isinvite'));?>"
			},<?php endif; ?>
			email: {
				required: true,
				email: true,
				remote: "<?php echo U('check',array('t'=>'email'));?>"
			},
			password: {
				required: true,
				minlength: 5
			},
			repassword: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			username:{
				required: true,
				minlength: 2,
				maxlength: 12,
				remote:"<?php echo U('check',array('t'=>'username'));?>"
			}
		},
		messages: {
		<?php if(C('ik_isinvite') == 1): ?>invitecode:{
				required:"请输入邀请码",
				remote:jQuery.format("邀请码无效，请寻找新的邀请码！")
			},<?php endif; ?>
			email: {
					required: "请输入Email地址",
					email: "请输入一个正确的Email地址",
					remote:jQuery.format("Email已经存在，请更换其他Email")
			},
			password: {
				required: "请输入密码",
				minlength: jQuery.format("至少输入6个字符")
			},
			repassword: {
				required: "请重复输入密码",
				minlength: jQuery.format("两次输入密码不一致"),
				equalTo: "两次输入密码不一致"
			},
			username:{
				required:"请输入用户名",
				minlength: jQuery.format("至少输入2个字符"),
				maxlength: jQuery.format("最多输入12个字符"),
				remote:jQuery.format("用户名已经存在，请更换其他用户名")
			}
		},

		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.next() );
			else
				error.appendTo( element.parent().next() );
		},

		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		}
	});

});
</script>

<script language="javascript">
function newgdcode(obj) {
obj.src = $(obj).attr('url') + '&nowtime=' + new Date().getTime();
//后面传递一个随机参数，否则在IE7和火狐下，不刷新图片
}
</script>


<!--main-->
<div class="midder">
<div class="mc">
<h1 class="user_tit"><?php echo L('user_regist_tit');?></h1>

<?php if(C('ik_isinvite') == 2): ?><p>系统升级中，暂时关闭用户注册！</p>
<p><a href="{SITE_URL}">[返回首页]</a></p>
<?php else: ?>

<div class="user_left">
<form  id="signupform" method="POST" action="<?php echo U('user/register');?>">

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="Tabletext">
<?php if(C('ik_isinvite') == 1): ?><tr>
<td class="label"><label id="invitecode" for="invitecode">
<font color="red">邀请码：</font></label></td>
<td class="field" width="300"><input class="uinput" id="invitecode" name="invitecode" type="text" value="" placeholder="请输入邀请码"/></td>
<td class="status"></td>
</tr><?php endif; ?>


<tr>
<td class="label"><label id="email" for="email">Email：</label></td>
<td class="field" width="300"><input class="uinput" id="email" name="email" type="email" value="" placeholder="请输入Email" autofocus/></td>
<td class="status"></td>
</tr>
<tr>
<td class="label"><label>密码：</label></td>
<td class="field"><input class="uinput" type="password" id="password" name="password"  /></td>
<td class="status"></td>
</tr>
<tr>
<td class="label"><label>重复密码：</label></td>
<td class="field"><input class="uinput" type="password" id="repassword" name="repassword"  /></td>
<td class="status"></td>
</tr>

<tr>
<td class="label"><label>用户名：</label></td>
<td class="field"><input class="uinput" type="text" id="username" name="username" /></td>
<td class="status"></td>
</tr>

<tr><td class="label">验证码：</td><td class="field">
<input name="authcode"  class="uinput" style="width:50px; float:left"/>
<img src="<?php echo U('captcha/'.time());?>" url="<?php echo U('captcha/'.time());?>" onclick="javascript:newgdcode(this);" alt="点击刷新验证码" style="cursor:pointer; margin-left:5px; float:left;" align="absmiddle"/></td>
<td class="status"></td></tr>

<tr>
<td class="label"></td>
<td class="field">
<input type="hidden" name="fuserid" value="<?php echo ($fuserid); ?>" />
<input class="submit" type="submit" value="注册" style="margin-top:8px"/> 
</td>
<td class="status"></td>
</tr>

<tr>
<td class="label"><br /></td>
<td class="field"><br /></td> 
<td class="status"></td>
</tr>

</table>
</form><?php endif; ?>
</div>

<div class="aside">
            
	<p class="pl2">&gt; 已经拥有12ik网帐号? <a href="<?php echo U('user/login');?>" rel="nofollow">直接登录</a></p>

</div>
<div class="cl"></div>

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