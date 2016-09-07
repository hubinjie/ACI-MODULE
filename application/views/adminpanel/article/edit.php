<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?>
<div class='panel panel-default'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-edit'></i>  内容管理
        <div class='panel-tools'>
            <div class='btn-group'>
                <a class='btn' href='<?php echo current_url()?>'>
                    <i class='glyphicon glyphicon-refresh'></i>
                    刷新
                </a>
                <?php aci_ui_a($folder_name,'article','index','',' class="btn  btn-sm pull-right"','<span class="glyphicon glyphicon-arrow-left"></span> 返回')?>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <form name="validateform" id="validateform" class="form-horizontal" method="post">
            <div class="row">
                <div class="col-md-12">
                    <fieldset>
                        <legend>必填信息</legend>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">标题名称</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="validate[required] form-control" value="<?php echo htmlspecialchars($data_info['title'])?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">所属分类</label>
                                        <div class="col-sm-9">
                                            <select name="menu_id" class=" form-control" >
                                                <option value="">==请选择分类==</option>
                                                <?php echo $select_categorys;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea cols="1" name="content"  id="content" rows="1"><?php echo $data_info['content']?></textarea>
                                            <?php echo form_editor('content','full',true,base_url($folder_name.'/article/upload/article'))?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">页面模板</label>
                                        <div class="col-sm-9">
                                            <select name="template_id" class=" form-control" >
                                                <option value="0">继承分类模板</option>
                                                <?php echo template_list_options($data_info['template_id']);?>
                                            </select>
                                        </div>
                                    </div>

                    </fieldset>
                    <!--页面结束-->
                </div>
                <div class="col-md-12">
                    <fieldset>
                        <legend>可选项</legend>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">关键词</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="请用逗号分开" name="keywords" class="form-control" value="<?php echo htmlspecialchars($data_info['keywords'])?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">说明</label>
                                <div class="col-sm-9">
                                    <textarea name="desciption" class="form-control"><?php echo htmlspecialchars($data_info['description'])?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">作者</label>
                                <div class="col-sm-9">
                                    <input type="text" name="author" class="form-control" value="<?php echo htmlspecialchars($data_info['author'])?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">缩略图</label>
                                <div class="col-sm-9">
                                    <img  width="100" id="thumb_SRC" border="1" src="<?php echo show_photo($this->method_config['upload']['article']['upload_url'].'/'.$data_info['thumb'])?>"/><input type="hidden" id="thumb" name="thumb" value="<?php echo $data_info['thumb']?>" />
                                    <?php aci_ui_a('','','','',' class="btn btn-default btn-sm uploadThumb_a"','选择图片 ...')?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">来源</label>
                                <div class="col-sm-9">
                                    <input type="text" name="source" class="form-control" value="<?php echo htmlspecialchars($data_info['source'])?>"/>
                                </div>
                            </div>
                    </fieldset>
                </div>
            </div>

            <div class='form-actions'>
                <?php aci_ui_button($folder_name,'article','add',' type="submit" id="dosubmit" class="btn btn-primary " ','保存')?>
            </div>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
    var menu_type='<?php echo $menu_type?>';
    var id = <?php echo $data_info['page_id']?>;
    var edit = <?php echo $is_edit?"true":"false"?>;
    var upload_path = "<?php echo $this->method_config['upload']['article']['upload_url']?>/";
    var folder_name='<?php echo $folder_name?>';
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/edit.js']);
    });
</script>