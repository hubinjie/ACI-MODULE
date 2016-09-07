<h3 class="page-header"><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('module/demo/index/'.$dataInfo['module_id'])?>"><span class="glyphicon glyphicon-arrow-left "></span> 返回 </a> <?php echo $dataInfo['controller_caption']?>修改功能预览 </h3>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>友情提示：</strong> 因为模块是在线预览，涉及到安全性，所有数据均为随机填充，所有触发器及自定义HTML或PHP均不会实际执行.
</div>


<?php 
if($view_edit_fields)
foreach($view_edit_fields as $group_name=>$items):?>
<form class="form-horizontal" role="form" id="myform" name="myform" >
 <div class="panel panel-default">
  <div class="panel-heading"><?php echo $group_name?></div>
  <div class="panel-body">
  	<?php foreach($items as $k=>$v):?>
  	<?php echo form_control_by_type($v)?>
	<?php endforeach;?>
  </div>
 </div>
</form>
<?php endforeach;?>
   
    <div class="col-sm-offset-2 col-sm-8 ">
         	 <button type="submit" id="dosubmit" class="btn btn-primary btn-lg" >保存修改</button>
        </div>  
    </div> 