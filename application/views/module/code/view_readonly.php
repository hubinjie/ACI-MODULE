{php defined('BASEPATH') or exit('No permission resources.'); }
<?php echo $trigger['view_header_code'];?>
<div class='panel panel-default '>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> <?php echo $controller_caption?> 查看信息 
        <div class='panel-tools'>
            <div class='btn-group'>
            	<a class="btn " href="{php echo base_url('<?php echo trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>')}"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
            </div>
        </div>
    </div>
    <div class='panel-body '>
<div class="form-horizontal"  >
<?php 
if($view_edit_fields)
foreach($view_edit_fields as $group_name=>$items):?>
	<fieldset>
        <legend><?php echo $group_name?></legend>
     
  	<?php foreach($items as $k=>$v):if(in_hidden_field($v['field_type']))continue;?>
  	<?php echo view_control_by_type($v)?>
	<?php endforeach;?>
    </fieldset>
<?php endforeach;?>
	</div>
</div>
</div>
<?php echo $trigger['view_footer_code'];?>