<?php echo tab_module_bar(4, $dataInfo['module_id']) ?>
<div class='panel panel-default'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-edit'></i>
        修改模块触发事件
        <div class='panel-tools'>
            <div class='btn-group'>
                <a class='btn' href='<?php echo current_url() ?>'>
                    <i class='glyphicon glyphicon-refresh'></i>
                    刷新
                </a>

                <a class="btn btn-sm" href="<?php echo base_url('module/project/index') ?>"><span
                        class="glyphicon glyphicon-arrow-left"></span> 返回 </a></div>
        </div>
    </div>

    <form role="form" id="validateform" method="post">
        <div class="panel-body">

            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
                        class="sr-only">关闭</span></button>
                <strong>提示!</strong> 可以填写PHP代码，请不要再加 &lt;?php ?&gt;,本系统不会判断PHP语法，所以请慎重。
            </div>

            <fieldset>

                <div class="form-group">
                    <label>模块类额外属性</label>
                    <textarea class="form-control" name="var_code"
                              placeholder="支持输入PHP代码，最好是CI 原生态"><?php echo $dataInfo['var_code'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>模块构造器类代码</label>
                    <textarea class="form-control" name="construct_code"
                              placeholder="支持输入PHP代码，最好是CI 原生态"><?php echo $dataInfo['construct_code'] ?></textarea>
                </div>
            </fieldset>

            <fieldset>

                <div class="form-group">
                    <label>新增事件前触发代码</label>
                    <textarea class="form-control" name="insert_before_code"
                              placeholder="支持输入PHP代码，最好是CI 原生态"><?php echo $dataInfo['insert_before_code'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>新增事件后触发代码</label>
                    <textarea class="form-control" name="insert_after_code"
                              placeholder="支持输入PHP代码，最好是CI 原生态:系统自动产生一个变量 $id为 最增成功ID"><?php echo $dataInfo['insert_after_code'] ?></textarea>
                </div>
            </fieldset>

            <fieldset>

                <div class="form-group">
                    <label>修改事件前触发代码</label>
                    <textarea class="form-control" name="update_before_code"
                              placeholder="支持输入PHP代码，最好是CI 原生态:默认$id 表ID主键"><?php echo $dataInfo['update_before_code'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>修改事件后触发代码</label>
                    <textarea class="form-control" name="update_after_code"
                              placeholder="支持输入PHP代码，最好是CI 原生态：默认$id 表ID主键"><?php echo $dataInfo['update_after_code'] ?></textarea>
                </div>
            </fieldset>

            <fieldset>

                <div class="form-group">
                    <label>删除事件前触发代码</label>
                    <textarea class="form-control" name="delete_before_code"
                              placeholder="支持输入PHP代码，最好是CI 原生态：默认$id 表ID主键"></textarea>
                </div>
                <div class="form-group">
                    <label>删除事件后触发代码</label>
                    <textarea class="form-control" name="delete_after_code"
                              placeholder="支持输入PHP代码，最好是CI 原生态：默认$id 表ID主键"></textarea>
                </div>
            </fieldset>


            <div class="form-actions">
                <button type="submit" id="dosubmit" class="btn btn-primary">下一步 : 设置HTML模板</button>

            </div>
        </div>
    </form>
</div>
<script language="javascript" type="text/javascript">
    var m_id = <?php echo $dataInfo['module_id']?>;
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/edit_trigger.js']);
    });
</script>