<div class='panel panel-default grid'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-th-list'></i>
        分类管理
        <div class='panel-tools'>
            <div class='btn-group'>
                <a class='btn' href='<?php echo current_url()?>'>
                    <i class='glyphicon glyphicon-refresh'></i>
                    刷新
                </a>
                <?php aci_ui_a($folder_name,'articleMenu','add','0',' class="btn  btn-sm "','<span class="glyphicon glyphicon-plus"></span> 添加分类')?>
            </div>

        </div>
    </div>
    <div class='panel-body'>
        <form id="formlist" name="formlist" method="post">
        <table class="table table-hover dataTable">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>分类名称</th>
                  <th>分类类型</th>
                  <th>分类URL</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php echo $table_html;?>
              </tbody>
            </table>
        </form>
    </div>
    <div class="panel-footer">
        <div class="pull-left">
          <div class="btn-group">
            <button type="button" class="btn btn-default" id="reverseBtn" onclick="ReverseChecked('pid[]')"><span class="glyphicon glyphicon-ok"></span> 反选</button>

            <?php aci_ui_button($folder_name,'articleMenu','delete',' type="button" id="deleteBtn"  class="btn btn-default" ','<span class="glyphicon glyphicon-remove"></span> 删除勾选')?>
          </div>
  		</div>
        <div class="pull-right">
        	<?php aci_ui_a($folder_name,'articleMenu','public_cache','','class="btn btn-default" ','<span class="glyphicon glyphicon-cloud"></span> 缓存')?>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript">
    var folder_name ="<?php echo $folder_name;?>";
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/list.js']);
    });
</script>