define(function() {
	
	var field_type_func =function(default_value)
	{
		var groups=[{"group":"字符类","options":[{id:'2',value:'无格式要求单行文本'},
												{id:'3',value:'只能输入EMAIL格式文本'},
												{id:'4',value:'只能输入网址格式文本'},
												{id:'5',value:'只能输入手机号码格式文本'},
												{id:'6',value:'只能输入年月日格式文本'},
												{id:'7',value:'只能输入年月日时分秒格式文本'},
												{id:'8',value:'只能输入时分秒格式文本'},
												{id:'11',value:'多行文本'},
												{id:'12',value:'多行文本带编辑器'},
												{id:'13',value:'用户名输入框(用户名唯一)'},
												{id:'14',value:'密码输入框'},
												]},
					{"group":"数字类","options":[{id:'21',value:'数字'},
												{id:'22',value:'带2位小数点数字(价格)'},
												]},
					{"group":"单选类","options":[{id:'31',value:'下拉选择是与否'},
												{id:'32',value:'单选是与否'},
												{id:'33',value:'下拉选择单选...'},
												{id:'34',value:'多单框单选...'},
												{id:'35',value:'弹窗单选～选择数据源...'},
												]},
					{"group":"多选类","options":[{id:'41',value:'下拉选择多选...'},
												{id:'42',value:'多选框多选...'},
												{id:'43',value:'弹窗多选～选择数据源...'},
												]},
					{"group":"上传类","options":[{id:'51',value:'单个图片上传...'},
												{id:'52',value:'单个文件上传...'},
												]},
					{"group":"特殊类","options":[{id:'61',value:'当前用户名ID...'},
												{id:'62',value:'当前用户名...'},
												{id:'63',value:'当前系统时间...'},
												]},
												];
		_htmls ="<option value=''>请选择...</option>";
		$.each(groups,function(i,e){
			_htmls+="<optgroup label=\""+e.group+"\">";
			$.each(e.options,function(ii,ee){
				if(parseInt(default_value)==parseInt(ee.id))
					_htmls+="<option value=\""+ee.id+"\" selected=\"selected\">"+ee.value+"</option>";
				else
					_htmls+="<option value=\""+ee.id+"\">"+ee.value+"</option>";
			});
			_htmls+="</optgroup>";
		});
		
		return _htmls;
	}

	
	var add_new_line = function(field_name,field_caption,field_type,default_value)
	{
		var _count_line = $("#field_list_table tbody tr").size()+1;
		var new_line_html= '<tr>'
                +'	<td>'+_count_line+'</td>'
                +'  <td><input type="text" placeholder="英文字段名" name="field_name[]" class="form-control validate[required]"  value="'+field_name+'"  /></td>'
				+'  <td><input type="text" placeholder="中文显示名" name="field_caption[]" class="form-control validate[required]"  value="'+field_caption+'"  /></td>'
				+'	<td><select  class="form-control validate[required]" name="field_type[]"  >'+field_type_func(field_type)+'</select></td>'
				+'  <td><input type="text" placeholder="默认值" name="default_value[]" class="form-control"  value="'+default_value+'"  /></td>'
                +'  <td><button type="button" class="btn btn-warning btn-xs remove-btn"> <span class="glyphicon glyphicon-remove"></span> 删除 </button></td>'
                +'</tr>';
				
		$(new_line_html).appendTo("#field_list_table tbody").find(".remove-btn").click(function(){
					$(this).parents("tr").remove();
		}).end();
		$("#validateform").validationEngine('attach'); 
	}
	
	return add_new_line;
});