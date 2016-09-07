<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('NOT_CONVERT',true);
define('DEMO_STSATUS',true);
class Demo extends Member_Controller {
	
	var $init_row_size = 11;
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','zip'));
		$this->load->helper(array('module','array'));
		$this->load->model(array('Module_model','Module_field_model','Module_trigger_model'));
	}
	
	function _get_config($id)
	{
		$code_config = getcache('module_project_'.$this->user_id.'_'.$id);
		$this->load->config('module');
		$module_settings = $this->config->item('module');
		
		$view_list_fields_data = NULL;
		for($i=0;$i<$this->init_row_size;$i++)
		{
			if($code_config['view_list_fields'])
			foreach($code_config['view_list_fields'] as $k=>$v)
			{
				if($v['field_options'])
					$view_list_fields_data[$i][$v['field_name']] = random_element($v['field_options']);
				else
					$view_list_fields_data[$i][$v['field_name']] = isset($module_settings['field_init_data'][$v['field_type']][$i])?$module_settings['field_init_data'][$v['field_type']][$i]:'N/A';
				
			}
		}
		
		$code_config['view_list_fields_data']=$view_list_fields_data;
		
		return $code_config;
	}
	
	function ajax_list_data($id)
	{
		
		$columns = $_GET['columns'];
		$order = $_GET['order'];
		$search = $_GET['search'];
		$length = $_GET['length'];
		
		print_r($_GET);

		$id = intval($id);
		$data_info = $this->_get_config($id);
		
		$view_list_fields_data = $data_info['view_list_fields_data'];
		
		$_list = NULL;
		foreach($view_list_fields_data as $k=>$v)
		{
			$v['id'] = $k;
			$_list[]= $v;
		}
		
		$_arr =  array(
					'draw'=>1,
					'recordsTotal'=>57,
					'recordsFiltered'=>5,
					'data'=>$_list,
				);
	
		echo json_encode($_arr);
		
		
	}
	
	function index($id=0,$pageno=0)
	{
		$id = intval($id);
		$data_info = $this->_get_config($id);
		
		if(!$data_info||count($data_info)==0)$this->showmessage('模块信息不存在');
		$pageno = max(intval($pageno),1);
		
		$keyword=isset($_GET['keyword'])?safe_replace(trim($_GET['keyword'])):'';
		$order=isset($_GET['order'])?safe_replace(trim($_GET['order'])):'';
		$dir=isset($_GET['dir'])?safe_replace(trim($_GET['dir'])):'asc';

		$where ="";
		if (isset($_GET['dosubmit'])) {
			//if($keyword!="") $where = "concat(PROJECT_NAME,PROJECT_TYPE,PROJECT_CITY,COMPANY_NAME) like '%{$keyword}%'";
		}
		

		$datalist = NULL;
		$page_count = 20;
		$page_size = intval($data_info['page_size']);

		
		$pages = pages($page_count, $pageno, $page_size, base_url('module/demo/index/5/[page]'), $array = array(),$page_size);
		$this->view('index',array('require_js'=>$data_info['javascript_core']!=1?true:false,'order'=>$order,'dir'=>$dir,'search_fields_types'=>$data_info['view_search_fields_types'],'dataInfo'=>$data_info,'datalist'=>$data_info['view_list_fields_data'],'pages'=>$pages));
	}
	
	function add($id=0)
	{
		$id = intval($id);
		$data_info = $this->_get_config($id);
		if(!$data_info||count($data_info)==0)$this->showmessage('模块信息不存在');
		
		$view_edit_fields =  $data_info['view_edit_fields'];
		$this->view('add',array('require_js'=>$data_info['javascript_core']!=1?true:false,'dataInfo'=>$data_info,'view_edit_fields'=>$view_edit_fields));
	}
	
	function edit($id=0)
	{
		$id = intval($id);
		$data_info = $this->_get_config($id);
		if(!$data_info||count($data_info)==0)$this->showmessage('模块信息不存在');
		
		$view_edit_fields =  $data_info['view_edit_fields'];
		$this->view('edit',array('require_js'=>$data_info['javascript_core']!=1?true:false,'dataInfo'=>$data_info,'view_edit_fields'=>$view_edit_fields));
	}
	
	function delete()
	{
		$this->showmessage('删除成功');
	}
	
	function readonly($id=0)
	{
		$id = intval($id);
		$data_info = $this->_get_config($id);
		if(!$data_info||count($data_info)==0)$this->showmessage('模块信息不存在');
		
		$view_edit_fields =  $data_info['view_edit_fields'];
		$this->view('readonly',array('require_js'=>$data_info['javascript_core']!=1?true:false,'dataInfo'=>$data_info,'view_edit_fields'=>$view_edit_fields));
	}
}