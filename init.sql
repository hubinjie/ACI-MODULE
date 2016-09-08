# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Database: baci
# Generation Time: 2016-09-07 03:20:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table t_aci_admanage
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_aci_admanage`;

CREATE TABLE `t_aci_admanage` (
  `admanage_name` varchar(250) DEFAULT NULL COMMENT '广告名称',
  `position` varchar(250) DEFAULT NULL COMMENT '位置',
  `pic` varchar(250) DEFAULT NULL COMMENT '图片',
  `link` varchar(50) DEFAULT NULL COMMENT '链接',
  `target` varchar(250) DEFAULT NULL COMMENT '打开方式',
  `begin_date` date DEFAULT NULL COMMENT '开始时间',
  `end_date` date DEFAULT NULL COMMENT '结束时间',
  `created` varchar(50) DEFAULT NULL COMMENT '创建时间',
  `click` int(11) DEFAULT '0' COMMENT '点击次数',
  `admanage_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`admanage_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table t_aci_bookrent
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_aci_bookrent`;

CREATE TABLE `t_aci_bookrent` (
  `bookrent_status` varchar(250) DEFAULT NULL COMMENT '状态',
  `bookrent_datetime` varchar(50) DEFAULT NULL COMMENT '借阅时间',
  `book_id` varchar(50) DEFAULT NULL COMMENT '图书',
  `user_id` varchar(50) DEFAULT NULL COMMENT '借阅人',
  `bookrent_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`bookrent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table t_sys_article_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_article_menu`;

CREATE TABLE `t_sys_article_menu` (
  `menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_type` varchar(50) DEFAULT NULL,
  `menu_name` varchar(50) DEFAULT NULL,
  `menu_url` varchar(50) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `sort_order` smallint(6) DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `callback_id` int(10) NOT NULL DEFAULT '0',
  `template` varchar(50) DEFAULT NULL,
  `menu_desc` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `t_sys_article_menu` WRITE;
/*!40000 ALTER TABLE `t_sys_article_menu` DISABLE KEYS */;

INSERT INTO `t_sys_article_menu` (`menu_id`, `menu_type`, `menu_name`, `menu_url`, `modified`, `sort_order`, `menu_parent_id`, `user_id`, `callback_id`, `template`, `menu_desc`)
VALUES
	(19,'list','视频教程','video','2015-11-21 11:44:57',25,0,0,0,'template_list',''),
	(20,'list','功能文档','docs','2015-10-26 23:34:41',20,0,0,0,'template_list','');

/*!40000 ALTER TABLE `t_sys_article_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_sys_article_page
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_article_page`;

CREATE TABLE `t_sys_article_page` (
  `page_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `keywords` varchar(250) NOT NULL DEFAULT '',
  `description` varchar(250) DEFAULT '',
  `created` datetime DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `author` varchar(50) DEFAULT NULL,
  `more_url` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `template_id` int(10) DEFAULT '1',
  `content` text,
  `updated` datetime DEFAULT NULL,
  `type_id` smallint(6) DEFAULT '1',
  `hits` int(11) DEFAULT '0',
  `menu_id` int(11) DEFAULT '0',
  `position_id` varchar(50) DEFAULT '',
  `thumb_media_id` varchar(50) DEFAULT NULL,
  `media_id` varchar(50) DEFAULT NULL,
  `is_home` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `t_sys_article_page` WRITE;
/*!40000 ALTER TABLE `t_sys_article_page` DISABLE KEYS */;

INSERT INTO `t_sys_article_page` (`page_id`, `title`, `keywords`, `description`, `created`, `thumb`, `user_id`, `author`, `more_url`, `source`, `template_id`, `content`, `updated`, `type_id`, `hits`, `menu_id`, `position_id`, `thumb_media_id`, `media_id`, `is_home`)
VALUES
	(7,'如何手动配置ACI模块','ACI模块','如何手动配置ACI模块','2015-10-29 08:45:02','',NULL,'','','',0,'<p>本例创建一个叫Demo的模块<br />\n<br />\n1. 本例需要事先创建一个叫t_sys_demo表<br />\n<br />\nCREATE TABLE `t_sys_demo` (<br />\n&nbsp; `id` int(11) unsigned NOT NULL AUTO_INCREMENT,<br />\n&nbsp; `name` varchar(50) DEFAULT NULL,<br />\n&nbsp; PRIMARY KEY (`id`)<br />\n) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;<br />\n<br />\n<br />\n2 . 首先在application\\controllers\\adminpanel创建Demo.php，如下图<br />\n<img alt=\"\" src=\"/uploadfile/article/201510290727005672.gif\" style=\"width: 810px; height: 331px;\" /><br />\n内容如下：<br />\n<br />\n<code><!--?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');\n/*\n*	这是一个演示模块\n*/\nclass Demo extends Admin_Controller {\n	\n	function __construct()\n	{\n		parent::__construct();\n		//请在这里初始化模块相关设置\n\n		$this---></code><!--?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');<br /--> /*<br />\n*&nbsp;&nbsp; &nbsp;这是一个演示模块<br />\n*/<br />\nclass Demo extends Admin_Controller {<br />\n&nbsp;&nbsp; &nbsp;<br />\n&nbsp;&nbsp; &nbsp;function __construct()<br />\n&nbsp;&nbsp; &nbsp;{<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;parent::__construct();<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;//请在这里初始化模块相关设置<br />\n<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$this-&gt;load-&gt;model(array(&#39;Demo_model&#39;));#这里加载Demo模型，稍修建立，如果不需要用到数据库，请注释掉这行<br />\n&nbsp;&nbsp; &nbsp;}<br />\n<br />\n&nbsp;&nbsp; &nbsp;/*<br />\n&nbsp;&nbsp; &nbsp;* 这里是默认的首页，访问<br />\n&nbsp;&nbsp; &nbsp;*/<br />\n&nbsp;&nbsp; &nbsp;function index(){<br />\n<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$hello = &quot;你好&quot;;<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$from_table_rows&nbsp; = $this-&gt;Demo_model-&gt;select();<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $from_model_rows = $this-&gt;Demo_model-&gt;rows();<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$this-&gt;view(&#39;index&#39;,array(&#39;require_js&#39;=&gt;true,&#39;hello&#39;=&gt;&#39;你好&#39;,&#39;from_table_rows&#39;=&gt;$from_table_rows,&#39;from_model_rows&#39;=&gt;$from_model_rows));#这里是加载默认对应视图， 并传值系统默认参数require_js即开启requrie js<br />\n<br />\n&nbsp;&nbsp; &nbsp;}<br />\n}<br />\n<br />\n3. 在application\\models\\创建Demo_model.php 如下图<br />\n<br />\n<img alt=\"\" src=\"/uploadfile/article/201510290810137962.gif\" style=\"width: 603px; height: 361px;\" /><br />\n<br />\n内容如下：<br />\n<!--?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');<br /--> class Demo_model extends Base_Model {<br />\n&nbsp;&nbsp; &nbsp;public function __construct() {<br />\n<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;//$this-&gt;db_tablepre = &#39;你的表前缀&#39;; 不设置默认为t_sys_<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;$this-&gt;table_name = &#39;demo&#39;;<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;parent::__construct();<br />\n&nbsp;&nbsp; &nbsp;}<br />\n<br />\n&nbsp;&nbsp; &nbsp;/*<br />\n&nbsp;&nbsp; &nbsp;*&nbsp;&nbsp; &nbsp;这是一个演示模型方法<br />\n&nbsp;&nbsp; &nbsp;*/<br />\n&nbsp;&nbsp;&nbsp; public function rows(){<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;return array(<br />\n<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;array(&#39;name&#39;=&gt;&#39;这&#39;),<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;array(&#39;name&#39;=&gt;&#39;是&#39;),<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;array(&#39;name&#39;=&gt;&#39;一&#39;),<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;array(&#39;name&#39;=&gt;&#39;个&#39;),<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;array(&#39;name&#39;=&gt;&#39;演&#39;),<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;array(&#39;name&#39;=&gt;&#39;示&#39;)，<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;array(&#39;name&#39;=&gt;&#39;模&#39;)，<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;array(&#39;name&#39;=&gt;&#39;块&#39;)<br />\n<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;);<br />\n&nbsp;&nbsp; &nbsp;}<br />\n}<br />\n<br />\n4. 在application\\views\\adminpanel创建Demo文件夹，并创建index.php<br />\n<img alt=\"\" src=\"/uploadfile/article/201510290814092416.gif\" class=\"img-responsive\" /><br />\n内容如下：<br />\n<code>&lt;h1&gt;&lt;?php echo $hello?&gt;:这是一个演示模块&lt;/h1&gt;<br />\n&lt;?php if($from_table_rows):?&gt;<br />\n&nbsp;&nbsp; &nbsp;&lt;h2&gt;以下内容来源于数据库&lt;/h2&gt;<br />\n&lt;?php foreach($from_table_rows as $k=&gt;$v):?&gt;<br />\n&nbsp;&nbsp; &nbsp;&lt;p&gt;&lt;?php echo $v[&#39;name&#39;]?&gt;&lt;/p&gt;<br />\n&nbsp;&nbsp; &nbsp;&lt;?php endforeach;?&gt;<br />\n&lt;?php endif;?&gt;<br />\n<br />\n&lt;?php if($from_model_rows):?&gt;<br />\n&nbsp;&nbsp; &nbsp;&lt;h2&gt;以下内容来源于MODEL初始化函数&lt;/h2&gt;<br />\n&lt;?php foreach($from_model_rows as $k=&gt;$v):?&gt;<br />\n&nbsp;&nbsp; &nbsp;&lt;p&gt;&lt;?php echo $v[&#39;name&#39;]?&gt;&lt;/p&gt;<br />\n&nbsp;&nbsp; &nbsp;&lt;?php endforeach;?&gt;<br />\n&lt;?php endif;?&gt; </code> &nbsp;<br />\n&nbsp;</p>\n\n<div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\">5. 最后把模块注册一下。打开config/aci.php<br />\n<img alt=\"\" src=\"/uploadfile/article/201510290828294917.gif\" style=\"width: 601px; height: 364px;\" /><br />\n内容如下：<br />\n<img alt=\"\" src=\"/uploadfile/article/201510290828463692.gif\" class=\"img-responsive\"/><br />\n<br />\n<strong>至此模块创建完成。</strong><br />\n<br />\n<br />\n转入到栏目管理》模块管理中<br />\n<br />\n<img alt=\"\" src=\"/uploadfile/article/201510290831345489.gif\" class=\"img-responsive\" /><br />\n<br />\n<br />\n然后在菜单中创建一下模块如下图：<br />\n<img alt=\"\" src=\"/uploadfile/article/201510290833515921.gif\" class=\"img-responsive\" /><br />\n<img alt=\"\" src=\"/uploadfile/article/201510290834013674.gif\" class=\"img-responsive\" /><br />\n<br />\n然后转扩展模块，找到演示DEMO模块吧<br />\n<img alt=\"\" src=\"/uploadfile/article/201510290844137138.gif\" class=\"img-responsive\" /><br />\n<br />\n同时也可以给模块设置权限<br />\n&nbsp;</div>\n','2015-10-29 08:45:02',1,1689,20,'',NULL,NULL,0),
	(8,'如何安装ACI后台管理程序','ACI','ACI安装说明','2015-11-01 09:22:33','',1,'','','',1,'视频讲解如何安装ACI后台管理程序<br />\r\n<br />\r\n<embed align=\"middle\" allowfullscreen=\"true\" allowscriptaccess=\"always\" height=\"500\" quality=\"high\" src=\"http://player.youku.com/player.php/sid/XMTM3NDI0Njk2MA==/v.swf\" type=\"application/x-shockwave-flash\" width=\"100%\"></embed>','2015-11-01 09:22:33',1,1292,20,'',NULL,NULL,0),
	(9,'ACI模块生成器之PHP毕业程序设计——图书管理系统（一）','ACI 图书管理系统 毕业设计 PHP','如何用ACI模块生成器结合ACI来编写图书管理系统','2015-11-06 17:07:20','',1,'胡子锅','','ACI',0,'如何用ACI模块生成器结合ACI来编写图书管理系统？<br />\r\n<img alt=\"ACI图书管理系统\" src=\"/uploadfile/article/201511060504354731.jpg\" style=\"width: 846px; height: 506px;\" /><br />\r\n结合ACI框架，ACI本身自带用户管理，修改密码，用户组管理，权限管理，上例中的图书管理，实际上我们已经解决了一半的工作量了。如何通过ACI模块生成器编写图书管理系统，请参见原创视频<br />\r\n<br />\r\n&nbsp;<embed align=\"middle\" allowfullscreen=\"true\" allowscriptaccess=\"always\" height=\"400\" quality=\"high\" src=\"http://player.youku.com/player.php/sid/XMTM3ODU5OTEyMA==/v.swf\" type=\"application/x-shockwave-flash\" width=\"480\"></embed>\r\n\r\n<div id=\"xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd\">&nbsp;</div>','2015-11-06 17:07:20',1,1499,20,'',NULL,NULL,0),
	(10,'ACI更新至1.2.0','ACI升级','ACI升级至1.2.0','2015-11-27 22:33:21','',1,'','','',0,'更新至1.2.0<br />\r\n<br />\r\n1.丢弃了ACI自带的模板语言功能，<br />\r\n2.改用CI3自带的模板解析功能 ，<br />\r\n3.解决了5.5.7，5.5.9 语法过时功能<br />\r\n4.支持SEO从SEO配置文件中读出','2015-11-27 22:33:21',1,913,20,'',NULL,NULL,0),
	(11,'跟青蛙学PHP-快速入门实例学习ACI （一）','PHP,ACI,PHP 教程,codeigniter教程','跟我学PHP-快速入门实例学习ACI（一）','2016-03-01 20:04:54','',1,'青蛙','','http://user.qzone.qq.com/292885666/2?t=0.3012985907679395',0,'<div style=\"text-align: center;\">&nbsp;&nbsp; 作者 @青蛙 QQ ：292885666</div>\r\n<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;首先我们先了解一下ACI。<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;ACI是利用CodeIgniter（CI）开发的一个通用管理后台。其目的是为了减少程序员重复 开发。 CodeIgniter（CI）是一个小巧但功能强大的 PHP 框架，作为一个简单而&ldquo;优雅&rdquo;的工具包，它可以为开发者们建立功能完善的 Web 应用程序。<br />\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;所以ACI 也秉承了CI的优点。<br />\r\n&nbsp;&nbsp;&nbsp; ACI能做什么？说简单点，就是ACI是一个管理后台的半成品，包含了用户组、权限分配的功能，省却了程序员自行开发管理后台的步骤。但是ACI不仅仅是一个半成品的管理后台，他还使用自动生成模块的功能，减少程序员开发的繁复过程。<br />\r\n&nbsp;&nbsp;&nbsp; 百闻不如一见，我现在就用ACI来开发一个简单的新闻发布系统，通过这个简单的系统，大家会对ACI及CI有更进一步的了解。</span><br />\r\n<span><span style=\"font-weight:bold\">A、安装</span></span><br />\r\n<span>&nbsp; &nbsp; 下载地址：</span><span>github（这个网址竟然是敏感词！草木皆兵）</span><span>.com/hubinjie/ACI</span><br />\r\n<span>&nbsp;</span><span>&nbsp;&nbsp; 下载解压后，文件名是：ACI-master 。但是你不要把这个作为你的子目录，因为<span style=\"color:rgb(255, 0, 0)\">无论CI，还是ACI，对于带 - 号的目录处理都不是那么好</span>，容易出现错误，所以我把它改成aci，放在站点目录下。</span><br />\r\n<span>&nbsp;&nbsp;&nbsp; 本地调试环境，我使用upupw php5.4 + apache，下*载*地*址：/www.upupw.net/aphp54/n109.html</span><br />\r\n<span><img alt=\"图片\" data-img-idx=\"0\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/L5uG99Hvbu0Ty57UcI7avv3S7SryU*7EhMtoQd*dp4M!/o/dP8AAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=lAL6AZQC.gEDCC0!&amp;su=1169691041&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603010800372196.png\" style=\"width: 660px; height: 506px;\" /></span><br />\r\n<br />\r\n<span>选择s1，开启全部服务。<br />\r\n如果有迅雷、skype开启，记得先关闭。<br />\r\n<br />\r\nB、进入数据库，修改root密码：<a href=\"http://127.0.0.1/pmd%A0\" target=\"_blank\">http://127.0.0.1/pmd&nbsp;</a>;。默认用户名 root 密码 root<br />\r\n新建aci数据库（排序规则：</span><span><dfn title=\"Unicode (多语言), 不区分大小写\">utf8_general_ci<span style=\"font-style:normal\">）<br />\r\n点击新建的aci数据库，点击导入，找到ACI-master目录下的&nbsp;安装SQL.sql，执行导入。</span><br />\r\n<br />\r\n&nbsp;</dfn>C、将解压的</span><span>ACI-master改为aci，然后移动到upupw的htdocs里。<br />\r\n<img alt=\"图片\" data-img-idx=\"1\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/Byc6cSUr5lpVPcP9kiCOvaViZSxbRDG6pAx*FGTZYnk!/o/dKkAAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=gAEXAYABFwEDACU!&amp;su=131770337&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603010800447281.png\" style=\"width: 384px; height: 279px;\" /><br />\r\n<br />\r\nD、&nbsp;打开aci下的.htaccess，修改第3行：<br />\r\n&nbsp;</span><span style=\"font-weight:bold\">RewriteBase</span><span style=\"font-weight:bold\">&nbsp;</span><span style=\"font-weight:bold\">/</span><span>&nbsp;&nbsp;&nbsp; 为&nbsp;</span><br />\r\n<span style=\"font-weight:bold\">RewriteBase</span><span style=\"font-weight:bold\">&nbsp;</span><span style=\"font-weight:bold\">/</span><span><span style=\"font-weight:bold\">aci</span><span style=\"font-weight:bold\">/&nbsp;&nbsp;</span></span><br />\r\n<span><span style=\"font-weight:bold\"><span style=\"color:rgb(255, 0, 0)\">（注意：aci后带/）</span><br />\r\n<br />\r\n<span style=\"font-weight:normal\">E、</span></span></span><span>找到 application/config/config.php</span><br />\r\n<span><span style=\"font-weight:bold\"><span style=\"font-weight:normal\">将第20行</span></span></span><span style=\"color:rgb(102, 0, 0)\">$config</span><span>[</span><span style=\"color:rgb(0, 128, 0);font-weight:bold\">&#39;base_url&#39;</span><span>] =&nbsp;</span><span style=\"color:rgb(0, 128, 0);font-weight:bold\">&#39;<a href=\"http://localhost/\" target=\"_blank\">http://localhost/</a>&#39;</span><span>;</span><span style=\"color:rgb(128, 128, 128);font-style:italic\">#初始安装，请在这里修改</span><span><span style=\"font-weight:bold\">&nbsp;<br />\r\n改为&nbsp;</span></span><span><span style=\"font-weight:bold\"><span style=\"color:rgb(102, 0, 0)\">$config</span>[<span style=\"color:rgb(0, 128, 0)\">&#39;base_url&#39;</span>] =&nbsp;<span style=\"color:rgb(0, 128, 0)\">&#39;<a href=\"http://localhost/aci\" target=\"_blank\">http://localhost/aci</a>&#39;</span></span></span><br />\r\n<span><span style=\"font-weight:bold\"><span style=\"color:rgb(255, 0, 0)\">（aci后没有/）</span><br />\r\n<span style=\"font-weight:normal\">F、</span>&nbsp;</span></span><span>找到 application/config/database.php</span><span>中第76行，将数据库相关参数修改。其中数据库名，我暂定为aci。你可以根据自己的需求来修改。<br />\r\n<br />\r\nG、</span><span>找到 application/config/constant.php中第40行。将define(&#39;SITE_URL&#39;, &#39;/&#39;);改为</span><br />\r\n<span>define(&#39;SITE_URL&#39;, &#39;/aci/&#39;);&nbsp;</span><br />\r\n<span style=\"color:rgb(255, 0, 0)\">（注意：aci后带/）</span><br />\r\n<br />\r\n<span>H、</span><span>找到 application/config/aci.php中第4行，改为：</span><span style=\"color:rgb(0, 128, 0);font-weight:bold\">&#39;installED&#39;&nbsp;</span><span>=&gt;&nbsp;</span><span style=\"color:rgb(0, 0, 128);font-weight:bold\">true</span><span>,<br />\r\n<br />\r\n打开<a href=\"http://localhost/aci/%C2%A0\" target=\"_blank\">http://localhost/aci/&nbsp;</a>;;;，应该就可以看到后台管理系统界面。<br />\r\n<br />\r\n在ACI安装的过程中，常见的错误有以下几种：<br />\r\n1、点击某一个栏目，出现404错误。出现这个错误，一般是路径配置不对，还有就是子目录中包含&ldquo;-&rdquo;这个符号。按照步骤修改即可。<br />\r\n<br />\r\n2、点击登录没有反应，也没有报错。这有可能是json不支持，或者php版本太低，用5.3及以上的版本即可。<br />\r\n<br />\r\n3、点击登录直接报错，找不到页面。可以查看一下自己的apache是否打开了rewrite模块。<br />\r\n<br />\r\n其他的错误，我会慢慢的更新，以方便大家查询。</span><br />\r\n<span>&nbsp;</span><span>&nbsp;</span><br />\r\n<br />\r\n&nbsp;','2016-03-01 20:04:54',1,1124,20,'',NULL,NULL,0),
	(12,'跟青蛙学PHP-快速入门实例学习ACI（二）','ACI,Codeigniter, PHP, PHP教程, 用户组的权限管理、用户的资料','跟我学PHP-快速入门实例学习ACI（二）','2016-03-01 20:04:18','',1,'青蛙','','http://user.qzone.qq.com/292885666/2?t=0.917344584227004',0,'<div style=\"text-align: center;\">\r\n<div style=\"text-align: center;\">&nbsp;&nbsp; 作者 @青蛙 QQ ：292885666</div>\r\n\r\n<div style=\"text-align: left;\">\r\n<div data-webp-ctx-e=\"1\" id=\"blogDetailDiv\" style=\"font-size: 14px; color: rgb(0, 0, 0);\">\r\n<div class=\"blog_details_20120222\">\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp; 在上一篇中，我们已经安装好aci了。让我们进入aci的管理后台一探究竟吧。<br />\r\n&nbsp;&nbsp;&nbsp; 进入后台管理，我们会发现，其实ACI的核心功能就是用户组的权限管理、用户的资料管理这两部分。其余模块之类的，都是配置上的功能，在这里我就不多讲了，上两张图大家就明白了。<br />\r\n<br />\r\n<img alt=\"图片\" data-img-idx=\"0\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/yn1ZLsf9eW7PIyGaMBcQ9UDt4gegEzzRN.l2tkf3hTc!/o/dKcAAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=EQOtAREDrQEDACU!&amp;su=1159858801&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603010803468934.png\" style=\"width: 785px; height: 429px;\" /><br />\r\n<br />\r\n<img alt=\"图片\" data-img-idx=\"1\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/ZuYAcPladDA13uCH.7YnTg5Q3e1FjMvU7BZcxhJtqBc!/o/dKIAAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=hAQOAoQEDgIDACU!&amp;su=1243766657&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603010803545786.png\" style=\"width: 1156px; height: 526px;\" /><br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; 我们的这次的任务就是给ACI的骨架里填充内容，达到制作一个简单的新闻发布系统的目的。<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; A、新闻系统分析<br />\r\n&nbsp;&nbsp;&nbsp; 前端：<br />\r\n&nbsp;&nbsp;&nbsp; 可以显示一级栏目、二级栏目。。。<br />\r\n&nbsp;&nbsp;&nbsp; 可以显示新闻列表。<br />\r\n&nbsp;&nbsp;&nbsp; 点击新闻标题，可以显示新闻内容。<br />\r\n&nbsp;&nbsp;&nbsp; 后端：<br />\r\n&nbsp;&nbsp;&nbsp; 可以对栏目进行增删改<br />\r\n&nbsp;&nbsp;&nbsp; 可以在栏目下添加新闻<br />\r\n&nbsp;&nbsp;&nbsp; 发布新闻的作者可以修改、删除自己所发布的新闻，管理员对所有新闻和栏目都有增删改的权限。<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; B、新闻系统业务规划（功能归纳）<br />\r\n&nbsp;&nbsp;&nbsp; 1、栏目标题应该是有两种，一种是栏目底下没有新闻的，只有下一级栏目，另外一种是栏目下是新闻，相当于最终的栏目。<br />\r\n&nbsp;&nbsp;&nbsp; 2、添加新闻的使用，最好用现成的editor组件。<br />\r\n&nbsp;&nbsp;&nbsp; 3、有新闻的栏目不能删除。<br />\r\n&nbsp;&nbsp;&nbsp; 4、新闻要有发布日期和修改日期。<br />\r\n&nbsp;&nbsp;&nbsp; 5、要有关键词、标签两个字段。<br />\r\n&nbsp;&nbsp;&nbsp; 6、上传的图片要按照日期的文件夹存放。<br />\r\n&nbsp;&nbsp;&nbsp; 7、需要自动缩放文章中的图片。<br />\r\n&nbsp;&nbsp;&nbsp; 8、新闻发布要有审核，但是用户的类别中设定新闻发布不需要审核的，该新闻就不用审核。<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; C、根据业务来设计业务逻辑及数据库<br />\r\n&nbsp;&nbsp;&nbsp; 因为aci的模块中，已经集成了列表、添加、修改、删除。所以我们只要增加一个新闻审核，新增一个用户组（发布新闻需要审核的新闻组）<br />\r\n&nbsp;&nbsp;&nbsp; 数据库我们采用比较简单直观的方法来设计，就设计两个表。<br />\r\n&nbsp;&nbsp;&nbsp; 栏目表：<br />\r\n&nbsp;&nbsp;&nbsp; 栏目ID 栏目名称 是否根栏目 根栏目ID 栏目下文章数量 是否显示<br />\r\n&nbsp;&nbsp;&nbsp; 新闻表：<br />\r\n&nbsp;&nbsp;&nbsp; 新闻ID 栏目ID 标题 短标题 简介 作者 发布日期 最后修改日期&nbsp; 标签 关键词 新闻内容 审核状态 发布人员ID 发布人员姓名 浏览次数<br />\r\n&nbsp;&nbsp;&nbsp; 当然，这只是一个小型的新闻系统，如果是大型的新闻系统，就需要考虑静态化的问题。<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp; ACI自动生成模块系统，能够完成大部分繁复的工作，所以我们下一篇就需要利用ACI的自动生成模块来把基本的功能模块做好。<br />\r\n&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>','2016-03-01 20:04:18',1,838,20,'',NULL,NULL,0),
	(13,'跟青蛙学PHP-快速入门实例学习ACI （三）','PHP 自动生成权限，自动生成模块','跟青蛙学PHP-快速入门实例学习ACI （三）','2016-03-01 20:08:17','',1,'青蛙','','http://user.qzone.qq.com/292885666/2?t=0.917344584227004',0,'<div style=\"text-align: center;\">&nbsp;&nbsp; 作者 @青蛙 QQ ：292885666<br />\r\n&nbsp;</div>\r\n&nbsp;&nbsp;&nbsp; 有了ACI在线生成模块功能，做数据库操作模块方便的设计就很轻松了。<br />\r\n&nbsp;&nbsp;&nbsp; 首先在<a href=\"http://www.autocodeigniter.com/\" target=\"_blank\">http://www.autocodeigniter.com/</a>注册，登录后，点击模块，进行生成模块的操作。<br />\r\n&nbsp;&nbsp;&nbsp; 模块中文名：显示在菜单上的名字<br />\r\n&nbsp;&nbsp;&nbsp; 控制器英文名：不要有-号，首字母要大写。<br />\r\n&nbsp;&nbsp;&nbsp; 方法列表：一般建议都选上，反正我们后面还可以改。<br />\r\n&nbsp;&nbsp;&nbsp; js验证文件：如果选择同HTML页面，则js文件在那里？（这里我没有测试），选择单独JS文件，则js文件会放在/aci/script/目录下<br />\r\n&nbsp;&nbsp;&nbsp; 模块安装路径：这个一般不改，我尝试改过一次，但是没有成功执行，就用默认了。<br />\r\n&nbsp;&nbsp;&nbsp; 分页大小：这个是指内容列表是以多少条记录为一页。<br />\r\n&nbsp;&nbsp;&nbsp; 数据库表名字段：我选择强制小写。<br />\r\n&nbsp;&nbsp;&nbsp; 着重有两个地方需要详细解释：<br />\r\n&nbsp;&nbsp;&nbsp; 继承控制器：<br />\r\n&nbsp;&nbsp;&nbsp; Front_Controller 主要用于访客<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;Member_Controller 主要用于会员登录后（如果不想和管理端放在一起可以考虑这个）<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;Admin_Controller 主要用于管理员端<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;API_Controller 主要用于API接口，对接APP<br />\r\n&nbsp;&nbsp;&nbsp; 很明显，我们的新闻发布是需要用管理员端。<br />\r\n&nbsp;&nbsp;&nbsp; 图标：<br />\r\n&nbsp;&nbsp;&nbsp; 点击请输入fontawesome 图标CSS，到Font Awesome网站，选择你中意的模块图标文字，我选择：<a target=\"_blank\"> file-archive-o 。这样生成的模块就会有这个图标。</a><br />\r\n&nbsp;&nbsp;&nbsp;<br />\r\n<img alt=\"图片\" data-img-idx=\"0\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/57SOn3sGKN*F2*yhvlcO*8cjjp3cu.IRcybGYKO3DmE!/o/dKoAAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=2AK3AdgCtwEDACU!&amp;su=169990913&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603010807357213.png\" style=\"width: 728px; height: 439px;\" /><br />\r\n<br />\r\n<img alt=\"图片\" data-img-idx=\"1\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/xp1kheQC3kOv*tLAks4QSJF2oQS30LGfQZdSUGtuDdQ!/o/dP0AAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=uAKCAbgCggEDACU!&amp;su=1111301393&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603010807499546.png\" style=\"width: 696px; height: 386px;\" /><br />\r\n<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; 接下来是设置数据字段信息，我们先设置栏目的数据表，因为新闻的某个字段需要用到栏目的数据表内容。<br />\r\n&nbsp;&nbsp;&nbsp; 数据表的设计相对来说简单，所以等一会生成sql的时候，我们需要做一些改进。<br />\r\n&nbsp;&nbsp;&nbsp; 是否根目录，默认否，根ID，默认0 文章数量 默认0 是否可见，默认 1 （0 否、1是）<br />\r\n&nbsp;<img alt=\"图片\" data-img-idx=\"2\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/ZKGOcdvuBkNJ4E6U.nULV*XaqamXpUToxXxwLW3PceI!/o/dAIBAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=0wOuAdMDrgEDACU!&amp;su=19202641&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603010807574578.png\" style=\"width: 979px; height: 430px;\" /><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp; 在设置字段扩展时间中，我们可以设计数据表中的哪些字段是在<span style=\"font-weight:bold;color:rgb(255, 0, 0)\">后台界面</span>上的必填项<span style=\"font-weight:bold;color:rgb(0, 0, 0)\">，<span style=\"font-weight:normal\">哪些</span><span style=\"font-weight:normal\">字段参与排序，哪些字段可以被搜索，哪些字段可以在列表页中显示。</span></span><br />\r\n<br />\r\n<img alt=\"图片\" data-img-idx=\"3\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/6sqpVeDRZCAHoa0T5TndrOiw3KGh54MaHCG1F9MNSCw!/o/dAABAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=.gP2AfoD9gEDACU!&amp;su=199938897&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603010808051273.png\" style=\"width: 1018px; height: 502px;\" /><br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; 注意：重要的一步来了，我们的栏目是可以让新闻发布人员选择的。所在我们需要做通用数据源的设计。<br />\r\n&nbsp;&nbsp;&nbsp; 点击保存所有设置后，模块已经生成好了，我就不截图了，在模块里，有一项：&ldquo;通用数据源&rdquo;，点击它，设计通用数据源，以供新闻添加使用。<br />\r\n&nbsp;&nbsp;&nbsp; 数据选择器管理&mdash;&mdash;右上角点添加<br />\r\n<span>&nbsp;&nbsp;&nbsp; 出现四个选项：<br />\r\n下拉框单选数据选择器<br />\r\n弹窗式单选数据选择器<br />\r\n下拉框多选数据选择器<br />\r\n弹窗式多选数据选择器<br />\r\n&nbsp;&nbsp;&nbsp; 因为栏目一般不会很多，并且同一篇文章不会归属到多个栏目中，所以我们选择下拉框单选数据选择器。<br />\r\n&nbsp;&nbsp;&nbsp; 点击进入后，数据表newstype的字段全部列出来了。我们添加新闻的时候，一般要选择栏目名称，数据库中存的是栏目ID。所以我们把 newstype_id作为选中值，栏目名称_name作为转换显示值（在列表、编辑的时候，显示name，数据库中存的是ID）。<br />\r\n显示选项连接符是什么意思呢?就是在列表显示中，如果显示： ID-栏目名称-是否根，其中-就是选项连接符。不填写就是空格。<br />\r\n<img alt=\"图片\" data-img-idx=\"4\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/L0G5CZo0lGvqQRyAarfZWZOiwFcscsKayDYcIlPRx4Q!/o/dAIBAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=.AO0AfgDtAEDACU!&amp;su=160971025&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603010808137589.png\" style=\"width: 1016px; height: 436px;\" /><br />\r\n<br />\r\n设计好以后，点击保存备用。<br />\r\n在下一篇我们开始设计新闻表。设计新闻表我就不一步一步掩饰，我会把重要的字段设计单独列出来讲述。</span>','2016-03-01 20:08:17',1,987,20,'',NULL,NULL,0),
	(14,'ACI操作数据表方法之查询（一）','ACI ,MODEL ，SELECT， 分页, PHP，CODEIGNITER','ACI操作数据表方法之查询（一）','2016-03-03 19:29:04','',1,'胡子锅','','',0,'<strong>ACI 操作数据库方法</strong><br />\r\n<br />\r\n请事先在Controller中 __construct 加载你的model ，例如：<br />\r\n<br />\r\n如果只有一个可以这样写<br />\r\n$this-&gt;load-&gt;model(&lsquo;Table1_model&rsquo;);<br />\r\n<br />\r\n如果有多个可以这样写<br />\r\n$this-&gt;load-&gt;model(array(&lsquo;Table1_model&rsquo;,&rsquo;Table2_model&rsquo;,&rsquo;Table3_model&rsquo;));<br />\r\n<br />\r\n接下面就是实战方法，参讲讲WHERE 参数，操作数据库都会用到 where<br />\r\n<br />\r\n&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br />\r\n<br />\r\n<br />\r\n$where = &quot;id = 1 and user_id = 2&quot;;//你的条件<br />\r\n<br />\r\n以上参数还可以这样玩<br />\r\n$where =&nbsp; array(&quot;id&quot;=&gt;1); //== &#39;id = 1&#39;<br />\r\n$where =&nbsp; array(&quot;id&quot;=&gt;1,&#39;user_id&#39;=&gt;2); //== &#39;id = 1 and user_id = 2&#39;;<br />\r\n<br />\r\n还支持<br />\r\n$where =&nbsp; array(&quot;id &gt;&quot;=&gt;1);// == &#39;id &gt; 1&#39;;<br />\r\n$where =&nbsp; array(&quot;id &lt;&gt;&quot;=&gt;1);// == &#39;id &lt;&gt; 1&#39;;<br />\r\n$where =&nbsp; array(&quot;id &lt;=&quot;=&gt;1);// == &#39;id &lt;= 1&#39;;<br />\r\n$where =&nbsp; array(&quot;id ^1&quot;=&gt;1);// == &#39;id ^ 1&#39;;<br />\r\n$where =&nbsp; array(&quot;id +=&quot;=&gt;2);// == &#39;id += 2&#39;;<br />\r\n$where =&nbsp; array(&quot;id -=&quot;=&gt;2);// == &#39;id -= 2&#39;;<br />\r\n$where =&nbsp; array(&quot;id in(&quot;=&gt;&quot;1,2,3&quot;);// == &#39;id in (1,2,3)&#39;;<br />\r\n<br />\r\n同时也可以这样写<br />\r\n$where[&quot;id&quot;] = 1;<br />\r\n$where[&quot;user_id&quot;] = 2;<br />\r\n<br />\r\n相当于是 // == &quot;id = 1 and user_id = 2&quot;;<br />\r\n<br />\r\n注意以上都是and关联，如果你想用or，可以这样<br />\r\n$where = &quot;id &gt; 0 or user_id &gt;= 0&quot;;//直接输入SQL一样的<br />\r\n&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br />\r\n<br />\r\n$where = &quot;id = 1&quot;;//你要查询的条件<br />\r\n$field = &quot;*&quot;;//你要显示的字段<br />\r\n$orderby = &quot;id desc&quot;;//排序方式<br />\r\n$groupby = &quot;&quot;;//GROUP<br />\r\n<br />\r\n<strong>#拉取一条数据</strong><br />\r\n//从table1表中拉取 id=1的数据<br />\r\n$data_info = $this-&gt;table1_model-&gt;get_one($where , $field, $orderby, $groupby);<br />\r\n<br />\r\n//如果拉取到了<br />\r\nif($data_info){<br />\r\n&nbsp;&nbsp; &nbsp;print_r($data_info);<br />\r\n}else{<br />\r\n&nbsp;&nbsp; &nbsp;die(&quot;信息不存在&quot;);<br />\r\n}<br />\r\n<br />\r\n&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br />\r\n<br />\r\n<strong>#拉取多条数据</strong><br />\r\n//从table1表中拉取多条数据<br />\r\n<br />\r\n$where = &quot;id &gt; 0 or user_id &gt;= 0&quot;;//你要查询的条件<br />\r\n$field = &quot;field1,`field2` as fieldTWO &quot;;//你要显示的字段<br />\r\n$orderby = &quot;id desc,field1 asc&quot;;//排序方式<br />\r\n$groupby = &quot;&quot;;//GROUP<br />\r\n<br />\r\n//从table1表中拉取全部数据<br />\r\n$data_list = $this-&gt;table1_model-&gt;select($where , $field, $orderby, $groupby);<br />\r\n<br />\r\n//如果拉取到了，这个结果是一个多维数组<br />\r\nif($data_list){<br />\r\n&nbsp;&nbsp; &nbsp;print_r($data_list);<br />\r\n}else{<br />\r\n&nbsp;&nbsp; &nbsp;die(&quot;信息不存在&quot;);<br />\r\n}<br />\r\n<br />\r\n<br />\r\n&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br />\r\n<br />\r\n<strong>#拉取多条数据带分页</strong><br />\r\n//从table1表中拉取多条数据<br />\r\n<br />\r\n$where = &quot;id &gt; 0 or user_id &gt;= 0&quot;;//你要查询的条件<br />\r\n$field = &quot;field1,`field2` as fieldTWO &quot;;//你要显示的字段<br />\r\n$orderby = &quot;id desc,field1 asc&quot;;//排序方式<br />\r\n$groupby = &quot;&quot;;//GROUP<br />\r\n$page_no = 1;<br />\r\n$page_size = 10;//一页显示10条数据<br />\r\n$page_url_format = page_list_url(&#39;adminpanel/table1/index&#39;,true);<br />\r\n<br />\r\n//从table1表中拉取全部数据<br />\r\n$data_list = $this-&gt;table1_model-&gt;listinfo($where , $field, $orderby,$page_no,$page_size, $groupby,$page_url_format);<br />\r\n<br />\r\n//如果拉取到了，这个结果是一个多维数组<br />\r\nif($data_list){<br />\r\n&nbsp;&nbsp; &nbsp;print_r($data_list);<br />\r\n&nbsp;&nbsp;&nbsp; echo $this-&gt;table1_model-&gt;pages;//打印分页控件<br />\r\n}else{<br />\r\n&nbsp;&nbsp; &nbsp;die(&quot;信息不存在&quot;);<br />\r\n}<br />\r\n<br />\r\n&nbsp;','2016-03-03 19:29:04',1,1064,20,'',NULL,NULL,0),
	(15,'跟青蛙学PHP-快速入门实例学习ACI （四）','ACI ,新闻管理, PHP，CODEIGNITER','接下来news表的设计，先点击模块——生成新模块——新闻管理，具体过程我就不再赘述，我先上图。\r\n模块详情部分大家看下图，图标我选择了edit(alias)','2016-03-05 21:28:47','',1,'青蛙','','',0,'<div style=\"text-align: center;\">&nbsp;&nbsp; 作者 @青蛙 QQ ：292885666</div>\r\n<br />\r\n接下来news表的设计，先点击模块&mdash;&mdash;生成新模块&mdash;&mdash;新闻管理，具体过程我就不再赘述，我先上图。<br />\r\n模块详情部分大家看下图，图标我选择了edit(alias)。<br />\r\n<br />\r\n<img alt=\"图片\" data-img-idx=\"0\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/NFnImbNVca1YrObDzc6GO9bJV90Lt.PxDtV5x06brLg!/o/dAABAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=VQIoAlUCKAIDACU!&amp;su=1135622225&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603050927312987.png\" style=\"width: 597px; height: 552px;\" /><br />\r\n<br />\r\n<span style=\"font-weight:bold\">重 点部分是数据库字段的设计。大家是否还记得上一篇中的最后，我做了一个 栏目列表DB_type_list的数据源？在新闻数据库表中，我们就用到了这个数据源，在newstype_id中，我们在单选类中，选择 下拉选择单选。这个值的选择，在最后一步字段扩展信息中选择。</span><br />\r\n<br />\r\n<img alt=\"图片\" data-img-idx=\"1\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/HqSH0ngxG95TRLbRzC9rNx1nfS0oqKtC.SLW5mJ.piM!/o/dKEAAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=GgPEARoDxAEDACU!&amp;su=150943665&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603050927385437.png\" style=\"width: 794px; height: 452px;\" /><br />\r\n<br />\r\n在发布人员ID和姓名字段的设定上，我们就可以选择特殊类中的 当前用户名ID 和 当前用户名。<br />\r\n多行文本下拉选择中，我选择了带编辑器，不过后面会看到，这个编辑器是不存在的。<br />\r\n<br />\r\n<img alt=\"图片\" data-img-idx=\"2\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/mCeUbMSwLaRrv4pnsgxgdtAVD.vznPHhmxEo57zCGbw!/o/dKgAAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=awP5AWsD.QEDACU!&amp;su=178290961&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603050927456382.png\" style=\"width: 875px; height: 505px;\" /><br />\r\n<br />\r\n在字段扩展信息中，这里我给大家说两个需要注意的地方：<br />\r\n1、分组中的基本信息、高级信息、附加信息、可选信息的作用是：在生成的表单中，会生成标题，例如基本信息下面会有 标题 内容、高级信息下面会有 标签 关键词 附加信息会有 简介等等。<br />\r\n2、在下拉框初始化里，可以选择newstypeid的关联数据源动态输出。如果你是静态数据源，可以用 名称|值 的方式来填写。例如： 河北|002 石家庄|0021 邯郸|0022.<br />\r\n然后点保存。新闻模块就完成了。<br />\r\n然后在模块列表中，就会有两个模块显示出来，你的主要工作已经完成了80%。接下来就是下载、安装到自己系统里。<br />\r\n<br />\r\n<img alt=\"图片\" data-img-idx=\"3\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/hTDJpc9pMP41nBOnmFLg249n9PWVLmbRJ7Jg7E5lZzQ!/o/dKkAAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=BQTkAQUE5AEDACU!&amp;su=125027665&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603050927539267.png\" style=\"width: 1029px; height: 484px;\" /><br />\r\n<br />\r\n<img alt=\"图片\" data-img-idx=\"4\" data-src=\"http://r.photo.store.qq.com/psb?/V10XB54N08KBbk/gZJkZV.X7SHLvi*YWIQNijr7F8zFgMXrjdSoOJLeUys!/o/dP0AAAAAAAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=QQNuAUEDbgEDACU!&amp;su=138930177&amp;sce=0-12-12&amp;rf=2-9\" src=\"/uploadfile/article/201603050928017518.png\" style=\"width: 833px; height: 366px;\" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n&nbsp;\r\n<div class=\"clear\" id=\"paperBottom\" style=\"padding-top: 80px;\">&nbsp;</div>','2016-03-05 21:28:47',1,988,20,'',NULL,NULL,0),
	(16,'如何使用angularjs','angularjs','','2016-04-13 20:56:47','',256,'','','',0,'<h2>如何使用angularjs</h2>\r\n\r\n<p>1.将下载好的angularjs.min.js放入scripts/lib文件夹中并在scripts/common.js文件中配制</p>\r\n<img alt=\"\" src=\"/uploadfile/article/201604130847257546.jpg\" style=\"width: 199px; height: 101px;\" /> <img alt=\"\" src=\"/uploadfile/article/201604130848075271.jpg\" style=\"width: 200px; height: 114px;\" /> <img alt=\"\" src=\"/uploadfile/article/201604130848195436.jpg\" style=\"width: 354px; height: 136px;\" /> <img alt=\"\" src=\"/uploadfile/article/201604130848331589.jpg\" style=\"width: 287px; height: 123px;\" />\r\n<p>2.在adminpanel的header.php文件中使用ng-app声明Angular的边界为所有页面，如下图</p>\r\n<img alt=\"\" src=\"/uploadfile/article/201604130848495179.jpg\" style=\"width: 517px; height: 157px;\" />\r\n<p>3.在控制器（以User.php控制器为例）下的单个视图文件（user/index.php）中使用ng-controller，。</p>\r\n<img alt=\"\" src=\"/uploadfile/article/201604130849134831.jpg\" style=\"width: 593px; height: 171px;\" />\r\n<p>4.ng-controller 指令用于为你的应用添加控制器。 然后在视图文件对应的js文件中引入并使用,你就可以编写代码制作函数和变量，双向数据绑定等等，并使用 scope 对象来访问了</p>\r\n<img alt=\"\" src=\"/uploadfile/article/201604130849365971.jpg\" style=\"width: 564px; height: 123px;\" /> <img alt=\"\" src=\"/uploadfile/article/201604130849448429.jpg\" style=\"width: 483px; height: 281px;\" />','2016-04-13 20:56:47',1,662,20,'',NULL,NULL,0);

/*!40000 ALTER TABLE `t_sys_article_page` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_sys_article_page_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_article_page_tag`;

CREATE TABLE `t_sys_article_page_tag` (
  `tag_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag` char(50) NOT NULL,
  `hits` mediumint(8) unsigned DEFAULT '0',
  `page_id` int(10) DEFAULT '0',
  PRIMARY KEY (`tag_id`),
  KEY `hits` (`hits`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `t_sys_article_page_tag` WRITE;
/*!40000 ALTER TABLE `t_sys_article_page_tag` DISABLE KEYS */;

INSERT INTO `t_sys_article_page_tag` (`tag_id`, `tag`, `hits`, `page_id`)
VALUES
	(7,'ACI',0,8),
	(8,'ACI 图书管理系统 毕业设计 PHP',0,9),
	(9,'ACI升级',0,10),
	(16,'PHP,ACI,PHP 教程,codeigniter教程',0,11),
	(15,'ACI,Codeigniter, PHP, PHP教程, 用户组的权限管理、用户的资料',0,12),
	(18,'PHP 自动生成权限,自动生成模块',0,13),
	(20,'ACI ,MODEL ,SELECT, 分页, PHP,CODEIGNITER',0,14),
	(21,'ACI ,新闻管理, PHP,CODEIGNITER',0,15),
	(22,'angularjs',0,16);

/*!40000 ALTER TABLE `t_sys_article_page_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_sys_member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_member`;

CREATE TABLE `t_sys_member` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(100) NOT NULL,
  `password` char(32) NOT NULL,
  `email` char(50) DEFAULT '',
  `group_id` tinyint(3) unsigned DEFAULT '0',
  `is_choose_type` tinyint(1) unsigned DEFAULT '0',
  `open_id` varchar(100) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `reg_ip` char(15) DEFAULT NULL,
  `reg_time` datetime DEFAULT NULL,
  `last_login_ip` char(15) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `encrypt` varchar(50) DEFAULT NULL,
  `is_lock` tinyint(1) DEFAULT '0',
  `fullname` varchar(50) DEFAULT NULL,
  `qq` varchar(50) DEFAULT NULL,
  `weixin` varchar(50) DEFAULT NULL,
  `is_seller` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_email_validate` tinyint(1) DEFAULT '0',
  `is_mobile_validate` tinyint(1) DEFAULT '0',
  `mobile` varchar(50) DEFAULT NULL,
  `sex` varchar(2) DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `province_code` varchar(10) DEFAULT NULL,
  `city_code` varchar(10) DEFAULT NULL,
  `district_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`(15)),
  KEY `email` (`email`),
  KEY `groupID` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `t_sys_member` WRITE;
/*!40000 ALTER TABLE `t_sys_member` DISABLE KEYS */;

INSERT INTO `t_sys_member` (`user_id`, `username`, `password`, `email`, `group_id`, `is_choose_type`, `open_id`, `avatar`, `reg_ip`, `reg_time`, `last_login_ip`, `last_login_time`, `encrypt`, `is_lock`, `fullname`, `qq`, `weixin`, `is_seller`, `created`, `modified`, `is_email_validate`, `is_mobile_validate`, `mobile`, `sex`, `birthday`, `province_code`, `city_code`, `district_code`)
VALUES
	(1,'test','fb469d7ef430b0baf0cab6c436e70375','hubinjie@live.cn',1,0,NULL,'aci.jpg',NULL,NULL,'180.168.103.162','0000-00-00 00:00:00',NULL,0,'胡子锅','5516448','dawang',1,'2015-03-05 18:12:00','2015-03-10 22:31:19',1,1,'13046697138','男','1985-10-21','310000','310100','310118'),
	(2,'xiaoer','b5d3c7db5ec308deb8e79621c7f69055','lyhuc@163.com',2,0,NULL,'nopic.gif','::1',NULL,'::1','0000-00-00 00:00:00','wOxmG',0,'小二',NULL,NULL,0,NULL,NULL,0,0,'13046697138','0',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `t_sys_member` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_sys_member_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_member_role`;

CREATE TABLE `t_sys_member_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '组ID',
  `role_name` varchar(45) NOT NULL DEFAULT '' COMMENT '组名',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '保留',
  `listorder` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `description` varchar(200) DEFAULT NULL COMMENT '描述',
  `parent_id` smallint(4) DEFAULT '0',
  `arr_childid` varchar(255) DEFAULT NULL,
  `auto_choose` tinyint(1) NOT NULL DEFAULT '1',
  `arr_userid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

LOCK TABLES `t_sys_member_role` WRITE;
/*!40000 ALTER TABLE `t_sys_member_role` DISABLE KEYS */;

INSERT INTO `t_sys_member_role` (`role_id`, `role_name`, `type_id`, `listorder`, `description`, `parent_id`, `arr_childid`, `auto_choose`, `arr_userid`)
VALUES
	(1,'超级管理员',0,0,'超级管理员',0,NULL,1,NULL),
	(2,'普通管理员',0,0,'普通管理员',0,NULL,1,NULL),
	(3,'普通用户组',0,0,'普通用户组',0,NULL,1,NULL);

/*!40000 ALTER TABLE `t_sys_member_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_sys_member_role_priv
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_member_role_priv`;

CREATE TABLE `t_sys_member_role_priv` (
  `role_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `folder` varchar(50) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `method` varchar(50) NOT NULL DEFAULT '',
  `data` varchar(50) NOT NULL DEFAULT '',
  `priv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT '0',
  PRIMARY KEY (`priv_id`),
  KEY `role_id` (`role_id`,`folder`,`controller`,`method`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `t_sys_member_role_priv` WRITE;
/*!40000 ALTER TABLE `t_sys_member_role_priv` DISABLE KEYS */;

INSERT INTO `t_sys_member_role_priv` (`role_id`, `folder`, `controller`, `method`, `data`, `priv_id`, `menu_id`)
VALUES
	(2,'adminpanel','helloWorld','index','',60,38),
	(2,'adminpanel','manage','go_15','',59,15),
	(2,'adminpanel','manage','logout','',58,8),
	(2,'adminpanel','profile','change_pwd','',57,7),
	(2,'adminpanel','manage','index','',56,6),
	(2,'adminpanel','manage','go_5','',55,5),
	(2,'adminpanel','manage','go_4','',54,4),
	(2,'adminpanel','manage','go_1','',53,1),
	(3,'module','datasource','delete','',148,75),
	(3,'module','datasource','add_choose_type','',147,74),
	(3,'module','datasource','add_by_type','',146,73),
	(3,'module','datasource','index','',145,72),
	(3,'module','project','delete','',143,70),
	(3,'module','project','download','',144,71),
	(3,'module','project','sql','',142,69),
	(3,'module','demo','index','',141,68),
	(3,'module','project','export','',140,67),
	(3,'module','project','edit_field_ext','',139,66),
	(3,'module','project','edit_field','',138,65),
	(3,'module','project','edit','',137,64),
	(3,'module','project','add','',136,63),
	(3,'member','manage','go_62','',135,62),
	(3,'module','project','index','',134,61),
	(3,'member','manage','go_60','',133,60),
	(3,'member','manage','logout','',132,59),
	(3,'member','profile','change_pwd','',131,58),
	(3,'member','manage','index','',130,57),
	(3,'member','manage','go_56','',129,56),
	(3,'member','manage','go_55','',128,55),
	(3,'module','datasource','edit','',149,76),
	(3,'module','code','download','',150,77);

/*!40000 ALTER TABLE `t_sys_member_role_priv` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_sys_module
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_module`;

CREATE TABLE `t_sys_module` (
  `module_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `controller_caption` varchar(50) DEFAULT NULL,
  `controller_name` varchar(50) DEFAULT NULL,
  `controller_path` varchar(250) DEFAULT NULL,
  `charset` varchar(50) DEFAULT NULL,
  `method_func` varchar(50) DEFAULT NULL,
  `data_type` smallint(10) DEFAULT '1',
  `html_style` smallint(50) DEFAULT '1',
  `javascript_core` smallint(4) DEFAULT NULL,
  `javascript_file` smallint(4) DEFAULT NULL,
  `version` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `setting` text,
  `submit_type` smallint(10) DEFAULT '2',
  `user_id` int(11) DEFAULT '0',
  `modified` datetime DEFAULT NULL,
  `extend_class` varchar(50) DEFAULT NULL,
  `error_tips` varchar(50) DEFAULT NULL,
  `required_tips` varchar(50) DEFAULT NULL,
  `page_size` smallint(6) DEFAULT NULL,
  `relation_module` text,
  `file_value_from` varchar(250) DEFAULT NULL,
  `field_name_format` smallint(1) DEFAULT '0',
  `js_path` varchar(250) DEFAULT 'scripts',
  `css_icon` varchar(50) DEFAULT 'fa fa-dropbox',
  `controller_author` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table t_sys_module_datasource
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_module_datasource`;

CREATE TABLE `t_sys_module_datasource` (
  `datasource_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `datasource_typeid` smallint(4) DEFAULT '1',
  `module_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `setting` text,
  `datasource_name` varchar(50) DEFAULT NULL,
  `sql_fields` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `concat_char` varchar(10) DEFAULT NULL,
  `datasource_function_name` varchar(50) DEFAULT NULL,
  `controller_path` varchar(250) DEFAULT NULL,
  `sql_fields_caption` varchar(250) DEFAULT NULL,
  `force_convert_text_edit` tinyint(1) DEFAULT '0',
  `force_convert_text_readonly` tinyint(1) DEFAULT '0',
  `sql_convert_fields` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`datasource_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table t_sys_module_field
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_module_field`;

CREATE TABLE `t_sys_module_field` (
  `field_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `field_name` varchar(50) DEFAULT NULL,
  `field_caption` varchar(50) DEFAULT NULL,
  `field_type` smallint(4) DEFAULT NULL,
  `field_options` varchar(200) DEFAULT NULL,
  `default_value` varchar(50) DEFAULT NULL,
  `is_sort` tinyint(1) DEFAULT '0',
  `is_search` tinyint(1) DEFAULT '0',
  `is_list` tinyint(1) DEFAULT '0',
  `index_num` int(11) DEFAULT '0',
  `remark` varchar(250) DEFAULT NULL,
  `is_required` tinyint(1) DEFAULT '0',
  `error_tips` varchar(150) DEFAULT NULL,
  `required_tips` varchar(150) DEFAULT NULL,
  `is_key` tinyint(1) DEFAULT '0',
  `upload_path` varchar(50) DEFAULT NULL,
  `upload_name` varchar(50) DEFAULT NULL,
  `upload_max_size` int(4) DEFAULT '0',
  `upload_file_type` varchar(50) DEFAULT NULL,
  `upload_url` varchar(250) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_pri` tinyint(1) DEFAULT '0',
  `group_item_num` smallint(4) DEFAULT '0',
  `is_options_from_datasource` tinyint(1) DEFAULT '0',
  `datasource_model` varchar(250) DEFAULT NULL,
  `datasource_control` varchar(250) DEFAULT NULL,
  `datasource_control_path` varchar(250) DEFAULT NULL,
  `datasource_function_name` varchar(50) DEFAULT NULL,
  `is_unique` tinyint(1) DEFAULT '0',
  `datasource_id` smallint(4) DEFAULT '0',
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table t_sys_module_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_module_log`;

CREATE TABLE `t_sys_module_log` (
  `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `logo_content` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table t_sys_module_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_module_menu`;

CREATE TABLE `t_sys_module_menu` (
  `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` char(40) NOT NULL DEFAULT '',
  `parent_id` smallint(6) NOT NULL DEFAULT '0',
  `list_order` smallint(6) unsigned NOT NULL DEFAULT '0',
  `is_display` tinyint(1) NOT NULL DEFAULT '1',
  `controller` varchar(50) DEFAULT NULL,
  `folder` varchar(50) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `flag_id` varchar(50) NOT NULL DEFAULT '0',
  `is_side_menu` tinyint(1) DEFAULT '0',
  `is_system` tinyint(1) DEFAULT '0',
  `is_works` tinyint(1) DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `css_icon` varchar(50) DEFAULT NULL,
  `arr_parentid` varchar(250) DEFAULT NULL,
  `arr_childid` varchar(250) DEFAULT NULL,
  `is_parent` tinyint(1) DEFAULT '0',
  `show_where` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`menu_id`) USING BTREE,
  KEY `list_order` (`list_order`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table t_sys_module_trigger
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_module_trigger`;

CREATE TABLE `t_sys_module_trigger` (
  `trigger_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `var_code` text,
  `construct_code` text,
  `insert_before_code` text,
  `insert_after_code` text,
  `update_before_code` text,
  `update_after_code` text,
  `delete_before_code` text,
  `delete_after_code` text,
  `user_id` int(11) DEFAULT NULL,
  `view_header_code` text,
  `view_footer_code` text,
  PRIMARY KEY (`trigger_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table t_sys_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_sessions`;

CREATE TABLE `t_sys_sessions` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT '',
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table t_sys_times
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_sys_times`;

CREATE TABLE `t_sys_times` (
  `times_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `login_ip` char(15) DEFAULT NULL COMMENT 'ip',
  `login_time` int(10) unsigned DEFAULT NULL,
  `group_id` int(10) unsigned DEFAULT NULL,
  `failure_times` int(10) unsigned DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`times_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `t_sys_times` WRITE;
/*!40000 ALTER TABLE `t_sys_times` DISABLE KEYS */;

INSERT INTO `t_sys_times` (`times_id`, `username`, `login_ip`, `login_time`, `group_id`, `failure_times`, `is_admin`)
VALUES
	(200,'kevin','106.39.84.158',1471102407,NULL,1,0),
	(25,'junjun','14.29.69.22',1447381882,NULL,1,0),
	(185,'wuguiyu','121.69.41.42',1468252027,NULL,1,0),
	(23,'liuxuancheng','124.205.150.10',1447249194,NULL,1,0),
	(31,'acidev','180.154.216.155',1447678432,NULL,1,0),
	(36,'xiaosi','183.128.232.190',1447745729,NULL,1,0),
	(37,'erdaye','183.128.232.190',1447745801,NULL,1,0),
	(49,'tests','14.156.25.69',1449456846,NULL,1,0),
	(101,'qflxm','39.83.243.6',1456663529,NULL,1,0),
	(129,'aaaaaabbb','180.149.148.66',1458627282,NULL,1,0),
	(89,'hemisu','60.178.10.185',1455197048,NULL,1,0),
	(92,'test2','106.113.234.88',1455506900,NULL,1,0),
	(93,'test12','110.90.104.127',1455506904,NULL,1,0),
	(94,'test123','125.77.33.127',1455506942,NULL,1,0),
	(137,'murat','110.153.16.78',1460454825,NULL,1,0),
	(198,'xiaoer','36.110.75.2',1470693044,NULL,1,0),
	(152,'aaaaaaaaaaaa','175.13.243.244',1461981487,NULL,1,0),
	(157,'testqh','121.32.113.84',1462342602,NULL,1,0),
	(158,'123456','222.211.206.198',1462342649,NULL,1,0),
	(159,'123123','121.32.113.84',1462342656,NULL,1,0),
	(205,'testaci','123.116.84.126',1471945267,NULL,1,0),
	(169,'lichunsheng','119.136.99.122',1464321710,NULL,1,0),
	(204,'admin','114.255.40.21',1471932260,NULL,1,0),
	(214,'test','113.143.254.68',1472997240,NULL,1,0);

/*!40000 ALTER TABLE `t_sys_times` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
