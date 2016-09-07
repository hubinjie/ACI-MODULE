{php defined('BASEPATH') or exit('No permission resources.'); }
<?php echo $trigger['view_header_code'];?>
<div class='panel panel-default grid'>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> <?php echo $controller_caption?>列表
        <div class='panel-tools'>
            <div class='btn-group'>
                <?php if(str_exists($method_func,"add")):?> <a class="btn " href="{php echo base_url('<?php echo  trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>/add')}"><span class="glyphicon glyphicon-plus"></span> 添加 </a> <?php endif;?>
            </div>
            <div class='badge'>{php echo count($data_list)}</div>
        </div>
    </div>
    <?php if($view_search_fields_types):?>
    <div class='panel-filter '>
      <div class='row'>
        <div class='col-md-12'>
        <form class="form-inline" role="form" method="get">
          <?php echo form_control_search($view_search_fields_types);?>
        </form>
        </div>
      </div> 
    </div>
      <?php endif;?>
    <form method="post" id="form_list" <?php if(str_exists($method_func,"del")):?> action="{php  echo base_url('<?php echo  trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>/delete_all')}" <?php endif;?> > 
    <div class='panel-body '>
    {php if($data_list):}
        <table class="table table-hover dataTable" id="checkAll">
          <thead>
            <tr>
              <th>#</th>
              <?php foreach($view_list_fields as $k=>$v):?><?php if($v['is_sort']):?>
              {php $css=""; $next_url = base_url('<?php echo  trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>?order=<?php echo $v['field_name']?>&dir=desc'); }
              {if ($order=='<?php echo $v['field_name']?>'&&$dir=='desc')}
              {php $css="sorting_desc";$next_url = base_url('<?php echo  trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>?order=<?php echo $v['field_name']?>&dir=asc'); }
              {elseif ($order=='<?php echo $v['field_name']?>'&&$dir=='asc')}
              {php $css="sorting_asc";}
              {/if}<?php endif;?><th <?php if($v['is_sort']):?>class="sorting {$css}"   onclick="window.location.href='{$next_url}'" <?php endif;?>  nowrap="nowrap"><?php echo $v['field_caption']?></th>
              <?php endforeach;?><th>操作</th>
            </tr>
          </thead>
          <tbody>
          {php foreach($data_list as $k=>$v):}
            <tr>
              <td><input type="checkbox" name="pid[]" value="{php echo $v['<?php echo strtolower($controller_name)?>_id']}" /></td>
               <?php foreach($view_list_fields as $k=>$v):?>
              <td>{php echo $v['<?php echo $v['field_name']?>']}</td>
              <?php endforeach;?><td>
              <?php if(str_exists($method_func,"readonly")):?>
              	<a href="{php echo base_url('<?php echo  trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>/readonly/'.$v['<?php echo strtolower($controller_name)?>_id'])}"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-share-alt"></span> 查看</a>
              <?php endif?>
              <?php if(str_exists($method_func,"edit")):?>
                <a href="{php echo base_url('<?php echo  trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>/edit/'.$v['<?php echo strtolower($controller_name)?>_id'])}"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> 修改</a>
              <?php endif;?>
              <?php if(str_exists($method_func,"del")):?>
                <button type="button" class="btn btn-default btn-xs delete-btn" value="{$v['<?php echo strtolower($controller_name)?>_id']}"><span class="glyphicon glyphicon-remove"></span> 删除</button>
              <?php endif;?>  
              </td>
            </tr>
            {php endforeach;}
            
          </tbody>
        </table> 
    	</div>
      <div class="panel-footer">
        <div class="pull-left">
          <div class="btn-group">
      <?php if(str_exists($method_func,"del")):?>
            <button type="button" class="btn btn-default" id="reverseBtn"><span class="glyphicon glyphicon-ok"></span> 反选</button>
            <button type="button" id="deleteBtn"  class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> 删除勾选</button>
       <?php endif;?>
          </div>
      </div>
        <div class="pull-right">
        {php echo $pages;}
        </div>
      </div> 
      </form>  
  </div>
{php else:}
    <div class="no-result">-- 暂无数据 -- </div>
{php endif;}

<?php 
if($javascript_file==1):?>
<?php if($has_datepicker||$has_datetimepicker||$has_datetimepicker||str_exists($method_func,"del")):?>
<script language="javascript" type="text/javascript">
<!--
<?php if($has_datepicker):?>
	$(".datepicker").datepicker();
<?php endif;?>
<?php if($has_datetimepicker):?>
	$(".datetimepicker").datetimepicker({lang:'ch'});
<?php endif;?>
<?php if($has_datetimepicker):?>
	$(".datetimepicker").datepicker();
<?php endif;?>
<?php if(str_exists($method_func,"del")):?>
	$(document).ready(function(e) {
        $("#reverseBtn").click(function(){
			TS.Page.UI.ReverseChecked('pid[]')
		});
		
		$(".delete-btn").click(function(){
			var v = $(this).val();
			if(confirm('确定要删除吗?'))
			{
				window.location.href='{php echo base_url('<?php echo  trim($controller_path,'/')?>/<?php echo strtolower($controller_name)?>/')}/delete_one/'+v;
			}
		});
		
		$("#deleteBtn").click(function(){
			var _arr = TS.Common.Array.GetCheckedValue("pid[]");
			if(_arr.length==0)
			{
					alert("请先勾选明细");
					return false;
			}
			if(confirm('确定要删除吗?'))
			{
				$("#form_list").submit();
			}
		});
    });
<?php endif;?>
-->
</script>
<?php endif;?>
<?php else:?>
	<?php if($javascript_core==1):?>
<script language="javascript" type="text/javascript" src="{php echo base_url('<?php echo strtolower(trim($js_path,"/")."/".ucfirst($controller_name)."/lists.js")?>') }"></script>
    <?php else:?>
    <script language="javascript" type="text/javascript">
    require(['{php echo SITE_URL}scripts/common.js'], function (common) {
        require(['{php echo SITE_URL}<?php echo strtolower(trim($js_path,'/'))?>/<?php echo strtolower($controller_name)?>/lists.js']);
    });
</script>
    <?php endif;?>
<?php endif;?>
<?php echo $trigger['view_footer_code'];?>