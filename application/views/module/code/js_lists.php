<?php if($javascript_core==1):?>

<?php if($has_datepicker):?>
	$(".datepicker").datepicker();
<?php endif;?>
<?php if($has_datetimepicker):?>
	$(".datetimepicker").datetimepicker({lang:'ch'});
<?php endif;?>
<?php if($has_datetimepicker):?>
	$(".datetimepicker").datepicker();
<?php endif;?>

<?php if(str_exists($method_func,"del")):?>
	
	$(document).ready(function(e) {
        $("#reverseBtn").click(function(){
			TS.Page.UI.ReverseChecked('pid[]')
		});
        
        $("#deleteBtn").click(function(){
			var _arr = TS.Common.Array.GetCheckedValue("pid[]");
            if(_arr.length==0)
            {
                    alert("请先勾选明细");
                    return false;
            }
            if(confirm('确定要删除吗?'))
            {
                $("#form_list").submit();
            }
		});
        
        $(".delete-btn").click(function(){
			var v = $(this).val();
			if(confirm('确定要删除吗?'))
			{
				window.location.href='{php echo base_url('<?php echo  trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>/')}/delete_one/'+v;
			}
		});
    });
<?php endif;?>
		$("#myform").validationEngine();
		
		$( "form" ).submit(function( event ) {
			event.preventDefault();
			$("#dosubmit").attr("disabled","disabled");
			if($("form").validationEngine('validate'))
			{
				$.ajax({
					type: "POST",
					url: edit?SITE_URL+"<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>/edit/"+id:SITE_URL+"<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>/add/",
					data:  $("#myform").serialize(),
					success:function(response){
						var dataObj=eval("("+response+")");
						if(dataObj.status)
						{
							setTimeout(function(){
								window.location.href=SITE_URL+'<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>';
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
<?php elseif($javascript_core==3):?>
	define(function (require) {
	    var $ = require('jquery');
	    var aci = require('aci');
	    require('bootstrap');
	    require('bootstrapValidator');

		$(function () {
			$("#reverseBtn").click(function(){
				aci.ReverseChecked('pid[]')
			});

			$("#deleteBtn").click(function(){
				var _arr = aci.GetCheckboxValue("pid[]");
				if(_arr.length==0)
				{
					alert("请先勾选明细");
					return false;
				}
				if(confirm('确定要删除吗?'))
				{
					$("#form_list").submit();
				}
			});
        
			 $(".delete-btn").click(function(){
				var v = $(this).val();
				if(confirm('确定要删除吗?'))
				{
					window.location.href= SITE_URL+ "<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>/delete_one/"+v;
				}
			});
            
<?php if($has_datepicker):?>
		$(".datepicker").datepicker();
<?php endif;?>
<?php if($has_datetimepicker):?>
		$(".datetimepicker").datetimepicker({lang:'ch'});
<?php endif;?>
<?php if($has_datetimepicker):?>
		$(".datetimepicker").datepicker();
<?php endif;?>
            $('#validateform').bootstrapValidator({
				message: '输入框不能为空',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
<?php if($view_edit_fields)foreach($view_edit_fields as $group_name=>$fields):
		if($fields)foreach($fields as $v):
		
		if($v['field_type']>60)continue;?>
					 <?php echo $v['html_control_name']?>: {
						 validators: {
							notEmpty: {
								message: '<?php echo $v['error_tips']?>'
							}
						 }
					 },
<?php endforeach;endforeach;?>
				}
			}).on('success.form.bv', function(e) {
				
				e.preventDefault();
				$("#dosubmit").attr("disabled","disabled");
				
				$.scojs_message("正在保存，请稍等...", $.scojs_message.TYPE_ERROR);
				$.ajax({
					type: "POST",
					url: edit?SITE_URL+"<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>/edit/"+id:SITE_URL+"<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>/add/",
					data:  $("#validateform").serialize(),
					success:function(response){
						var dataObj=jQuery.parseJSON(response);
						if(dataObj.status)
						{
							$.scojs_message('操作成功,3秒后将返回列表页...', $.scojs_message.TYPE_OK);
							aci.GoUrl(SITE_URL+'<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>/',1);
						}else
						{
							$.scojs_message(dataObj.tips, $.scojs_message.TYPE_ERROR);
							$("#dosubmit").removeAttr("disabled");
						}
					},
					error: function (request, status, error) {
						$.scojs_message(request.responseText, $.scojs_message.TYPE_ERROR);
						$("#dosubmit").removeAttr("disabled");
					}                  
				});
			
			}).on('error.form.bv',function(e){ $.scojs_message('带*号不能为空', $.scojs_message.TYPE_ERROR);$("#dosubmit").removeAttr("disabled");});
            
        });
});
<?php endif;?>