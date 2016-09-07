if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AutoCodeIgniter.com
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 源项目		AutoCodeIgniter
 * 作者：		AutoCodeIgniter.com Dev Team
 * 版权：		Copyright (c) 2015 , AutoCodeIgniter com.
 * 项目名称：<?php echo $controller_caption?> MODEL
 * 版本号：<?php echo $version?> 
 * 最后生成时间：<?php echo $created?> 
 */
class <?php echo ucfirst($controller_name)?>_model extends Base_Model {
	
    var $page_size = <?php echo intval($page_size)?>;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = '<?php echo strtolower($controller_name)?>';
		parent::__construct();
	}
    
    /**
     * 初始化默认值
     * @return array
     */
    function default_info()
    {
    	return array(
<?php 
if($view_edit_fields)
?>
		'<?php echo $controller_name?>_id'=>0,
<?php

	foreach($view_edit_fields as $group_name=>$items):
     	foreach($items as $k=>$v):
?>
		'<?php echo $v['field_name']?>'=>'<?php echo (intval($v['field_type'])==51)?'nopic.gif':$v['default_value']?>',
<?php 
		endforeach;
	endforeach;
?>
		);
    }
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("<?php echo $mysql_create_sql?>");
    }
    
    <?php 
		if(isset($model_function))foreach($model_function as $k=>$v):
		    $fields_arr = explode(",",$v['fields']);
	?>
    
    /**
     * <?php echo $v['datasource_name']?><?php echo chr(13)?>
     * @return array
     */
    function <?php echo $v['function_name']?>_datasource($where='',$limit = '', $order = '', $group = '', $key='')
    {
    	$datalist = $this->select($where,'<?php echo $v['fields']?>',$limit,$order,$group,$key);
        return $datalist;
    }
    
    /**
     * <?php echo $v['datasource_name']?>选择中项值<?php echo chr(13)?>
     * @return array
     */
    function <?php echo $v['function_name']?>_value($id=0)
    {
    	$data_info = $this->get_one(array('<?php echo $fields_arr[0]?>'=>$id),'<?php  echo  $v['fields_convert']?>');
        if($data_info)
        {
        	return  implode("-",$data_info);
        }
        return NULL;
    }
    <?php endforeach;?>
    <?php 
		if(isset($view_edit_fields))foreach($view_edit_fields as $group):
			foreach($group as $k=>$v):
				if(!$v['is_unique'])continue;
	?>
    
    /**
     * <?php echo $v['field_caption']?>判断唯一性<?php echo chr(13)?>
     * @return bool
     */
    function check_unique_<?php echo $v['field_name']?>($str=0)
    {
    	$str = trim($str);
    	$c = $this->count(array('<?php echo $v['field_name']?>'=>$str));
        return $c;
    }
    
    <?php 
				endforeach;
			endforeach;
	?>

}

// END <?php echo $controller_name?>_model class

/* End of file <?php echo $controller_name?>_model.php */
/* Location: ./<?php echo $controller_name?>_model.php */