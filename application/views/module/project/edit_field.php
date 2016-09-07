<form role="form"  class="form-horizontal" id="validateform"
      method="post">

    <?php echo tab_module_bar(2, $dataInfo['module_id']) ?>
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <i class='glyphicon glyphicon-edit'></i>
            设置【<?php echo $dataInfo['controller_caption'] ?>】字段信息
            <div class='panel-tools'>
                <div class='btn-group'>
                    <a class='btn' href='<?php echo current_url() ?>'>
                        <i class='glyphicon glyphicon-refresh'></i>
                        刷新
                    </a>

                    <a type="button" id="add_new_field_btn" class="btn "> <span class="glyphicon glyphicon-plus"></span>
                        添加字段 </a>
                    <a class="btn btn-sm" href="<?php echo base_url('module/project/index') ?>"><span
                            class="glyphicon glyphicon-arrow-left"></span> 返回 </a></div>
            </div>
        </div>
        <div class="panel-body">

            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
                        class="sr-only">关闭</span></button>
                <strong>提示 ! </strong> 请先添加字段。
            </div>

            <table class="table" id="field_list_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>英文名</th>
                    <th>中文名</th>
                    <th>字段类型</th>
                    <th>默认值</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td><?php echo strtolower($dataInfo['controller_name']) . "_id" ?></td>
                    <td>ID</td>
                    <td>自增长ID</td>
                    <td>1、2、3...</td>
                    <td>-</td>
                </tr>
                </tbody>
            </table>


            <div class="form-actions">
                <button type="submit" id="dosubmit" class="btn btn-primary" disabled="disabled">保存下一步 : 设置字段扩展事件</button>
            </div>
        </div>
    </div>
</form>
<script language="javascript" type="text/javascript">
    var m_id = <?php echo $dataInfo['module_id']?>;
    var init_data_list = <?php echo json_encode($dataList)?>;
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/edit_field.js']);
    });
</script>