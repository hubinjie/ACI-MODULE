<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article_menu_model extends Base_Model {
	var $page_size = 10;
	
	public function __construct() {
		$this->table_name = 'article_menu';
		parent::__construct();
	}

	function sql_part_with($menu_type,$part=" 1 = 1"){
		return "select menu_id from ".$this->table_name." where  menu_type = '".$menu_type."' and ".$part;
	}
	
	function default_info()
	{
		return array(
					'menu_id'=>0,
					'menu_type'=>'list',
					'menu_name'=>'',
					'modified'=>'',
					'sort_order'=>'',
					'menu_parent_id'=>'',
					'user_id'=>'',
					'callback_id'=>'',
					'menu_url'=>'',
					'template'=>'list',
					'menu_desc'=>''
					);
	}
	
}
