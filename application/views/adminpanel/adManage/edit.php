<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>
<div class='panel panel-default'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-edit'></i> 广告管理
        <div class='panel-tools'>
            <div class='btn-group'>
                <a class='btn' href='<?php echo current_url() ?>'>
                    <i class='glyphicon glyphicon-refresh'></i>
                    刷新
                </a>
                <?php aci_ui_a($folder_name, $controller_name, 'index', '', ' class="btn  btn-sm pull-right"', '<span class="glyphicon glyphicon-arrow-left"></span> 返回') ?>
            </div>
        </div>
    </div>
    <div class="panel-body">

        <form class="form-horizontal" role="form" id="validateform" name="validateform"
              action="<?php echo base_url($folder_name . '/'.$controller_name.'/edit') ?>">
            <div class="row">
                <div class="col-md-12">
                    <fieldset>
                        <legend>基本信息</legend>
                        <div class="form-group">
                            <label for="admanage_name" class="col-sm-2 control-label">广告名称</label>

                            <div class="col-sm-9 ">
                                <input type="text" name="admanage_name" id="admanage_name"
                                       value='<?php echo isset($data_info['admanage_name']) ? $data_info['admanage_name'] : '' ?>'
                                       class="form-control validate[required]" placeholder="请输入广告名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="position" class="col-sm-2 control-label">位置</label>

                            <div class="col-sm-9 ">
                                <select class="form-control  validate[required]" name="position" id="position">
                                    <option value="">==请选择==</option>
                                    <option value='homepage'
                                        <?php if (isset($data_info['position']) && ($data_info['position'] == 'homepage')) { ?> selected="selected" <?php } ?> >
                                        首页
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pic" class="col-sm-2 control-label">图片</label>

                            <div class="col-sm-9 ">
                                <a id="pic_a"><img width="100" id="pic_SRC" border="1"
                                                   src="<?php echo base_url("/images/nopic.gif") ?>"/></a><input
                                    type="hidden" id="pic" name="pic" value="<?php echo $data_info['pic'] ?>"/> <a
                                    id="pic_b" class="btn btn-default btn-sm"> 选择图片 ...</a><span class="help-block">只支持图片上传.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">链接</label>

                            <div class="col-sm-9 ">
                                <input type="text" name="link" id="link"
                                       value='<?php echo isset($data_info['link']) ? $data_info['link'] : '' ?>'
                                       class="form-control  validate[required]" placeholder="请输入链接">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="target" class="col-sm-2 control-label">打开方式</label>

                            <div class="col-sm-9 ">
                                <select class="form-control " name="target" id="target">
                                    <option value="">==请选择==</option>
                                    <option value='_self'
                                        <?php if (isset($data_info['target']) && ($data_info['target'] == '_self')) { ?> selected="selected" <?php } ?> >
                                        本窗口
                                    </option>
                                    <option value='_blank'
                                        <?php if (isset($data_info['target']) && ($data_info['target'] == '_blank')) { ?> selected="selected" <?php } ?> >
                                        新窗口
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="begin_date" class="col-sm-2 control-label">开始时间</label>

                            <div class="col-sm-9 ">
                                <input type="text" name="begin_date" id="begin_date"
                                       value='<?php echo isset($data_info['begin_date']) ? $data_info['begin_date'] : '' ?>'
                                       class="form-control datepicker  validate[required,custom[date]]"
                                       placeholder="请输入开始时间">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end_date" class="col-sm-2 control-label">结束时间</label>

                            <div class="col-sm-9 ">
                                <input type="text" name="end_date" id="end_date"
                                       value='<?php echo isset($data_info['end_date']) ? $data_info['end_date'] : '' ?>'
                                       class="form-control datepicker  validate[required,custom[date]]"
                                       placeholder="请输入结束时间">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="click" class="col-sm-2 control-label">点击次数</label>

                            <div class="col-sm-9 ">
                                <input type="number" name="click" id="click"
                                       value='<?php echo isset($data_info['click']) ? $data_info['click'] : '' ?>'
                                       class="form-control validate[custom[integer]]" placeholder="请输入点击次数">
                            </div>
                        </div>
                    </fieldset>
                 </div>
             </div>

            <div class='form-actions'>
                <?php aci_ui_button($folder_name,$controller_name,(($is_edit)?"edit":"add"),' type="submit" id="dosubmit" class="btn btn-primary " ','保存')?>
            </div>
        </form>
     </div>
   </div>

        <script language="javascript" type="text/javascript">
            var is_edit =<?php echo ($is_edit)?"true":"false" ?>;
            var id =<?php echo $id;?>;
            var folder_name = "<?php echo $folder_name?>"
            require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
                require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/edit.js']);
            });
        </script>