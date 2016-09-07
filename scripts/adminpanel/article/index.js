define(function (require) {
	var $ = require('jquery');
	var aci = require('aci');
	require('message');
	require('bootstrapValidator');
	require('jquery-ui-dialog-extend');


	var setdone = function()
	{
		$("#dialog" ).dialog("close");
		window.location.reload();
	}


	$("#reverseBtn").click(function(){
			aci.ReverseChecked('pid[]');	
		});
		
		$("#deleteBtn").click(function(){
			var _arr = aci.GetCheckboxValue('pid[]');
			if(_arr.length==0)
			{
				alert("请先勾选明细");
				return false;
			}
			
			if(confirm("确定要删除分类吗？"))
			{
				$("#formlist").attr("action",SITE_URL+folder_name+"/article/delete/");
				$("#formlist").submit();
			}
		});

		$("#positionBtn").click(function(){
			var _arr = aci.GetCheckboxValue('pid[]');
			if(_arr.length==0)
			{
				alert("请先勾选明细");
				return false;
			}
			$.extDialogFrame(SITE_URL+folder_name+"/article/position/?pid="+_arr.toString(),{model:true,width:600,height:300,title:'推荐至...',buttons:null});

		});
});

