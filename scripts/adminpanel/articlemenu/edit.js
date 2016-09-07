define(function (require) {
	var $ = require('jquery');
	var aci = require('aci');
	require('message');
	require('bootstrapValidator');
	require('jquery-ui-dialog-extend');

	var load_template = function(_menu_type)
	{
		$.getJSON(SITE_URL+folder_name+'/articleMenu/load_template/'+_menu_type,function(data){
			$("#template").empty();
			$(data).each(function(index, element) {
				$("<option value='"+element[0]+"'>"+element[1]+"</option>").appendTo("#template");
			});
		});
	}
	
	$('input[name="menu_type"]').change(function(){
		var _menu_type = $(this).val();
		load_template(_menu_type);
	});

	load_template(default_menu_type);

	$('#validateform').bootstrapValidator({
			message: '输入框不能为空',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				 parent_id: {
					 validators: {
						notEmpty: {
							message: '请选择上级分类'
						}
					 }
				 },
				 menu_name: {
					 validators: {
						notEmpty: {
							message: '请输入分类名称'
						}
					 }
				 },
			}
		}).on('success.form.bv', function(e) {

			e.preventDefault();
			$("#dosubmit").attr("disabled","disabled");

			$.scojs_message("正在保存，请稍等...", $.scojs_message.TYPE_ERROR);
			$.ajax({
				type: "POST",
				url: edit?SITE_URL+folder_name+"/articleMenu/edit/"+id:SITE_URL+folder_name+"/articleMenu/add/",
				data:  $("#validateform").serialize(),
				success:function(response){
					var dataObj=jQuery.parseJSON(response);
					if(dataObj.status)
					{
						$.scojs_message('操作成功,3秒后将返回列表页...', $.scojs_message.TYPE_OK);
						aci.GoUrl(SITE_URL+folder_name+'/articleMenu/index/',1);
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

