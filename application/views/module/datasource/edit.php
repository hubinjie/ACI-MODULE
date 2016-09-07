<div class="panel panel-default">
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-th-list'></i> <?php echo $is_edit?"编辑":"添加"?><?php echo datasource_type($datasource_typeid)?>数据源
        <div class='panel-tools'>
            <div class='btn-group'>
                <?php aci_ui_a($folder_name, 'datasource', 'index', $data_info['module_id'], ' class="btn  btn-sm "', '<span class="glyphicon glyphicon-arrow-left"></span> 返回') ?>
            </div>
        </div>
    </div>
    <div class='panel-body '>
        <form role="form"   class="form-horizontal" id="validateform" method="post" action="<?php echo current_url()?>">
        <input type="hidden" name="datasource_typeid" id="datasource_typeid" value="<?php echo $datasource_typeid?>"  />
          	<div class="row">
            	<div class="col-md-12">
                	<table class="table" id="rule_list_table">
                      <thead>
                        <tr>
                          <th width="80">排序</th>
                          <th align="center">中文名</th>
                          <th align="center">字段名</th>
                          <th align="center">选中</th>
                          <th>列表显示</th>
                          <th>转换显示</th>
                        </tr>
                      </thead>
                  	<tbody>
                    <?php
					if($dataList)foreach($dataList as $k=>$v):
						$default_row =NULL;
						$key_id = intval($v['field_id']);
						if(isset($setting[$key_id])) 
						{
							$default_row = $setting[$key_id];
						}
						
						$checked= false;
						if($default_row&&$default_row['selected'])$checked= true;
					?>
                    	<tr>
                          <td>
                          <select name="index_num[<?php echo $v['field_id']?>]" class="form-control" >
                          <?php for($n=1;$n<=count($dataList);$n++):?>
                          <option value="<?php echo $n?>"><?php echo $n?></option>
                          <?php endfor;?>
                          </select>
                          </td>
                          <td><?php echo $v['field_name']?></td>
                          <td><?php echo $v['field_caption']?></td>
                          <td ><?php echo datasource_type_html_control($datasource_typeid,$v['field_id'],$checked)?>  </td>
                          <td > <input type="checkbox" name="show_value[]" value="<?php echo $v['field_id']?>"  class="checkbox" <?php if($default_row&&$default_row['show'])echo 'checked="checked"'?>/> </td>
                          <td > <input type="checkbox" name="convert_value[]" value="<?php echo $v['field_id']?>"  class="checkbox" <?php if($default_row&&isset($default_row['convert'])&&$default_row['convert'])echo 'checked="checked"'?>/> </td>
                        </tr>
                     <?php endforeach;?>
              		</tbody>
                    <tfoot>
                    	<tr>
                        	<td colspan="6">
                            	<div class="row">
                                 	<div class="col-md-2 text-right">
                                    	数据据源中文名称 
                                    </div>
                                    <div class="col-md-2">
                                    	<input type="text" name="datasource_name" value="<?php echo $dataInfo['datasource_name']?>" class="form-control" />
                                    </div>
                                    <div class="col-md-2 text-right">
                                    	数据据源功能名称 
                                    </div>
                                    <div class="col-md-2">
                                    	<input type="hidden" name="o_datasource_function_name" value="<?php echo $dataInfo['datasource_function_name']?>"  />
                                    	<input type="text" name="datasource_function_name" placeholder="建议为英文" value="<?php echo $dataInfo['datasource_function_name']?>" class="form-control" />
                                    </div>
                                 	<div class="col-md-2 text-right">
                                    	显示选项连接符 
                                    </div>
                                    <div class="col-md-2">
                                    	<input type="text" name="concat_char" value="<?php echo $dataInfo['concat_char']?>" class="form-control" />
                                    </div>
                                    <div class="col-md-2  text-right"> 列表模式转换显示
                                    </div>
                                    <div class="col-md-2">
                                    	<label><input type="radio" name="force_convert_text_readonly" value="0" <?php echo $dataInfo['force_convert_text_readonly']?"checked='checked'":''?>  /> 选中值 </label>
                                        <label><input type="radio" name="force_convert_text_readonly" value="1" <?php echo $dataInfo['force_convert_text_readonly']?"checked='checked'":''?>  /> 显示值 </label>
                                    </div>
                                     <div class="col-md-2  text-right"> 编辑模式转换显示
                                    </div>
                                    <div class="col-md-2">
                                    	<label><input type="radio" name="force_convert_text_edit" value="0"   <?php echo $dataInfo['force_convert_text_edit']?"checked='checked'":''?> /> 选中值 </label>
                                        <label><input type="radio" name="force_convert_text_edit" value="1"  <?php echo $dataInfo['force_convert_text_edit']?"checked='checked'":''?> /> 显示值 </label>
                                    </div>
                                    
                                 </div>
                            </td>
                        </tr>
                    </tfoot>
              		</table>
                </div>
            </div>

            <div class='form-actions'>
                  <button type="submit" id="dosubmit" class="btn btn-primary " >保存</button>
              </div>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
    var m_id= <?php echo $dataInfo['module_id']?>,id = <?php echo $dataInfo['datasource_id']?>,is_edit=<?php echo $is_edit?"true":"false"?> ;
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/<?php echo $folder_name?>/<?php echo $controller_name?>/edit.js']);
    });
</script>