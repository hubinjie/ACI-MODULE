<?php echo tab_module_bar(5,$dataInfo['module_id']) ?>
<fieldset class='panel panel-default'>
    <div class='panel-heading'>
        <i class='glyphicon glyphicon-edit'></i>
        设置HTML模板
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

  <form role="form"  id="validateform" method="post">

    <div class="panel-body">
    	
       <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
          <strong>提示!</strong> 可以填写PHP或HTML代码，请不要再加 &lt;?php  ?&gt;,本系统不会判断PHP语法，所以请慎重。 .
       </div>

    	<fieldset>
                  <div class="form-group">
                    <label >头部输出公开文件</label>
                    <textarea class="form-control" name="view_header_code"  placeholder="支持PHP或HTML"><?php echo $dataInfo['view_header_code']?></textarea>
                  </div>
        </fieldset>
        
        <fieldset>
            
                  <div class="form-group">
                    <label >尾部输出公开文件</label>
                    <textarea class="form-control" name="view_footer_code"   placeholder="支持PHP或HTML"><?php echo $dataInfo['view_footer_code']?></textarea>
                  </div>
        </fieldset>
        
        <div class="form-actions">
          <button type="submit" name="dosubmit" class="btn btn-primary">保存 : 返回列表页面可以下载及预览</button> 

        </div>
    </div>
</form>

    </div>