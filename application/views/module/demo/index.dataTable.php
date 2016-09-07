<h3 class="page-header"><a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url('module/demo/add/'.$dataInfo['module_id'])?>"><span class="glyphicon glyphicon-plus"></span> 添加信息 </a> <?php echo $dataInfo['controller_caption']?>功能预览 </h3>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>友情提示：</strong> 因为模块是在线预览，涉及到安全性，所有数据均为随机填充，所有触发器及自定义HTML或PHP均不会实际执行.
</div>
<form method="post" action="<?php echo base_url('module/demo/delete/'.$dataInfo['module_id'])?>" >
        <table  id="example" class="table table-striped " cellspacing="0" width="100%">
          <thead>
            <tr>
              <th></th>
              <?php foreach($dataInfo['view_list_fields'] as $k=>$v):?>
              <th><?php echo $v['field_caption']?></th>
              <?php endforeach;?>
              <th>操作</th>
            </tr>
          </thead>
         
        </table>
    	</div>
      <div class="pull-left"><br/>
      <div class="btn-group">
      	<button type="button" class="btn btn-default" onclick="TS.Page.UI.ReverseChecked('pid[]')"><span class="glyphicon glyphicon-ok"></span> 反选</button>
        <button type="button" onclick="delete_all()"  class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> 删除勾选</button>
      </div>
  </div>
  <div class="pull-right">
  <?php echo $pages;?>
  </div>
  </form>
<script language="javascript" type="text/javascript">
<!--
	$(document).ready(function() {
		$('#example').dataTable({
			"processing": true,
			"serverSide": true,
			"aoColumns": [ 
			{ "bSortable": false },{ "bSortable": true },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false }],
			"aoColumns": [ {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": "<input type=\"checkbox\" name=\"pid[]\" value=\"1\" />"
            },
            { "data": "full_name" },
            { "data": "num" },
            { "data": "email" },
            { "data": "user_id" },
			{ "data": "sex" },
            { "data": "photo" },
			{
                "orderable":      false,
                "data":           "id",
				"mRender":function(data,type,full){
					return "<a href=\"<?php echo base_url('module/demo/readonly/'.$dataInfo['module_id'])?>"+data+"\"  class=\"btn btn-default btn-xs\"><span class=\"glyphicon glyphicon-share-alt\"></span> 查看</a>";	
				}
            }],
			"ajax": {url:"<?php echo base_url('module/demo/ajax_list_data/'.$dataInfo['module_id'])?>","type":"GET"},

		});
	} );

	function delete_all()
	{
		if(confirm('确定要删除吗?'))
		{
			window.location.href='<?php echo base_url('module/demo/delete/'.$dataInfo['module_id'])?>';
		}
	}
	
	function delete_this(v)
	{
		if(confirm('确定要删除吗?'))
		{
			window.location.href='<?php echo base_url('module/demo/delete/'.$dataInfo['module_id'])?>';
		}
	}
-->
</script>