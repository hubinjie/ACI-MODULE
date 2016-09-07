<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Module_trigger_model extends Base_Model {
	public function __construct() {
		$this->table_name = 'module_trigger';
		parent::__construct();
	}
	
}
