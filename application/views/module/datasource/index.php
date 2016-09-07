<div class="panel panel-default">
  <div class='panel-heading'>
    <i class='glyphicon glyphicon-th-list'></i> 数据选择器管理
    <div class='panel-tools'>
      <div class='btn-group'>
        <?php aci_ui_a($folder_name, 'datasource', 'add_choose_type', $data_info['module_id'], ' class="btn  btn-sm "', '<span class="glyphicon glyphicon-plus"></span> 添加') ?>
        <?php aci_ui_a($folder_name, 'project', 'index', $data_info['module_id'], ' class="btn  btn-sm "', '<span class="glyphicon glyphicon-arrow-left"></span> 返回') ?>
      </div>
      <div class='badge'><?php echo count($datalist) ?></div>
    </div>
  </div>
  <div class='panel-body '>
    <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>数据选择中文名称</th>
              <th>数据选择功能名称</th>
              <th>数据选择器类型</th>
              <th>创建时间</th>
              <th>最后修改时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php if($datalist)foreach($datalist as $k=>$v):?>
            <tr>
              <td><?php echo $k+1?></td>
              <td><?php echo $v['datasource_name']?></td>
               <td><?php echo $v['datasource_function_name']?></td>
              <td><?php echo datasource_type($v['datasource_typeid'])?></td>
              <td><?php echo $v['created']?></td>
              <td><?php echo $v['modified']?></td>
              <td>
                <a href="<?php echo base_url('module/datasource/edit/'.$v['module_id'].'/'.$v['datasource_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-wrench"></span> 修改配置</a>
                <a href="<?php echo base_url('module/datasource/delete/'.$v['module_id'].'/'.$v['datasource_id'])?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove"></span> 删除</a>
                
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
    	</div>
  </div>
</div>