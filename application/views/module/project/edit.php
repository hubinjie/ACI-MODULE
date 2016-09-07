<?php echo tab_module_bar(1, $dataInfo['module_id']) ?>

<div class='panel panel-default'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-edit'></i>
        <?php if ($is_edit): ?>修改<?php else: ?>添加<?php endif; ?>模块信息
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
    <div class="panel-body">

        <form role="form" class="form-horizontal" id="validateform" method="post">
            <input type="hidden" name="jsCore" id="jscore1" value="3">
            <input type="hidden" name="charset" id="charsetRadios1"
                   value="utf-8" <?php echo $dataInfo['charset'] == "utf-8" ? "checked" : "" ?>>

            <div class="form-group">
                <label class="col-sm-2 control-label">模块中文名称</label>

                <div class="col-sm-9">
                    <input type="text" value="<?php echo $dataInfo['controller_caption'] ?>"
                           class="form-control validate[required]" id="captionInput" name="caption"
                           placeholder="请输入模块中文名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">模块作者</label>

                <div class="col-sm-9">
                    <input type="text" value="<?php echo $dataInfo['controller_author'] ?>"
                           class="form-control validate[required]" id="authorInput" name="author"
                           placeholder="请输入模块作者">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">控制器英文名称</label>

                <div class="col-sm-9">
                    <input type="text" value="<?php echo $dataInfo['controller_name'] ?>"
                           class="form-control validate[required]" id="nameInput" name="controllerName"
                           placeholder="请输入控制器英文名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">方法列表</label>

                <div class="col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"
                                   name="methodFunc[]" <?php echo str_exists($dataInfo['method_func'], "add") ? "checked='checked'" : "" ?>
                                   class="validate[required]" id="methodFunc1" value="add">
                            新增
                        </label>
                        <label>
                            <input type="checkbox"
                                   name="methodFunc[]" <?php echo str_exists($dataInfo['method_func'], "del") ? "checked='checked'" : "" ?>
                                   class="validate[required]" id="methodFunc2" value="del">
                            删除
                        </label>
                        <label>
                            <input type="checkbox"
                                   name="methodFunc[]" <?php echo str_exists($dataInfo['method_func'], "edit") ? "checked='checked'" : "" ?>
                                   class="validate[required]" id="methodFunc3" value="edit">
                            修改
                        </label>
                        <label>
                            <input type="checkbox"
                                   name="methodFunc[]" <?php echo str_exists($dataInfo['method_func'], "readonly") ? "checked='checked'" : "" ?>
                                   class="validate[required]" id="methodFunc8" value="readonly">
                            只读查看
                        </label>
                        <label>
                            <input type="checkbox"
                                   name="methodFunc[]" <?php echo str_exists($dataInfo['method_func'], "sort") ? "checked='checked'" : "" ?>
                                   class="validate[required]" id="methodFunc4" value="sort">
                            排序
                        </label>
                        <label>
                            <input type="checkbox"
                                   name="methodFunc[]" <?php echo str_exists($dataInfo['method_func'], "lists") ? "checked='checked'" : "" ?>
                                   class="validate[required]" id="methodFunc5" value="lists">
                            列表
                        </label>
                        <label>
                            <input type="checkbox"
                                   name="methodFunc[]" <?php echo str_exists($dataInfo['method_func'], "search") ? "checked='checked'" : "" ?>
                                   class="validate[required]" id="methodFunc6" value="search">
                            搜索
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">JS 验证文件</label>

                <div class="col-sm-9">
                    <div class="radio">
                        <label>
                            <input type="radio" name="jsFile" id="jsFile1"
                                   value="1" <?php echo $dataInfo['javascript_file'] == "1" ? "checked" : "" ?>>
                            同HTML页面
                        </label>
                        <label>
                            <input type="radio" name="jsFile" id="jsFile2"
                                   value="2" <?php echo $dataInfo['javascript_file'] == "2" ? "checked" : "" ?>>
                            单独JS文件
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">模块安装路径</label>

                <div class="col-sm-9">
                    <div class=" input-group">
                        <div class="input-group-addon">Application/Controllers/</div>
                        <input type="text" value="<?php echo $dataInfo['controller_path'] ?>"
                               class="form-control validate[required]" id="nameInput" name="controllerPath"
                               placeholder="请输入要模块相对于你网站根目录路径">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">JS安装路径</label>

                <div class="col-sm-9">
                    <div class=" input-group">
                        <div class="input-group-addon">你的站点目录</div>
                        <input type="text" value="<?php echo $dataInfo['js_path'] ?>"
                               class="form-control validate[required]" id="jsPath" name="jsPath"
                               placeholder="请输入要JS目录相对于你网站根目录路径">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">继承控制器</label>

                <div class="col-sm-9">
                    <select class="form-control"
                            name="extendClass"><?php echo controller_options($dataInfo['extend_class']) ?></select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">分页大小</label>

                <div class="col-sm-2">
                    <input type="number" name="pageSize" id="pageSize" min="5" max="100"
                           value="<?php echo $dataInfo['page_size'] ?>"
                           class="form-control validate[required,custom[integer],min[5]] ">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">数据库表名字段</label>

                <div class="col-sm-2 radio">
                    <label><input type="radio" value="1"
                                  name="fieldNameFormat" <?php echo $dataInfo['field_name_format'] == 1 ? "checked='checked'" : "" ?> />
                        强制全部大写</label>
                    <label><input type="radio" value="2"
                                  name="fieldNameFormat" <?php echo $dataInfo['field_name_format'] == 2 ? "checked='checked'" : "" ?> />
                        强制全部小写</label>
                    <label><input type="radio" value="3"
                                  name="fieldNameFormat" <?php echo $dataInfo['field_name_format'] == 3 ? "checked='checked'" : "" ?> />
                        不强制</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">图标</label>

                <div class="col-sm-5">
                    <input type="text" value="<?php echo $dataInfo['css_icon'] ?>"
                           class="form-control validate[required]" id="cssIcon" name="cssIcon"
                           placeholder="">
                    <p class="help-block"><a href="http://fontawesome.dashgame.com/" target="_blank">请输入fontawesome 图标CSS</a> </p>

                </div>
            </div>
            <div class='form-actions'>
                <button type="submit" id="dosubmit" class="btn btn-primary">下一步:设置数据字段信息</button>

            </div>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
    var m_id = <?php echo $dataInfo['module_id']?>;
    var edit =<?php echo  $is_edit?"true":"false"?> ;
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/edit.js']);
    });
</script>