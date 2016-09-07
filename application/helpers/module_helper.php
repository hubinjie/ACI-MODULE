<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('controller_options'))
	{
		function controller_options($defaultValue='Front_Controller'){
			
			$options[] =array('caption'=>'API_Controller(应用API接口类，需要用户登录)','value'=>'API_Controller');
			$options[] =array('caption'=>'Front_Controller(不需要登录，继承CI_Controller，推荐)','value'=>'Front_Controller');
			$options[] =array('caption'=>'Member_Controller(需要用户中心登录)','value'=>'Member_Controller');
			$options[] =array('caption'=>'Admin_Controller(需要后台中心登录)','value'=>'Admin_Controller');

			$_html="";
			foreach($options as $k=>$v)
			{
				if($defaultValue == $v['value'])
					$_html .="<option value=\"{$v['value']}\" selected=\"selected\">{$v['caption']}</option>";
				else
					$_html .="<option value=\"{$v['value']}\" >{$v['caption']}</option>";
			}
			
			return $_html;
			
		}
		
	}
	
	if(!function_exists('html_control_name'))
	{
		function html_control_name($field_name='',$field_type=''){
			return $field_name;
		}
		
		function html_control_id($field_name='',$field_type=''){
			return $field_name;
		}
	}
	
	if(!function_exists('html_tab_group_list'))
	{
		function html_tab_group_list($defaultValue=''){
			
			$_arr = array('基本信息','高级信息','附加信息','可选信息');
			$html = "";
			foreach($_arr  as $k=>$v)
			{
				if($defaultValue==$k)
					$html .= "<option value='".$k."' selected=\"selected\">".$v."</option>";
				else
					$html .= "<option value='".$k."'>".$v."</option>";
			}
			
			return $html;
		}
	}
	
	if(!function_exists('html_tab_group_name'))
	{
		function html_tab_group_name($defaultValue=''){
			
			$_arr = array('基本信息','高级信息','附加信息','可选信息');
		
			return $_arr[$defaultValue];
		}
	}
	
	if(!function_exists('tab_module_bar'))
	{
		function tab_module_bar($defaultValue='',$mId){
		
			$html = "";
			if($mId>0){
				$html='<div class="btn-group btn-group-justified">';
				$html.='<div class="btn-group">';
				$html.=' <a href="'.base_url('module/project/edit/'.$mId).'" class="btn btn-'.($defaultValue==1?'info':'default').'">模块信息</a>';
				$html.='</div>';
				$html.='<div class="btn-group">';
				$html.=' <a href="'.base_url('module/project/edit_field/'.$mId).'" class="btn btn-'.($defaultValue==2?'info':'default').'">字段信息</a>';
				$html.='</div>';
				$html.='<div class="btn-group">';
				$html.=' <a href="'.base_url('module/project/edit_field_ext/'.$mId).'" class="btn btn-'.($defaultValue==3?'info':'default').'">字段扩展信息</a>';
				$html.='</div>';
				/*$html.='<div class="btn-group">';
				$html.=' <a href="'.base_url('module/project/edit_trigger/'.$mId).'" class="btn btn-'.($defaultValue==4?'info':'default').'">触发器信息</a>';
				$html.='</div>';
				$html.='<div class="btn-group">';
				$html.=' <a href="'.base_url('module/project/edit_template/'.$mId).'" class="btn btn-'.($defaultValue==5?'info':'default').'">触模板信息</a>';
				$html.='</div>';*/
				$html.='</div><br/>';
			}
			
			return $html;
		}
	}
	
	if(!function_exists('rand_field_types'))
	{
		function rand_field_types($fieldtypeid=1){
			$result = array('group'=>'字符类','options'=>array(
															array('id'=>2,'value'=>'无格式要求单行文本','type'=>'string'),
															array('id'=>3,'value'=>'只能输入EMAIL格式文本','type'=>'string'),
															array('id'=>4,'value'=>'只能输入网址格式文本','type'=>'string'),
															array('id'=>5,'value'=>'只能输入手机号码格式文本','type'=>'string'),
															array('id'=>6,'value'=>'只能输入年月日格式文本','type'=>'datetime'),
															array('id'=>7,'value'=>'只能输入年月日时分秒格式文本','type'=>'datetime'),
															array('id'=>8,'value'=>'只能输入时分秒格式文本','type'=>'time'),
															array('id'=>11,'value'=>'多行文本','type'=>'string'),
															array('id'=>12,'value'=>'多行文本带编辑器','type'=>'string'),
															array('id'=>13,'value'=>'用户名输入框','type'=>'string'),
															array('id'=>14,'value'=>'密码输入框','type'=>'string'),
														));
			$result[] = array('group'=>'数字类','options'=>array(
															array('id'=>21,'value'=>'数字'),
															array('id'=>22,'value'=>'带2位小数点数字(价格)')
														));
			$result[] = array('group'=>'单选类','options'=>array(
															array('id'=>31,'value'=>'下拉选择是与否'),
															array('id'=>32,'value'=>'单选是与否'),
															array('id'=>33,'value'=>'下拉选择单选...'),
															array('id'=>34,'value'=>'单选框单选...'),
															array('id'=>35,'value'=>'弹窗单选～选择数据源...'),
														));
			$result[] = array('group'=>'多选类','options'=>array(
															array('id'=>41,'value'=>'下拉选择多选...'),
															array('id'=>42,'value'=>'多选框多选...'),
															array('id'=>43,'value'=>'弹窗多选～选择数据源...'),
														));
			$result[] = array('group'=>'上传类','options'=>array(
															array('id'=>51,'value'=>'单个图片上传...'),
															array('id'=>52,'value'=>'单个文件上传...')
														));
			$result[] = array('group'=>'特殊类','options'=>array(
															array('id'=>61,'value'=>'当前用户名ID...'),
															array('id'=>62,'value'=>'当前用户名'),
															array('id'=>63,'value'=>'当前系统时间'),
														));
			return $result;
		}
	}
	
	if(!function_exists('rand_field_value'))
	{
		function rand_field_value($fieldtypeid=1){
			
		}
	}
	
	if(!function_exists('view_control_by_type'))
	{
		
		function view_control_by_type_51($field_info= array()){
			$field_type = $field_info['field_type'];
			$field_caption = $field_info['field_caption'];
			
			
			$default_value ="{php echo  isset(\$data_info['".$field_info['field_name']."'])?('".$field_info['upload_url']."/'.\$data_info['".$field_info['field_name']."']):'' }";
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],"<img src='{SITE_URL}{$default_value}' width=\"100\" />");
		}
		
		function view_control_by_type_52($field_info= array()){
			$field_type = $field_info['field_type'];
			$field_caption = $field_info['field_caption'];
			
			
			$default_value ="{php echo isset(\$data_info['".$field_info['field_name']."'])?('".$field_info['upload_url']."/'.\$data_info['".$field_info['field_name']."']):'' }";
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],"<a href='{SITE_URL}$default_value' target=\"_blank\" >点击查看</a>");
		}
		
		function view_control_by_type($field_info= array()){
			
			$field_type = $field_info['field_type'];
			$field_caption = $field_info['field_caption'];
			$default_value ="{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }";
			
			if(function_exists('view_control_by_type_'.$field_type)) 
			{
				$func = 'view_control_by_type_'.$field_type;
				
				return  $func($field_info);
			}else
			{
				$html_config=array('default_select_text'=>"==请选择==",'left_size'=>'col-sm-2','right_size'=>'col-sm-9 form-control-static');
				
				return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],$default_value,$html_config);
			}
		}
	}
	
	//根据类型自动生成表单
	if(!function_exists('form_control_by_type'))
	{
		function _form_control_html_type($htmlid,$htmlname,$htmlvalue='',$html_config=array('default_select_text'=>"==请选择==",'left_size'=>'col-sm-2','right_size'=>'col-sm-9')){
			$html  ="\n".'	<div class="form-group">'."\n";
			$html .= '				<label for="'.$htmlid.'" class="'.$html_config['left_size'].' control-label form-control-static">'.$htmlname.'</label>'."\n";
			$html .= '				<div class="'.$html_config['right_size'].' ">'."\n";
			$html .= '					'.$htmlvalue."\n";
			$html .= '				</div>'."\n";	
			$html .= '			</div>'."\n";	
			
			return $html;
		}
		
		function form_control_by_type($field_info= array(),$is_fill_value=false,$html_config=array('default_select_text'=>"==请选择==",'left_size'=>'col-sm-2','right_size'=>'col-sm-9')){
			
			$field_type = $field_info['field_type'];
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? " value='{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }'" :"";
			
			//print_r($field_info);
			
			if(function_exists('form_control_by_type_'.$field_type)) 
			{
				$func = 'form_control_by_type_'.$field_type;
				
				return  $func($field_info,$is_fill_value,$html_config);
			}else
			{
				return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<input type="text" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'" '.$default_value.'  class="form-control validate[required]"  placeholder="请输入'.$field_caption.'" >',$html_config);
			}
		}
	}
	
	//只能输入EMAIL格式文本
	if(!function_exists('form_control_by_type_3'))
	{
		function form_control_by_type_3($field_info= array(),$is_fill_value=false,$html_config){
			
			$default_value = $is_fill_value? " value='{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }'" :"";

			$css_class =  $field_info['is_required']?" validate[required,custom[email]]":" validate[custom[email]]";
			$field_caption = $field_info['field_caption'];
		
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<input type="email" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"  '.$default_value.'  class="form-control '.$css_class.'"  placeholder="请输入'.$field_caption.'" >',$html_config);
		}
	}
	
	//只能输入网址格式文本
	if(!function_exists('form_control_by_type_4'))
	{
		function form_control_by_type_4($field_info= array(),$is_fill_value=false,$html_config){
			
			$css_class =  $field_info['is_required']?" validate[required,custom[url]]":" validate[custom[url]]";
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? " value='{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }'" :"";
	
	
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<input type="url" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"  '.$default_value.'   class="form-control '.$css_class.'"  placeholder="请输入'.$field_caption.'" >',$html_config);

		}
	}
	
	//只能输入手机号码格式文本
	if(!function_exists('form_control_by_type_5'))
	{
		function form_control_by_type_5($field_info= array(),$is_fill_value=false,$html_config){
			
			$css_class =  $field_info['is_required']?" validate[required,custom[mobile]]":" validate[custom[phone]]";
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? " value='{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }'" :"";
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<input type="text" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"  '.$default_value.'   class="form-control '.$css_class.'"  placeholder="请输入'.$field_caption.'" >',$html_config);

		}
	}
	
	//只能输入年月日格式文本
	if(!function_exists('form_control_by_type_6'))
	{
		function form_control_by_type_6($field_info= array(),$is_fill_value=false,$html_config){
			
			$css_class =  $field_info['is_required']?" validate[required,custom[date]]":"validate[custom[date]]";
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? " value='{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }'" :"";
	
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<input type="text" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"  '.$default_value.'  class="form-control datepicker '.$css_class.'"  placeholder="请输入'.$field_caption.'" >',$html_config);

		}
	}
	
	//只能输入年月日时分秒格式文本
	if(!function_exists('form_control_by_type_7'))
	{
		function form_control_by_type_7($field_info= array(),$is_fill_value=false,$html_config){
			

			global $split_js_code_array;
			$split_js_code_array['picker']['datetimepicker']= true;
			$css_class =  $field_info['is_required']?" validate[required,custom[datetime]]":"validate[custom[datetime]]";
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? " value='{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }'" :"";
	
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<input type="text" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"  '.$default_value.'  class="form-control datetimepicker '.$css_class.'"  placeholder="请输入'.$field_caption.'" >',$html_config);
		}
	}
	
	//只能输入时分秒格式文本
	if(!function_exists('form_control_by_type_8'))
	{
		$is_loaded_time_js=false;
		function form_control_by_type_8($field_info= array(),$is_fill_value=false,$html_config){
			
			$css_class =  $field_info['is_required']?" validate[required,custom[time]]":"validate[custom[time]]";
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? " value='{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }'" :"";
			
			//如果是JS分开的
			if(defined("ONLY_GET_JS_PART_STRING")){
				global $split_js_code_array;
				
				$html = '<div class="form-inline"><input type="hidden" '.$default_value.' name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"   class="timepicker '.$css_class.'" >';
				$html .='<div class="input-group col-sm-2"><div class="input-group-addon">时</div>';
				$html .= "<select class=\"form-control\"  id='".$field_info['html_control_id']."_h' onchange=\"setTimeValue('".$field_info['html_control_id']."')\">\n";
				for($i=0;$i<13;$i++)
				$html .= "<option value='".(($i<10)?"0".$i:$i)."'>".(($i<10)?"0".$i:$i)."</option>\n";
				$html .= "</select>\n";
				$html .=' </div>';
				
				$html .='<div class="input-group col-sm-2"><div class="input-group-addon">分</div>';
				$html .= "<select class=\"form-control\" id='".$field_info['html_control_id']."_i' onchange=\"setTimeValue('".$field_info['html_control_id']."')\">\n";
				for($i=0;$i<60;$i++)
				$html .= "<option value='".(($i<10)?"0".$i:$i)."'>".(($i<10)?"0".$i:$i)."</option>\n";
				$html .= "</select>\n";
				$html .=' </div>';
				
				$html .='<div class="input-group col-sm-2"><div class="input-group-addon">秒</div>';
				$html .= "<select class=\"form-control\" id='".$field_info['html_control_id']."_s' onchange=\"setTimeValue('".$field_info['html_control_id']."')\">\n";
				for($i=0;$i<60;$i++)
				$html .= "<option value='".(($i<10)?"0".$i:$i)."'>".(($i<10)?"0".$i:$i)."</option>\n";
				$html .= "</select>\n";
				$html .=' </div>';
				$html .=' </div>';
				
				$_tmp_js ="	function setTimeValue(inputId){\n";
				$_tmp_js .="		var h= $('#'+inputId+'_h').val();\n";
				$_tmp_js .="		var i= $('#'+inputId+'_i').val();\n";
				$_tmp_js .="		var s= $('#'+inputId+'_s').val();\n";
				$_tmp_js .="		$('#'+inputId).val(h+':'+i+':'+s);\n";
				$_tmp_js .="	}\n";
				
				$split_js_code_array['outside']['setTimeValue']= $_tmp_js;
				
				$_tmp_js ="$('#".$field_info['html_control_id']."_h').onchange(function(){\n";
				$_tmp_js .='	setTimeValue(\''.$field_info['html_control_id'].'\')'."\n";
				$_tmp_js .='})'."\n";
				$_tmp_js .="$('#".$field_info['html_control_id']."_i').onchange(function(){\n";
				$_tmp_js .='	setTimeValue(\''.$field_info['html_control_id'].'\')'."\n";
				$_tmp_js .='})'."\n";
				$_tmp_js .="$('#".$field_info['html_control_id']."_s').onchange(function(){\n";
				$_tmp_js .='	setTimeValue(\''.$field_info['html_control_id'].'\')'."\n";
				$_tmp_js .='})'."\n";
				
				$split_js_code_array['ready'][$field_info['html_control_id'].'_s_change']= $_tmp_js;
			
			}
			else{

				$html = '<div class="form-inline"><input type="hidden" '.$default_value.' name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"   class="timepicker '.$css_class.'" >';
				$html .='<div class="input-group col-sm-2"><div class="input-group-addon">时</div>';
				$html .= "<select class=\"form-control\"  id='".$field_info['html_control_id']."_h' onchange=\"setTimeValue('".$field_info['html_control_id']."')\">\n";
				for($i=0;$i<13;$i++)
				$html .= "<option value='".(($i<10)?"0".$i:$i)."'>".(($i<10)?"0".$i:$i)."</option>\n";
				$html .= "</select>\n";
				$html .=' </div>';
				
				$html .='<div class="input-group col-sm-2"><div class="input-group-addon">分</div>';
				$html .= "<select class=\"form-control\" id='".$field_info['html_control_id']."_i' onchange=\"setTimeValue('".$field_info['html_control_id']."')\">\n";
				for($i=0;$i<60;$i++)
				$html .= "<option value='".(($i<10)?"0".$i:$i)."'>".(($i<10)?"0".$i:$i)."</option>\n";
				$html .= "</select>\n";
				$html .=' </div>';
				
				$html .='<div class="input-group col-sm-2"><div class="input-group-addon">秒</div>';
				$html .= "<select class=\"form-control\" id='".$field_info['html_control_id']."_s' onchange=\"setTimeValue('".$field_info['html_control_id']."')\">\n";
				for($i=0;$i<60;$i++)
				$html .= "<option value='".(($i<10)?"0".$i:$i)."'>".(($i<10)?"0".$i:$i)."</option>\n";
				$html .= "</select>\n";
				$html .=' </div>';
				$html .=' </div>';
				
			
				
				global $is_loaded_time_js;
				if(!isset($is_loaded_time_js)):
				
					$js_file ="\n<script language=\"javascript\" type=\"text/javascript\">\n";
					$default_value = $is_fill_value? "{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }" :"";
					$js_file .="	var ".$field_info['html_control_id']."_val = '{$default_value}';\n";
					$js_file .="	var ".$field_info['html_control_id']."_arr = ".$field_info['html_control_id']."_val.split(':')\n";
					$js_file .="	if(".$field_info['html_control_id']."_arr.length==3){\n";
					$js_file .="		$('#".$field_info['html_control_id']."_h').val(".$field_info['html_control_id']."_arr[0])\n";
					$js_file .="		$('#".$field_info['html_control_id']."_i').val(".$field_info['html_control_id']."_arr[1])\n";
					$js_file .="		$('#".$field_info['html_control_id']."_s').val(".$field_info['html_control_id']."_arr[2])\n";
					$js_file .="	}\n";
					$js_file .="	function setTimeValue(inputId){\n";
					$js_file .="		var h= $('#'+inputId+'_h').val();\n";
					$js_file .="		var i= $('#'+inputId+'_i').val();\n";
					$js_file .="		var s= $('#'+inputId+'_s').val();\n";
					$js_file .="		$('#'+inputId).val(h+':'+i+':'+s);\n";
					$js_file .="	}\n";
					$js_file .="</script>\n";
					
					$html .= $js_file;
					$is_loaded_image_js=true;
				endif;
				
			
			}

			
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],$html,$html_config);

		
		}
	}
	
	//多行文本
	if(!function_exists('form_control_by_type_11'))
	{
		function form_control_by_type_11($field_info= array(),$is_fill_value=false,$html_config){
			
			$css_class =  $field_info['is_required']?" validate[required]":"";
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? " {php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }" :"";
	
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<textarea name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"  cols="45" rows="5" class="form-control '.$css_class.'" placeholder="请输入'.$field_caption.'" >'.$default_value.'</textarea>',$html_config);
		}
	}
	
	//HTML文本
	if(!function_exists('form_control_by_type_12'))
	{
		function form_control_by_type_12($field_info= array(),$is_fill_value=false,$html_config){
			
			$css_class =  $field_info['is_required']?" validate[required]":"";
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? "{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }" :"";
			
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<textarea name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"  cols="45" rows="5" class="form-control '.$css_class.'" placeholder="请输入'.$field_caption.'" >'.$default_value.'</textarea>',$html_config);

		}
	}
	
	//用户名
	if(!function_exists('form_control_by_type_13'))
	{
		function form_control_by_type_13($field_info= array(),$is_fill_value=false,$html_config){
			
			$css_class =  $field_info['is_required']?" validate[required,minSize[3],maxSize[20]]":"";
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? "{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }" :"";
			
			$html = '<input type="hidden" name="o_'.$field_info['html_control_name'].'"  id="o_'.$field_info['html_control_id'].'" value="'.$default_value.'"  >';
			
			$html .= _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<input type="text" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"   value="'.$default_value.'"  autocomplete="off" class="form-control username '.$css_class.'"  placeholder="请输入'.$field_caption.'" >',$html_config);
			
			return $html;

		}
	}
	
	//密码
	if(!function_exists('form_control_by_type_14'))
	{
		function form_control_by_type_14($field_info= array(),$is_fill_value=false,$html_config){
			
			$css_class = "";
			if(!$is_fill_value) $css_class =  $field_info['is_required']?" validate[required]":"";
			$field_caption = $field_info['field_caption'];
			$default_value = "";
			
			$html = _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<input type="password" name="o_'.$field_info['html_control_name'].'"  id="o_'.$field_info['html_control_id'].'"  '.$default_value.'  autocomplete="off"  class="form-control password '.$css_class.'"  placeholder="请输入'.$field_caption.'" >',$html_config);
			
			if(!$is_fill_value)
				$css_class =  $field_info['is_required']?" validate[required,equals[".$field_info['html_control_name']."]]":"";
			else
				$css_class =  $field_info['is_required']?" validate[equals[".$field_info['html_control_name']."]]":"";
			$html .= _form_control_html_type($field_info['html_control_id'],'确认'.$field_info['field_caption'],'<input type="password" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"  '.$default_value.'  autocomplete="off" class="form-control  '.$css_class.'"  placeholder="请再次输入'.$field_caption.'" >',$html_config);
			
			return $html;

		}
	}
	
	//数字
	if(!function_exists('form_control_by_type_21'))
	{
		function form_control_by_type_21($field_info= array(),$is_fill_value=false,$html_config){
			
			$css_class =  $field_info['is_required']?" validate[required,custom[integer]]":"validate[custom[integer]]";
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? " value='{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }'" :"";

			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<input type="number" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'" '.$default_value.'   class="form-control '.$css_class.'" placeholder="请输入'.$field_caption.'" >',$html_config);

		}
	}
	
	//数字两位小数点
	if(!function_exists('form_control_by_type_22'))
	{
		function form_control_by_type_22($field_info= array(),$is_fill_value=false,$html_config){
			
			$html  ="\n".'	<div class="form-group">'."\n";	$css_class =  $field_info['is_required']?" validate[required,custom[price]]":"validate[custom[price]]";
			$field_caption = $field_info['field_caption'];
			$default_value = $is_fill_value? " value='{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }'" :"";

			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<input type="number" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"  '.$default_value.'   class="form-control '.$css_class.'" placeholder="请输入'.$field_caption.'" >',$html_config);
			return $html;
		}
	}
	
	//下拉选择是与否
	if(!function_exists('form_control_by_type_31'))
	{
		function form_control_by_type_31($field_info= array(),$is_fill_value=false,$html_config){
			
			$field_caption = $field_info['field_caption'];
			$css_class =  $field_info['is_required']?" validate[required]":"";
			$str_choose_value1 = $is_fill_value?"{if isset(\$data_info['".$field_info['field_name']."'])&&(\$data_info['".$field_info['field_name']."']=='是')} 'selected=\"selected\"' {/if}            ":"";
			$str_choose_value2 = $is_fill_value?"{if isset(\$data_info['".$field_info['field_name']."'])&&(\$data_info['".$field_info['field_name']."']=='否')} 'selected=\"selected\"' {/if}            ":"";

	
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],'<select class="form-control '.$css_class.'"  name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'"><option value="是" '.$str_choose_value1.'>是</option><option value="否" '.$str_choose_value2.'>否</option></select>',$html_config);


			return $html;
		}
	}
	
	//单选是与否  
	if(!function_exists('form_control_by_type_32'))
	{
		function form_control_by_type_32($field_info= array(),$is_fill_value=false,$html_config){
			
			$field_caption = $field_info['field_caption'];
			$css_class =  $field_info['is_required']?" validate[required]":"";

			$str_choose_value1 = $is_fill_value?"{if isset(\$data_info['".$field_info['field_name']."'])&&(trim(\$data_info['".$field_info['field_name']."'])=='是')} checked=\"checked\" {/if}            ":"";
			$str_choose_value2 = $is_fill_value?"{if isset(\$data_info['".$field_info['field_name']."'])&&(trim(\$data_info['".$field_info['field_name']."'])=='否')} checked=\"checked\" {/if}            ":"";
				
			$html ='<label class="radio-inline">';
			$html .='  <input type="radio" class="'.$css_class.'" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'1" value="是" '.($is_fill_value? $str_choose_value1 :"").'> 是';
			$html .='</label>';
			$html .='<label class="radio-inline">';
			$html .='  <input type="radio"  class="'.$css_class.'" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'2" value="否"'.($is_fill_value? $str_choose_value2 :"").'> 否';
			$html .='</label>';
			
			
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],$html,$html_config);

		}
	}
	
	//下拉选择单选 
	if(!function_exists('form_control_by_type_33'))
	{
		function form_control_by_type_33($field_info= array(),$is_fill_value=false,$html_config){
			
			$field_caption = $field_info['field_caption'];
			$css_class =  $field_info['is_required']?" validate[required]":"";
			$options = $html='';
			
			
			if($field_info['is_options_from_datasource'])
			{
				if(defined("DEMO_STSATUS"))
				{
					$html .="\t\t\t\t\t".'<select class="form-control '.$css_class.'"  name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'">'."\n\t\t\t\t\t\t".'<option value="">'.$html_config['default_select_text'].'</option>'."\n";
					
					$html .= "\t\t\t\t\t\t<option value=''>模拟数据源数据</option>\n";
				
					$html .= "\t\t\t\t\t".'</select>'."\n";
				}else
				{
					$html .= "{php \$options = process_datasource(\$this->method_config['".$field_info['datasource_function_name']."_datasource'])}\n";
					
					$field_info['field_options'] =NULL;
					
					$html .="\t\t\t\t\t".'<select class="form-control '.$css_class.'"  name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'">'."\n\t\t\t\t\t\t".'<option value="">'.$html_config['default_select_text'].'</option>'."\n";
					$html .= "{php if(\$options)foreach(\$options as \$option):}\n";
					$str_choose_value =$is_fill_value? "{if isset(\$data_info['".$field_info['field_name']."'])&&(\$data_info['".$field_info['field_name']."']==\$option['val'])} selected=\"selected\" {/if}            ":"";
					$html .= "\t\t\t\t\t\t<option value='{\$option['val']}' ".$str_choose_value.">{\$option['text']}</option>\n";
					$html .= "{php endforeach;}\n";
					$html .= "\t\t\t\t\t".'</select>'."\n";
				}
				
			}else
			{
			if($field_info['field_options'])
				foreach($field_info['field_options'] as $k=>$v)
				{
					$str_choose_value =$is_fill_value? "{if isset(\$data_info['".$field_info['field_name']."'])&&(\$data_info['".$field_info['field_name']."']=='".str_replace(PHP_EOL, '',trim($v))."')} selected=\"selected\" {/if}            ":"";
					$options .= "\t\t\t\t<option value='".str_replace(array("\r\n", "\r", "\n"), "", $v)."' ".$str_choose_value.">".$k."</option>\r\n";
				}
				$html .='<select class="form-control '.$css_class.'"  name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].'">'."\n\t\t\t\t".'<option value="">'.$html_config['default_select_text'].'</option>'."\n\t\t\t\t".$options.'</select>';
			}
			
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],$html,$html_config);

		}
	}
	
	//单选列表单选  自定义内容
	if(!function_exists('form_control_by_type_34'))
	{
		function form_control_by_type_34($field_info= array(),$is_fill_value=false,$html_config){
			
			$field_caption = $field_info['field_caption'];
			$css_class =  $field_info['is_required']?" validate[required]":"";
			$html  ='';
			$options ='';
			if($field_info['field_options'])
				foreach($field_info['field_options'] as $k=>$v)
				{
					$str_choose_value =$is_fill_value? "{if isset(\$data_info['".$field_info['field_name']."'])&&(\$data_info['".$field_info['field_name']."']=='".str_replace(PHP_EOL, '',trim($v))."')} checked=\"checked\" {/if}            ":"";
					
					$html .='<label class="radio-inline">';
					$html .='  <input type="radio" class="'.$css_class.'" name="'.$field_info['html_control_name'].'"  id="'.$field_info['html_control_id'].$k.'" value="'.trim($v).'" '.$str_choose_value.'> '.$k;
					$html .='</label>';
				}
		
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],$html,$html_config);
		}
	}
	
	//下拉选择多选
	if(!function_exists('form_control_by_type_41'))
	{
		function form_control_by_type_41($field_info= array(),$is_fill_value=false,$html_config){
			
			$field_caption = $field_info['field_caption'];
			$css_class =  $field_info['is_required']?" validate[required]":"";
			$html  ='';
			$options ='';
			if($field_info['field_options'])
				foreach($field_info['field_options'] as $k=>$v)
				{
					$str_choose_value =$is_fill_value? "{if isset(\$data_info['".$field_info['field_name']."'])&&(str_exists(\$data_info['".$field_info['field_name']."'],'".str_replace(PHP_EOL, '',trim($k))."'))} selected=\"selected\" {/if}            ":"";

					$options .= "<option value='".trim($v)."'  ".$str_choose_value.">".$k."</option>\r\n";
				}
			$html .='<select class="form-control '.$css_class.'" multiple name="'.$field_info['html_control_name'].'[]"  id="'.$field_info['html_control_id'].'"><option value="">'.$html_config['default_select_text'].'</option>'.$options.'</select>';
			

			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],$html,$html_config);
		}
	}
	
	//多选框列表
	if(!function_exists('form_control_by_type_42'))
	{
		function form_control_by_type_42($field_info= array(),$is_fill_value=false,$html_config){
			
			$field_caption = $field_info['field_caption'];
			$css_class =  $field_info['is_required']?" validate[required]":"";
			$html  ='';
			$options ='';
			if($field_info['field_options'])
				foreach($field_info['field_options'] as $k=>$v)
				{
					$str_choose_value =$is_fill_value? "{if isset(\$data_info['".$field_info['field_name']."'])&&(str_exists(\$data_info['".$field_info['field_name']."'],'".str_replace(PHP_EOL, '',trim($k))."'))} checked=\"checked\" {/if}            ":"";
					$html .='<label class="radio-inline">';
					$html .='  <input type="checkbox" class="'.$css_class.'" name="'.$field_info['html_control_name'].'[]"  id="'.$field_info['html_control_id'].$k.'" value="'.$v.'"   '.$str_choose_value.'> '.$k;
					$html .='</label>';
				}
			
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],$html,$html_config);

		}
	}
	
	//弹窗多选～选择数据源...
	if(!function_exists('form_control_by_type_35'))
	{
		$is_loaded_choose_window_js=false;
		function form_control_by_type_35($field_info= array(),$is_fill_value=false,$html_config){
			
			$html_config['right_size'] = 'col-md-5';
			$field_caption = $field_info['field_caption'];
			$css_class =  $field_info['is_required']?"form-control validate[required]":"";
			$js_file = "";

			//如果是JS分开的
			if(defined("ONLY_GET_JS_PART_STRING")):
				
				global $split_js_code_array;

				$_value_text = "<?php echo isset(\$data_info['".$field_info['field_name']."_text'])?\$data_info['".$field_info['field_name']."_text']:''; ?>";
				$_value_name = "<?php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'';?>";
				
				$html  ='<input class="form-control" value="'.$_value_text.'" readonly="readonly" placeholder="请点击选择" type="text" id="'.$field_info['html_control_id'].'_text"  />';
        		$html  .='<input type="hidden" value="'.$_value_name.'" id="'.$field_info['html_control_id'].'" name="'.$field_info['html_control_name'].'" />';
				
				$_tmp_js  ="	function  chooseWindow".ucfirst($field_info['html_control_id'])."(inputId,w,h,iscallback){\n";
				$_tmp_js .="		if(!w) w=screen.width-4;\n";
				$_tmp_js .="		if(!h) h=screen.height-95;\n";
				$_tmp_js .="		if(!iscallback)iscallback=0;\n";
				$_tmp_js .="		var window_url = SITE_URL+'".strtolower(trim($field_info['datasource_control_path']."/".$field_info['datasource_function_name']))."_window/';\n";
				$_tmp_js .="		$.extDialogFrame(window_url+inputId,{model:true,width:w,height:h,title:'请选择...',buttons:null});\n";
				$_tmp_js .="	}\n";
				
				$split_js_code_array['outside']['chooseWindow'.ucfirst($field_info['html_control_id'])]= $_tmp_js;
				
				$_tmp_js  ="	function get".ucfirst($field_info['html_control_id'])."(v,t){\n";
				$_tmp_js .="		$(\"#".$field_info['html_control_id']."\").val(v);\n";
				$_tmp_js .="		$(\"#".$field_info['html_control_id']."_text\").val(t);\n";
				$_tmp_js .="		$(\"#dialog\" ).dialog();$(\"#dialog\" ).dialog(\"close\");\n";
				$_tmp_js .="	}\n";
				
				$split_js_code_array['outside']["get".ucfirst($field_info['html_control_id'])]= $_tmp_js;
					
				
				$_tmp_js ='$("#'.$field_info['html_control_id'].'_text").click(function(){'."\n";
				$_tmp_js .='chooseWindow'.ucfirst($field_info['html_control_id']).'(\''.$field_info['html_control_id'].'\',800,550,1,2)'."\n";
				$_tmp_js .='})'."\n";
				
				$split_js_code_array['ready'][$field_info['html_control_id'].'_text_click']= $_tmp_js;
				
				if($is_fill_value):
					
					#$params_1 = "$('#".$field_info['field_name']."_text').val()";
					#$params_2 = "$('#".$field_info['field_name']."').val()";
					#$_tmp_js .="		get".ucfirst($field_info['html_control_id'])."(".$params_1.", ".$params_2.");\n";
					
					#$split_js_code_array['ready']['init_35']= $_tmp_js;
				endif;
				
			else:

					

				$html  ='<input class="form-control"  readonly="readonly" placeholder="请点击选择" type="text" id="'.$field_info['html_control_id'].'_text" onclick="javascript:ChooseWindow'.ucfirst($field_info['html_control_id']).'(\''.$field_info['html_control_id'].'\',800,550,1,2)"  />';
        		$html  .='<input type="hidden" id="'.$field_info['html_control_id'].'" name="'.$field_info['html_control_name'].'"  />';

			
				global $is_loaded_choose_window_js;
				if(!isset($is_loaded_choose_window_js))
				{
					$js_file ="\n<script language=\"javascript\" type=\"text/javascript\">\n";
					
					$js_file .="	function ChooseWindow".ucfirst($field_info['html_control_id'])."(inputId,w,h,iscallback){\n";
					$js_file .="		if(!w) w=screen.width-4;\n";
					$js_file .="		if(!h) h=screen.height-95;\n";
					$js_file .="		if(!iscallback)iscallback=0;\n";
					$js_file .="		var window_url = '{php echo base_url('".strtolower(trim($field_info['datasource_control_path']."/".$field_info['datasource_function_name']))."')}_window/';\n";
					$js_file .="		$.extDialogFrame(window_url+inputId,{model:true,width:w,height:h,title:'请选择...',buttons:null});\n";
					$js_file .="	}\n";
					$js_file .="</script>\n";
					
					
					$html .= $js_file;
					$is_loaded_image_js=true;
				}
			
				$js_file ="\n<script language=\"javascript\" type=\"text/javascript\">\n";
				$js_file .="	function get".ucfirst($field_info['html_control_id'])."(v,t){\n";
				$js_file .="		$(\"#".$field_info['html_control_id']."\").val(v);\n";
				$js_file .="		$(\"#".$field_info['html_control_id']."_text\").val(t);\n";
				$js_file .="		$(\"#dialog\" ).dialog();$(\"#dialog\" ).dialog(\"close\");\n";
				$js_file .="	}\n";
				
				if($is_fill_value)
				{
					$js_file .= "{php \$_tmp1= isset(\$data_info['".$field_info['field_name']."_text'])?\$data_info['".$field_info['field_name']."_text']:'';}\n";
					$js_file .= "{php \$_tmp2= isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'';} \n";
					$js_file .="		get".ucfirst($field_info['html_control_id'])."('{\$_tmp2}', '{\$_tmp1}');\n";
				}
	
				$js_file .="</script>\n";
			
			endif;	
			$html .= $js_file;
			
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],$html,$html_config);
			

		}
	}
	
	//单个图片上传
	if(!function_exists('form_control_by_type_51'))
	{
		$is_loaded_image_js=false;
		function form_control_by_type_51($field_info= array(),$is_fill_value=false,$html_config){
			
			$field_caption = $field_info['field_caption'];
			$css_class =  $field_info['is_required']?"form-control validate[required]":"";
			
			if(defined("ONLY_GET_JS_PART_STRING")):
				global $split_js_code_array;

				$html  ='<a id="'.$field_info['html_control_id'].'_a"  ><img  width="100" id="'.$field_info['html_control_id'].'_SRC" border="1" src="<?php echo SITE_URL?><?php echo isset($data_info["'.$field_info['field_name'].'"])?"'.$field_info["upload_url"].'".$data_info["'.$field_info['field_name'].'"]:"images/nopic.gif" ?>"/></a>';

				$html  .="\n".'<input type="hidden" id="'.$field_info['html_control_id'].'" name="'.$field_info['html_control_name'].'" value="<?php echo isset($data_info["'.$field_info['field_name'].'"])?$data_info["'.$field_info['field_name'].'"]:"" ?>" />';

				$html  .=' <a id="'.$field_info['html_control_id'].'_b" class="btn btn-default btn-sm" > 选择图片 ...</a>';
				$html .='<span class="help-block">只支持图片上传.</span>';
				
				
				$_tmp_js  ="	function uploadOneFile(inputId,w,h,iscallback){\n";
				$_tmp_js .="		if(!w) w=screen.width-4;\n";
				$_tmp_js .="		if(!h) h=screen.height-95;\n";
				$_tmp_js .="		if(!iscallback)iscallback=0;\n";

				$_tmp_js .="		var window_url = SITE_URL+'".strtolower(trim($field_info['datasource_control_path']."/upload/"))."';\n";
				$_tmp_js .="		$.extDialogFrame(window_url+'1/".$field_info['field_name']."/'+inputId+'/'+iscallback,{model:true,width:w,height:h,title:'请上传...',buttons:null});\n";
				$_tmp_js .="	}\n";
				
				$split_js_code_array['outside']['uploadOneFile']= $_tmp_js;
				
				$_tmp_js  ="	function get".ucfirst($field_info['html_control_id'])."(v,s,w,h){\n";
				$_tmp_js .="		$(\"#".$field_info['html_control_id']."\").val(v);\n";
				$_tmp_js .="		$(\"#".$field_info['html_control_id']."_SRC\").attr(\"src\",SITE_URL+\"".$field_info['upload_url']."/\"+v);\n";
				$_tmp_js .="		$(\"#dialog\" ).dialog();$(\"#dialog\" ).dialog(\"close\");\n";
				$_tmp_js .="	}\n";
				$split_js_code_array['outside']["get".ucfirst($field_info['html_control_id'])]= $_tmp_js;
				
				$_tmp_js ='		$("#'.$field_info['html_control_id'].'_a").click(function(){'."\n";
				$_tmp_js .='			uploadOneFile(\''.$field_info['html_control_id'].'\',550,350,1)'."\n";
				$_tmp_js .='		});'."\n";
				
				$split_js_code_array['ready'][$field_info['html_control_id'].'_a']= $_tmp_js;
				
				$_tmp_js ='		$("#'.$field_info['html_control_id'].'_b").click(function(){'."\n";
				$_tmp_js .='			uploadOneFile(\''.$field_info['html_control_id'].'\',550,350,1)'."\n";
				$_tmp_js .='		});'."\n";
				
				$split_js_code_array['ready'][$field_info['html_control_id'].'_b']= $_tmp_js;
				
				if($is_fill_value):
					//$_tmp_js ="		get".ucfirst($field_info['html_control_id'])."('{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }',0,0,0);\n";

					//$split_js_code_array['init']['init_51']= $_tmp_js;
				endif;
				
			else:
				$html  ='<a href="javascript:uploadOneFile(\''.$field_info['html_control_id'].'\',550,350,1)" ><img  width="100" id="'.$field_info['html_control_id'].'_SRC" border="1" src="{php echo base_url("/images/nopic.gif")}"/></a>';
				$html  .='<input type="hidden" id="'.$field_info['html_control_id'].'" name="'.$field_info['html_control_name'].'" value="" />';
				$html  .=' <a href="javascript:uploadOneFile(\''.$field_info['html_control_id'].'\',550,350,1)" class="btn btn-default btn-sm" > 选择图片 ...</a>';
				$html .='<span class="help-block">只支持图片上传.</span>';
	
				global $is_loaded_image_js;
				if(!isset($is_loaded_image_js))
				{
					$js_file ="\n<script language=\"javascript\" type=\"text/javascript\">\n";
					$js_file .="	function uploadOneFile(inputId,w,h,iscallback){\n";
					$js_file .="		if(!w) w=screen.width-4;\n";
					$js_file .="		if(!h) h=screen.height-95;\n";
					$js_file .="		if(!iscallback)iscallback=0;\n";
					
					$js_file .="		var window_url = SITE_URL+'".strtolower(trim($field_info['datasource_control_path']."/upload/"))."';\n";
					$js_file .="		$.extDialogFrame(window_url+'1/".$field_info['field_name']."/'+inputId+'/'+iscallback,{model:true,width:w,height:h,title:'请上传...',buttons:null});\n";
				
					$js_file .="	}\n";
					$js_file .="</script>\n";
					
					$html .= $js_file;
					$is_loaded_image_js=true;
				}
				
				$js_file ="\n<script language=\"javascript\" type=\"text/javascript\">\n";
				$js_file .="	function get".ucfirst($field_info['html_control_id'])."(v,s,w,h){\n";
				$js_file .="		$(\"#".$field_info['html_control_id']."\").val(v);\n";
				$js_file .="		$(\"#".$field_info['html_control_id']."_SRC\").attr(\"src\",\"".$field_info['upload_url']."/\"+v);\n";
				$js_file .="		$(\"#dialog\" ).dialog();$(\"#dialog\" ).dialog(\"close\");\n";
				$js_file .="	}\n";
				
				if($is_fill_value)
				{
					$js_file .="		get".ucfirst($field_info['html_control_id'])."('{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }',0,0,0);\n";
				}
	
				$js_file .="</script>\n";
				$html .= $js_file;
			
			endif;
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],$html,$html_config);
			
		}
	}
	
	//单个文件上传
	if(!function_exists('form_control_by_type_52'))
	{
		$is_loaded_file_js=false;
		function form_control_by_type_52($field_info= array(),$is_fill_value=false,$html_config){
			
			$field_caption = $field_info['field_caption'];
			$css_class =  $field_info['is_required']?"form-control validate[required]":"";
			
			
			
        	$html  ='<a  id="'.$field_info['html_control_id'].'_a" target="_blank"></a><input type="hidden" id="'.$field_info['html_control_id'].'" name="'.$field_info['html_control_name'].'"/>';
            $html  .=' <a href="javascript:uploadOneFile(\''.$field_info['html_control_id'].'\',550,350,1,2)" class="btn btn-default btn-sm" > 选择文件 ...</a>';
			$html .='<span class="help-block">只支持文件上传.</span>';
			
			
			
			global $is_loaded_image_js;
	   		if(!isset($is_loaded_image_js))
			{
				$js_file ="\n<script language=\"javascript\" type=\"text/javascript\">\n";
				$js_file .="	function uploadOneFile(inputId,w,h,iscallback){\n";
				$js_file .="		if(!w) w=screen.width-4;\n";
				$js_file .="		if(!h) h=screen.height-95;\n";
				$js_file .="		if(!iscallback)iscallback=0;\n";

				$_tmp_js .="		var window_url = SITE_URL+'".strtolower(trim($field_info['datasource_control_path']."/upload/"))."';\n";
				$_tmp_js .="		$.extDialogFrame(window_url+'0/".$field_info['field_name']."/'+inputId+'/'+iscallback,{model:true,width:w,height:h,title:'请上传...',buttons:null});\n";
				$js_file .="	}\n";
				$js_file .="</script>\n";
				
				$html .= $js_file;
				$is_loaded_image_js=true;
			}
			
			$js_file ="\n<script language=\"javascript\" type=\"text/javascript\">\n";
			$js_file .="	function get".ucfirst($field_info['html_control_id'])."(v,s,w,h){\n";
			#$js_file .="		$(\"#".$field_info['html_control_id']."\").val(v);\n";
			#$js_file .="		$(\"#".$field_info['html_control_id']."_a\").html(\"".$field_info['upload_url']."/\"+v);\n";
			$js_file .="		$(\"#dialog\" ).dialog();$(\"#dialog\" ).dialog(\"close\");\n";
			$js_file .="	}\n";
			if($is_fill_value)
			{
				$js_file .="		get".ucfirst($field_info['html_control_id'])."('{php echo isset(\$data_info['".$field_info['field_name']."'])?\$data_info['".$field_info['field_name']."']:'' }',0,0,0);\n";
			}
			$js_file .="</script>\n";
			$html .= $js_file;
			
			return _form_control_html_type($field_info['html_control_id'],$field_info['field_caption'],$html,$html_config);
		}
	}
	
	//当前用户名ID
	if(!function_exists('form_control_by_type_61'))
	{
		function form_control_by_type_61($field_info= array(),$is_fill_value=false,$html_config){
			
            $html='';//$html='<input type="hidden" name="'.$field_info['field_name'].'"  id="'.$field_info['field_name'].'" />';
			return $html;
		}
	}
	
	if(!function_exists('form_control_by_type_62'))
	{
		function form_control_by_type_62($field_info= array(),$is_fill_value=false,$html_config){
			
            $html='';//$html='<input type="hidden" name="'.$field_info['field_name'].'"  id="'.$field_info['field_name'].'" />';
			return $html;
		}
	}
	
	if(!function_exists('form_control_by_type_63'))
	{
		function form_control_by_type_63($field_info= array(),$is_fill_value=false,$html_config){
            $html='';//'<input type="hidden" name="'.$field_info['field_name'].'"  id="'.$field_info['field_name'].'" />';
			return $html;
		}
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////// 这里从搜索表单 /////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if(!function_exists('form_control_search'))
	{
		function form_control_search($config= array()){
            
			//将文字类搜索归一类
			//文字为统一like 搜索
	  		
			$html = "";
			//$html = "<div class=\"form-group\">\n";
			if(isset($config['string']))
			{
				$html .= "\n"."<div class=\"form-group\">\n";
				$html .= "<label for=\"keyword\" class=\"control-label form-control-static\">关键词</label>\n";
				if(defined("DEMO_STSATUS"))
				$html .='<input class="form-control" type="text" name="keyword"  value="" id="keyword" placeholder="请输入关键词"/>';
				else
				$html .='<input class="form-control" type="text" name="keyword"  value="{php echo isset($data_info[\'keyword\'])? $data_info[\'keyword\']:"";}" id="keyword" placeholder="请输入关键词"/>';
				$html .= "</div>\n";
			}
			//$html .= "</div>\n";
			
			if(isset($config['dropdown']))
			{
				
				foreach($config['dropdown'] as $k=>$v)
				{
					$html .= form_control_by_type($v,true,array('default_select_text'=>"==不限==",'left_size'=>'col-sm-5','right_size'=>'col-sm-7'));	
				}
			}
			
			if(isset($config['checkbox']))
			{
				foreach($config['checkbox'] as $k=>$v)
				{
					$html .= form_control_by_type($v,true,array('default_select_text'=>"==不限==",'left_size'=>'col-sm-3','right_size'=>'col-sm-9'));	
				}
			}
			
			if(isset($config['datetime']))
			{
				global $split_js_code_array;
				$split_js_code_array['picker']['datepicker']= true;
				foreach($config['datetime'] as $k=>$v)
				{
					$html .= "\n"."<div class=\"form-group\">\n";
					$html .= "<label >{$v['field_caption']}</label>\n";
					if(defined("DEMO_STSATUS"))
					{
						$html .='<input class="form-control datepicker" type="text" value="" name="'.$v['html_control_name'].'_1"  id="'.$v['html_control_id'].$k.'1"  placeholder="开始时间"/> - '."\n";
						$html .='<input class="form-control datepicker" type="text" value="" name="'.$v['html_control_name'].'_2"  id="'.$v['html_control_id'].$k.'2"  placeholder="结束时间"/>'."\n";
					}else
					{
						$html .='<input class="form-control datepicker" type="text" value="{php echo isset($data_info[\''.$v['html_control_name'].'_1\'])?$data_info[\''.$v['html_control_name'].'_1\']:\'\' } " name="'.$v['html_control_name'].'_1"  id="'.$v['html_control_id'].$k.'1"  placeholder="开始时间"/> - '."\n";
						$html .='<input class="form-control datepicker" type="text" value="{php echo isset($data_info[\''.$v['html_control_name'].'_2\'])?$data_info[\''.$v['html_control_name'].'_2\']:\'\' } " name="'.$v['html_control_name'].'_2"  id="'.$v['html_control_id'].$k.'2"  placeholder="结束时间"/>'."\n";
					}
					$html .= "</div>\n";
				
				}
			}
			
			if(isset($config['number']))
			{
				foreach($config['number'] as $k=>$v)
				{
					$html .= "\n"."<div class=\"form-group\">\n";
					$html .= "<label for=\"keywords\" class=\"form-control-static\">{$v['field_caption']}:</label>\n";
					$html .='<input class="form-control" size="3" type="number"  name="'.$v['html_control_name'].'_1"  id="'.$v['html_control_id'].$k.'1" placeholder="'.$v['field_caption'].'大于等于范围"/> - ';
					$html .='<input class="form-control" size="3" type="number"  name="'.$v['html_control_name'].'_2"  id="'.$v['html_control_id'].$k.'2" placeholder="'.$v['field_caption'].'小于等于范围"/>';
					$html .= "</div>\n";
				
				}
			}
			
			if($html!="")$html .= "<button type=\"submit\" name=\"dosubmit\" value=\"搜索\" class=\"btn btn-success\"><i class='glyphicon glyphicon-search'></i></button>";
			
			//将数字类搜索归一类
				
			//将时间类搜索归一类
			//时间类为区间段搜索
			
			return $html;
		}
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////// 这里从表单提取数据部分 /////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if(!function_exists('form_get_post_by_type'))
	{
		//用户名
		function form_get_post_by_type_13($field_info= array(),$is_ajax_method=false,$is_post_data=true,$is_edit_model=false)
		{
		
			$field_name = $field_info['field_name'];
			$html_control_name = $field_info['html_control_name'];
			$error_tips = $field_info['error_tips'];
			$required_tips = $field_info['required_tips'];
			$url_data_method = $is_post_data?"\$_POST":"\$_GET";
			$is_required = $field_info['is_required'];
			$field_caption = $field_info['field_caption'];
			
			$_code  = "\t\$_arr['".$field_name."'] = isset(".$url_data_method."[\"".$html_control_name."\"])?trim(safe_replace(".$url_data_method."[\"".$html_control_name."\"])):".form_get_post_by_type_tips($required_tips,$is_ajax_method).";\n";
			$_code  .= "\t\$_arr['o_".$field_name."'] = isset(".$url_data_method."[\"o_".$html_control_name."\"])?trim(safe_replace(".$url_data_method."[\"o_".$html_control_name."\"])):".form_get_post_by_type_tips($required_tips,$is_ajax_method).";\n";
			
			//如果是必填项
			if($is_required)
			{
				$_code .="			if(\$_arr['".$field_name."']=='')". form_get_post_by_type_tips($required_tips,$is_ajax_method)."\n";
			}
			
			$_code  .= "\t\tif(trim(\$_arr['o_".$field_name."'])!=trim(\$_arr['".$field_name."'])){\n";
			$_code  .= "\t\t\t\$_count = \$this->".$field_info['datasource_model']."->check_unique_".$field_name."(trim(\$_arr['".$field_name."']));\n";
			$_code  .= "\t\t\tif(\$_count) ".form_get_post_by_type_tips($field_caption."已经存在，请重新更换",$is_ajax_method).";\n";
			$_code  .= "}\n";
			$_code  .= "\t\t\tunset(\$_arr['o_".$field_name."']);\n\n";
			
			return $_code;
		}
		
		//密码
		function form_get_post_by_type_14($field_info= array(),$is_ajax_method=false,$is_post_data=true,$is_edit_model=false)
		{
		
			$field_name = $field_info['field_name'];
			$html_control_name = $field_info['html_control_name'];
			$error_tips = $field_info['error_tips'];
			$required_tips = $field_info['required_tips'];
			$url_data_method = $is_post_data?"\$_POST":"\$_GET";
			$is_required = $field_info['is_required'];
			$field_caption = $field_info['field_caption'];
			
			$_code  = "\t\$_arr['".$field_name."'] = isset(".$url_data_method."[\"".$html_control_name."\"])?trim(safe_replace(".$url_data_method."[\"".$html_control_name."\"])):".form_get_post_by_type_tips($required_tips,$is_ajax_method).";\n";
			$_code  .= "\t\$_arr['o_".$field_name."'] = isset(".$url_data_method."[\"o_".$html_control_name."\"])?trim(safe_replace(".$url_data_method."[\"o_".$html_control_name."\"])):".form_get_post_by_type_tips($required_tips,$is_ajax_method).";\n";
			$_code  .= "\t\t\tif(trim(\$_arr['o_".$field_name."'])!=trim(\$_arr['".$field_name."'])){\n";
			$_code  .= "\t\t\t". form_get_post_by_type_tips($field_caption."两次输入不就致",$is_ajax_method).";\n";
			$_code  .= "}\n";
			$_code  .= "\t\t\tunset(\$_arr['o_".$field_name."']);\n\n";
			
			
				
			if($is_edit_model)
			{
				$_code  .= "\t\t\t if(trim(\$_arr['".$field_name."']) == \"\")unset(\$_arr['".$field_name."']);\n";
				$_code  .= "\t\t\t else \$_arr['".$field_name."'] = md5(md5(\$_arr['".$field_name."']));\n";
			}else
			{
				$_code  .= "\t\t\t \$_arr['".$field_name."'] = md5(md5(\$_arr['".$field_name."']));\n";
				if($is_required) $_code .="			if(\$_arr['".$field_name."']=='')". form_get_post_by_type_tips($required_tips,$is_ajax_method)."\n";
			}
			return $_code;
		}
		
		//当前用户名ID
		function form_get_post_by_type_61($field_info= array(),$is_ajax_method=false,$is_post_data=true,$is_edit_model=false)
		{
			$field_name = $field_info['field_name'];
			$_code = "\$_arr['".$field_name."'] = isset(\$this->user_id)?\$this->user_id:0;\n";
			return $_code;
		}
		
		//当前用户名
		function form_get_post_by_type_62($field_info= array(),$is_ajax_method=false,$is_post_data=true,$is_edit_model=false)
		{
			$field_name = $field_info['field_name'];
			$_code = "\$_arr['".$field_name."'] = isset(\$this->user_name)?\$this->user_name:'N/A';\n";
			return $_code;
		}
		
		function form_get_post_by_type_63($field_info= array(),$is_ajax_method=false,$is_post_data=true,$is_edit_model=false)
		{
			$field_name = $field_info['field_name'];
			$_code = "\$_arr['".$field_name."'] = date('Y-m-d H:i:s');\n";
			return $_code;
		}
		
		//多选框多选
		function form_get_post_by_type_41($field_info= array(),$is_ajax_method=false,$is_post_data=true,$is_edit_model=false)
		{
			$field_name = $field_info['field_name'];
			$html_control_name = $field_info['html_control_name'];
			$error_tips = $field_info['error_tips'];
			$required_tips = $field_info['required_tips'];
			$url_data_method = $is_post_data?"\$_POST":"\$_GET";
			$is_required = $field_info['is_required'];
			
			if($is_required)
				$_code  = "\$_arr['".$field_name."'] = isset(".$url_data_method."[\"".$html_control_name."\"])?trim(safe_replace(".$url_data_method."[\"".$html_control_name."\"])):".form_get_post_by_type_tips($required_tips,$is_ajax_method).";\n";
			else
				$_code  = "\$_arr['".$field_name."'] = isset(".$url_data_method."[\"".$html_control_name."\"])?trim(safe_replace(".$url_data_method."[\"".$html_control_name."\"])):'';\n";
				
			$_code  .= "if(is_array(\$_arr['".$field_name."'])) \$_arr['".$field_name."'] = implode(\",\",\$_arr['".$field_name."']);\n";
			
			//如果是必填项
			if($is_required)
			{
				$_code .="			if(\$_arr['".$field_name."']=='')". form_get_post_by_type_tips($required_tips,$is_ajax_method)."\n";
			}
			
			return $_code;
		}
		
		//多选框多选
		function form_get_post_by_type_42($field_info= array(),$is_ajax_method=false,$is_post_data=true,$is_edit_model=false)
		{
			$field_name = $field_info['field_name'];
			$html_control_name = $field_info['html_control_name'];
			$error_tips = $field_info['error_tips'];
			$required_tips = $field_info['required_tips'];
			$url_data_method = $is_post_data?"\$_POST":"\$_GET";
			$is_required = $field_info['is_required'];
			
			if($is_required)
				$_code  = "\$_arr['".$field_name."'] = isset(".$url_data_method."[\"".$html_control_name."\"])?trim(safe_replace(".$url_data_method."[\"".$html_control_name."\"])):".form_get_post_by_type_tips($required_tips,$is_ajax_method).";\n";
			else
				$_code  = "\$_arr['".$field_name."'] = isset(".$url_data_method."[\"".$html_control_name."\"])?trim(safe_replace(".$url_data_method."[\"".$html_control_name."\"])):'';\n";
				
			$_code .= "if(is_array(\$_arr['".$field_name."'])) \$_arr['".$field_name."'] = implode(\",\",\$_arr['".$field_name."']);\n";
			
			//如果是必填项
			if($is_required)
			{
				$_code .="			if(\$_arr['".$field_name."']=='')". form_get_post_by_type_tips($required_tips,$is_ajax_method)."\n";
			}
			
			
			return $_code;
		}
		
		function form_get_post_by_type($field_info= array(),$is_ajax_method=false,$is_post_data=true,$is_edit_model=false){
			
            $field_type = $field_info['field_type'];
			$field_caption = $field_info['field_caption'];
			$field_name = $field_info['field_name'];
			$is_required = $field_info['is_required'];
			$html_control_name = $field_info['html_control_name'];
			$error_tips = $field_info['error_tips'];
			$required_tips = $field_info['required_tips'];
			$filter_func = $field_info['filter_func'];
			$url_data_method = $is_post_data?"\$_POST":"\$_GET";
			
			if(function_exists('form_get_post_by_type_'.$field_type)) 
			{
				$func = 'form_get_post_by_type_'.$field_type;
				$_code =   $func($field_info,$is_ajax_method,$is_post_data,$is_edit_model);
				
				
			}else
			{
				if($is_required){
					$_code = "\$_arr['".$field_name."'] = isset(".$url_data_method."[\"".$html_control_name."\"])?trim(safe_replace(".$url_data_method."[\"".$html_control_name."\"])):".form_get_post_by_type_tips($required_tips,$is_ajax_method)."\n";
					$_code .="			if(\$_arr['".$field_name."']=='')". form_get_post_by_type_tips($required_tips,$is_ajax_method)."\n";
				}
				else
					$_code = "\$_arr['".$field_name."'] = isset(".$url_data_method."[\"".$html_control_name."\"])?trim(safe_replace(".$url_data_method."[\"".$html_control_name."\"])):'';\n";
					
				
			}
			
			
			//判断格式是正确
			if($filter_func!="")
			{
				$_code .="			if(\$_arr['".$field_name."']!=''){"."\n";
				$_code .="			if(!".$filter_func."(\$_arr['".$field_name."']))". form_get_post_by_type_tips($error_tips,$is_ajax_method)."\n";
				$_code .="			}"."\n";
			}
			
			
			
			return $_code;
		}
		
		function form_get_post_by_type_tips($tips,$is_ajax){
			return $is_ajax?"exit(json_encode(array('status'=>false,'tips'=>'".$tips."')));":"\$this->showmessage('".$tips."');";
		}
	}
	
	if(!function_exists('in_hidden_field'))
	{
		function in_hidden_field($id)
		{
			return in_array($id,array(14));
		}
	}
	
	//数据源名称
	if(!function_exists('datasource_type'))
	{
		function datasource_type($type_id)
		{
			$arr = array(1=>'下拉单选数据源',2=>'弹窗单选数据源',3=>'下拉多选数据源',4=>'弹窗多选数据源');
			return isset($arr[$type_id])?$arr[$type_id]:'-';
		}
	}
	
	if(!function_exists('dropdownlist_datasource_type'))
	{
		function dropdownlist_datasource_type($type_id)
		{
			$result = false;
			switch($type_id)
			{
				case 1:
				case 3:
					$result = true;
				break;
				case 2:
				case 4:
					$result = false;
				break;
			}
			
			return $result;
		}
	}
	
	//数据源名称
	if(!function_exists('datasource_type_html_control'))
	{
		function datasource_type_html_control($type_id,$field_id,$checked=false)
		{
			$arr = array(1=>'下拉单选数据源',2=>'弹窗单选数据源',3=>'下拉多选数据源',4=>'弹窗多选数据源');
			
			$html = "";
			switch($type_id)
			{
				case 1:
				case 2:
					$html .='<input type="radio" name="check_value[]" value="'.$field_id.'"';
					$html .= ($checked)?' checked="checked"':'';
					$html .='/>';
				break;
				case 3:
				case 4:
					$html .='<input type="checkbox" name="check_value[]" value="'.$field_id.'"';
					$html .= ($checked)?' checked="checked"':'';
					$html .='/>';
				break;
			}
			
			return $html;
		}
	}