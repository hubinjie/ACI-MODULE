
<?php echo tab_module_bar(3,$dataInfo['module_id']) ?>
<form role="form"   class="form-horizontal" id="validateform" method="post">
<div class='panel panel-default'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-edit'></i>
        设置【<?php echo $dataInfo['controller_caption']?>】字段扩展信息
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

        <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
              <strong>提示!</strong> 数字越小，越靠前，最小为1.
           </div>

    	<table class="table" id="rule_list_table">
                      <thead>
                        <tr>
                          <th align="center">排序</th>
                          <th align="center">分组</th>
                          <th>中文名</th>
                          <th>必填项 </th>
                          <th>排序项 </th>
                          <th>搜索项 </th>
                          <th>列表项 </th>
                        </tr>
                      </thead>
                  	<tbody>
                    <?php if($dataList)foreach($dataList as $k=>$v):if($v['is_pri'])continue;?>
                    	<tr>
                          <td><input type="text" name="index_num[<?php echo $v['field_id']?>]" value="<?php echo $v['index_num']?>" size="2" /></td>
                          <td><select  name="group_item[<?php echo $v['field_id']?>]"><?php echo html_tab_group_list($v['group_item_num'])?></select></td>
                          <td><?php echo $v['field_caption']?></td>
                          <td><input type="checkbox" name="required_item[<?php echo $v['field_id']?>]" <?php echo $v['is_required']?'checked="checked"':''?> class="checkbox" value="1" /> </td>
                          <td><input type="checkbox" name="sort_item[<?php echo $v['field_id']?>]"  <?php echo $v['is_sort']?'checked="checked"':''?> class="checkbox"  value="1" /> </td>
                          <td><input type="checkbox" name="search_item[<?php echo $v['field_id']?>]" <?php echo $v['is_search']?'checked="checked"':''?>  class="checkbox"  value="1" /> </td>
                          <td><input type="checkbox" name="list_item[<?php echo $v['field_id']?>]" <?php echo $v['is_list']?'checked="checked"':''?>  class="checkbox"  value="1" /> </td>
                        </tr>
                     <?php endforeach;?>
              		</tbody>
              		</table>

        <fieldset>
            <legend>字段判断信息</legend>

            
                <div class="form-horizontal" >
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">必填项提示</label>
                    <div class="col-sm-10">
                      <input type="text" name="require_tips" class="form-control validate[required]"  value="<?php echo $dataInfo['required_tips']?>" placeholder="请输入必填项提示，支持%s">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">不符合要求提示</label>
                    <div class="col-sm-10">
                      <input type="text" name="error_tips" class="form-control validate[required]"  value="<?php echo $dataInfo['error_tips']?>" placeholder="请输入不符合要求提示，支持%s">
                    </div>
                  </div>
                </div>
        </fieldset>
<?php if($uploadItems)foreach($uploadItems as $k=>$v):?>

        <fieldset>
            <legend>【<?php echo $v['field_caption']?>】上传相关信息</legend>

                <div class="form-horizontal" role="form">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">图片大小</label>
                    <div class="col-sm-2">
                      <div class=" input-group">
                      <input type="number" name="file_size[<?php echo $v['field_id']?>]" class="form-control validate[required]"  value="<?php echo $v['upload_max_size']?>" placeholder="默认单位为K">
                      <div class="input-group-addon">K</div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">图片上传路径</label>
                    <div class="col-sm-5">
                        <div class=" input-group">
                     	 <div class="input-group-addon">FCPATH/</div>
                      	 <input type="text" name="file_path[<?php echo $v['field_id']?>]" class="form-control validate[required]"  value="<?php echo $v['upload_path']?>" placeholder="相对于网站根目录的路径">
                    	</div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">图片URL前缀</label>
                    <div class="col-sm-5">
                      	 <input type="text" name="file_url[<?php echo $v['field_id']?>]"  class="form-control validate[required]"  value="<?php echo $v['upload_url']?>" placeholder="图片URL前缀">
                  </div>
                  </div>
                </div>
          </fieldset>
<?php endforeach;?>
<?php if($multiItems):?>
        <fieldset>
            <legend>下拉框初始化</legend>
          <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
          <strong>友情提示</strong> 名称与值中间用|分开,多个值之间请用回车换行分开。
          </div>
          		<div class="form-horizontal" role="form">
                <?php foreach($multiItems as $k=>$v):?>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"><?php echo $v['field_caption']?></label>
                    
                    <div class="col-sm-10">
                      <div class="form-group">
                      	<div class="col-sm-6"><label><input class="choose-datasource" type="radio" value="1" <?php if(!$v['is_options_from_datasource']) echo 'checked="checked"'?> field_id="<?php echo $v['field_id']?>" name="file_value_from[<?php echo $v['field_id']?>]" /> 从静态数据项输入</label></div>
                        <div class="col-sm-6"><label><input class="choose-datasource" type="radio" value="2" <?php if($v['is_options_from_datasource']) echo 'checked="checked"'?> field_id="<?php echo $v['field_id']?>"  name="file_value_from[<?php echo $v['field_id']?>]" /> 关联数据源动态输出</label></div>
                        </div>
                      
                      <div id="ds_<?php echo $v['field_id']?>_1" <?php if(!$v['is_options_from_datasource']) echo 'style="display:none"'?>>
                      <select class="form-control" name="from_datasource[<?php echo $v['field_id']?>]">  
                      <option value="">==请选择数据源==</option>
                      <?php foreach($datasource_list as $datasource):if(!dropdownlist_datasource_type($datasource['datasource_typeid']))continue;?>
                      <option value="<?php echo $datasource['datasource_id']?>" <?php if($v['datasource_id']==$datasource['datasource_id']) echo 'selected="selected"'?>><?php echo datasource_type($datasource['datasource_typeid'])?>:<?php echo $datasource['datasource_name']?> </option>
                      <?php endforeach;?>
                      </select>
                      </div>
                      <div id="ds_<?php echo $v['field_id']?>_2"  <?php if($v['is_options_from_datasource']) echo 'style="display:none"'?>>
                      <textarea name="file_value[<?php echo $v['field_id']?>]" class="form-control"  placeholder="名称|值"><?php echo $v['field_options']?></textarea>
                      </div>
                    </div>
                  </div>
                  <hr/>
				<?php endforeach;?>
                </div>
           </fieldset>
<?php endif;?>
        <?php if($windows_items):?>
        <fieldset>
            <legend>弹窗数据源</legend>

          		<div class="form-horizontal" role="form">
                <?php foreach($windows_items as $k=>$v):?>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"><?php echo $v['field_caption']?></label>
                    
                    <div class="col-sm-10">
                      
                     
                      <select class="form-control" name="from_datasource[<?php echo $v['field_id']?>]">  
                      <option value="">==请选择数据源==</option>
                      <?php foreach($datasource_list as $datasource):if(dropdownlist_datasource_type($datasource['datasource_typeid']))continue;?>
                      <option value="<?php echo $datasource['datasource_id']?>" <?php if($v['datasource_id']==$datasource['datasource_id']) echo 'selected="selected"'?>><?php echo datasource_type($datasource['datasource_typeid'])?>:<?php echo $datasource['datasource_name']?> </option>
                      <?php endforeach;?>
                      </select>
                     
                    </div>
                  </div>
                  <hr/>
				<?php endforeach;?>
                </div>
          </fieldset>
        <?php endif;?>

        <div class='form-actions'>
          <button type="submit" class="btn btn-primary">保存所有设置</button>
         </div>
    </div>
</div>
    <script language="javascript" type="text/javascript">
        var m_id = <?php echo $dataInfo['module_id']?>;
        var init_data_list = <?php echo json_encode($dataList)?>;
        require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
            require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/edit_field_ext.js']);
        });
    </script>