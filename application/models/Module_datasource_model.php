<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Module_datasource_model extends Base_Model {
	public function __construct() {
		$this->table_name = 'module_datasource';
		parent::__construct();
	}

	
	function default_info()
	{
		return array(
					'datasource_id'=>0,
					'datasource_typeid'=>'',
					'module_id'=>0,
					'user_id'=>'',
					'setting'=>'',
					'datasource_name'=>'',
					'sql_fields'=>'',
					'created'=>'',
					'modified'=>'',
					'concat_char'=>'',
					'datasource_function_name'=>'',
					'force_convert_text_readonly'=>1,
					'force_convert_text_edit'=>1,
					);
	}
	
}
