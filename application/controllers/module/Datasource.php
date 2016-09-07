<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('NOT_CONVERT',true);
class Datasource extends Member_Controller {
	
	var $upload_FileType,$multi_FileType_Arr;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('global','module'));
		$this->load->model(array('Module_model','Module_field_model','Module_trigger_model','Module_datasource_model'));
		$this->upload_FileType_Arr = array(51,52);
		$this->multi_FileType_Arr = array(33,34,41,42);
	}
	
	function _show_dropdown_config($setting)
	{
		
		$show_fields = $value_fields  = $convert_fields = NULL;
		$show_fields_name = $value_fields_name = $convert_fields_name = NULL;
		
		foreach($setting as $k=>$v)
		{
			if($v['show'])
			{
				$show_fields[] = $v['field_name'];
				$show_fields_name[]   = $v['field_caption'];
			}
			
			if($v['selected'])
			{
				$value_fields  = $v['field_name'];
				$value_fields_name   = $v['field_caption'];
			}

			if(isset($v['convert'])&&$v['convert'])
			{
				$convert_fields[] = $v['field_name'];
				$convert_fields_name[]   = $v['field_caption'];
			}
			
		}
		

		$field_name = $value_fields. ",";
		$field_name .= (implode(",",$show_fields));
		
		$field_name_caption = $value_fields_name. ",";
		$field_name_caption .= (implode(",",$show_fields_name));

		$convert_fields = (implode(",",$convert_fields));
		return array($field_name,$field_name_caption,$convert_fields);
	}
	
	function index($id=0)
	{
		$id = intval($id);
		$datamodule_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		if(!$datamodule_info)
		{
			$this->showmessage("模块不存在");
		}
		
		$data_list = $this->Module_datasource_model->select(array('module_id'=>$id,'user_id'=>$this->user_id));
		$this->view('index',array('require_js'=>true,'datalist'=>$data_list,'data_info'=>$datamodule_info));
	}
	
	
	function add_choose_type($id=0)
	{
		$id = intval($id);
		$datamodule_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		if(!$datamodule_info)
		{
			$this->showmessage("模块不存在");
		}
		
		$this->view('add_choose_type',array('require_js'=>true,'data_info'=>$datamodule_info));

	}
	
	function add_by_type($id=0,$datasource_typeid=0)
	{
		$id = intval($id);
		$datamodule_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		if(!$datamodule_info)
		{
			$this->showmessage("模块不存在");
		}
		
		$data_list = $this->Module_field_model->select(array('module_id'=>$id,'user_id'=>$this->user_id),'*','','index_num asc','','field_id');
		
		if($this->input->is_ajax_request())
		{	
			if(!$data_list)exit(json_encode(array('status'=>false,'tips'=>' 模块信息不存在')));
			$arr = $this->_get_form($data_list);
			$sql_fields =$this->_show_dropdown_config($arr['setting']);
			
			$status = $this->Module_datasource_model->insert(array('force_convert_text_readonly'=>$arr['force_convert_text_readonly'],'force_convert_text_edit'=>$arr['force_convert_text_edit'],'controller_path'=>trim($datamodule_info['controller_path'],"/")."/".trim($datamodule_info['controller_name'],"/"),'sql_fields'=>$sql_fields[0],'sql_fields_caption'=>$sql_fields[1],'sql_convert_fields'=>$sql_fields[2],'datasource_typeid'=>$arr['datasource_typeid'],'datasource_name'=>$arr['datasource_name'],'datasource_function_name'=>$arr['datasource_function_name'],'concat_char'=>$arr['concat_char'],'setting'=>json_encode($arr['setting']),'module_id'=>$id,'user_id'=>$this->user_id,'created'=>date("Y-m-d H:i:s"),'modified'=>date("Y-m-d H:i:s")));
			if($status )
			{
				echo json_encode(array('status'=>true,'tips'=>"保存成功"));
			}else
				echo json_encode(array('status'=>true,'tips'=>"保存失败"));
				
			exit();
		}
		
		$datainfo = $this->Module_datasource_model->default_info();
		$datainfo['module_id'] = $id;
		$datainfo['datasource_typeid'] = $datasource_typeid;
		
		$this->view('edit',array('dataInfo'=>$datainfo,'datasource_typeid'=>$datasource_typeid,'require_js'=>true,'data_info'=>$datamodule_info,'is_edit'=>false,'dataList'=>$data_list));
	}
	
	function _get_form($data_list)
	{
		$index_num = $this->input->post('index_num',true);
		$check_value = $this->input->post('check_value',true);
		$show_value = $this->input->post('show_value',true);
		$convert_value = $this->input->post('convert_value',true);
		$datasource_name = $this->input->post('datasource_name',true);
		$concat_char = $this->input->post('concat_char',true);
		$datasource_typeid = intval($this->input->post('datasource_typeid',true));
		$datasource_function_name = trim($this->input->post('datasource_function_name',true));
		$o_datasource_function_name = trim($this->input->post('o_datasource_function_name',true));
		$force_convert_text_edit= intval($this->input->post('force_convert_text_edit',true));
		$force_convert_text_readonly= intval($this->input->post('force_convert_text_readonly',true));
		
		
		if(!is_array($check_value))exit(json_encode(array('status'=>false,'tips'=>' 选中项不能全为空')));
		if(!is_array($show_value))exit(json_encode(array('status'=>false,'tips'=>' 显示项不能全为空')));
		if(!is_array($index_num))exit(json_encode(array('status'=>false,'tips'=>' 排序不能全为空')));
		if(trim($datasource_name)=="")exit(json_encode(array('status'=>false,'tips'=>' 数据据源中文名称不能为空')));
		//if(trim($concat_char)=="")exit(json_encode(array('status'=>false,'tips'=>' 显示选项连接符不能为空')));
		if(trim($datasource_function_name)=="")exit(json_encode(array('status'=>false,'tips'=>' 数据据源功能名称不能为空')));
		
		if($o_datasource_function_name!=$datasource_function_name)
		{
			$c = $this->Module_datasource_model->count(array('datasource_function_name'=>$datasource_function_name));
			if($c>0) exit(json_encode(array('status'=>false,'tips'=>' 数据据源功能名称已经存在,请重新更换')));
		}
		
		$arr = array();
		foreach($data_list as $k=>$v)
		{
			$key = intval($k);
			
			$sort_num = $index_num[$k];
			$selected =$show= $convert= false;
			
			foreach($check_value as $kk=>$vv)
			{
				if($vv==$key)
				{
					$selected = true; 
				}
			}
			
			foreach($show_value as $kk=>$vv)
			{
				if($vv==$key)
				{
					$show = true; 
				}
			}

			if($convert_value)
			foreach($convert_value as $kk=>$vv)
			{
				if($vv==$key)
				{
					$convert = true;
				}
			}

			
			if(!$selected && !$show && !$convert) continue;
			$arr[$key] = array('convert'=>$convert,'sort_num'=>$sort_num,'selected'=>$selected,'show'=>$show,'field_id'=>$v['field_id'],'field_name'=>$v['field_name'],'field_caption'=>$v['field_caption'],'field_type'=>$v['field_type']);
		}
		
		return array('force_convert_text_readonly'=>$force_convert_text_readonly,'force_convert_text_edit'=>$force_convert_text_edit,'datasource_typeid'=>$datasource_typeid,'datasource_function_name'=>$datasource_function_name,'datasource_name'=>$datasource_name,'concat_char'=>$concat_char,'setting'=>$arr);
	}
	
	function delete($id=0,$datasource_id = 0)
	{
		$id = intval($id);
		$datasource_id = intval($datasource_id);
		$this->Module_datasource_model->delete(array('datasource_id'=>$datasource_id,'module_id'=>$id,'user_id'=>$this->user_id));
		$this->showmessage('删除操作成功');
	}
	
	function edit($id=0,$datasource_id = 0)
	{
		$id = intval($id);
		$datasource_id = intval($datasource_id);
		$data_list = $this->Module_field_model->select(array('module_id'=>$id,'user_id'=>$this->user_id),'*','','index_num asc','','field_id');
		$datamodule_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		$datasource_info =$this->Module_datasource_model->get_one(array('datasource_id'=>$datasource_id,'module_id'=>$id,'user_id'=>$this->user_id));
		
		if($this->input->is_ajax_request())
		{	
			if(!$data_list)exit(json_encode(array('status'=>false,'tips'=>' 模块信息不存在')));
			
			$arr = $this->_get_form($data_list);
			$sql_fields =$this->_show_dropdown_config($arr['setting']);
			$datasource_typeid = $datasource_info['datasource_typeid'];

			$status = $this->Module_datasource_model->update(array('force_convert_text_readonly'=>$arr['force_convert_text_readonly'],'force_convert_text_edit'=>$arr['force_convert_text_edit'],'controller_path'=>trim($datamodule_info['controller_path'],"/")."/".trim($datamodule_info['controller_name'],"/"),'modified'=>date('Y-m-d H:i:s'),'sql_fields'=>$sql_fields[0],'sql_fields_caption'=>$sql_fields[1],'sql_convert_fields'=>$sql_fields[2],'datasource_function_name'=>$arr['datasource_function_name'],'datasource_name'=>$arr['datasource_name'],'concat_char'=>$arr['concat_char'],'setting'=>json_encode($arr['setting'])),array('datasource_id'=>$datasource_id,'module_id'=>$id,'user_id'=>$this->user_id));

			if($status )
			{
				echo json_encode(array('status'=>true,'tips'=>"保存成功"));
			}else
				echo json_encode(array('status'=>true,'tips'=>"保存失败"));
				
			exit();
			
		}
		else
		{
			if(!$data_list)$this->showmessage('模块信息不存在');
			if(!$datasource_info)$this->showmessage('模块信息不存在');
			
			$setting =NULL;
			if($datasource_info)
			{
				$datasource_info['setting'] = json_decode($datasource_info['setting']);
				
				foreach($datasource_info['setting'] as $k=>$v)
				{
					$v = (array)$v;
					$setting[$v['field_id']] = $v;
				}
			}
			
			$datasource_typeid = $datasource_info['datasource_typeid'];
			
			$this->view('edit',array('is_edit'=>true,'datasource_typeid'=>$datasource_typeid,'setting'=>$setting,'dataInfo'=>$datasource_info,'data_info'=>$datamodule_info,'require_js'=>true,'dataList'=>$data_list));
		}
	}

}