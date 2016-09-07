define(function (require) {
	var $ = require('jquery');
	var aci = require('aci');
	require('message');
	require('bootstrapValidator');
	require('jquery-ui-dialog-extend');

	$(function () {
			var getThumb = function (v, s, w, h) {
				$("#thumb").val(v);
				$("#thumb_SRC").attr("src", upload_path + v);
				$("#dialog").dialog("close");
			}


			$(".uploadThumb_a").click(function () {
				$.extDialogFrame(SITE_URL + folder_name + "/article/upload/article/thumb/1", {
					model: true,
					width: 600,
					height: 300,
					title: '请上传...',
					buttons: null
				});
			});

			$('#validateform').bootstrapValidator({
				message: '输入框不能为空',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					title: {
						validators: {
							notEmpty: {
								message: '请输入标题'
							}
						}
					},
					menu_id: {
						validators: {
							notEmpty: {
								message: '请选择所属分类'
							}
						}
					}
				}
			}).on('success.form.bv', function (e) {
				e.preventDefault();

				$("#dosubmit").attr("disabled", "disabled");

				for (instance in CKEDITOR.instances)  CKEDITOR.instances[instance].updateElement();

				$.scojs_message("正在保存，请稍等...", $.scojs_message.TYPE_WAIT);
				$.ajax({
					type: "POST",
					url: edit ? SITE_URL + folder_name + "/article/edit/" + id : SITE_URL + folder_name + "/article/add/",
					data: $("#validateform").serialize(),
					success: function (response) {
						var dataObj = jQuery.parseJSON(response);
						if (dataObj.status) {
							$.scojs_message('操作成功,3秒后将返回列表页...', $.scojs_message.TYPE_OK);
							aci.GoUrl(SITE_URL + folder_name + '/article/index/' + menu_type, 3);
						} else {
							$.scojs_message(dataObj.tips, $.scojs_message.TYPE_ERROR);
							$("#dosubmit").removeAttr("disabled");
						}
					},
					error: function (request, status, error) {
						$.scojs_message(request.responseText, $.scojs_message.TYPE_ERROR);
						$("#dosubmit").removeAttr("disabled");
					}
				});

			}).on('error.form.bv', function (e) {
				$.scojs_message('带*号不能为空', $.scojs_message.TYPE_ERROR);
				$("#dosubmit").removeAttr("disabled");
			});

		});

	});
