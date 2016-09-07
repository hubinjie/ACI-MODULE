<div class="panel panel-default">
  <div class='panel-heading'>
    <i class='glyphicon glyphicon-th-list'></i> CI程序模块生成器
    <div class='panel-tools'>
      <div class='btn-group'>
        <?php aci_ui_a($folder_name, $controller_name, 'add', '', ' class="btn  btn-sm "', '<span class="glyphicon glyphicon-plus"></span> 添加') ?>
      </div>
      <div class='badge'><?php echo count($datalist) ?></div>
    </div>
  </div>
  <div class='panel-body '>
    <div class="alert alert-success alert-dismissible" role="alert">
      <strong>友情提示</strong> 多个模块之间可以用数据源进行关联。
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>模块名称</th>
              <th>创建时间</th>
              <th>最后修改时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php if($datalist)foreach($datalist as $k=>$v):?>
            <tr>
              <td><?php echo $k+1?></td>
              <td><?php echo $v['controller_caption']?></td>
              <td><?php echo $v['created']?></td>
              <td><?php echo $v['modified']?></td>
              <td>
                <a href="<?php echo base_url('module/project/edit/'.$v['module_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-wrench"></span> 修改配置</a>
                <a href="<?php echo base_url('module/datasource/index/'.$v['module_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-tint"></span> 通用数据源</a>
                <a href="<?php echo base_url('module/project/sql/'.$v['module_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-cloud-download"></span> 下载SQL</a>
                <a href="<?php echo base_url('module/project/download/'.$v['module_id'])?>" target="_blank" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-download"></span> 下载安装包</a>
                <a href="<?php echo base_url('module/project/delete/'.$v['module_id'])?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove"></span> 删除项目</a>
                
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
    	</div>
  </div>
</div>
<script language="javascript" type="text/javascript">
  require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
    require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/empty.js']);
  });
</script>