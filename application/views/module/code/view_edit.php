{php defined('BASEPATH') or exit('No permission resources.'); }
<?php echo $trigger['view_header_code'];?>
<form class="form-horizontal" role="form" id="validateform" name="validateform" action="{php echo base_url('<?php echo trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>/edit')}" >
	<div class='panel panel-default '>
		<div class='panel-heading'>
			<i class='fa fa-table'></i> <?php echo $controller_caption?> 修改信息
			<div class='panel-tools'>
				<div class='btn-group'>
					<a class="btn " href="{php echo base_url('<?php echo trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>')}"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
				</div>
			</div>
		</div>
		<div class='panel-body '>
			<?php
			if($view_edit_fields)
				foreach($view_edit_fields as $group_name=>$items):?>
					<fieldset>
						<legend><?php echo $group_name?></legend>
						<?php foreach($items as $k=>$v):?>
							<?php echo form_control_by_type($v,true)?>
						<?php endforeach;?>
					</fieldset>
				<?php endforeach;?>
			<div class='form-actions'>
				<button class='btn btn-primary ' type='submit' id="dosubmit">保存</button>
			</div>
</form>
<?php if($javascript_file==1):?>
	<script language="javascript" type="text/javascript">
		<!--
		$(document).ready(function(e) {
			<?php if($has_datepicker):?>
			$(".datepicker").datepicker();
			<?php endif;?>
			<?php if($has_datetimepicker):?>
			$(".datetimepicker").datetimepicker({lang:'ch'});
			<?php endif;?>
			<?php if($has_datetimepicker):?>
			$(".datetimepicker").datepicker();
			<?php endif;?>
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
									window.location.href='{php echo base_url('<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>')}';
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
<?php else:?>
	<?php if($javascript_core==1):?>
		<script language="javascript" type="text/javascript">
			var is_edit ={php echo ($is_edit)?"true":"false" };
			var id ={$id};
		</script>
		<script language="javascript" type="text/javascript" src="{php echo SITE_URL}<?php echo strtolower(trim($js_path,'/'))?>/<?php echo strtolower($controller_name)?>/edit.js" ></script>
	<?php else:?>
		<script language="javascript" type="text/javascript">
			var is_edit ={php echo ($is_edit)?"true":"false" };
			var id ={$id};

			require(['{php echo SITE_URL}scripts/common.js'], function (common) {
		        require(['{php echo SITE_URL}<?php echo strtolower(trim($js_path,'/'))?>/<?php echo strtolower($controller_name)?>/edit.js']);
		    });
		</script>
	<?php endif;?>

	<?php
	if(defined("_VIEW_EDIT")){?>
		<script language="javascript" type="text/javascript">
			<?php
                    global $split_js_code_array;
                    if($split_js_code_array['init']){
                        foreach($split_js_code_array['init'] as $k=>$v)
                        {
                            echo $v;
                        }
                    }?>
		</script>
	<?php
	}
	?>
<?php endif;?>
<?php echo $trigger['view_footer_code'];?>