-- --------------------------------------------------------

--
-- 表的结构 `ik_admin`
--

DROP TABLE IF EXISTS `ik_admin`;
CREATE TABLE `ik_admin` (
  `userid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_id` smallint(5) NOT NULL,
  `last_ip` varchar(15) NOT NULL,
  `last_time` int(10) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `user_name` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员' AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- 表的结构 `ik_user`
--
DROP TABLE IF EXISTS `ik_user`;
CREATE TABLE `ik_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码',  
  `username` char(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '用户email',
  `fuserid` int(11) NOT NULL DEFAULT '0' COMMENT '来自邀请用户',
  `doname` char(32) NOT NULL DEFAULT '',  
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `phone` char(16) NOT NULL DEFAULT '' COMMENT '电话号码',
  `roleid` int(11) NOT NULL DEFAULT '1' COMMENT '角色ID',
  `areaid` int(11) NOT NULL DEFAULT '0' COMMENT '区县ID',
  `path` char(32) NOT NULL DEFAULT '' COMMENT '头像路径',
  `face` char(64) NOT NULL DEFAULT '' COMMENT '会员头像',
  `signed` char(64) NOT NULL DEFAULT '' COMMENT '签名',
  `blog` char(32) NOT NULL DEFAULT '' COMMENT '博客',
  `about` char(255) NOT NULL DEFAULT '' COMMENT '关于我',
  `ip` varchar(16) NOT NULL DEFAULT '' COMMENT '登陆IP',
  `address` char(64) NOT NULL DEFAULT '',
  `qq_openid` char(32) NOT NULL DEFAULT '',
  `qq_access_token` char(32) NOT NULL DEFAULT '' COMMENT 'access_token',
  `count_score` int(11) NOT NULL DEFAULT '0' COMMENT '统计积分',
  `count_follow` int(11) NOT NULL DEFAULT '0' COMMENT '统计用户跟随的',
  `count_followed` int(11) NOT NULL DEFAULT '0' COMMENT '统计用户被跟随的',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是管理员',
  `isenable` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否启用：0启用1禁用',
  `isverify` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未验证1验证',
  `verifycode` char(11) NOT NULL DEFAULT '' COMMENT '验证码',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `uptime` int(11) DEFAULT '0' COMMENT '登陆时间',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `qq_openid` (`qq_openid`),
  KEY `fuserid` (`fuserid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户';

-- --------------------------------------------------------

--
-- 表的结构 `ik_setting`
--
DROP TABLE IF EXISTS `ik_setting`;
CREATE TABLE `ik_setting` (
  `name` char(32) NOT NULL DEFAULT '' COMMENT '选项名字',
  `data` char(255) NOT NULL DEFAULT '' COMMENT '选项内容',
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统管理配置';

--
-- 转存表中的数据 `ik_system_options`
--

INSERT INTO `ik_setting` (`name`, `data`) VALUES
('site_title', '爱客网(IKPHP)开源社区'),
('site_subtitle', '又一个爱客网(IKPHP)开源社区'),
('site_url', 'http://localhost/ikphp/'),
('site_email', 'admin@admin.com'),
('site_icp', '正在备案中'),
('isface', '0'),
('site_keywords', '12ik'),
('site_desc', '又一个爱客网(IKPHP)开源社区'),
('site_theme', 'blue'),
('site_urltype', '1'),
('isgzip', '0'),
('timezone', 'Asia/Hong_Kong'),
('isinvite', '0'),
('charset', 'UTF-8'),
('integrate_code', 'default'),
('integrate_config', '');
-- --------------------------------------------------------

--
-- 表的结构 `ik_nav`
--

DROP TABLE IF EXISTS `ik_nav`;
CREATE TABLE `ik_nav` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` tinyint(1) NOT NULL DEFAULT '1',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `mod` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- 表的结构 `ik_area`
--
DROP TABLE IF EXISTS `ik_area`;
CREATE TABLE `ik_area` (
  `areaid` int(11) NOT NULL AUTO_INCREMENT,
  `areaname` varchar(32) NOT NULL DEFAULT '',
  `zm` char(1) NOT NULL DEFAULT '' COMMENT '首字母',
  `referid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`areaid`),
  KEY `referid` (`referid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='本地化' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ik_area`
--
INSERT INTO `ik_area` (`areaid`, `areaname`, `zm`, `referid`) VALUES
(1,'广东','G','0'),
(2,'北京','B','0'),
(3,'上海','S','0'),
(4,'江苏','J','0'),
(5,'浙江','Z','0'),
(6,'山东','S','0'),
(7,'四川','S','0'),
(8,'湖北','H','0'),
(9,'福建','F','0'),
(10,'河南','H','0'),
(11,'辽宁','L','0'),
(12,'陕西','S','0'),
(13,'湖南','H','0'),
(14,'河北','H','0'),
(15,'安徽','A','0'),
(16,'黑龙江','H','0'),
(17,'重庆','C','0'),
(18,'天津','T','0'),
(19,'广西','G','0'),
(20,'山西','S','0'),
(21,'江西','J','0'),
(22,'吉林','J','0'),
(23,'云南','Y','0'),
(24,'内蒙古','N','0'),
(25,'贵州','G','0'),
(26,'甘肃','G','0'),
(27,'新疆','X','0'),
(28,'海南','H','0'),
(29,'宁夏','N','0'),
(30,'青海','Q','0'),
(31,'西藏','X','0'),
(32,'香港','X','0'),
(33,'澳门','A','0'),
(34,'台湾','T','0'),
(35,'钓鱼岛','D','0');

