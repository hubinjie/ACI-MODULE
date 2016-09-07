define(function (require) {
	var $ = require('jquery');
	var aci = require('aci');
	require('bootstrap');
	require('jquery-ui-dialog-extend');
	require('validationEngine');
	require('message');

		
		$(".choose-datasource:radio").change(function(){
		
				if($(this).val()=="1")
				{
					$("#ds_"+$(this).attr("field_id")+"_1").hide();
					$("#ds_"+$(this).attr("field_id")+"_2").show();
				}else{
					$("#ds_"+$(this).attr("field_id")+"_2").hide();
					$("#ds_"+$(this).attr("field_id")+"_1").show();
				}
			
		});
		$("#validateform").validationEngine();

		$("#validateform").submit(function( event ) {
			event.preventDefault();
			if($("#validateform").validationEngine('validate'))
			{
				$("#dosubmit").attr("disabled","disabled");
				
				$.ajax({
					type: "POST",
					url: SITE_URL+"module/project/edit_field_ext/"+m_id,
					data:  $("#validateform").serialize(),
					success:function(response){
						var dataObj=jQuery.parseJSON(response);
						if(dataObj.status)
						{
							window.location.href=SITE_URL+'module/project/index/';
						}else
						{
							alert(dataObj.tips);
							$("#dosubmit").removeAttr("disabled");
						}
					},
					error: function (request, status, error) {
						alert(request.responseText);
						$("#dosubmit").removeAttr("disabled");
					}                  
				});
			}else
			{
						$("#dosubmit").removeAttr("disabled");
			}	
		 
		
	});

});
