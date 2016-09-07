define(function (require) {
	var $ = require('jquery');
	var aci = require('aci');
	require('bootstrap');
	require('jquery-ui-dialog-extend');
	require('validationEngine');
	require('message');


		$("#validateform").validationEngine();
		$("#validateform").submit(function( event ) {
			event.preventDefault();
			if($("#validateform").validationEngine('validate'))
			{
				$("#dosubmit").attr("disabled","disabled");
				
				$.ajax({
					type: "POST",
					url: SITE_URL+"module/project/edit/"+m_id,
					data:  $("#validateform").serialize(),
					success:function(response){
						var dataObj=jQuery.parseJSON(response);
						if(dataObj.status)
						{
							m_id = dataObj.m_id;
							window.location.href=SITE_URL+'module/project/edit_field/'+m_id;
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
