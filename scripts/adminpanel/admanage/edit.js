function uploadOneFile(inputId,w,h,iscallback){
		if(!w) w=screen.width-4;
		if(!h) h=screen.height-95;
		if(!iscallback)iscallback=0;
		$.extDialogFrame("upload/1/pic/"+inputId+"/"+iscallback,{model:true,width:w,height:h,title:'请上传...',buttons:null});
}

function getPic(v,s,w,h){
		$("#pic").val(v);
		$("#pic_SRC").attr("src","/uploadfile/ads/"+v);
		$("#dialog" ).dialog("close");
}
define(function (require) {
	 var $ = require('jquery');
        message = require('message'),
        bootstrapValidator = require('bootstrapValidator'),
        jui = require('jquery-ui'),
        jde = require('jquery-ui-dialog-extend'),
		aci = require('aci');

		$(function () {
        
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
            
	$(".datepicker").datepicker();

		$("#pic_a").click(function(){
			uploadOneFile('pic',550,350,1)
		});
		$("#pic_b").click(function(){
			uploadOneFile('pic',550,350,1)
		});
		
		if(is_edit){
			$("#pic_SRC").attr("src","/uploadfile/ads/"+$("#pic").val());
		}
            $('#validateform').bootstrapValidator({
				message: '输入框不能为空',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					 admanage_name: {
						 validators: {
							notEmpty: {
								message: '广告名称 不能为空'
							}
						 }
					 },
					 position: {
						 validators: {
							notEmpty: {
								message: '位置 不能为空'
							}
						 }
					 },
					 pic: {
						 validators: {
							notEmpty: {
								message: '图片 不能为空'
							}
						 }
					 },
					 link: {
						 validators: {
							notEmpty: {
								message: '链接 不能为空'
							}
						 }
					 },
					 target: {
						 validators: {
							notEmpty: {
								message: '打开方式 不能为空'
							}
						 }
					 },
					 begin_date: {
						 validators: {
							notEmpty: {
								message: '开始时间 不能为空'
							}
						 }
					 },
					 end_date: {
						 validators: {
							notEmpty: {
								message: '结束时间 不能为空'
							}
						 }
					 },
					 click: {
						 validators: {
							notEmpty: {
								message: '点击次数 不能为空'
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
					url: is_edit?SITE_URL+folder_name+"/admanage/edit/"+id:SITE_URL+folder_name+"/admanage/add/",
					data:  $("#validateform").serialize(),
					success:function(response){
						var dataObj=jQuery.parseJSON(response);
						if(dataObj.status)
						{
							$.scojs_message('操作成功,3秒后将返回列表页...', $.scojs_message.TYPE_OK);
							aci.GoUrl(SITE_URL+folder_name+'/admanage/',3);
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
