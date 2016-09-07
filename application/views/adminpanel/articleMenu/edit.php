<div class='panel panel-default'>
    <div class='panel-heading'>
      <i class='glyphicon glyphicon-edit'></i>  新增分类
        <div class='panel-tools'>
            <div class='btn-group'>
                <a class='btn' href='<?php echo current_url()?>'>
                    <i class='glyphicon glyphicon-refresh'></i>
                    刷新
                </a>
                <?php aci_ui_a($folder_name,'articleMenu','index','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
            </div>
        </div>
    </div>
    <div class='panel-body'>
        <form name="validateform" id="validateform" class="form-horizontal" action="<?php echo current_url()?>" method="post">

            <fieldset>
                <legend>基本信息</legend>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">上级分类</label>
                            <div class="col-sm-5">
                                <select name="parent_id" class=" form-control" >
                                    <option value="0">作为一级分类</option>
                                    <?php echo $select_categorys;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">分类名称</label>
                            <div class="col-sm-5">
                                <input type="text" name="menu_name" class="validate[required] form-control" value="<?php echo $data_info['menu_name']?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">目录英文名称</label>
                            <div class="col-sm-5">
                                <input type="text" name="menu_url" class="validate[required] form-control" value="<?php echo $data_info['menu_url']?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">分类说明</label>
                            <div class="col-sm-5">
                                <input type="text" name="menu_desc" class="validate[required] form-control" value="<?php echo $data_info['menu_desc']?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">分类类型</label>
                            <div class="col-sm-10">
                                <?php if($menu_types)foreach($menu_types as $k=>$v):?>
                                    <label class="radio-inline"><input type="radio" name="menu_type" value="<?php echo $k?>" <?php echo  ($data_info['menu_type']==$k)?"checked='checked'":""?> id="menu_type_click" /> <?php echo $v['caption']?></label>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">页面模板</label>
                            <div class="col-sm-5">
                                <select name="template" id="template" class=" form-control" >
                                </select>
                            </div>
                        </div>
            </fieldset>

            <div class='form-actions'>
                <?php aci_ui_button($folder_name,'articlemenu','add',' type="submit" id="dosubmit" class="btn btn-primary " ','保存')?>
            </div>
        </form>

    </div>
</div>
<script language="javascript" type="text/javascript">
    var default_menu_type ="<?php echo $data_info['menu_type']?>";
    var id=<?php echo $data_info['menu_id']?>;
    var edit = <?php echo $is_edit?"true":"false"?>;
    var folder_name ="<?php echo $folder_name;?>";
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/edit.js']);
    });
</script>