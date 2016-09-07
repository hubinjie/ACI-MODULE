<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Module_model extends Base_Model {
	public function __construct() {
		$this->table_name = 'module';
		parent::__construct();
	}
	
	function default_info()
	{
		return array(
					'module_id'=>0,
					'controller_caption'=>'',
					'controller_name'=>'',
					'controller_author'=>'',
					'charset'=>'utf-8',
					'data_type'=>1,
					'method_func'=>'add,edit,del,readonly,sort,lists,search',
					'html_style'=>'1',
					'javascript_core'=>1,
					'javascript_file'=>2,
					'submit_type'=>2,
					'controller_path'=>'Adminpanel/',
					'extend_class'=>'Admin_Controller',
					'page_size'=>10,
					'field_name_format'=>3,
					'js_path'=>'scripts/adminpanel/',
					'css_icon'=>''
					);
	}
	
}
