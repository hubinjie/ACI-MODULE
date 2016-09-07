<?php
	foreach($view_edit_fields as $group_name=>$items):
		foreach($items as $k=>$v):
  			form_control_by_type($v,true);
		endforeach;
	endforeach;
global $split_js_code_array;


	if(isset($split_js_code_array['outside'])){
		foreach($split_js_code_array['outside'] as $k=>$v)
		{
			echo $v;
		}
	}
?>
<?php if($javascript_core==1):?>
	$(document).ready(function(e) {
<?php if($has_datepicker||$has_datetimepicker):?>
    $.datepicker.regional['zh-CN'] = {
                closeText: '关闭',
                prevText: '<上月',
                nextText: '下月>',
                currentText: '今天',
                monthNames: ['一月','二月','三月','四月','五月','六月',
                '七月','八月','九月','十月','十一月','十二月'],
                monthNamesShort: ['一','二','三','四','五','六',
                '七','八','九','十','十一','十二'],
                dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
                dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
                dayNamesMin: ['日','一','二','三','四','五','六'],
                weekHeader: '周',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: true,
                yearSuffix: '年'};
        $.datepicker.setDefaults($.datepicker.regional['zh-CN']);

<?php endif;?>

<?php if($has_datepicker):?>
$(".datepicker").datepicker();
<?php endif;?>

<?php if($has_datetimepicker):?>
	$(".datetimepicker").datetimepicker({lang:'ch'});
<?php endif;?>
	$("#myform").validationEngine();
<?php
	if(isset($split_js_code_array['ready'])){
		foreach($split_js_code_array['ready'] as $k=>$v)
		{
			echo $v;
		}
	}

	if(isset($split_js_code_array['init'])){
		foreach($split_js_code_array['init'] as $k=>$v)
		{
			echo $v;
		}
	}
?>
		$( "form" ).submit(function( event ) {
			event.preventDefault();
			$("#dosubmit").attr("disabled","disabled");
			if($("form").validationEngine('validate'))
			{
				$.ajax({
					type: "POST",
					url: is_edit?SITE_URL+"<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>/edit/"+id:SITE_URL+"<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>/add/",
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
	require('message');
	require('jquery-ui');
	require('jquery-ui-dialog-extend');
	require('datetimepicker');

		$(function () {
<?php if($has_datepicker||$has_datetimepicker):?>
	    $.datepicker.regional['zh-CN'] = {
                closeText: '关闭',
                prevText: '<上月',
                nextText: '下月>',
                currentText: '今天',
                monthNames: ['一月','二月','三月','四月','五月','六月',
                '七月','八月','九月','十月','十一月','十二月'],
                monthNamesShort: ['一','二','三','四','五','六',
                '七','八','九','十','十一','十二'],
                dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
                dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
                dayNamesMin: ['日','一','二','三','四','五','六'],
                weekHeader: '周',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: true,
                yearSuffix: '年'};
     $.datepicker.setDefaults($.datepicker.regional['zh-CN']);
<?php endif;?>
<?php if($has_datepicker||$has_datetimepicker):?>
	$(".datepicker").datepicker();
<?php endif;?>
<?php if($has_datetimepicker):?>
	$(".datetimepicker").datetimepicker({lang:'ch'});
<?php endif;?>

<?php
	if(isset($split_js_code_array['ready'])){
		foreach($split_js_code_array['ready'] as $k=>$v)
		{
			echo $v;
		}
	}

	if(isset($split_js_code_array['init'])){
		foreach($split_js_code_array['init'] as $k=>$v)
		{
			echo $v;
		}
	}
?>
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

		if($v['field_type']>60)continue;

		if(intval($v['is_required'])==0)continue;
		if($v['field_type']==14):

?>
					o_<?php echo $v['html_control_name']?>: {
		                validators: {
		                    notEmpty: {
		                        message: '<?php echo $v['error_tips']?>'
		                    },
		                    identical: {
		                        field: '<?php echo $v['html_control_name']?>',
		                        message: '两次密码不相符'
		                    }
		                }
		            },
		            <?php echo $v['html_control_name']?>: {
		                validators: {
		                    notEmpty: {
		                        message: '确认密码不能为空'
		                    },
		                    identical: {
		                        field: 'o_<?php echo $v['html_control_name']?>',
		                        message: '两次密码不相符'
		                    }
		                }
		            },
<?php elseif($v['field_type']==6):?>
					<?php echo $v['html_control_name']?>: {
		                validators: {
		                	notEmpty: {
		                        message: '<?php echo $v['error_tips']?>'
		                    },
		                    date: {
		                        format: 'YYYY-MM-DD',
		                        message: '<?php echo $v['error_tips']?>且格式不正确'
		                    }
		                }
		            },
<?php else:?>
					 <?php echo $v['html_control_name']?>: {
						 validators: {
							notEmpty: {
								message: '<?php echo $v['error_tips']?>'
							}
						 }
					 },
<?php endif;?>

<?php endforeach;endforeach;?>
				}
			}).on('success.form.bv', function(e) {

				e.preventDefault();
				$("#dosubmit").attr("disabled","disabled");

				$.scojs_message("正在保存，请稍等...", $.scojs_message.TYPE_ERROR);
				$.ajax({
					type: "POST",
					url: is_edit?SITE_URL+"<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>/edit/"+id:SITE_URL+"<?php echo strtolower(trim($controller_path,'/'))?>/<?php echo strtolower($controller_name)?>/add/",
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