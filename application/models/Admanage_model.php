<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AutoCodeIgniter.com
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 源项目		AutoCodeIgniter
 * 作者：		AutoCodeIgniter.com Dev Team
 * 版权：		Copyright (c) 2015 , AutoCodeIgniter com.
 * 项目名称：广告管理 MODEL
 * 版本号：1 
 * 最后生成时间： 
 */
class Admanage_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'admanage';
		parent::__construct();
	}
    
    /**
     * 初始化默认值
     * @return array
     */
    function default_info()
    {
    	return array(
		'admanage_id'=>0,
		'admanage_name'=>'',
		'position'=>'',
		'pic'=>'',
		'link'=>'',
		'target'=>'',
		'begin_date'=>'',
		'end_date'=>'',
		'created'=>'',
		'click'=>'',
		);
    }
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE `t_aci_admanage`
(
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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        }

// END admanage_model class

/* End of file admanage_model.php */
/* Location: ./admanage_model.php */
?>