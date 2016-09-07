<div class='panel panel-default '>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-th-list'></i> 添加数据选择器
        <div class='panel-tools'>

            <div class='btn-group'>
                <?php aci_ui_a($folder_name, 'datasource', 'index', $data_info['module_id'], ' class="btn  btn-sm "', '<span class="glyphicon glyphicon-arrow-left"></span> 返回') ?>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row placeholders">
            <div class="col-xs-12 col-sm-6 ">
                <p class="circle"><i class="fa fa-list fa-4x"></i></p>
                <a href="<?php echo base_url('module/datasource/add_by_type/' . $data_info['module_id'] . '/1') ?>"><h4>
                        下拉框单选数据选择器</h4></a>
            </div>

            <div class="col-xs-12 col-sm-6 ">
                <p class="circle"><i class="fa fa-list-alt  fa-4x"></i></p>
                <h4><a href="<?php echo base_url('module/datasource/add_by_type/' . $data_info['module_id'] . '/2') ?>">弹窗式单选数据选择器</a>
                </h4>
            </div>
        </div>

        <div class="row placeholders">

            <div class="col-xs-12 col-sm-6 ">
                <p class="circle"><i class="fa fa-list fa-4x"></i></p>
                <h4><a href="<?php echo base_url('module/datasource/add_by_type/' . $data_info['module_id'] . '/3') ?>">下拉框多选数据选择器</a>
                </h4>
            </div>

            <div class="col-xs-12 col-sm-6 ">
                <p class="circle"><i class="fa fa-list-alt  fa-4x"></i></p>
                <h4><a href="<?php echo base_url('module/datasource/add_by_type/' . $data_info['module_id'] . '/4') ?>">弹窗式多选数据选择器</a>
                </h4>
            </div>
        </div>
    </div>
