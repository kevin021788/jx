-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.5.53-log - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出  表 jx.about 结构
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name',
  `slug` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Slug',
  `imgUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'imgUrl',
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Description',
  `content` text COLLATE utf8_unicode_ci COMMENT 'Content',
  `sort` int(11) DEFAULT '0' COMMENT 'Sort',
  `status` int(2) DEFAULT '1' COMMENT 'Status：0-UnActive，1-Active',
  `created_at` int(10) DEFAULT NULL COMMENT 'Create Time',
  `updated_at` int(10) DEFAULT NULL COMMENT 'Modify Time',
  `language` int(2) DEFAULT '1' COMMENT 'Language Type',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  jx.about 的数据：~3 rows (大约)
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
REPLACE INTO `about` (`id`, `name`, `slug`, `imgUrl`, `desc`, `content`, `sort`, `status`, `created_at`, `updated_at`, `language`) VALUES
	(1, '关于我们', '', 'asdf', 'adsf', '关于我们', 0, 1, 1541059561, 1541059561, 1),
	(2, 'About Us', '', 'asdf', 'adsf', 'About Us', 0, 1, 1541059561, 1541059561, 2),
	(3, 'دربارهی ما', '', 'asdf', 'دربارهی ما', '<p>دربارهی ما</p>', 0, 1, 1541059561, 1541409407, 3);
/*!40000 ALTER TABLE `about` ENABLE KEYS */;


-- 导出  表 jx.banner 结构
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cat_id` int(11) DEFAULT '0' COMMENT 'category Id',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name',
  `imgUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'imgUrl',
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Description',
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Url',
  `sort` int(11) DEFAULT '0' COMMENT 'Sort',
  `status` int(2) DEFAULT '1' COMMENT 'Status：0-UnActive，1-Active',
  `created_at` int(10) DEFAULT NULL COMMENT 'Create Time',
  `updated_at` int(10) DEFAULT NULL COMMENT 'Modify Time',
  `language` int(2) DEFAULT '1' COMMENT 'Language Type',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  jx.banner 的数据：~5 rows (大约)



-- 导出  表 jx.category 结构
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `parentId` int(11) NOT NULL DEFAULT '0' COMMENT '父类ID',
  `idPath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分类ID路径',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分类名称',
  `model` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '模块名称',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `status` int(4) DEFAULT '1' COMMENT '状态',
  `language` int(4) DEFAULT '0' COMMENT '所属语言',
  PRIMARY KEY (`id`),
  KEY `parentId` (`parentId`),
  KEY `language` (`language`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  jx.category 的数据：~6 rows (大约)



-- 导出  表 jx.config 结构
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '配置名称',
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '配置说明',
  `value` text COLLATE utf8_unicode_ci COMMENT '配置值',
  `remark` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '配置说明',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `status` int(4) DEFAULT '1' COMMENT '状态',
  `created_at` int(4) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(4) DEFAULT '0' COMMENT '更新时间',
  `language` int(4) DEFAULT '0' COMMENT '所属语言',
  PRIMARY KEY (`id`),
  UNIQUE KEY `index` (`name`,`id`,`language`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  jx.config 的数据：~44 rows (大约)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
REPLACE INTO `config` (`id`, `name`, `title`, `value`, `remark`, `sort`, `status`, `created_at`, `updated_at`, `language`) VALUES

	(1, 'WEB_SITE_TITLE', '网站标题', 'China Radio International.CRI.', '网站标题前台显示标题', 0, 0, 1378898976, 1510118190, 2),
	(2, 'WEB_SITE_DESCRIPTION', '网站描述', 'China Radio International.CRI.1111', '网站搜索引擎描述', 1, 0, 1378898976, 1472528403, 2),
	(3, 'WEB_SITE_KEYWORD', '网站关键字', 'China Radio', '网站搜索引擎关键字', 8, 0, 1378898976, 1472528403, 2),
	(4, 'WEB_SITE_CLOSE', '网站关闭', '0', '网站关闭', 0, 0, 1379122533, 1379122533, 2),
	(5, 'WEB_SITE_COPYRIGHT', '网站版权', '© China Radio International.CRI. All Rights Reserved.16A Shijingshan Road,Beijing,China.100040', '设置在网站底部', 9, 0, 1378900335, 1472528403, 2),
	(6, 'WEB_SITE_RESOURCES_URL', '上传图片服务器域名（可用二级域名）', 'http://img.yiicms.com/', '域名格式（https://resources.alilinet.com/）', 3, 0, 1379053380, 1516948101, 2),
	(7, 'COLOR_STYLE', '后台色系', 'default_color', '后台颜色风格', 10, 1, 1379122533, 1472528403, 2),
	(8, 'WEB_SITE_ALLOW_UPLOAD_TYPE', '站点允许上传文件类型', 'jpg,rar,png,gif,rar', '只需要填写后缀即可', 1, 1, 1512626843, 1517147572, 2),
	(9, 'OAUTH_QQ', '第三方QQ登录配置项', '{\\r\\n	"client_id": "**********",\\r\\n	"client_secret": "**********",\\r\\n	"redirect_uri": "**********"\\r\\n}', '配置项', 1, 1, 1516869590, 1539942431, 2),
	(10, 'WEB_SITE_AJAX_URL', '网站AJAX请求域名', 'https://www.alilinet.com/', '网站AJAX请求域名', 2, 1, 1516869798, 1516948115, 2),
	(11, 'WEB_SITE_BACKGROUND', '站点头部背景图', '/images/background.jpg', '站点头部背景图', 3, 1, 1516949337, 1516949390, 2),
	(12, 'NETEASE_COOKIE', '网易云音乐cookie', '888888', '网易云音乐cookie', 1, 1, 1527666426, 1539942454, 2),
	(13, 'WEB_SITE_TEL', '服务电话', '0086-13556194195', NULL, 0, 1, 1541401973, 1541401973, 2),
	(14, 'WEB_SITE_MAIL', '服务邮箱', '123456789@qq.com', NULL, 0, 1, 1541401973, 1541401973, 2),
	(15, 'WEB_SITE_ADDRESS', '地址', 'Room 1306, office building, Shuangcheng International Building,', NULL, 0, 1, 1541401973, 1541401973, 2),
	(16, 'WEB_SITE_TITLE', '网站标题', 'عنوان', '网站标题前台显示标题', 0, 0, 1378898976, 1510118190, 3),
	(17, 'WEB_SITE_DESCRIPTION', '网站描述', 'شرح', '网站搜索引擎描述', 1, 0, 1378898976, 1472528403, 3),
	(18, 'WEB_SITE_KEYWORD', '网站关键字', 'کلید واژه ها', '网站搜索引擎关键字', 8, 0, 1378898976, 1472528403, 3),
	(19, 'WEB_SITE_CLOSE', '网站关闭', '0', '网站关闭', 0, 0, 1379122533, 1379122533, 3),
	(20, 'WEB_SITE_COPYRIGHT', '网站版权', '© چین رادیو بین المللی .CRI. همه حقوق محفوظ است.', '设置在网站底部显示', 9, 0, 1378900335, 1472528403, 3),
	(21, 'WEB_SITE_RESOURCES_URL', '上传图片服务器域名（可用二级域名）', 'http://img.yiicms.com/', '域名格式（https://resources.alilinet.com/）', 3, 0, 1379053380, 1516948101, 3),
	(22, 'COLOR_STYLE', '后台色系', 'default_color', '后台颜色风格', 10, 1, 1379122533, 1472528403, 3),
	(23, 'WEB_SITE_ALLOW_UPLOAD_TYPE', '站点允许上传文件类型', 'jpg,rar,png,gif,rar', '只需要填写后缀即可', 1, 1, 1512626843, 1517147572, 3),
	(24, 'OAUTH_QQ', '第三方QQ登录配置项', '{\\r\\n	"client_id": "**********",\\r\\n	"client_secret": "**********",\\r\\n	"redirect_uri": "**********"\\r\\n}', '配置项', 1, 1, 1516869590, 1539942431, 3),
	(25, 'WEB_SITE_AJAX_URL', '网站AJAX请求域名', 'https://www.alilinet.com/', '网站AJAX请求域名', 2, 1, 1516869798, 1516948115, 3),
	(26, 'WEB_SITE_BACKGROUND', '站点头部背景图', '/images/background.jpg', '站点头部背景图', 3, 1, 1516949337, 1516949390, 3),
	(27, 'NETEASE_COOKIE', '网易云音乐cookie', '888888', '网易云音乐cookie', 1, 1, 1527666426, 1539942454, 3),
	(28, 'WEB_SITE_TEL', '服务电话', '0086-13556194195', NULL, 0, 1, 1541401973, 1541401973, 3),
	(29, 'WEB_SITE_MAIL', '服务邮箱', '123456789@qq.com', NULL, 0, 1, 1541401973, 1541401973, 3),
	(30, 'WEB_SITE_ADDRESS', '地址', 'اتاق 1306، ساختمان اداری، ساختمان بین المللی Shuangcheng،', '', 0, 1, 1541401973, 1541401973, 3);
/*!40000 ALTER TABLE `config` ENABLE KEYS */;


-- 导出  表 jx.contact 结构
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name',
  `slug` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Slug',
  `imgUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'imgUrl',
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Description',
  `content` text COLLATE utf8_unicode_ci COMMENT 'Content',
  `sort` int(11) DEFAULT '0' COMMENT 'Sort',
  `status` int(2) DEFAULT '1' COMMENT 'Status：0-UnActive，1-Active',
  `created_at` int(10) DEFAULT NULL COMMENT 'Create Time',
  `updated_at` int(10) DEFAULT NULL COMMENT 'Modify Time',
  `language` int(2) DEFAULT '1' COMMENT 'Language Type',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  jx.contact 的数据：~3 rows (大约)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
REPLACE INTO `contact` (`id`, `name`, `slug`, `imgUrl`, `desc`, `content`, `sort`, `status`, `created_at`, `updated_at`, `language`) VALUES
	(1, '联系我们', '', 'asdf', 'adsf', '联系我们', 0, 1, 1541059561, 1541059561, 1),
	(2, 'Contact Us', '', 'asdf', 'adsf', 'Contact Us', 0, 1, 1541059561, 1541059561, 2),
	(3, 'تماس با ما', '', 'asdf', 'adsf', 'تماس با ما', 0, 1, 1541059561, 1541059788, 3);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;


-- 导出  表 jx.migration 结构
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  jx.migration 的数据：~10 rows (大约)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
REPLACE INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1540867446),
	('m181031_022853_about', 1541409288),
	('m181031_023321_contact', 1541409289),
	('m181031_023437_news', 1541409290),
	('m181031_023752_product', 1541409290),
	('m181031_023851_service', 1541409291),
	('m181031_024006_category', 1541409292),
	('m181101_021024_config', 1541409292),
	('m181101_091445_banner', 1541563130),
	('m181105_090400_user', 1541409293);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- 导出  表 jx.news 结构
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cat_id` int(11) DEFAULT '0' COMMENT 'category Id',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name',
  `slug` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Slug',
  `imgUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'imgUrl',
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Description',
  `content` text COLLATE utf8_unicode_ci COMMENT 'Content',
  `sort` int(11) DEFAULT '0' COMMENT 'Sort',
  `status` int(2) DEFAULT '1' COMMENT 'Status：0-UnActive，1-Active',
  `created_at` int(10) DEFAULT NULL COMMENT 'Create Time',
  `updated_at` int(10) DEFAULT NULL COMMENT 'Modify Time',
  `language` int(2) DEFAULT '1' COMMENT 'Language Type',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  jx.news 的数据：~3 rows (大约)



-- 导出  表 jx.product 结构
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cat_id` int(11) DEFAULT '0' COMMENT 'category Id',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name',
  `slug` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Slug',
  `imgUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'imgUrl',
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Description',
  `content` text COLLATE utf8_unicode_ci COMMENT 'Content',
  `sort` int(11) DEFAULT '0' COMMENT 'Sort',
  `status` int(2) DEFAULT '1' COMMENT 'Status：0-UnActive，1-Active',
  `created_at` int(10) DEFAULT NULL COMMENT 'Create Time',
  `updated_at` int(10) DEFAULT NULL COMMENT 'Modify Time',
  `language` int(2) DEFAULT '1' COMMENT 'Language Type',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  jx.product 的数据：~13 rows (大约)



-- 导出  表 jx.service 结构
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cat_id` int(11) DEFAULT '0' COMMENT 'category Id',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Name',
  `slug` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Slug',
  `imgUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'imgUrl',
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Description',
  `content` text COLLATE utf8_unicode_ci COMMENT 'Content',
  `sort` int(11) DEFAULT '0' COMMENT 'Sort',
  `status` int(2) DEFAULT '1' COMMENT 'Status：0-UnActive，1-Active',
  `created_at` int(10) DEFAULT NULL COMMENT 'Create Time',
  `updated_at` int(10) DEFAULT NULL COMMENT 'Modify Time',
  `language` int(2) DEFAULT '1' COMMENT 'Language Type',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  jx.service 的数据：~3 rows (大约)



-- 导出  表 jx.user 结构
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  jx.user 的数据：~1 rows (大约)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'b7zsDPtKfK6YwgDQhuQhkVUNwHXUvHEg', '$2y$13$QWNFR3q4TEqd2CwMRjSBB.ZXt1R0ni.juZTlwJREsaKRf0LjtTexS', 'qaqMQXz5ef7f6APucSYZ9V151HNW8O7t_1527576370', 'kevin0217@126.com', 10, 1541409293, 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

