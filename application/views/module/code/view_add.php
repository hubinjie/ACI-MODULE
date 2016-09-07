{php defined('BASEPATH') or exit('No permission resources.'); }
<?php echo $trigger['view_header_code'];?>
    <h3 class="page-header"><a class="btn btn-default btn-sm pull-right" href="{php echo base_url('<?php echo  trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>')}"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a> <?php echo $controller_caption?> 新增信息 </h3>  
<form class="form-horizontal" role="form" id="validateform" name="validateform" action="{php echo base_url('<?php echo trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>/add')}" >
<?php 
if($view_edit_fields)
foreach($view_edit_fields as $group_name=>$items):?>
     <div class="panel panel-default">
      <div class="panel-heading"><?php echo $group_name?></div>
      <div class="panel-body">
  	<?php foreach($items as $k=>$v):if($v['field_type']==0)continue;?>
  	<?php echo form_control_by_type($v)?>
	<?php endforeach;?>
      </div>
     </div>

<?php endforeach;?>
    <div class="col-sm-offset-2 col-sm-8 ">
         	 <button type="submit" id="dosubmit" class="btn btn-primary btn-lg" >保存</button>
    </div>
</form>

<script language="javascript" type="text/javascript">
<!--
	$(document).ready(function(e) {
		
		$(".datepicker").datepicker();
		$(".datetimepicker").datetimepicker({lang:'ch'});
		$(".timepicker").datepicker();
		$("#myform").validationEngine();
		
		$( "form" ).submit(function( event ) {
			event.preventDefault();
			$("#dosubmit").attr("disabled","disabled");
			if($("form").validationEngine('validate'))
			{
				$.ajax({
					type: "POST",
					url: "{php echo current_url()}",
					data:  $("#myform").serialize(),
					success:function(response){
						var dataObj=eval("("+response+")");
						if(dataObj.status)
						{
							setTimeout(function(){
								window.location.href='{php echo base_url('<?php echo trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>')}';
							},1000);
							
						}else
						{
							alert(dataObj.tips);
							$("#dosubmit").removeAttr("disabled");
						}
					},
					error: function (request, status, error) {
						$("#dosubmit").removeAttr("disabled");
						alert(request.responseText);
						
					}                  
				});
			}else
				$("#dosubmit").removeAttr("disabled");
			
		});
		
    });
-->
</script>
<?php echo $trigger['view_footer_code'];?>