if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * AutoCodeIgniter.com
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 源项目		AutoCodeIgniter
 * 作者：		AutoCodeIgniter.com Dev Team EMAIL:hubinjie@outlook.com QQ:5516448
 * 版权：		Copyright (c) 2015 , AutoCodeIgniter com.
 * 项目名称：<?php echo $controller_caption?> 
 * 版本号：<?php echo $version?> 
 * 最后生成时间：<?php echo $created?> 
 */
class <?php echo ucfirst($controller_name)?> extends <?php echo trim($extend_class)?> {
	
    var $method_config;
    function __construct()
	{
		parent::__construct();
<?php 
	$relation_module_model=NULL;
	if(trim($relation_module)!="")
	{
		$relation_module_arr = json_decode($relation_module);
		$relation_module_arr = (array)$relation_module_arr;
		if($relation_module_arr)foreach($relation_module_arr['model'] as $k=>$v) $relation_module_model[] = $v;
	
	}
	$relation_module_model[] = $controller_name.'_model';
?>
		$this->load->model(array('<?php echo implode("','",$relation_module_model)?>'));
        $this->load->helper(array('auto_codeIgniter_helper','array'));
<?php if(isset($view_upload_fields)):?>        
        $this->method_config['upload'] = array(
<?php foreach($view_upload_fields as $k=>$v):?>
										'<?php echo $v['field_name']?>'=>array('upload_size'=><?php echo $v['upload_max_size']?>,'upload_file_type'=>'<?php echo $v['upload_file_type']?>','upload_path'=>'<?php echo $v['upload_path']?>','upload_url'=>'<?php echo $v['upload_url']?>'),
<?php endforeach;?>
										);
<?php endif;?>  
<?php if(isset($view_order_fields)):?>  
        //保证排序安全性
        $this->method_config['sort_field'] = array(
<?php foreach($view_order_fields as $k=>$v):?>
										'<?php echo strtolower($v['field_name'])?>'=>'<?php echo trim($v['field_name'])?>',
<?php endforeach;?>
										);
<?php endif;?>
<?php if($view_edit_fields):?>
<?php foreach($view_edit_fields as $group_name=>$items):?>
<?php foreach($items as $k=>$v):
	if(!$v['is_options_from_datasource'])continue;
    if($v['field_type']!=33)continue;
?>
	 	$this->method_config['<?php echo $v['datasource_function_name']?>_datasource'] = $this-><?php echo $v['datasource_model']?>-><?php echo $v['datasource_function_name']?>_datasource();
<?php endforeach;?>
<?php endforeach;?>
<?php endif;?>
	}
    
    /**
     * 默认首页列表
     * @param int $pageno 当前页码
     * @return void
     */
    function index($page_no=0,$sort_id=0)
    {
    	$page_no = max(intval($page_no),1);
        
        $orderby = "<?php echo strtolower($controller_name)?>_id desc";
        $dir = $order=  NULL;
		<?php if(isset($view_order_fields)):?>$order=isset($_GET['order'])?safe_replace(trim($_GET['order'])):'';
		$dir=isset($_GET['dir'])?safe_replace(trim($_GET['dir'])):'asc';
        
        if(trim($order)!="")
        {
        	//如果找到得
        	if(isset($this->method_config['sort_field'][strtolower($order)]))
            {
            	if(strtolower($dir)=="asc")
            		$orderby = $this->method_config['sort_field'][strtolower($order)]." asc," .$orderby;
                 else
            		$orderby = $this->method_config['sort_field'][strtolower($order)]." desc," .$orderby;
            }
        }
        <?php endif;?>
        
        $where ="";
        $_arr = NULL;//从URL GET
        <?php if(isset($view_search_fields_types)):?>if (isset($_GET['dosubmit'])) {
        	$where_arr = NULL;
		<?php if(isset($view_search_fields_types['string'])):?>	$_arr['keyword'] =isset($_GET['keyword'])?safe_replace(trim($_GET['keyword'])):'';
			if($_arr['keyword']!="") $where_arr[] = "concat(<?php echo implode(",",array_keys($view_search_fields_types['string']))?>) like '%{$_arr['keyword']}%'";
        <?php endif;?>
        
		<?php if(isset($view_search_fields_types['dropdown']))foreach($view_search_fields_types['dropdown'] as $k=>$v):?>	<?php echo form_get_post_by_type($v,false,false);?>
        	if($_arr['<?php echo $v['field_name']?>']!="") $where_arr[] = "<?php echo $v['field_name']?> = '".$_arr['<?php echo $v['field_name']?>']."'";

        <?php endforeach;?>
        
        <?php if(isset($view_search_fields_types['checkbox']))foreach($view_search_fields_types['checkbox'] as $k=>$v):?>	<?php echo form_get_post_by_type($v,false,false);?>
         if($_arr['<?php echo $v['field_name']?>']!="")
            {
            	//很抱歉转两次，程序自动生成BUG，下版本更新
            	$_arr['<?php echo $v['field_name']?>'] = explode(",",$_arr['<?php echo $v['field_name']?>']);
                $sql_arr= NULL;
                foreach($_arr['<?php echo $v['field_name']?>'] as $vv)
                {
                    $sql_arr[] ="FIND_IN_SET( '".$vv."',<?php echo $v['field_name']?> ) ";
                }
                if($sql_arr)$where_arr[] = implode(" and ",$sql_arr);
                //很抱歉转两次，程序自动生成BUG，下版本更新
            	$_arr['<?php echo $v['field_name']?>'] = implode(",",$_arr['<?php echo $v['field_name']?>']);
            }

        <?php endforeach;?>

		<?php if(isset($view_search_fields_types['datetime']))foreach($view_search_fields_types['datetime'] as $k=>$v):?>	
        	$_arr['<?php echo $v['field_name']?>_1'] =isset($_GET['<?php echo $v['field_name']?>_1'])?safe_replace(trim($_GET['<?php echo $v['field_name']?>_1'])):'';
        	$_arr['<?php echo $v['field_name']?>_2'] =isset($_GET['<?php echo $v['field_name']?>_2'])?safe_replace(trim($_GET['<?php echo $v['field_name']?>_2'])):'';
            if($_arr['<?php echo $v['field_name']?>_1']!="") $where_arr[] = "(<?php echo $v['field_name']?> >= '".$_arr['<?php echo $v['field_name']?>_1']."')";
        	if($_arr['<?php echo $v['field_name']?>_2']!="") $where_arr[] = "(<?php echo $v['field_name']?> <= '".$_arr['<?php echo $v['field_name']?>_2']." 23:59:59')";
        <?php endforeach;?>
        
        <?php if(isset($view_search_fields_types['number']))foreach($view_search_fields_types['number'] as $k=>$v):?>	
        	$_arr['<?php echo $v['field_name']?>_1'] =isset($_GET['<?php echo $v['field_name']?>_1'])?intval($_GET['<?php echo $v['field_name']?>_1']):'';
        	$_arr['<?php echo $v['field_name']?>_2'] =isset($_GET['<?php echo $v['field_name']?>_2'])?intval($_GET['<?php echo $v['field_name']?>_2']):'';
            if($_arr['<?php echo $v['field_name']?>_1']!="") $where_arr[] = "(<?php echo $v['field_name']?> >= ".$_arr['<?php echo $v['field_name']?>_1'].")";
        	if($_arr['<?php echo $v['field_name']?>_2']!="") $where_arr[] = "(<?php echo $v['field_name']?> <= ".$_arr['<?php echo $v['field_name']?>_2'].")";
        <?php endforeach;?>	if($where_arr)$where = implode(" and ",$where_arr);
        }
        <?php endif;?>


        $data_list = $this-><?php echo $controller_name?>_model->listinfo($where,'*',$orderby , $page_no, $this-><?php echo $controller_name?>_model->page_size,'',$this-><?php echo $controller_name?>_model->page_size,page_list_url('<?php echo strtolower($controller_path)?>/<?php echo strtolower($controller_name)?>/index',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
					$data_list[$k] = $this->_process_datacorce_value($v);
            	}
        }

        $this->view('lists',array('require_js'=><?php echo $javascript_core==1?"false":"true"?>,'data_info'=>$_arr,'order'=>$order,'dir'=>$dir,'data_list'=>$data_list,'pages'=>$this-><?php echo $controller_name?>_model->pages));
    }
    
    /**
     * 处理数据源结
     * @param array v 
     * @return array
     */
    function _process_datacorce_value($v,$is_edit_model=false)
    {
<?php 
	foreach($view_edit_fields as $group):
		foreach($group as $k=>$v)
		{
		if($v['is_options_from_datasource']) {
?>
			if(isset($v['<?php echo $v['field_name']?>']))
            {
            	//如果编辑模式
            	if($is_edit_model)
            		$v['<?php echo $v['field_name']?>_text'] = <?php echo '$this->'.$v['datasource_model'].'->'.$v['datasource_function_name'].'_value($v["'.$v['field_name'].'"]);'?>
                    
                else
                	$v['<?php echo $v['field_name']?>'] = <?php echo '$this->'.$v['datasource_model'].'->'.$v['datasource_function_name'].'_value($v["'.$v['field_name'].'"]);'?>
                    
             }
                    
<?php 	}
		}
	endforeach;
?>
         return $v;
    }
<?php if(str_exists($method_func,"add")):?>
     /**
     * 新增数据
     * @param AJAX POST 
     * @return void
     */
    function add()
    {
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	//接收POST参数
<?php if($view_edit_fields):?>
<?php foreach($view_edit_fields as $group_name=>$items):?>
<?php foreach($items as $k=>$v):?>			<?php echo form_get_post_by_type($v,true,true,false)?><?php endforeach;?>
<?php endforeach;?>
<?php endif;?>
			
            $new_id = $this-><?php echo $controller_name?>_model->insert($_arr);
            if($new_id)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息新增成功','new_id'=>$new_id)));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息新增失败','new_id'=>0)));
            }
        }else
        {
        	$this->view('edit',array('require_js'=><?php echo $javascript_core==1?"false":"true"?>,'is_edit'=>false,'id'=>0,'data_info'=>$this-><?php echo $controller_name?>_model->default_info()));
        }
    }
<?php endif;?>
<?php if(str_exists($method_func,"del")):?>
     /**
     * 删除单个数据
     * @param int id 
     * @return void
     */
    function delete_one($id=0)
    {
    	$id = intval($id);
        $data_info =$this-><?php echo $controller_name?>_model->get_one(array('<?php echo strtolower($controller_name)?>_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
        $status = $this-><?php echo $controller_name?>_model->delete(array('<?php echo strtolower($controller_name)?>_id'=>$id));
        if($status)
        {
        	$this->showmessage('删除成功');
        }else
        	$this->showmessage('删除失败');
    }

    /**
     * 删除选中数据
     * @param post pid 
     * @return void
     */
    function delete_all()
    {
        if(isset($_POST))
		{
			$pidarr = isset($_POST['pid']) ? $_POST['pid'] : $this->showmessage('无效参数', HTTP_REFERER);
			$where = $this-><?php echo $controller_name?>_model->to_sqls($pidarr, '', '<?php echo strtolower($controller_name)?>_id');
			$status = $this-><?php echo $controller_name?>_model->delete($where);
			if($status)
			{
				$this->showmessage('操作成功', HTTP_REFERER);
			}else 
			{
				$this->showmessage('操作失败');
			}
		}
    }
<?php endif;?>
<?php if(str_exists($method_func,"edit")):?>
     /**
     * 修改数据
     * @param int id 
     * @return void
     */
    function edit($id=0)
    {
    	$id = intval($id);
        
        $data_info =$this-><?php echo $controller_name?>_model->get_one(array('<?php echo strtolower($controller_name)?>_id'=>$id));
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>'信息不存在')));
        	//接收POST参数
<?php if($view_edit_fields):?>
<?php foreach($view_edit_fields as $group_name=>$items):?>
<?php foreach($items as $k=>$v):?>			<?php echo form_get_post_by_type($v,true,true,true)?><?php endforeach;?>
<?php endforeach;?>
<?php endif;?>
			
            $status = $this-><?php echo $controller_name?>_model->update($_arr,array('<?php echo strtolower($controller_name)?>_id'=>$id));
            if($status)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息修改成功')));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息修改失败')));
            }
        }else
        {
        	if(!$data_info)$this->showmessage('信息不存在');
            $data_info = $this->_process_datacorce_value($data_info,true);
        	$this->view('edit',array('require_js'=><?php echo $javascript_core==1?"false":"true"?>,'data_info'=>$data_info,'is_edit'=>true,'id'=>$id));
        }
    }
<?php endif;?> 
<?php if(str_exists($method_func,"readonly")):?>  
     /**
     * 只读查看数据
     * @param int id 
     * @return void
     */
    function readonly($id=0)
    {
    	$id = intval($id);
        $data_info =$this-><?php echo $controller_name?>_model->get_one(array('<?php echo strtolower($controller_name)?>_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
		$data_info = $this->_process_datacorce_value($data_info);
        
        $this->view('readonly',array('require_js'=><?php echo $javascript_core==1?"false":"true"?>,'data_info'=>$data_info));
    }
<?php endif;?>
<?php if(isset($view_upload_fields)):?>  
    
     /**
     * 上传附件
     * @param string $fieldName 字段名
     * @param string $controlId HTML控件ID
     * @param string $callbackJSfunction 是否返回函数
     * @return void
     */
	function upload($isImage=true,$fieldName='',$controlId='',$callbackJSfunction=false)
	{
    	if( isset($this->method_config['upload'][$fieldName]))
        {
        	if(isset($_POST['dosubmit']))
            {
                $upload_path = $this->method_config['upload'][$fieldName]['upload_path'];
               
               
               if($upload_path=='')die('缺少上传参数');
               
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = $this->method_config['upload'][$fieldName]['upload_file_type'];
                $config['max_size'] = $this->method_config['upload'][$fieldName]['upload_size'];
                $config['overwrite']  = FALSE;
                $config['encrypt_name']=false;
                $config['file_name']=date('Ymdhis').random_string('nozero',4);
               
                dir_create($upload_path);//创建正式文件夹
                $this->load->library('upload', $config);
                 
                if ( ! $this->upload->do_upload('upload')) $this->showmessage("上传失败:".$this->upload->display_errors());
                $filedata =  $this->upload->data();
                
                $file_name = $filedata['file_name'];
                $file_size = $filedata['file_size'];
                $image_width = $isImage?$filedata['image_width']:0;
                $image_height =  $isImage?$filedata['image_height']:0;
                $uc_first_id=  ucfirst($controlId);
                $this->showmessage("上传成功！",'','','',$callbackJSfunction?"window.parent.get{$uc_first_id}(\"$file_name\",\"$file_size\",\"$image_width\",\"$image_height\");":"$(window.parent.document).find(\"#$controlId\").val(\"$file_name\");$(\"#dialog\" ).dialog(\"close\")");	
            }else
            {
            	$this->view('upload',array('require_js'=><?php echo $javascript_core==1?"false":"true"?>,'hidden_menu'=>true,'field_name'=>$fieldName,'control_id'=>$controlId,'upload_url'=>$this->method_config['upload'][$fieldName]['upload_url'],'is_image'=>$isImage));
            }
        }else
        {
        	die('缺少上传参数');
        }
	}
<?php endif;?>

<?php 
		if(isset($model_function))foreach($model_function as $k=>$v):
		$fields_arr = explode(",",$v['fields']);
		
		if(dropdownlist_datasource_type($v['datasource_typeid']))continue;
?>
    /**
     * <?php $v['datasource_name']?><?php echo chr(13)?>
     * @return array
     */
    function <?php echo $v['function_name']?>_window($controlId='',$page_no=0)
    {
    	$page_no = max(intval($page_no),1);
        $orderby = '<?php echo $controller_name?>_ID desc';
        $keyword=safe_replace(trim($this->input->get('keyword')));

		$where ="";
		if (isset($_GET['dosubmit'])) {
			if($keyword!="") $where = "concat(<?php echo $v['fields']?>) like '%{$keyword}%'";
		}
		
        
    	$data_list = $this-><?php echo $controller_name?>_model->listinfo($where,'<?php echo $v['fields']?>',$orderby , $page_no, $this-><?php echo $controller_name?>_model->page_size,'',$this-><?php echo $controller_name?>_model->page_size,page_list_url('<?php echo strtolower($controller_path)?>/<?php echo strtolower($controller_name)?>/<?php echo $v['function_name']?>_window',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
<?php 
	foreach($view_list_fields as $kk=>$vv):
		if($vv['is_options_from_datasource']) {?>
					$data_list[$k]['<?php echo $vv['field_name']?>'] = <?php echo '$this->'.$vv['datasource_model'].'->'.$vv['datasource_function_name'].'_value($data_list[$k]["'.$vv['field_name'].'"]);'?>
<?php
		}
	endforeach;?>
    
    			}
        }
    	$this->view('choose',array('require_js'=><?php echo $javascript_core==1?"false":"true"?>,'hidden_menu'=>true,'fields_convert'=>explode(",",'<?php echo $v['fields_convert']?>'),'fields'=>explode(",",'<?php echo $v['fields']?>'),'fields_caption'=>explode(",",'<?php echo $v['fields_caption']?>'),'data_list'=>$data_list,'pages'=>$this-><?php echo $controller_name?>_model->pages,'control_id'=>$controlId,'keyword'=>$keyword,'concat_char'=>'<?php echo $v['concat_char']?>'));
      
    }
<?php
		endforeach;
?>
}

// END <?php echo $controller_name?> class

/* End of file <?php echo $controller_name?>.php */
/* Location: ./<?php echo $controller_name?>.php */