define(function (require) {
		var $ = require('jquery');
		var aci = require('aci');
		var add_new_line = require('module/project/add_new_line');
		require('bootstrap');
		require('jquery-ui-dialog-extend');
		require('validationEngine');
		require('message');

		$("#validateform").validationEngine();
		
		$("#add_new_field_btn")

		$.each(init_data_list,function(i,v){
			add_new_line(v.field_name,v.field_caption,v.field_type,v.default_value);
		});
	
        $("#add_new_field_btn").click(function(){
			add_new_line('','','','','','');
			return false;
		});

		$("#dosubmit").removeAttr("disabled");

		$("#validateform").submit(function( event ) {
			event.preventDefault();
			if($("#validateform").validationEngine('validate'))
			{
				$("#dosubmit").attr("disabled","disabled");
				
				$.ajax({
					type: "POST",
					url: SITE_URL+"module/project/edit_field/"+m_id,
					data:  $("#validateform").serialize(),
					success:function(response){
						var dataObj=jQuery.parseJSON(response);
						if(dataObj.status)
						{
							window.location.href=SITE_URL+'module/project/edit_field_ext/'+m_id;
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
