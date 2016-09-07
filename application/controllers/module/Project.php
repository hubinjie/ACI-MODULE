<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('NOT_CONVERT',true);
class Project extends Member_Controller {
	
	var $upload_FileType,$multi_FileType_Arr,$windows_FileTYpe_Arr,$string_FileType_Arr,$datetime_FileType_Arr,$dropdown_FileType_Arr,$checkbox_FileType_Arr,$number_FileType_Arr;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('global','module'));
		$this->load->model(array('Module_model','Module_field_model','Module_trigger_model','Module_datasource_model'));
		$this->upload_FileType_Arr = array(51,52);
		$this->multi_FileType_Arr = array(33,34,41,42);
		$this->string_FileType_Arr = array(2,3,4,5,11,12);//字符串类
		$this->datetime_FileType_Arr = array(6,7,63); //时间类
			
		$this->dropdown_FileType_Arr = array(31,32,33,34); //单选类
		$this->checkbox_FileType_Arr = array(41,42); //多选类
			
		$this->number_FileType_Arr = array(21,22); //数字类
			
		$this->windows_FileTYpe_Arr  = array(35,43);
	}
	
	function delete($id)
	{
		$this->Module_model->delete(array('module_id'=>$id,'user_id'=>$this->user_id));
		$this->Module_field_model->delete(array('module_id'=>$id,'user_id'=>$this->user_id));
		$this->Module_trigger_model->delete(array('module_id'=>$id,'user_id'=>$this->user_id));
		$this->showmessage('操作成功');
	}
	
	function _version()
	{
		
	}
	
	function cache($id)
	{
		return $this->_cache($id);
	}
	
	function _cache($id)
	{
		$id = intval($id);
		$data_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		
		$fields_list= $this->Module_field_model->select(array('module_id'=>$id,'user_id'=>$this->user_id),'*','','group_item_num asc,index_num asc');
		$trigger_list= $this->Module_trigger_model->select(array('module_id'=>$id,'user_id'=>$this->user_id),'*');
		$datasource_list= $this->Module_datasource_model->select(array('module_id'=>$id,'user_id'=>$this->user_id),'*');
		
		$search_by_fields_sql = "";
		$keywords_serach_arr = NULL;
		
		$filter_func_arr = array(
											'3'=>'is_email',
											'4'=>'is_url',
											'5'=>'is_mobile',
											'6'=>'is_date',
											'7'=>'is_datetime',
											'8'=>'is_time',
											'21'=>'is_number',
											'22'=>'is_price',
										 );

		$view_list_fields = $_all_fields = $_view_edit_fields = $view_search_fields = $view_order_fields = $view_upload_fields = NULL;
		$data_info['has_datepicker'] =0;
		$data_info['has_datetimepicker'] = 0;
		$data_info['has_timepicker'] = 0;
		
		//先得到列表项
		foreach($fields_list as $k=>$v)
		{
			$options = $v['field_options'];
			$_options_arr = explode("\n",$options);
			
			$options_arr = NULL;
			foreach($_options_arr as $option)
			{
				if(trim($option)=="")continue;
				$_arr = explode("|",$option);
				
				$key=  $_arr[0];
				$value= isset( $_arr[1])? $_arr[1]:$key;
				$options_arr[$key] = $value;
			}
			
			
			if($v['is_list']&&!in_hidden_field($v['field_type']))
			{
				$view_list_fields[$v['field_id']] = array('field_name'=>$v['field_name'],'field_caption'=>$v['field_caption'],'default_value'=>$v['default_value'],'field_type'=>$v['field_type'],'field_options'=>$options_arr,'is_sort'=>$v['is_sort'],'is_options_from_datasource'=>$v['is_options_from_datasource'],'datasource_model'=>$v['datasource_model'],'datasource_function_name'=>$v['datasource_function_name'],'datasource_control'=>$v['datasource_control'],'datasource_control_path'=>$v['datasource_control_path'],'is_unique'=>$v['is_unique']);
			}
			
			if($v['is_search']&&!in_hidden_field($v['field_type']))
			{
				$view_search_fields[$v['field_id']] = array('upload_file_type'=>$v['upload_file_type'],'upload_path'=>$v['upload_path'],'upload_url'=>$v['upload_url'],'upload_max_size'=>$v['upload_max_size'],'field_name'=>$v['field_name'],'field_caption'=>$v['field_caption'],'default_value'=>$v['default_value'],'field_type'=>$v['field_type'],'field_options'=>$options_arr,'is_required'=>$v['is_required'],'error_tips'=>$v['error_tips'],'required_tips'=>$v['required_tips'],'is_pri'=>$v['is_pri'],'html_control_name'=>html_control_name($v['field_name'],$v['field_type']),'group_item_num'=>$v['group_item_num'],'html_control_id'=>html_control_id($v['field_name'],$v['field_type']),'filter_func'=>isset($filter_func_arr[$v['field_type']])?$filter_func_arr[$v['field_type']]:'','is_options_from_datasource'=>$v['is_options_from_datasource'],'datasource_model'=>$v['datasource_model'],'datasource_function_name'=>$v['datasource_function_name'],'is_unique'=>$v['is_unique'],'datasource_control'=>$v['datasource_control'],'datasource_control_path'=>$v['datasource_control_path']);
				$keywords_serach_arr[] = $v['field_name'];
			}
			
			if($v['is_sort']&&!in_hidden_field($v['field_type']))
			{
				$view_order_fields[$v['field_id']] = array('field_name'=>$v['field_name'],'field_caption'=>$v['field_caption'],'default_value'=>$v['default_value'],'field_type'=>$v['field_type'],'field_options'=>$options_arr,'html_control_id'=>html_control_id($v['field_name'],$v['field_type']),'html_control_name'=>html_control_name($v['field_name']),'is_options_from_datasource'=>$v['is_options_from_datasource'],'datasource_model'=>$v['datasource_model'],'datasource_function_name'=>$v['datasource_function_name'],'is_unique'=>$v['is_unique'],'datasource_control'=>$v['datasource_control'],'datasource_control_path'=>$v['datasource_control_path']);
			}
			
			//图片文件上传
			if(in_array($v['field_type'],$this->upload_FileType_Arr))
			{
				$view_upload_fields[$v['field_id']] = array('field_name'=>$v['field_name'],'field_caption'=>$v['field_caption'],'default_value'=>$v['default_value'],'upload_file_type'=>$v['upload_file_type'],'upload_path'=>$v['upload_path'],'upload_url'=>$v['upload_url'],'upload_max_size'=>$v['upload_max_size'],'is_options_from_datasource'=>$v['is_options_from_datasource'],'datasource_model'=>$v['datasource_model'],'datasource_function_name'=>$v['datasource_function_name'],'is_unique'=>$v['is_unique'],'datasource_control'=>$v['datasource_control'],'datasource_control_path'=>$v['datasource_control_path']);
			}
			 
			
			$_all_fields[$v['field_id']] = array('upload_file_type'=>$v['upload_file_type'],'upload_path'=>$v['upload_path'],'upload_url'=>$v['upload_url'],'upload_max_size'=>$v['upload_max_size'],'field_name'=>$v['field_name'],'field_caption'=>$v['field_caption'],'default_value'=>$v['default_value'],'field_type'=>$v['field_type'],'field_options'=>$options_arr,'is_required'=>$v['is_required'],'error_tips'=>$v['error_tips'],'required_tips'=>$v['required_tips'],'is_pri'=>$v['is_pri'],'html_control_name'=>html_control_name($v['field_name'],$v['field_type']),'group_item_num'=>$v['group_item_num'],'html_control_id'=>html_control_id($v['field_name'],$v['field_type']),'filter_func'=>isset($filter_func_arr[$v['field_type']])?$filter_func_arr[$v['field_type']]:'','is_options_from_datasource'=>$v['is_options_from_datasource'],'datasource_model'=>$v['datasource_model'],'datasource_function_name'=>$v['datasource_function_name'],'is_unique'=>$v['is_unique'],'datasource_control'=>$v['datasource_control'],'datasource_control_path'=>$v['datasource_control_path']);
			
			if($v['field_type']>1)
			$_view_edit_fields[$v['field_id']] = $_all_fields[$v['field_id']];
			
			
			if(intval($v['field_type'])==6)
			{
				$data_info['has_datepicker'] = 1;
			}
			
			if(intval($v['field_type'])==7)
			{
				$data_info['has_datetimepicker'] = 1;
			}
			
			if(intval($v['field_type'])==8)
			{
				$data_info['has_timepicker'] = 1;
			}
		}
		
		
		$view_edit_fields = $all_fields = array();
		if($_view_edit_fields)
		foreach($_all_fields  as $k=>$v)
		{
			$group_name = html_tab_group_name($v['group_item_num']);
			if($v['field_type']>1)
			{
				$view_edit_fields[$group_name][]=$v;
			}
			$all_fields[$group_name][]=$v;
		}
		
		
		$search_by_fields_sql = $keywords_serach_arr!=NULL?'concat('.implode(",",$keywords_serach_arr).')':'';
		
		$data_info['view_list_fields'] = $view_list_fields;
		$data_info['view_edit_fields'] = $view_edit_fields;
		$data_info['view_search_fields'] = $view_search_fields;
		$data_info['view_upload_fields'] = $view_upload_fields;
		$data_info['view_order_fields'] = $view_order_fields;
		$data_info['search_by_fields_sql'] = $search_by_fields_sql;

		$data_info['trigger'] = isset($trigger_list[0])?$trigger_list[0]:NULL;
		
		//字符类搜索
		
		$view_search_fields_types = NULL; //字符串类搜索
		if($view_search_fields)
		foreach($view_search_fields as $k=>$v)
		{
			//字符类
			if(in_array($v['field_type'],$this->string_FileType_Arr))
			{
				$v['is_required'] = false;
				$view_search_fields_types['string'][trim($v['field_name'])]= $v;
			}
			
			//时间类
			if(in_array($v['field_type'],$this->datetime_FileType_Arr))
			{
				$v['is_required'] = false;
				$view_search_fields_types['datetime'][trim($v['field_name'])]= $v;
			}
			
			//单选类
			if(in_array($v['field_type'],$this->dropdown_FileType_Arr))
			{
				
				$v['is_required'] = false;
				
				if($v['field_type']<33){
					$v['field_type'] = 33;
					$v['field_options'] = array('是'=>'是','否'=>'否');
				}
				$view_search_fields_types['dropdown'][trim($v['field_name'])]= $v;
			}
			
			//多选类
			if(in_array($v['field_type'],$this->checkbox_FileType_Arr))
			{
				$v['field_type'] = 42;
				$v['is_required'] = false;
				$view_search_fields_types['checkbox'][trim($v['field_name'])]= $v;
			}
			
			//数字类
			if(in_array($v['field_type'],$this->number_FileType_Arr))
			{
				$v['is_required'] = false;
				$view_search_fields_types['number'][trim($v['field_name'])]= $v;
			}
			
		}
		
		$data_info['view_search_fields_types'] = $view_search_fields_types;
		$table_name = strtolower($data_info['controller_name']);
		//先成成SQL 生成语句
		$mysql  = "CREATE TABLE  IF NOT EXISTS `t_aci_{$table_name}`\n";
		$mysql .= "(\n";
		
	
		foreach($all_fields as $group=>$items)
		{
			foreach($items as $k=>$v)
			{
				switch($v['field_type'])
				{
					case 0:
						$mysql .= "`{$table_name}_id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n";
					break;
					case 1:
						
					break;
					case 2:
					case 33: 
					case 34: 
					case 41: 
					case 42: 
					case 51: 
					case 52: 
						$mysql .= "`{$v['field_name']}` varchar(250) DEFAULT NULL COMMENT '{$v['field_caption']}',\n";
					break;
					case 3:
					case 4:
					case 5:
					case 62:
						$mysql .= "`{$v['field_name']}` varchar(50) DEFAULT NULL COMMENT '{$v['field_caption']}',\n";
					break;
					case 6://只能输入年月日格式文本
						$mysql .= "`{$v['field_name']}` date DEFAULT NULL COMMENT '{$v['field_caption']}',\n";
					break;
					case 7: //只能输入年月日时分秒格式文本
						$mysql .= "`{$v['field_name']}` datetime DEFAULT NULL COMMENT '{$v['field_caption']}',\n";
					break;
					case 8: //只能输入时分秒格式文本
						$mysql .= "`{$v['field_name']}` time DEFAULT NULL COMMENT '{$v['field_caption']}',\n";
					break;
					case 11: //多行文本
						$mysql .= "`{$v['field_name']}` text COMMENT '{$v['field_caption']}',\n";
					break;
					case 12: //多行文本带编辑器
						$mysql .= "`{$v['field_name']}` text COMMENT '{$v['field_caption']}',\n";
					break;
					case 21: //
						$mysql .= "`{$v['field_name']}` int(11) DEFAULT '0' COMMENT '{$v['field_caption']}',\n";
					break;
					case 22: //
						$mysql .= "`{$v['field_name']}` decimal(10,2) DEFAULT '0.00' COMMENT '{$v['field_caption']}',\n";
					break;
					case 31: 
					case 32: 
						$mysql .= "`{$v['field_name']}` char(2) DEFAULT NULL COMMENT '{$v['field_caption']}',\n";
					break;
					default:
						$mysql .= "`{$v['field_name']}` varchar(50) DEFAULT NULL COMMENT '{$v['field_caption']}',\n";
					break;
				}
				
			}
		}
		
		$mysql .= "PRIMARY KEY (`{$table_name}_id`)\n";
		$mysql .= ") ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;\n";
		
		$data_info['mysql_create_sql'] = $mysql;
		
		
		$data_info['model_function'] =  NULL;
		
		if($datasource_list)
		foreach($datasource_list as $k=>$v)
		{
			$data_info['model_function'][] = array('force_convert_text_readonly'=>$v['force_convert_text_readonly'],'force_convert_text_edit'=>$v['force_convert_text_edit'],'datasource_typeid'=>$v['datasource_typeid'],'datasource_name'=>$v['datasource_name'],'function_name'=>$v['datasource_function_name'],'fields'=>$v['sql_fields'],'fields_caption'=>$v['sql_fields_caption'],'fields_convert'=>$v['sql_convert_fields'],'concat_char'=>$v['concat_char'],'orderby'=>'','limit'=>'','where'=>'');
		}

		setcache('module_project_'.$this->user_id.'_'.$id,$data_info);
		
		return $data_info;
	}
	
	function index()
	{
		$data_list = $this->Module_model->select(array('user_id'=>$this->user_id),'*','','module_id asc');
		$this->view('index',array('require_js'=>true,'datalist'=>$data_list));
	}
	
	function edit($id)
	{
		
		$id = intval($id);
		$data_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));

		if($this->input->is_ajax_request())
		{
				$caption = trim($this->input->post('caption',true));
				$controllerName = trim($this->input->post('controllerName',true));
				$charset = trim($this->input->post('charset',true));
				$methodFuncArr = $this->input->post('methodFunc',true);
				$jsPath = trim($this->input->post('jsPath',true));
				$controller_author = trim($this->input->post('author',true));

				
		
				$jsCore = max(intval($this->input->post('jsCore')),1);
				$jsFile = max(intval($this->input->post('jsFile')),1);
				$controller_path = trim($this->input->post('controllerPath',true));
				$extend_class= trim($this->input->post('extendClass',true));
				$field_name_format =  trim($this->input->post('fieldNameFormat',true));
				$page_size= min(max(intval($this->input->post('pageSize',true)),5),100);
				$css_icon = trim($this->input->post('cssIcon',true));
				
				if($caption=="")exit(json_encode(array('status'=>false,'tips'=>' 模块中文名称不能为空')));
				if($controllerName=="")exit(json_encode(array('status'=>false,'tips'=>' 控制器英文名称不能为空')));
				if($extend_class=="")exit(json_encode(array('status'=>false,'tips'=>' 继承控制器不能为空')));
				if(empty($methodFuncArr))exit(json_encode(array('status'=>false,'tips'=>' 方法列表不能为空')));
				
				$update_info = array(
																'controller_caption'=>$caption,
																'controller_name'=>$controllerName,
																'charset'=>$charset,
																'method_func'=> implode(",",$methodFuncArr),
																'javascript_core'=>$jsCore,
																'javascript_file'=>$jsFile,
																'version'=>'1',
																'modified'=>date('Y-m-d H:i:s'),
																'controller_path'=>$controller_path,
																'extend_class'=>$extend_class,
																'page_size'=>$page_size,
																'user_id'=>$this->user_id,
																'field_name_format'=>$field_name_format,
																'css_icon'=>$css_icon,
																'controller_author'=>$controller_author,
																'js_path'=>strtolower($jsPath),
															);
				if(!$data_info)
				{
					$update_info['created'] = date("Y-m-d H:i:s");
					$status = $id = $this->Module_model->insert($update_info);
				}else
				{
			 		$status = $this->Module_model->update($update_info,array('module_id'=>$id,'user_id'=>$this->user_id));
				}
				 
				 $this->_cache($id);
				 if($status)
				 {
				 	echo json_encode(array('status'=>true,'tips'=>"ok",'m_id'=>$id));
				 }
				 else
				 	echo json_encode(array('status'=>false,'tips'=>"false"));
			
			 
		}else
		{
			if(!$data_info)$this->showmessage('模块信息不存在');
			$this->view('edit',array('require_js'=>true,'is_edit'=>true,'dataInfo'=>$data_info));
		}
	}
	
	function add()
	{
		$this->view('edit',array('require_js'=>true,'is_edit'=>false,'dataInfo'=>$this->Module_model->default_info()));
	}
	
	function edit_field_ext($id=0)
	{
		$id = intval($id);
		$data_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		$data_list= $this->Module_field_model->select(array('module_id'=>$id,'user_id'=>$this->user_id),'*','','group_item_num asc,index_num asc');
		$datasource_list =$this->Module_datasource_model->select('user_id ='.$this->user_id.' or module_id<=10');
	
		$upload_items = $multi_items= $windows_items= NULL;
		$fields = array();
		foreach($data_list as $k=>$v)
		{
			if(in_array($v['field_type'],$this->upload_FileType_Arr))
			{
				$upload_items[$v['field_id']] = $v;
			}
			if(in_array($v['field_type'],$this->multi_FileType_Arr))
			{
				$multi_items[$v['field_id']] = $v;
			}
			if(in_array($v['field_type'],$this->windows_FileTYpe_Arr))
			{
				$windows_items[$v['field_id']] = $v;
			}
			
			//multi_items
		}
		
		if($this->input->is_ajax_request())
		{
			if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>' 模块信息不存在')));
			
			$required_item = $this->input->post('required_item',true);
			$sort_item = $this->input->post('sort_item',true);
			$search_item = $this->input->post('search_item',true);
			$list_item = $this->input->post('list_item',true);
			$filter_item = $this->input->post('filter_item',true);
			$requireTips = $this->input->post('require_tips',true);
			$errorTips = $this->input->post('error_tips',true);
			$group_item = $this->input->post('group_item',true);
			$index_num = $this->input->post('index_num',true);
			
			if(!is_array($required_item))exit(json_encode(array('status'=>false,'tips'=>' 必填项不能全为空')));
			if(!is_array($list_item))exit(json_encode(array('status'=>false,'tips'=>' 列表项不能全为空')));
			if(!is_array($group_item))exit(json_encode(array('status'=>false,'tips'=>' 分组项不能全为空')));
			if(!is_array($index_num))exit(json_encode(array('status'=>false,'tips'=>' 排序不能全为空')));
			
			if(empty($required_item))exit(json_encode(array('status'=>false,'tips'=>' 必填项不能全为空')));
			if(trim($requireTips)=="")exit(json_encode(array('status'=>false,'tips'=>' 必填项友情提醒不能为空')));
			if(trim($errorTips)=="")exit(json_encode(array('status'=>false,'tips'=>' 不符合要求友情提醒不能为空')));
			
			
			
			foreach($data_list as $k=>$v)
			{
				
				$fields[$v['field_id']] = array('modified'=>date('Y-m-d'),'is_sort'=>0,'is_search'=>0,'is_list'=>0,'is_required'=>0,'upload_path'=>'','upload_max_size'=>1024,'upload_file_type'=>'','error_tips'=>sprintf($errorTips,$v['field_caption']),'required_tips'=>sprintf($requireTips,$v['field_caption']));
			}
		
			foreach($fields as $k=>$v)
			{
				$is_sort = isset($sort_item[$k])?1:0;
				$is_search = isset($search_item[$k])?1:0;
				$is_list = isset($list_item[$k])?1:0;
				$is_required = isset($required_item[$k])?1:0;
				
				$group_item_value = isset($group_item[$k])?intval($group_item[$k]):1;
				$index_num_value = isset($index_num[$k])?intval($index_num[$k]):1;
				
				$fields[$k]['modified'] = date('Y-m-d');
				$fields[$k]['is_sort'] = $is_sort;
				$fields[$k]['is_search'] = $is_search;
				$fields[$k]['is_list'] = $is_list;
				$fields[$k]['is_required'] = $is_required;
				$fields[$k]['group_item_num'] = $group_item_value;
				$fields[$k]['index_num'] = $index_num_value;

				$fields[$k]['datasource_model'] = ucfirst($data_info['controller_name']."_model");
				$fields[$k]['is_options_from_datasource'] = false;
				$fields[$k]['datasource_id'] = 0;
				$fields[$k]['datasource_function_name'] = '';
				$fields[$k]['datasource_control'] = $data_info['controller_name'];
				$fields[$k]['datasource_control_path'] = $data_info['controller_path']."/".$data_info['controller_name'];
				
			}
			
			
			$fileSize = $this->input->post('file_size',true);
			$filePath = $this->input->post('file_path',true);
			$fileUrl = $this->input->post('file_url',true);
			
			if($upload_items)
			foreach($upload_items as $k=>$v)
			{
				if(intval($fileSize[$k])<=0)exit(json_encode(array('status'=>false,'tips'=>$v['field_caption'].'大小不能为零')));
				if($filePath[$k]=="")exit(json_encode(array('status'=>false,'tips'=>$v['field_caption'].'上传路径不能为空')));
				if($fileUrl[$k]=="")exit(json_encode(array('status'=>false,'tips'=>$v['field_caption'].'URL前缀不能为空')));
				
				$fields[$k]['upload_max_size']= intval($fileSize[$k]);
				$fields[$k]['upload_file_type']= "jpg|png|gif";
				$fields[$k]['upload_path']= trim($filePath[$k]);
				$fields[$k]['upload_url']= trim($fileUrl[$k]);
			}
			
			$fileValue = $this->input->post('file_value',true);
			$from_datasource = $this->input->post('from_datasource',true);
			$file_value_from = $this->input->post('file_value_from',true);
			
			$relation_module = NULL;
			if($multi_items)
			foreach($multi_items as $k=>$v)
			{
				$from_datasource_value = isset($from_datasource[$k])?$from_datasource[$k]:"";
				$file_value_from_value = isset($file_value_from[$k])?$file_value_from[$k]:"";
				
				
				if($from_datasource_value==""||$file_value_from_value=="1")
				{
					if(trim($fileValue[$k])=="")
					{
						exit(json_encode(array('status'=>false,'tips'=>$v['field_caption'].' 不能为空')));
					}
					
					$fields[$k]['field_options'] = $fileValue[$k];
					$fields[$k]['is_options_from_datasource'] = false;
					$fields[$k]['datasource_id'] = 0;
					$fields[$k]['datasource_function_name'] = '';

					$fields[$k]['datasource_model'] = ucfirst($data_info['controller_name']."_model");
					$fields[$k]['is_options_from_datasource'] = false;
					$fields[$k]['datasource_id'] = 0;
					$fields[$k]['datasource_function_name'] = '';
					$fields[$k]['datasource_control'] = $data_info['controller_name'];
					$fields[$k]['datasource_control_path'] = $data_info['controller_path'];

					
					
				}else {
					$fields[$k]['field_options'] = NULL;
					
					$datasource_info = $this->Module_datasource_model->get_one(array('datasource_id'=>$from_datasource_value),'*');
					
					if($datasource_info){

						if($datasource_info['module_id']>10 && $datasource_info['user_id'] != $this->user_id){
							exit(json_encode(array('status'=>false,'tips'=>' 关联数据源不存在3333')));
						}

						if($datasource_info['module_id']<10){

							$module_info = $this->Module_model->get_one(array('module_id'=>$datasource_info['module_id']));

						}else{

							$module_info = $this->Module_model->get_one(array('module_id'=>$datasource_info['module_id'],'user_id'=>$this->user_id));

						}

						//设置关联娄据源
						$relation_module['model'][] = ucfirst($module_info['controller_name']."_model");
						
						$fields[$k]['datasource_model'] = ucfirst($module_info['controller_name']."_model");
						$fields[$k]['is_options_from_datasource'] = true;
						$fields[$k]['datasource_id'] = $from_datasource_value;
						$fields[$k]['datasource_function_name'] = $datasource_info['datasource_function_name'];
						$fields[$k]['datasource_control'] = $module_info['controller_name'];
						$fields[$k]['datasource_control_path'] = $datasource_info['controller_path'];
						
					}else
					{
						exit(json_encode(array('status'=>false,'tips'=>' 关联数据源不存在11')));
					}
				}
				//要处理动态数据源
			}
			
			if($windows_items)
			foreach($windows_items as $k=>$v)
			{
				$from_datasource_value = isset($from_datasource[$k])?$from_datasource[$k]:"";
				$file_value_from_value = isset($file_value_from[$k])?$file_value_from[$k]:"";
				
				
				if($from_datasource_value==""||$file_value_from_value=="1")
				{
					if(trim($fileValue[$k])=="")
					{
						exit(json_encode(array('status'=>false,'tips'=>$v['field_caption'].' 不能为空')));
					}
					
					$fields[$k]['field_options'] = $fileValue[$k];
					$fields[$k]['is_options_from_datasource'] = false;
					$fields[$k]['datasource_id'] = 0;
					$fields[$k]['datasource_function_name'] = '';


					$fields[$k]['datasource_model'] = ucfirst($data_info['controller_name']."_model");
					$fields[$k]['is_options_from_datasource'] = false;
					$fields[$k]['datasource_id'] = 0;
					$fields[$k]['datasource_function_name'] = '';
					$fields[$k]['datasource_control'] = $data_info['controller_name'];
					$fields[$k]['datasource_control_path'] = $data_info['controller_path'];
					
				}else {
					$fields[$k]['field_options'] = NULL;

					$where = "datasource_id = {$from_datasource_value} ";
					$datasource_info = $this->Module_datasource_model->get_one(array('datasource_id'=>$from_datasource_value),'*');
					
					
					if($datasource_info){

						if($datasource_info['module_id']>10 && $datasource_info['user_id'] != $this->user_id){
							exit(json_encode(array('status'=>false,'tips'=>' 关联数据源不存在3333')));
						}

						if($datasource_info['module_id']<10){

							$module_info = $this->Module_model->get_one(array('module_id'=>$datasource_info['module_id']));

						}else{

							$module_info = $this->Module_model->get_one(array('module_id'=>$datasource_info['module_id'],'user_id'=>$this->user_id));

						}

						if(!$module_info) exit(json_encode(array('status'=>false,'tips'=>' 关联数据源模块不存在222')));
						//设置关联娄据源
						$relation_module['model'][] = ucfirst($module_info['controller_name']."_model");
						
						$fields[$k]['datasource_model'] = ucfirst($module_info['controller_name']."_model");
						$fields[$k]['is_options_from_datasource'] = true;
						$fields[$k]['datasource_id'] = $from_datasource_value;
						$fields[$k]['datasource_function_name'] = $datasource_info['datasource_function_name'];
						$fields[$k]['datasource_control'] = $module_info['controller_name'];
						$fields[$k]['datasource_control_path'] = $datasource_info['controller_path'];
						
					}else
					{
						exit(json_encode(array('status'=>false,'tips'=>' 关联数据源不存在3333')));
					}
				}
				//要处理动态数据源
			}
			
			foreach($fields as $k=>$v)
			{
				$status = $this->Module_field_model->update($v,array('module_id'=>$id,'user_id'=>$this->user_id,'field_id'=>$k));
			}

			$this->Module_model->update(array('error_tips'=>$errorTips,'required_tips'=>$requireTips,'relation_module'=>json_encode($relation_module)),array('module_id'=>$id,'user_id'=>$this->user_id));
			
			//relation_module
			$this->_cache($id);
			echo json_encode(array('status'=>true,'tips'=>"保存成功"));
			
		}else
		{
			if(!$data_info)$this->showmessage('模块信息不存在');
			if(!$data_list)$this->showmessage('模块字段信息不存在');
			
			$this->view('edit_field_ext',array('require_js'=>true,'datasource_list'=>$datasource_list,'dataInfo'=>$data_info,'dataList'=>$data_list,'uploadItems'=>$upload_items,'multiItems'=>$multi_items,'windows_items'=>$windows_items));
		}
	}

	function edit_field($id=0)
	{
		$id = intval($id);
		$data_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		
		if($this->input->is_ajax_request())
		{
			if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>' 模块信息不存在')));
			
			$field_name = $this->input->post('field_name',true);
			$field_caption = $this->input->post('field_caption',true);
			$field_type = $this->input->post('field_type',true);
			$default_value = $this->input->post('default_value',true);
			
			if(!is_array($field_name))exit(json_encode(array('status'=>false,'tips'=>' 英文名不能为空')));
			if(!is_array($field_caption))exit(json_encode(array('status'=>false,'tips'=>' 中文名不能为空')));
			if(!is_array($field_type))exit(json_encode(array('status'=>false,'tips'=>' 字段类型不能为空')));
			if(!is_array($default_value))exit(json_encode(array('status'=>false,'tips'=>' 默认值不能为空')));
			if(empty($field_name))exit(json_encode(array('status'=>false,'tips'=>' 英文名不能为空')));
			
			$arr = array();
			
			
			$new_key = strtolower($data_info['controller_name'])."_id";
			
			$arr[$new_key] = array('module_id'=>$id,'field_name'=>$new_key,'field_caption'=>'ID','index_num'=>-999,'field_type'=>0,'default_value'=>'','is_pri'=>true,'created'=>date('Y-m-d H:i:s'),'modified'=>date('Y-m-d H:i:s'),'user_id'=>$this->user_id);
			
			//去重，判断
			foreach($field_name as $k=>$v)
			{
				if(trim($field_name[$k])=="")exit(json_encode(array('status'=>false,'tips'=>' 英文名不能为空,行:'+$k)));
				if(trim($field_caption[$k])=="")exit(json_encode(array('status'=>false,'tips'=>' 中文名不能为空,行:'+$k)));
				if(trim($field_type[$k])=="")exit(json_encode(array('status'=>false,'tips'=>' 字段类型不能为空,行:'+$k)));
				
				$new_key = trim($field_name[$k]);
				$arr[$new_key] = array('module_id'=>$id,'field_name'=>$field_name[$k],'field_caption'=>$field_caption[$k],'field_type'=>$field_type[$k],'default_value'=>$default_value[$k],'is_pri'=>false,'created'=>date('Y-m-d H:i:s'),'modified'=>date('Y-m-d H:i:s'),'user_id'=>$this->user_id);
			}
			
			//在这里要增加版本号
			$_datalist = $this->Module_field_model->select(array('module_id'=>$id,'user_id'=>$this->user_id));
			foreach($_datalist as $k=>$v)
			{
				$new_key = trim($v['field_name']);
				
				if($v['field_type']==USERNAME_FIELD_TYPE)
				{
					$arr[$new_key]['is_options_from_datasource'] =false;
					$arr[$new_key]['is_unique'] =true;
					$arr[$new_key]['datasource_model'] = $data_info['controller_name']."_model";
				}
				if(isset($arr[$new_key]))
				{
					//如果有设置就修改
					//"alter table {$table_name} change  {$v['field_name']} {$new_key} 字段类型;";
					//"alter table {$table_name} change  {$new_key} {$new_key} 字段类型;";
					$this->Module_field_model->update($arr[$new_key],array('field_name'=>$new_key,'module_id'=>$id,'user_id'=>$this->user_id));
					unset($arr[$new_key]);
				}else
				{
					//"alter table {$table_name} drop column {$v['field_name']};";
					$this->Module_field_model->delete(array('field_id'=>$v['field_id'],'module_id'=>$id,'user_id'=>$this->user_id));
				}
			}
			
			
			if(count($arr)>0)
			{
				foreach($arr as $v)
				{
					//"alter table {$table_name} add {$v['field_name']} varchar(10) not Null;";
					$this->Module_field_model->insert($v);
				}
			}
			
			$status = true;
			
			
			$this->_cache($id);
			if($status)
				 	echo json_encode(array('status'=>true,'tips'=>"新增成功"));
			else
				 	echo json_encode(array('status'=>false,'tips'=>"新增失败"));
		}else
		{
			if(!$data_info)$this->showmessage('模块信息不存在');
			$data_list = $this->Module_field_model->select(array('module_id'=>$id,'user_id'=>$this->user_id,'is_pri'=>0),'field_name,field_caption,field_type,default_value','','group_item_num asc,index_num asc');
			$this->view('edit_field',array('require_js'=>true,'dataInfo'=>$data_info,'dataList'=>$data_list));
		}
	}

	function edit_trigger($id=0)
	{
		$id = intval($id);
		if(!$this->Module_field_model->count(array('module_id'=>$id,'user_id'=>$this->user_id)))
		{
			$this->showmessage('模块信息不存在');
		}
		$data_info = $this->Module_trigger_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		if(!$data_info) 
		{
			$this->Module_trigger_model->insert(array('module_id'=>$id,'user_id'=>$this->user_id));
			$data_info = $this->Module_trigger_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		}
		if($this->input->is_ajax_request())
		{
			if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>' 模块信息不存在')));
			
			$var_code = $this->input->post('var_code',true);
			$construct_code = $this->input->post('construct_code',true);
			$insert_before_code = $this->input->post('insert_before_code',true);
			$insert_after_code = $this->input->post('insert_after_code',true);
			$update_before_code = $this->input->post('update_before_code',true);
			$update_after_code = $this->input->post('update_after_code',true);
			$delete_before_code = $this->input->post('delete_before_code',true);
			$delete_after_code = $this->input->post('delete_after_code',true);
			
			$status = $this->Module_trigger_model->update(array(
																'construct_code'=>$construct_code,
																'insert_before_code'=>$insert_before_code,
																'insert_after_code'=>$insert_after_code,
																'update_before_code'=>$update_before_code,
																'update_after_code'=>$update_after_code,
																'delete_before_code'=>$delete_before_code,
																'delete_after_code'=>$delete_after_code,
																),array('module_id'=>$id,'user_id'=>$this->user_id));
			$this->_cache($id);
			if($status)
				 	echo json_encode(array('status'=>true,'tips'=>"修改成功"));
			else
				 	echo json_encode(array('status'=>false,'tips'=>"修改失败"));
		}else
		{
			if(!$data_info)$this->showmessage('模块信息不存在');
			$this->view('edit_trigger',array('require_js'=>true,'dataInfo'=>$data_info));
		}
	}
	
	function add_trigger($id=0)
	{

		$id = intval($id);
		$data_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		
		if($this->input->is_ajax_request())
		{
			if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>' 模块信息不存在')));
			
			$var_code = $this->input->post('var_code',true);
			$construct_code = $this->input->post('construct_code',true);
			$insert_before_code = $this->input->post('insert_before_code',true);
			$insert_after_code = $this->input->post('insert_after_code',true);
			$update_before_code = $this->input->post('update_before_code',true);
			$update_after_code = $this->input->post('update_after_code',true);
			$delete_before_code = $this->input->post('delete_before_code',true);
			$delete_after_code = $this->input->post('delete_after_code',true);
			
			
			$this->Module_trigger_model->delete(array('module_id'=>$id,'user_id'=>$this->user_id));
			$status = $this->Module_trigger_model->insert(array('module_id'=>$id,
																'user_id'=>$this->user_id,
																'construct_code'=>$construct_code,
																'insert_before_code'=>$insert_before_code,
																'insert_after_code'=>$insert_after_code,
																'update_before_code'=>$update_before_code,
																'update_after_code'=>$update_after_code,
																'delete_before_code'=>$delete_before_code,
																'delete_after_code'=>$delete_after_code,
			
																));
			$this->_cache($id);												
			if($status)
				 	echo json_encode(array('status'=>true,'tips'=>"新增成功"));
			else
				 	echo json_encode(array('status'=>false,'tips'=>"新增失败"));
		}else
		{
			if(!$data_info)$this->showmessage('模块信息不存在');
			$this->view('add_trigger',array('require_js'=>true,'dataInfo'=>$data_info));
		}
	}
	
	/*function export($id=0)
	{
		$this->_cache($id);
		$this->showmessage('正在生成请稍等',base_url('module/code/export/'.$id),1);
	}*/
	
	function download($id=0)
	{
		$this->_cache($id);
		$this->showmessage('正在生成请稍等',base_url('module/code/download/'.$id),1);
	}
	
	function sql($id=0)
	{
		$id = intval($id);
		$data_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		if(!$data_info)$this->showmessage('模块信息不存在');
		
		$data_info= $this->_cache($id);
		
		$this->load->helper('download');
		force_download(strtolower("t_aci_".$data_info['controller_name']).".sql", $data_info['mysql_create_sql']);
	}
	
	function edit_template($id=0)
	{

		$id = intval($id);
		$data_info = $this->Module_trigger_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		if(!$data_info)$this->showmessage('模块信息不存在');
		if(isset($_POST['view_header_code']))
		{
			$view_header_code = $this->input->post('view_header_code',true);
			$view_footer_code = $this->input->post('view_footer_code',true);
			
			$status = $this->Module_trigger_model->update(array('view_header_code'=>$view_header_code,
																'view_footer_code'=>$view_footer_code,
																),array('module_id'=>$id,
																		'user_id'=>$this->user_id));
			$this->_cache($id);
			if($status)
				 	$this->showmessage('操作成功',base_url('module/project'));
			else
				 	$this->showmessage('操作保存失败');
		}else
			$this->view('edit_template',array('require_js'=>true,'dataInfo'=>$data_info));
	}
	
	function add_template($id=0)
	{

		$id = intval($id);
		$data_info = $this->Module_model->get_one(array('module_id'=>$id,'user_id'=>$this->user_id));
		if(!$data_info)$this->showmessage('模块信息不存在');
		if(isset($_POST['view_header_code']))
		{
			$view_header_code = $this->input->post('view_header_code',true);
			$view_footer_code = $this->input->post('view_footer_code',true);
			
			$status = $this->Module_trigger_model->update(array('view_header_code'=>$view_header_code,
																'view_footer_code'=>$view_footer_code,
																),array('module_id'=>$id,
																		'user_id'=>$this->user_id));
			$this->_cache($id);
			if($status)
				 	$this->showmessage('操作成功',base_url('module/project'));
			else
				 	$this->showmessage('操作保存失败');
		}else
			$this->view('add_template');
	}

}