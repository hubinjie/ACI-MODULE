define(function (require) {
	var $ = require('jquery');
	var aci = require('aci');
	require('message');

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
				$("#formlist").attr("action",SITE_URL+folder_name+"/articleMenu/delete/");
				$("#formlist").submit();
			}
		});
});

